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
use app\models\EstrategiaEmbellecimientoEspacios;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Parametro;
use yii\helpers\ArrayHelper;

/**
 * EstrategiaEmbellecimientoEspaciosController implements the CRUD actions for EstrategiaEmbellecimientoEspacios model.
 */
class EstrategiaEmbellecimientoEspaciosController extends Controller
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
     * Lists all EstrategiaEmbellecimientoEspacios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => EstrategiaEmbellecimientoEspacios::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EstrategiaEmbellecimientoEspacios model.
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
     * Creates a new EstrategiaEmbellecimientoEspacios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EstrategiaEmbellecimientoEspacios();

        $dataParametrosUsos = Parametro::find()
						->where( 'id_tipo_parametro=26' )
						->andWhere( 'estado=1' )
						->orderby( 'id' )
						->all();
						
        $parametrosUsos		= ArrayHelper::map( $dataParametrosUsos, 'id', 'descripcion' );
        
        $dataParametrosEmbellecimiento = Parametro::find()
						->where( 'id_tipo_parametro=27' )
						->andWhere( 'estado=1' )
						->orderby( 'id' )
						->all();
						
		$parametrosEmbellecimiento		= ArrayHelper::map( $dataParametrosEmbellecimiento, 'id', 'descripcion' );

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'parametrosUsos' => $parametrosUsos,
            'parametrosEmbellecimiento' => $parametrosEmbellecimiento
        ]);
    }

    /**
     * Updates an existing EstrategiaEmbellecimientoEspacios model.
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
     * Deletes an existing EstrategiaEmbellecimientoEspacios model.
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
     * Finds the EstrategiaEmbellecimientoEspacios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EstrategiaEmbellecimientoEspacios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EstrategiaEmbellecimientoEspacios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
