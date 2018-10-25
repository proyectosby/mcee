<?php

/**********
Versión: 001
Fecha: 2018-08-21
Desarrollador: Edwin Molina Grisales
Descripción: Controlador EjecucionFaseIIIController
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
use app\models\EjecucionFase;
use app\models\EjecucionFaseIBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Fases;
use app\models\DatosIeoProfesional;
use app\models\Instituciones;
use app\models\Sedes;
use app\models\Personas;
use app\models\SemillerosTicEjecucionFaseIii;
use app\models\SemillerosTicCondicionesInstitucionalesFaseIii;
use app\models\SemillerosTicCiclos;
use app\models\SemillerosTicAnio;
use yii\helpers\ArrayHelper;

/**
 * EjecucionFaseIController implements the CRUD actions for SemillerosTicEjecucionFaseIii model.
 */
class EjecucionFaseIiiController extends Controller
{
	public $id_fase = 3;
	
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
							->all();
			
			$anios	= ArrayHelper::map( $dataAnios, 'id', 'descripcion' );
			
			$ciclos = [];
			
			if( $model->id_anio ){
				
				$dataCiclos = SemillerosTicCiclos::find()
								->where( 'estado=1' )
								->where( 'id_anio='.$model->id_anio )
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
     * Lists all SemillerosTicEjecucionFaseIii models.
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
     * Displays a single SemillerosTicEjecucionFaseIii model.
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
     * Creates a new SemillerosTicEjecucionFaseIii model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$ciclo = new SemillerosTicCiclos();
		
		$ciclo->load( Yii::$app->request->post() );
		
		//Si no hay un ciclo se pide el ciclo, para ello se llama a la vista ciclos
		if( empty( $ciclo->id ) ){
			return $this->actionCiclos();
		}
		
		$guardar = Yii::$app->request->post('guardar') == 1 ? true: false;
		
		$id_sede 		= $_SESSION['sede'][0];
		$id_institucion	= $_SESSION['instituciones'][0];
		
        $model = new SemillerosTicEjecucionFaseIii();
		
		//Solo hay una condicion por fase iii
		$condiciones = SemillerosTicCondicionesInstitucionalesFaseIii::findOne([ 
							'id_fase'	=> $this->id_fase,
							'id_ciclo'	=> $ciclo->id,
						]);
		
		//Si no existe se crea una vacia
		if( !$condiciones )
		{
			$condiciones = new SemillerosTicCondicionesInstitucionalesFaseIii();
		}
		
		$models[] = [
						'profesionales' => new DatosIeoProfesional([ 'id_institucion' => $id_institucion ]),
						'ejecucionFase' => new SemillerosTicEjecucionFaseIii(),
					];
		

		if( !$guardar )
		{
			//Consultando las ejecuciones de fase
			$ejecucionesFases = SemillerosTicEjecucionFaseIii::find()
									->where( 'id_fase='.$this->id_fase )
									->where( 'id_ciclo='.$ciclo->id )
									->andWhere( 'estado=1' )
									->all();
									
			foreach( $ejecucionesFases as $key => $vEjecucionesFases )
			{
				$models[] = [
								'profesionales' => DatosIeoProfesional::findOne( $vEjecucionesFases->id_datos_ieo_profesional ),
								'ejecucionFase' => $vEjecucionesFases,
							];
			}
		}
		
		if( Yii::$app->request->post('SemillerosTicEjecucionFaseIii') )
		{
			foreach( Yii::$app->request->post('SemillerosTicEjecucionFaseIii') as $key => $vEjecucionesFases )
			{
				if( !empty( $vEjecucionesFases['id'] ) )
				{
					$ef = SemillerosTicEjecucionFaseIii::findOne( $vEjecucionesFases['id'] );
				}
				else
				{
					$ef = new SemillerosTicEjecucionFaseIii();
				}
				
				//Cargando los datos al modelo
				$ef->load( $vEjecucionesFases, '' );
				
				$datosIeoProfesional = Yii::$app->request->post('DatosIeoProfesional')[$key];
				
				$dp = DatosIeoProfesional::findOne([
										'id_institucion'	=> $id_institucion,
										'id_profesional_a'	=> $datosIeoProfesional['id_profesional_a'],
									  ]);
				
				if( !$dp ){
					$dp = new DatosIeoProfesional();
					$dp->id_institucion = $id_institucion;
				}
				
				//Cargando los datos al modelo
				$dp->load( $datosIeoProfesional, '' );
				
				$models[] =[
								'profesionales' => $dp,
								'ejecucionFase' => $ef,
							];
			}
		}
		
		$condiciones->load( Yii::$app->request->post() );
		
		$guardado = false;
		
		if( Yii::$app->request->isPost && $guardar )
		{
			
			$valido = true;
			
			$esPrimera = true;
			foreach( $models as $key => $value )
			{
				if( !$esPrimera )
				{
					$valido = $value['profesionales']->validate([
										'id_institucion' => 'Institución',
										'id_profesional_a' => 'Profesional A',
									]) && $valido;
					
					$valido = $value['ejecucionFase']->validate([
										'docente_creador',
										'asignatura',
										'docente_usuario',
										'grado',
										'numero_estudiantes',
										'numero_apps_usadas',
										'nombre_aplicaciones',
										'tic',
										'tipo_recurso_tic',
										'digitales',
										'tipo_recurso_digital',
										'escolares_no_tic',
										'tipo_recurso_no_tic',
										'tiempo_uso_recurso_tic',
										'observaciones',
										'total_aplicaciones_usadas',
										'numero',
										'tipo_de_produccion',
										'temas_escolares',
										'indice_problematicas',
										'fecha_uso_aplicaciones',
										'estudiantes_cultivadores',
									]) && $valido;
					
				}
				$esPrimera = false;
								
			}

			$valido = $condiciones->validate([
							'parte_ieo',
							'parte_univalle',
							'parte_sem',
							'otro',
						]) && $valido;

			if( $valido )
			{
				$esPrimera = true;
				foreach( $models as $key => $value )
				{
					if( !$esPrimera )
					{
						$value['profesionales']->estado = 1;
						$value['profesionales']->save( false );
						
						$value['ejecucionFase']->id_fase 					= $this->id_fase;
						$value['ejecucionFase']->id_datos_ieo_profesional 	= $value['profesionales']->id;
						$value['ejecucionFase']->estado 					= 1;
						$value['ejecucionFase']->id_ciclo 					= $ciclo->id;
						$value['ejecucionFase']->save( false );
						
						$condiciones->estado 	= 1;
						$condiciones->id_fase 	= $this->id_fase;
						$condiciones->id_ciclo 	= $ciclo->id;
						$condiciones->save( false );
						
						$guardado = true;
					}
					$esPrimera = false;
				}
			}
		}
		
		$institucion = Instituciones::find()->all();
		
		$institucion = Instituciones::findOne($id_institucion);
		$sede 		 = Sedes::findOne($id_sede);
		
		$fase  = Fases::findOne( $this->id_fase );
		
		$profesional  = new DatosIeoProfesional();
		
		$dataPersonas 		= Personas::find()
								->select( "( nombres || ' ' || apellidos ) as nombres, personas.id" )
								->innerJoin( 'perfiles_x_personas pp', 'pp.id_personas=personas.id' )
								->innerJoin( 'docentes d', 'd.id_perfiles_x_personas=pp.id' )
								->innerJoin( 'perfiles_x_personas_institucion ppi', 'ppi.id_perfiles_x_persona=pp.id' )
								->where( 'personas.estado=1' )
								->andWhere( 'id_institucion='.$id_institucion )
								->all();
		
		$docentes		= ArrayHelper::map( $dataPersonas, 'id', 'nombres' );

        return $this->render('create', [
            'model' 		=> $model,
            'models' 		=> $models,
            'fase'  		=> $fase,
            'institucion'	=> $institucion,
            'sede' 		 	=> $sede,
            'docentes' 		=> $docentes,
            'profesional'	=> $profesional,
            'condiciones'	=> $condiciones,
            'guardado'		=> $guardado,
            'ciclo'			=> $ciclo,
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
