<?php

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
use app\models\IsaSeguimientoProceso;
use app\models\IsaSeguimientoProcesoBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;
use app\models\Instituciones;
use app\models\Sedes;
use app\models\IsaSeguimientoProyectos;


/**
 * IsaSeguimientoProcesoController implements the CRUD actions for IsaSeguimientoProceso model.
 */
class IsaSeguimientoProcesoController extends Controller
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

    /**
     * Lists all IsaSeguimientoProceso models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IsaSeguimientoProcesoBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->query->andWhere( "estado=1" ); 

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	
	public function actionFormulario($model,$form,$datos = 0)
	{
		
		$proyectos = IsaSeguimientoProyectos::find()->where( 'estado=1' )->orderby('id ASC')->all();
		$proyectos = ArrayHelper::map($proyectos,'id','descripcion');
		
		foreach ($proyectos as $idProyecto => $label)
		{
			
			 $contenedores[] = 	
				[
					'label' 		=>  $label,
					'content' 		=>  $this->renderPartial( 'procesos', 
													[  
                                                        'idProyecto' => $idProyecto,
														'form' => $form,
														'datos' => $datos,
													] 
										),
					'contentOptions'=> []
				];
	
		}
		
		 echo Collapse::widget([
			'items' => $contenedores,
		]);
		
	}
	public function obtenerSede()
	{
		$idSedes 		= $_SESSION['sede'][0];
		$sedes = new Sedes();
		$sedes = $sedes->find()->where("id =  $idSedes")->all();
		$sedes = ArrayHelper::map($sedes,'id','descripcion');
		
		return $sedes;
	}
	
	public function obtenerInstituciones()
	{
		$idInstitucion = $_SESSION['instituciones'][0];
		$instituciones = new Instituciones();
		$instituciones = $instituciones->find()->where("id = $idInstitucion")->all();
		$instituciones = ArrayHelper::map($instituciones,'id','descripcion');
		
		return $instituciones;
	}

    /**
     * Displays a single IsaSeguimientoProceso model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new IsaSeguimientoProceso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IsaSeguimientoProceso();

        if ($model->load( Yii::$app->request->post() )) 
		{
			
			$post = Yii::$app->request->post();
			
			
			
			$model->save();
			
			//se guardan los datos en la tabla Isa.Porcentajes_Actividades
			$arrayDatosActivides = $post['IsaPorcentajesActividades'];
			//se agrega el id de la tabla principal despues de guardarla
			foreach($arrayDatosActivides as $datos => $valores)
			{
				$arrayDatosActivides[$datos]['id_seguimiento_proceso']=$model->id;
			}
			
			$columnNameArrayIsaPorcentajesActividades=['total_sesiones','avance_sede','avance_ieo','seguimiento_actividades','evaluacion_actividades','estado','id_seguimiento_proceso'];
			
			// inserta todos los datos que trae el array 
			$insertCount = Yii::$app->db->createCommand()
                   ->batchInsert(
                         'isa.porcentajes_actividades', $columnNameArrayIsaPorcentajesActividades, $arrayDatosActivides
                     )
					 ->execute();
					 
					 
			//se guardan los datos en la tabla Isa.Semana_Logros
			$arrayDatosSemanaLogros = $post['IsaSemanaLogros'];
			//se agrega el id de la tabla principal despues de guardarla
			foreach($arrayDatosSemanaLogros as $datos => $valores)
			{
				$arrayDatosSemanaLogros[$datos]['id_seguimiento_proceso']=$model->id;
			}
			
			$columnNameArraySemanaLogros=['semana1','semana2','semana3','semana4','id_logros_actividades','estado','id_seguimiento_proceso'];
			
			// inserta todos los datos que trae el array
			$insertCount = Yii::$app->db->createCommand()
                   ->batchInsert(
                         'isa.semana_logros', $columnNameArraySemanaLogros, $arrayDatosSemanaLogros
                     )
					 ->execute();
					 
					 
					 
			// echo "<pre>"; print_r($post); echo "</pre>"; 
			// die;		 
			//se guardan los datos en la tabla Isa.Orientacion_Metodologica_Actividades
			$arrayDatosIsaOrientacionMetodologicaActividades = $post['IsaOrientacionMetodologicaActividades'];
			//se agrega el id de la tabla principal despues de guardarla
			foreach($arrayDatosIsaOrientacionMetodologicaActividades as $datos => $valores)
			{
				$arrayDatosIsaOrientacionMetodologicaActividades[$datos]['estado']=1;
				$arrayDatosIsaOrientacionMetodologicaActividades[$datos]['id_seguimiento_proceso']=$model->id;
			}
			
			$columnNameIsaOrientacionMetodologicaActividades=['descripcion','id_actividades','estado','id_seguimiento_proceso'];
			
			// inserta todos los datos que trae el array
			$insertCount = Yii::$app->db->createCommand()
                   ->batchInsert(
                         'isa.orientacion_metodologica_actividades', $columnNameIsaOrientacionMetodologicaActividades, $arrayDatosIsaOrientacionMetodologicaActividades
                     )
					 ->execute();
					 
			

			
			//se guardan los datos en la tabla Isa.Semana_Logros_For_Deb_Ret
			$arrayDatosIsaSemanaLogrosForDebRet = $post['IsaSemanaLogrosForDebRet'];
			//se agrega el id de la tabla principal despues de guardarla
			foreach($arrayDatosIsaSemanaLogrosForDebRet as $datos => $valores)
			{
				$arrayDatosIsaSemanaLogrosForDebRet[$datos]['id_seguimiento_proceso']=$model->id;
			}
			
			$columnNameIsaSemanaLogrosForDebRet=['semana1','semana2','semana3','semana4','id_for_deb_ret','estado','id_seguimiento_proceso'];
			
			// inserta todos los datos que trae el array
			$insertCount = Yii::$app->db->createCommand()
                   ->batchInsert(
                         'isa.semana_logros_for_deb_ret', $columnNameIsaSemanaLogrosForDebRet, $arrayDatosIsaSemanaLogrosForDebRet
                     )
					 ->execute();		 
					 
			
			//se guardan los datos en la tabla Isa.Orientacion_Metodologica_Variaciones
			$arrayDatosIsaOrientacionMetodologicaVariaciones = $post['IsaOrientacionMetodologicaVariaciones'];
			//se agrega el id de la tabla principal despues de guardarla
			foreach($arrayDatosIsaOrientacionMetodologicaVariaciones as $datos => $valores)
			{
				$arrayDatosIsaOrientacionMetodologicaVariaciones[$datos]['estado']=1;
				$arrayDatosIsaOrientacionMetodologicaVariaciones[$datos]['id_seguimiento_proceso']=$model->id;
			}
			
			$columnNameIsaSemanaLogrosForDebRet=['descripcion','id_variaciones_actividades','estado','id_seguimiento_proceso'];
			
			// inserta todos los datos que trae el array
			$insertCount = Yii::$app->db->createCommand()
                   ->batchInsert(
                         'isa.orientacion_metodologica_variaciones', $columnNameIsaSemanaLogrosForDebRet, $arrayDatosIsaOrientacionMetodologicaVariaciones
                     )
					 ->execute();		 
					  
            return $this->redirect(['index']);
        }

         return $this->renderAjax('create', [
            'model' => $model,
			'sedes' => $this->obtenerSede(),
			'instituciones'=> $this->obtenerInstituciones(),
        ]);
    }

    /**
     * Updates an existing IsaSeguimientoProceso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax('update', [
            'model' => $model,
			'sedes' => $this->obtenerSede(),
			'instituciones'=> $this->obtenerInstituciones(),
			'datos'=>$datos,
        ]);
    }

    /**
     * Deletes an existing IsaSeguimientoProceso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   	public function actionDelete($id)
    {
		$model = $this->findModel($id);
		$model->estado = 2;
		$model->update(false);
		
		return $this->redirect(['index']);	
    }

    /**
     * Finds the IsaSeguimientoProceso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return IsaSeguimientoProceso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IsaSeguimientoProceso::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
