<?php

/**********
Versión: 001
Fecha: 2018-08-23
Desarrollador: Edwin Molina Grisales
Descripción: Controlador EjecucionFaseIEstudiantesController
---------------------------------------
Modificaciones:
Fecha: 2018-11-01
Persona encargada: Edwin Molina Grisales
Cambios realizados: Cambios varios para permitir ingresar o actualizar registros
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
use app\models\SemillerosTicEjecucionFaseIEstudiantes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Fases;
use app\models\SemillerosTicDatosIeoProfesionalEstudiantes;
use app\models\SemillerosTicAnio;
use app\models\SemillerosTicCiclos;
use app\models\Instituciones;
use app\models\Sedes;
use app\models\Personas;
use app\models\Sesiones;
use app\models\DatosSesiones;
use app\models\SemillerosTicCondicionesInstitucionalesEstudiantes;
use app\models\AcuerdosInstitucionalesEstudiantes;
use app\models\SemillerosDatosIeoEstudiantes;
use app\models\Niveles;
use app\models\Paralelos;
use app\models\SedesNiveles;
use yii\helpers\ArrayHelper;

/**
 * EjecucionFaseIController implements the CRUD actions for EjecucionFase model.
 */
class EjecucionFaseIEstudiantesController extends Controller
{
	public $id_fase = 1;
	
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

    /**
     * Lists all EjecucionFase models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EjecucionFaseIBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EjecucionFase model.
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

    /**
     * Creates a new EjecucionFase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		// echo "<pre>"; var_dump(Yii::$app->request->post()); echo "</pre>";
		$ciclo = new SemillerosTicCiclos();
		
		$ciclo->load( Yii::$app->request->post() );
		
		//Si no hay un ciclo se pide el ciclo, para ello se llama a la vista ciclos
		if( empty( $ciclo->id ) ){
			return $this->actionCiclos();
		}
		
		$id_sede 		= $_SESSION['sede'][0];
		$id_institucion	= $_SESSION['instituciones'][0];
		
		$condiciones = null;
		
		//Indica si se guarda la fase
		$guardado = false;
		
		$guardar = Yii::$app->request->post('guardar') == 1 ? true: false;
		
		/***************************************************************************************************
		 * datosModelos contiene todos los modelos que se van a usar
		 * Es un array con una estructura similar a como se usa en la página de la
		 * siguiente manera
		 *
		 * Por cada session hay un data sesion, varias ejecuciones de fase 
		 * $dataModelos['id_sesion'] = [
		 *		'datosSesion' => '',
		 *		'EjecuionFase' => [],
		 *		'accionesRecursos' => '',
		 *	];
		 ***************************************************************************************************/
		$datosModelos = [];
		
		/************************************************************************
		 * Consultando todas las sesiones para la fase i estudiantes y que esten activos
		 * id_fase es una propiedad de este controlador
		 * Adicionalmente creo una estructura ya formada para data Modelos
		 ************************************************************************/
		$sesiones = Sesiones::find()
						->where( 'id_fase='.$this->id_fase )
						->andWhere( 'estado=1' )
						->all();
		
		//Creo 
		foreach( $sesiones as $keySesion => $sesion )
		{	
			$datosModelos[ $sesion->id ][ 'datosSesion' ] 		= new DatosSesiones();
			$datosModelos[ $sesion->id ][ 'ejecucionesFase' ][] = new SemillerosTicEjecucionFaseIEstudiantes();
		}
		
		/************************************************************************************
		 * Creo un modelo del profesional IEO en caso de existir
		 * Si no existe creo modelo nuevo
		 ************************************************************************************/
		$postDatosProfesional = Yii::$app->request->post('SemillerosTicDatosIeoProfesionalEstudiantes');
		
		$datosIeoProfesional = false;
		if( $id_institucion && $postDatosProfesional['id_profesional_a'] )
		{
			$datosIeoProfesional 		= SemillerosTicDatosIeoProfesionalEstudiantes::findOne([
											'id_institucion'		=> $id_institucion,
											'id_profesional_a'		=> $postDatosProfesional['id_profesional_a'],
											'curso_participantes'	=> $postDatosProfesional['curso_participantes'],
										  ]);
		}
		
		if( !$datosIeoProfesional )
		{
			$datosIeoProfesional = new SemillerosTicDatosIeoProfesionalEstudiantes();
			$datosIeoProfesional->load(Yii::$app->request->post());
		}
		
		
		if( $datosIeoProfesional )
		{
			//Si ya hay un modelo para datos profesional, procedo a consultar las ejecuciones de fase que halla por cada profesional
			if( $datosIeoProfesional->id )
			{
				if( !$guardar )
				{
					$ejecucionesFases = SemillerosTicEjecucionFaseIEstudiantes::find()
											->where( 'id_fase='.$this->id_fase )
											->andWhere( 'id_ciclo='.$ciclo->id )
											->andWhere( 'id_datos_ieo_profesional_estudiantes='.$datosIeoProfesional->id )
											->andWhere( 'estado=1' )
											->all();
			
					foreach( $ejecucionesFases as $key => $ejecucionFase )
					{
						$ds = DatosSesiones::findOne( $ejecucionFase->id_datos_sesion );
						
						$ds->fecha_sesion = Yii::$app->formatter->asDate($ds->fecha_sesion, "php:d-m-Y");
						
						$datosModelos[ $ds->id_sesion ][ 'datosSesion' ] 		= $ds;
						$datosModelos[ $ds->id_sesion ][ 'ejecucionesFase' ][]	= $ejecucionFase;
					}
				}
				
				$condiciones = SemillerosTicCondicionesInstitucionalesEstudiantes::findOne([ 
										'id_datos_ieo_profesional_estudiantes' 	=> $datosIeoProfesional->id,
										'id_fase'								=> $this->id_fase,
										'id_ciclo'								=> $ciclo->id,
									]);
				
			}
			
			//Si no hay condiciones institucionales significa que no se encontró nada en los registros y se crea uno nuevo
			if( !$condiciones )
			{
				$condiciones = new SemillerosTicCondicionesInstitucionalesEstudiantes();
			}
			
			//esta variable solo es activa si el dan al boton guardar
			if( $guardar )
			{
				//Si es un pos procedo a cargar todos los datos de acuerdo a lo ingresado por el usuario
				if( Yii::$app->request->post() ){
					
					if( is_array( Yii::$app->request->post( 'DatosSesiones' ) ) )
					{
						foreach( Yii::$app->request->post( 'DatosSesiones' ) as $sesion_id => $dataSesion )
						{
							if( !empty( $dataSesion['fecha_sesion'] ) )
							{
								//Si existe id consulto los datos correspondientes y cargo los datos del post
								//Si no, creo un nuevo modelo y cargo los datos del post
								if( !empty( $dataSesion['id'] ) )
								{
									$ds = DatosSesiones::findOne( $dataSesion['id'] );
								}
								else{
									$ds = new DatosSesiones();
								}
								
								$ds->load( $dataSesion, '' );
								
								$datosModelos[ $sesion_id ][ 'datosSesion' ] 		= $ds;
							}
						}
					}
					
					if( is_array( Yii::$app->request->post( 'SemillerosTicEjecucionFaseIEstudiantes' ) ) )
					{
						foreach( Yii::$app->request->post( 'SemillerosTicEjecucionFaseIEstudiantes' ) as $sesion_id => $ejecucionFases )
						{
							foreach( $ejecucionFases as $key => $ejecucionFase )
							{
								//Si existe id consulto los datos correspondientes y cargo los datos del post
								//Si no, creo un nuevo modelo y cargo los datos del post
								if( !empty( $ejecucionFase['id'] ) )
								{
									$ef = SemillerosTicEjecucionFaseIEstudiantes::findOne( $ejecucionFase['id'] );
								}
								else{
									$ef = new SemillerosTicEjecucionFaseIEstudiantes();
								}
								
								$ef->load( $ejecucionFase, '' );
								
								$datosModelos[ $sesion_id ][ 'ejecucionesFase' ][] = $ef;
							}
						}
					}
				}
			
				$condiciones->load( Yii::$app->request->post() );
			
				$valido = true;
				
				$valido = $datosIeoProfesional->validate([
									'id_profesional_a',
									'curso_participantes',
								]) && $valido;
				
				foreach( $datosModelos as $key => $modelo )
				{
					if( !empty($modelo[ 'datosSesion' ]->fecha_sesion ) ){
						
						$valido = $modelo[ 'datosSesion' ]->validate([
										'fecha_sesion',
									]) && $valido;
						
						$primera = true;
						foreach( $modelo[ 'ejecucionesFase' ] as $key => $ejecucionFase )
						{
							if( !$primera )
							{
								$valido = $ejecucionFase->validate([
												'participacion_sesiones',
												'numero_estudiantes',
												'apps_creadas',
												'aplicaciones_creadas',
												'sesiones_empleadas',
												'acciones_realizadas',
												'problemas_creacion',
												'competencias_inferidas',
												'observaciones',
											]) && $valido;
							}
							$primera = false;
						}
					}
				}
				
				$valido = $condiciones->validate([
								'parte_ieo' 				=> 'Parte Ieo',
								'parte_univalle' 			=> 'Parte Univalle',
								'parte_sem' 				=> 'Parte Sem',
								'otro' 						=> 'Otro',
								'estado' 					=> 'Estado',
								'total_sesiones_ieo' 		=> 'Total Sesiones Ieo',
								'total_docentes_ieo' 		=> 'Total Docentes Ieo',
								'sesiones_por_docente' 		=> 'Sesiones por Docente',
							]) && $valido;
				
				if( $valido )
				{
					$datosIeoProfesional->id_institucion = $id_institucion;
					$datosIeoProfesional->id_sede = $id_sede;
					$datosIeoProfesional->estado = 1;
					$datosIeoProfesional->save( false );
					
					foreach( $datosModelos as $sesion_id => $modelo )
					{
						if( !empty($modelo[ 'datosSesion' ]->fecha_sesion ) )
						{
							$modelo[ 'datosSesion' ]->id_sesion = $sesion_id;
							$modelo[ 'datosSesion' ]->estado 	= 1;
							$modelo[ 'datosSesion' ]->save(false);
							
							$primera = true;
							foreach( $modelo[ 'ejecucionesFase' ] as $key => $ejecucionFase )
							{
								if( !$primera )
								{
									$ejecucionFase->id_datos_ieo_profesional_estudiantes 	= $datosIeoProfesional->id;
									$ejecucionFase->id_datos_sesion 						= $modelo[ 'datosSesion' ]->id;
									$ejecucionFase->id_fase 								= $this->id_fase;
									$ejecucionFase->id_ciclo 								= $ciclo->id;
									$ejecucionFase->estado 									= 1;
									$ejecucionFase->save(false);
								}
								$primera = false;
							}
						}
					}
					
					$condiciones->id_datos_ieo_profesional_estudiantes 	= $datosIeoProfesional->id;
					$condiciones->id_fase 								= $this->id_fase;
					$condiciones->id_ciclo 								= $ciclo->id;
					$condiciones->estado 								= 1;
					$condiciones->save(false);
					
					$guardado = true;
				}
			}
		}

		$institucion = Instituciones::findOne($id_institucion);
		$sede 		 = Sedes::findOne($id_sede);
		
		$fase  = Fases::findOne( $this->id_fase );
		
		$docentes = [];
		$dataPersonas 	= SemillerosDatosIeoEstudiantes::find()
								->select( 'id, profecional_a' )
								->alias( 'se' )
								// ->innerJoin( 'semilleros_tic.acuerdos_institucionales_estudiantes ae', 'ae.id_semilleros_datos_estudiantes=se.id' )
								->where( 'se.estado=1' )
								->andWhere( 'se.id_institucion='.$id_institucion )
								->andWhere( 'se.id_sede='.$id_sede )
								->andWhere( 'se.id_ciclo='.$ciclo->id )
								// ->andWhere( 'ae.estado=1' )
								->groupby([ 'id','profecional_a' ])
								->all();
		
		foreach( $dataPersonas as $key => $personas ){
			
			$profesionales = explode( ',', $personas->profecional_a );
			
			foreach( $profesionales as $profesional )
			{
				$persona =  Personas::findOne( $profesional );
				
				if( empty( $docentes[ $personas->id ] ) )
					$docentes[ $personas->id ] = $persona->nombres." ".$persona->apellidos;
				else
					$docentes[ $personas->id ] .= " - ".$persona->nombres." ".$persona->apellidos;
			}
		}
		
		
		$cursos = [];
		
		$post_profesional_a = Yii::$app->request->post('SemillerosTicDatosIeoProfesionalEstudiantes')['id_profesional_a'];
		
		if( $post_profesional_a )
		{
			$dataCursos = AcuerdosInstitucionalesEstudiantes::find()
								->alias( 'ae' )
								->innerJoin( 'semilleros_tic.semilleros_datos_ieo_estudiantes se', 'se.id=ae.id_semilleros_datos_estudiantes' )
								->where( 'ae.id_fase='.$this->id_fase )
								->andWhere( 'ae.estado=1' )
								->andWhere( 'se.estado=1' )
								->andWhere( 'se.id='."'".$post_profesional_a."'" )
								->andWhere( 'ae.id_ciclo='.$ciclo->id )
								->all();
			
			foreach( $dataCursos as $dataCurso )
			{
				$dcursos = explode( ',', $dataCurso->curso );
				
				foreach( $dcursos as $value ){
					if( empty( $cursos[ $dataCurso->id ] ) )
					{	
						$cursos[ $dataCurso->id ] = Paralelos::findOne( $value )->descripcion;
					}
					else{
						$cursos[ $dataCurso->id ] .= " , ".Paralelos::findOne( $value )->descripcion;
					}
				}
			}
		}

		/*Se realiza consulta provisonal para obtener listado de docentes*/
		// $dataPersonas 		= Personas::find()
								// ->select( "( nombres || ' ' || apellidos ) as nombres, personas.id" )
								// ->innerJoin( 'perfiles_x_personas pp', 'pp.id_personas=personas.id' )
								// ->innerJoin( 'docentes d', 'd.id_perfiles_x_personas=pp.id' )
								// ->innerJoin( 'perfiles_x_personas_institucion ppi', 'ppi.id_perfiles_x_persona=pp.id' )
								// ->where( 'personas.estado=1' )
								// ->andWhere( 'id_institucion='.$id_institucion )
								// ->all();
		
		// $docentes		= ArrayHelper::map( $dataPersonas, 'id', 'nombres' );
		
		//Si no existe el curso de los paarticipantes en el array cursos se deja vacío
		if( !array_key_exists( $datosIeoProfesional->curso_participantes, $cursos ) )
			$datosIeoProfesional->curso_participantes = '';
		
        return $this->render('create', [
            'datosModelos'	=> $datosModelos,
            'profesional'	=> $datosIeoProfesional,
            'fase'  		=> $fase,
            'institucion'	=> $institucion,
            'sede' 		 	=> $sede,
            'docentes' 		=> $docentes,
			'ciclo'			=> $ciclo,
			'condiciones'	=> $condiciones,
			'guardado'		=> $guardado,
			'cursos'		=> $cursos,
        ]);
    }

    /**
     * Updates an existing EjecucionFase model.
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
     * Deletes an existing EjecucionFase model.
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
     * Finds the EjecucionFase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EjecucionFase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EjecucionFase::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
