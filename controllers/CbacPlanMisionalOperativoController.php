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
use app\models\CbacPlanMisionalOperativo;
use app\models\Sedes;
use app\models\Instituciones;
use app\models\CbacPmoActividades;

use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CbacPlanMisionalOperativoController implements the CRUD actions for CbacPlanMisionalOperativo model.
 */
class CbacPlanMisionalOperativoController extends Controller
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
     * Lists all CbacPlanMisionalOperativo models.
     * @return mixed
     */
    public function actionIndex($guardado = 0)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CbacPlanMisionalOperativo::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'guardado' => $guardado,
        ]);
    }

    /**
     * Displays a single CbacPlanMisionalOperativo model.
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

    function actionViewFases($model, $form){
        
        $actividades_pom = new CbacPmoActividades();
        
        $proyectos = [ 
            1 => "Desarrollar herramientas en docentes y directivos docentes de las IEO que implementen componentes artísticos y culturales.",
            2 => "Fortalecer la oferta de programas culturales para estudiantes en el proceso formativo de competencias básicas dentro y fuera del aula.",
            3 => "Promover el acompañamiento de padres de familia desde el arte y la cultura en el proceso de fortalecimiento de competencias básicas de estudiantes de las IEO.",
        ];
		
		return $this->renderAjax('fases', [
            'fases' => $proyectos,
            'form' => $form,
            "model" => $model,
            'actividades_pom' => $actividades_pom,
        ]);
		
	}

    /**
     * Creates a new CbacPlanMisionalOperativo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CbacPlanMisionalOperativo();
        $idInstitucion = $_SESSION['instituciones'][0];
        $institucion = Instituciones::findOne($idInstitucion);

        if ($model->load(Yii::$app->request->post())) {
            
            $model->id_institucion = $idInstitucion;
            if($model->save()){
                $id_pmo = $model->id;
                //$id_pmo = 2;

                if (Yii::$app->request->post('CbacPmoActividades')){
                    $data = Yii::$app->request->post('CbacPmoActividades');
                    $count 	= count($data);
                    $modelActividades = [];

                    for( $i = 0; $i < 12; $i++ ){
                        $modelActividades[] = new CbacPmoActividades();
                    }

                    if (CbacPmoActividades::loadMultiple($modelActividades, Yii::$app->request->post() )) {
                        foreach( $modelActividades as $key => $modelActividad) {
                            if($modelActividad->desde and $modelActividad->hasta){
                                $modelActividad->id_pmo = $id_pmo;
                                $modelActividad->save();
                            }
                        }
                    }

                }



            }
            return $this->redirect(['index', 'guardado' => 1 ]);
        }

        $Sedes  = Sedes::find()->where( "id_instituciones = $idInstitucion" )->all();
        $sedes	= ArrayHelper::map( $Sedes, 'id', 'descripcion' );

        return $this->renderAjax('create', [
            'model' => $model,
            'sedes' => $sedes,
            'institucion' => $institucion->descripcion,
        ]);
    }

    /**
     * Updates an existing CbacPlanMisionalOperativo model.
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
     * Deletes an existing CbacPlanMisionalOperativo model.
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
     * Finds the CbacPlanMisionalOperativo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CbacPlanMisionalOperativo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CbacPlanMisionalOperativo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
