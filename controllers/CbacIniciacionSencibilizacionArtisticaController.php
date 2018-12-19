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
use app\models\CbacIniciacionSencibilizacionArtistica;
use app\models\Sedes;
use app\models\Instituciones;

use yii\helpers\ArrayHelper;
use app\models\CbacActividadesIsa;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IsaIniciacionSencibilizacionArtisticaController implements the CRUD actions for IsaIniciacionSencibilizacionArtistica model.
 */
class CbacIniciacionSencibilizacionArtisticaController extends Controller
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
     * Lists all IsaIniciacionSencibilizacionArtistica models.
     * @return mixed
     */
    public function actionIndex($guardado = 0)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CbacIniciacionSencibilizacionArtistica::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'guardado' => $guardado,
        ]);
    }

    function actionViewFases($model, $form){
        
        $actividades_isa = new CbacActividadesIsa();
        $proyectos = [ 
            1 => "Sensibilizar a la comunidad sobre la importancia del arte y la cultura a través de la oferta cultural del municipio.",
            2 => "Desarrollar programas de iniciación y sensibilización artística desde las instituciones educativas oficiales dirigidos a la comunidad",
        ];
		
		return $this->renderAjax('fases', [
			'idPE' 	=> null,
            'fases' => $proyectos,
            'form' => $form,
            "model" => $model,
            'actividades_isa' => $actividades_isa
        ]);
		
	}

    /**
     * Displays a single IsaIniciacionSencibilizacionArtistica model.
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
     * Creates a new IsaIniciacionSencibilizacionArtistica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CbacIniciacionSencibilizacionArtistica();
        $idInstitucion = $_SESSION['instituciones'][0];

        if ($model->load(Yii::$app->request->post())) {

            $model->id_insticion = $idInstitucion;
            $model->estado = 1;
            $model->id_sede = intval($model->id_sede);

            if(/*$model->save()*/ true){
                //$isa_id = $model->id;
                $isa_id = 20;
                if (Yii::$app->request->post('CbacActividadesIsa')){
                    $data = Yii::$app->request->post('CbacActividadesIsa');
                    $count 	= count( $data );
                    $modelActividades = [];

                    for( $i = 0; $i < 5; $i++ ){
                        $modelActividades[] = new CbacActividadesIsa();
                    }

                    if (CbacActividadesIsa::loadMultiple($modelActividades, Yii::$app->request->post() )) {
                       
                        foreach( $modelActividades as $key => $model) {
                            if($model->fecha_prevista_desde and $model->fecha_prevista_hasta){
                                
                                $model->id_iniciacion_sencibilizacion_artistica = $isa_id;
                                $model->estado = 1;
                                $model->save(); 
                            }                        
                        }
                    }

                }
            }
           
            //return $this->redirect(['index', 'guardado' => 1]);
        }

        $Sedes  = Sedes::find()->where( "id_instituciones = $idInstitucion" )->all();
        $sedes	= ArrayHelper::map( $Sedes, 'id', 'descripcion' );

        $institucion = Instituciones::findOne($idInstitucion);

        return $this->renderAjax('create', [
            'model' => $model,
            'sedes' => $sedes,
            'institucion' => $institucion->descripcion,
        ]);
    }

    /**
     * Updates an existing IsaIniciacionSencibilizacionArtistica model.
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
     * Deletes an existing IsaIniciacionSencibilizacionArtistica model.
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
     * Finds the IsaIniciacionSencibilizacionArtistica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IsaIniciacionSencibilizacionArtistica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CbacIniciacionSencibilizacionArtistica::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
