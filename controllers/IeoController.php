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
use app\models\Ieo;
use app\models\DocumentosReconocimiento;
use app\models\TiposCantidadPoblacion;
use app\models\Evidencias;
use app\models\TipoDocumentos;
use app\models\Producto;
use app\models\RequerimientoExtraIeo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IeoController implements the CRUD actions for Ieo model.
 */
class IeoController extends Controller
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
        
        $model = new Ieo();
        $documentosReconocimiento = new DocumentosReconocimiento();
        $tiposCantidadPoblacion = new TiposCantidadPoblacion();
        $requerimientoExtra = new RequerimientoExtraIeo();
        $evidencias = new Evidencias();
        $producto = new Producto();
				
		/*$fases	= Fases::find()
					->where('estado=1')
					->orderby( 'descripcion' )
					->all();*/
		
		return $this->renderAjax('fases', [
			'idPE' 	=> null,
			'fases' => ["Proyectos Pedagógicos Transversales", "Proyectos de Servicio Social Estudiantil", "Articulación Familiar"],
            "model" => $model,
            "documentosReconocimiento" =>  $documentosReconocimiento,
            "tiposCantidadPoblacion" => $tiposCantidadPoblacion,
            "evidencias" => $evidencias,
            "producto" => $producto,
            "requerimientoExtra" => $requerimientoExtra
        ]);
		
	}

    /**
     * Lists all Ieo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Ieo::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ieo model.
     * @param integer $id
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
     * Creates a new Ieo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ieo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ieo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
     * Deletes an existing Ieo model.
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
     * Finds the Ieo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ieo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ieo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
