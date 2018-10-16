<?php

/**********
Versión: 001
Fecha: 10-04-2018
Edwin Molina Grisales
COBERTURA
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
	header('Location: index.php?r=site%2Flogin');
	die;
}
use Yii;
use app\models\Estados;
use app\models\Sedes;
use app\models\SubcategoriaCobertura;


use yii\data\ActiveDataProvider;                                        
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * CoberturaController implements the CRUD actions for Estados model.
 */
class CoberturaController extends Controller
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
     * Lists all Estados models.
     * @return mixed
     */
    public function actionIndex()
    {
        $idInstitucion = $_SESSION['instituciones'][0];
        $dataProvider = new ActiveDataProvider([
            'query' => Estados::find(),
        ]);
        $cobertura = new SubcategoriaCobertura();

        $dataSedes = Sedes::find()
						->where('id_instituciones = '.$idInstitucion)
						->andWhere( 'estado=1' )
						->orderby( 'id' )
						->all();
						
        $listaSedes		= ArrayHelper::map( $dataSedes, 'id', 'descripcion' );
        

        return $this->render('create', [
            'dataProvider' => $dataProvider,
            'sedes' => $listaSedes,
            'cobertura' => $cobertura,
        ]);
    }

  

    /**
     * Creates a new Estados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Estados();
        var_dump("hola");
        if ($model->load(Yii::$app->request->post())) {
            var_dump("entro");
            die();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        
    }

    /**
     * Updates an existing Estados model.
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
     * Deletes an existing Estados model.
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
     * Finds the Estados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Estados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estados::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
