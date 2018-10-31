<?php

/**********
Versión: 001
Fecha: 2018-08-16
Desarrollador: Edwin Molina Grisales
Descripción: Controlador para el formulario CONFORMACION SEMILLEROS TIC ESTUDIANTES
---------------------------------------
Modificaciones:
Fecha: 2018-10-31
Persona encargada: Edwin Molina Grisales
Descripción: Se permite guardar o modificar los registros por parte del usuario
---------------------------------------
**********/

namespace app\controllers;

if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion se redirecciona al login
else
{
	echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
	die;
}

use Yii;
use app\models\SemillerosDatosIeoEstudiantes;
use app\models\SemillerosDatosIeoEstudiantesBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Instituciones;
use app\models\Sedes;
use app\models\Personas;
use app\models\Estados;
use app\models\Fases;
use app\models\Sesiones;
use app\models\EstudiantesOperativoSesion;
use app\models\Escalafones;
use app\models\Docentes;
use app\models\DistribucionesAcademicas;
use app\models\AcuerdosInstitucionalesEstudiantes;
use app\models\SemillerosTicCiclos;
use app\models\SemillerosTicAnio;
use app\models\Parametro;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

use yii\db\Query;

/**
 * SemillerosDatosIeoEstudiantesController implements the CRUD actions for SemillerosDatosIeoEstudiantes model.
 */
class SemillerosDatosIeoEstudiantesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
	public function actionCiclos()
	{
		$id_ciclo = false;
		
		$model = new SemillerosTicCiclos();
		
		$model->load( Yii::$app->request->post() );
		
		if( empty( $model->id ) )
		{
			$dataAnios 	= SemillerosTicAnio::find()
							->where( 'estado=1' )
							->orderby( 'descripcion' )
							->all();
			
			$anios	= ArrayHelper::map( $dataAnios, 'id', 'descripcion' );
			
			$ciclos = [];
			
			if( $model->id_anio ){
				
				$dataCiclos = SemillerosTicCiclos::find()
								->where( 'estado=1' )
								->where( 'id_anio='.$model->id_anio )
								->orderby( 'descripcion' )
								->all();
				
				$ciclos		= ArrayHelper::map( $dataCiclos, 'id', 'descripcion' );
			}
			
			return $this->render( 'ciclos', [
				'model' 	=> $model,
				'anios' 	=> $anios,
				'ciclos'	=> $ciclos,
			]);
		}
		else{
			return $this->actionCreate();
		}
	}
	
	function actionViewFases(){
		
		// $institucion 	= Yii::$app->request->post()['institucion'];
		// $sede 			= Yii::$app->request->post()['sede'];
		// $docente		= Yii::$app->request->post()['docente'];
		// $asignatura		= Yii::$app->request->post()['asignatura'];
		// $nivel			= Yii::$app->request->post()['nivel'];
		
		// $idPE = InstrumentoPoblacionDocentes::findOne([
					// 'id_institucion' 				=> $institucion,
					// 'id_sede' 		 				=> $sede,
					// 'id_persona' 					=> $docente,
					// 'id_asignaturas_niveles_sedes'	=> $asignatura,
					// 'id_niveles' 					=> $nivel,
					// 'estado' 						=> 1,
				// ]);
				
		$fases	= Fases::find()
					->where('estado=1')
					->orderby( 'descripcion' )
					->all();
		
		return $this->renderPartial('fases', [
			'idPE' 	=> null,
			'fases' => $fases,
        ]);
		
	}

    /**
     * Lists all SemillerosDatosIeoEstudiantes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SemillerosDatosIeoEstudiantesBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SemillerosDatosIeoEstudiantes model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

	public function actionCreate()
    {
		$ciclo = new SemillerosTicCiclos();
		
		$ciclo->load( Yii::$app->request->post() );
		
		//Si no hay un ciclo se pide el ciclo, para ello se llama a la vista ciclos
		if( empty( $ciclo->id ) ){
			return $this->actionCiclos();
		}
		
		$id_institucion	= $_SESSION['instituciones'][0];
		$id_sede 		= $_SESSION['sede'][0];
		
        $datosIEO = SemillerosDatosIeoEstudiantes::findOne([
							'id_institucion' 		=> $id_institucion,
							'id_sede' 		 		=> $id_sede,
							'profecional_a' 		=> Yii::$app->request->post('SemillerosDatosIeoEstudiantes')['profecional_a'],
							'lower(docente_aliado)'	=> strtolower( Yii::$app->request->post('SemillerosDatosIeoEstudiantes')['docente_aliado'] ),
						]);
		
		if( !$datosIEO )
		{
			$datosIEO = new SemillerosDatosIeoEstudiantes();
			$datosIEO->load( Yii::$app->request->post() );
		}
		
		$guardar = Yii::$app->request->post('guardar') == 1 ? true: false;
		$guardado = false;
		
		$modelos = [];
		
		//Busco todas las fases
		$fases	= Fases::find()
					->where('estado=1')
					->orderby( 'descripcion' )
					->all();
		
		//Por cada fase hay un acuerdo institucional
		//La primera es vacia ya que se usa para crear la primera fila y con ella crear las demas dinamicamente
		foreach( $fases as $key => $fase ){
			$modelos[ $fase->id ][] = new AcuerdosInstitucionalesEstudiantes();
		}
		
		//Si no se va a guardar se buscan todos los datos guardados
		if( !$guardar )
		{	
			if( $datosIEO->id )
			{ 
				$acuerdos = AcuerdosInstitucionalesEstudiantes::find()
								->where( 'estado=1' )
								->andWhere( 'id_ciclo='.$ciclo->id )
								->andWhere( 'id_semilleros_datos_estudiantes='.$datosIEO->id )
								->all();
				
				foreach( $acuerdos as $key => $acuerdo )
				{ echo "...$acuerdo->id_fase...";
					$modelos[ $acuerdo->id_fase ][] = $acuerdo;
				}
			}
		}
		else{
			
			$datosIEO->load( Yii::$app->request->post() );
			
			if( is_array( Yii::$app->request->post('AcuerdosInstitucionalesEstudiantes') ) )
			{
				foreach( Yii::$app->request->post('AcuerdosInstitucionalesEstudiantes') as $id_fase => $acuerdos )
				{
					foreach( $acuerdos as $acuerdo )
					{
						if( !empty( $acuerdo['id'] ) )
						{
							$ac = AcuerdosInstitucionalesEstudiantes::findOne( $acuerdo['id'] ); 
						}
						else
						{
							$ac = new AcuerdosInstitucionalesEstudiantes(); 
						}
						
						$ac->load( $acuerdo, '');
							
						$modelos[ $id_fase ][] = $ac;
					}
				}
			}
			
			$valido = true;
			
			$datosIEO->validate([
					'personal_a' 		=> 'Personal A.',
					'docente_aliado' 	=> 'Docente aliado',
				]) && $valido;
			
			foreach( $modelos as $fase_id => $modelo )
			{
				foreach( $modelo as $k => $value )
				{
					$value->validate([
						'curso' 				=> 'Curso',
						'cantidad_inscritos' 	=> 'Cantidad Inscritos',
						'frecuencia_sesiones' 	=> 'Frecuencia Sesiones',
						'jornada'				=> 'Jornada',
						'recursos_requeridos' 	=> 'Recursos Requeridos',
						'observaciones' 		=> 'Observaciones',
					]) && $valido;
				}
			}
			
			if( $valido )
			{
				$datosIEO->estado 	= 1;
				$datosIEO->id_sede	= $id_sede;
				$datosIEO->save( false );
				
				foreach( $modelos as $id_fase => $modelo )
				{	
					$primera = true;
					foreach( $modelo as $k => $value )
					{
						if( !$primera )
						{
							$value->id_semilleros_datos_estudiantes = $datosIEO->id;
							$value->id_fase 				= $id_fase;
							$value->id_ciclo 				= $ciclo->id;
							$value->estado 					= 1;
							$value->save( false );
						}
						
						$primera = false;
					}
				}
				
				$guardado = true;
			}
		}

       
		
		$institucion = Instituciones::findOne($id_institucion);
		$sede 		 = Sedes::findOne($id_sede);
		
		$dataPersonas 		= Personas::find()
								->select( "( nombres || ' ' || apellidos ) as nombres, personas.id" )
								->innerJoin( 'perfiles_x_personas pp', 'pp.id_personas=personas.id' )
								->innerJoin( 'docentes d', 'd.id_perfiles_x_personas=pp.id' )
								->innerJoin( 'perfiles_x_personas_institucion ppi', 'ppi.id_perfiles_x_persona=pp.id' )
								->where( 'personas.estado=1' )
								->andWhere( 'id_institucion='.$id_institucion )
								->all();
		
		$docentes		= ArrayHelper::map( $dataPersonas, 'id', 'nombres' );
		
		
		$dataJornadas 	= Parametro::find()
						->where( 'id_tipo_parametro=7' )
						->andWhere( 'estado=1' )
						->all();

		$jornadas		= ArrayHelper::map( $dataJornadas, 'id', 'descripcion' );
		
		$dataRecursos 	= Parametro::find()
						->where( 'id_tipo_parametro=8' )
						->andWhere( 'estado=1' )
						->all();

		$recursos		= ArrayHelper::map( $dataRecursos, 'id', 'descripcion' );
		
		$dataParametro 	= Parametro::find()
						->where( 'id_tipo_parametro=6' )
						->andWhere( 'estado=1' )
						->orderby( 'id' )
						->all();

		$parametros		= ArrayHelper::map( $dataParametro, 'id', 'descripcion' );
		
		$fases	= Fases::find()
					->where('estado=1')
					->orderby( 'descripcion' )
					->all();

		$profesionales 	  = [];
		$docentes_aliados = [];
		$dataProfesionales = SemillerosDatosIeoEstudiantes::find()
								->alias( 'sdi' )
								->innerJoin( 'semilleros_tic.acuerdos_institucionales ai', 'ai.id_semilleros_datos_ieo=sdi.id' )
								->where( 'sdi.estado=1' )
								->where( 'ai.estado=1' )
								->where( 'ai.id_ciclo='.$ciclo->id )
								->all();
		
		foreach( $dataProfesionales as $key => $value ){
			$profesionales[] = $value->profecional_a;
			$docentes_aliados[ $value->profecional_a ] = $value->docente_aliado;
		}
					
        return $this->render('create', [
            'datosIEO' 			=> $datosIEO,
            'institucion' 		=> $institucion,
            'sede' 				=> $sede,
            'docentes' 			=> $docentes,
            'controller'		=> $this,
            'jornadas'			=> $jornadas,
            'recursos'			=> $recursos,
            'parametros'		=> $parametros,
            'fases'				=> $fases,
            'modelos'			=> $modelos,
            'profesionales'		=> $profesionales,
            'docentes_aliados'	=> $docentes_aliados,
            'ciclo'				=> $ciclo,
            'guardado'			=> $guardado,
        ]);
    }


    /**
     * Updates an existing SemillerosDatosIeoEstudiantes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SemillerosDatosIeoEstudiantes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SemillerosDatosIeoEstudiantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SemillerosDatosIeoEstudiantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SemillerosDatosIeoEstudiantes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
