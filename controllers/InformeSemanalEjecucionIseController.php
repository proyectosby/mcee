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
use app\models\InformeSemanalEjecucionIse;
use app\models\EcTipoCantidadPoblacionIse;
use app\models\EcDocentesIse;
use app\models\EcEstudiantesIse;
use app\models\EcActividadesIse;
use app\models\EcVisitasIse;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InformeSemanalEjecucionIseController implements the CRUD actions for InformeSemanalEjecucionIse model.
 */
class InformeSemanalEjecucionIseController extends Controller
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


    function actionViewFases($model){
        
        
        //$model = new InformeSemanalEjecucionIse();
        $tipo_poblacion = new EcTipoCantidadPoblacionIse;
        $docentes = new EcDocentesIse;
        $estudiasntes =  new EcEstudiantesIse;
        $actividades =  new EcActividadesIse;
        $visitas = new EcVisitasIse;

		return $this->renderAjax('fases', [
			'idPE' 	=> null,
			'fases' => ["Proyectos Pedagógicos Transversales", "Ariculación Familiar", "Proyecto de Servicio Social"],
            "tipo_poblacion" => $tipo_poblacion,
            "docentes" => $docentes,
            "estudiasntes" => $estudiasntes,
            "actividades" => $actividades,
            "visitas"  => $visitas,
        ]);
		
	}

    /**
     * Lists all InformeSemanalEjecucionIse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => InformeSemanalEjecucionIse::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InformeSemanalEjecucionIse model.
     * @param integer $id
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
     * Creates a new InformeSemanalEjecucionIse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InformeSemanalEjecucionIse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InformeSemanalEjecucionIse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
     * Deletes an existing InformeSemanalEjecucionIse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InformeSemanalEjecucionIse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InformeSemanalEjecucionIse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InformeSemanalEjecucionIse::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
