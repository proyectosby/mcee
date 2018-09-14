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
use app\models\EcInformePlaneacionIeo;
use app\models\EcInformePlaneacionIeoSearch;
use app\models\EcProyectos;
use app\models\EcProcesos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ComunasCorregimientos;
use app\models\BarriosVeredas;
use yii\helpers\ArrayHelper;

/**
 * EcinformeplaneacionieoController implements the CRUD actions for EcInformePlaneacionIeo model.
 */
class EcinformeplaneacionieoController extends Controller
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

    function actionViewfases($model){
        
       $EcProyectos = EcProyectos::find()->where( 'estado=true' )->orderby('id ASC')->all();
       $numProyectos = count($EcProyectos);

       $proyectos = array();
        foreach ($EcProyectos as $r)
         {
             $proyectos[$r['id']]= $r['descripcion'];

         }

       $EcProcesos = EcProcesos::find()->where( 'estado=true' )->all();

       $procesos = array();
        foreach ($EcProcesos as $r)
         {
             $procesos[$r['id']]= $r['descripcion'];

         }

        return $this->renderPartial('fases', [
            'idPE'  => null,
            'fases' => $proyectos,
            //'procesos' => $procesos,
            'numProyectos' => $numProyectos,
            "model" => $model
        ]);
        
    }


    /**
     * Lists all EcInformePlaneacionIeo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EcInformePlaneacionIeoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EcInformePlaneacionIeo model.
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
     * Creates a new EcInformePlaneacionIeo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EcInformePlaneacionIeo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $modelComunas = new ComunasCorregimientos();
        $comunas = $modelComunas->find()->orderBY("descripcion")->all();
        $comunas = ArrayHelper::map($comunas,'id','descripcion');
        $modelBarrios = new BarriosVeredas();
        $barrios = $modelBarrios->find()->orderBY("descripcion")->all();
        $barrios = ArrayHelper::map($barrios,'id','descripcion');  

        return $this->renderAjax('create', [
            'comunas' => $comunas,
            'modelComunas' => $modelComunas,
            'barrios' => $barrios,
            'modelBarrios' => $modelBarrios, 
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EcInformePlaneacionIeo model.
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
        ]);
    }

    /**
     * Deletes an existing EcInformePlaneacionIeo model.
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
     * Finds the EcInformePlaneacionIeo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EcInformePlaneacionIeo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EcInformePlaneacionIeo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
