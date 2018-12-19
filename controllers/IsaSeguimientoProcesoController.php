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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
