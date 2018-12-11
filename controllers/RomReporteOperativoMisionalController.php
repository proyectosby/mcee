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
use app\models\RomReporteOperativoMisional;
use app\models\RomActividadesRom;
use app\models\RomTipoCantidadPoblacionRom;
use app\models\RomEvidenciasRom;
use app\models\Sedes;
use app\models\Instituciones;

use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RomReporteOperativoMisionalController implements the CRUD actions for RomReporteOperativoMisional model.
 */
class RomReporteOperativoMisionalController extends Controller
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
     * Lists all RomReporteOperativoMisional models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RomReporteOperativoMisional::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    function actionViewFases($model, $form){
        
        $actividades_rom = new RomActividadesRom();
        $tipo_poblacion_rom = new RomTipoCantidadPoblacionRom();
        $evidencias_rom = new RomEvidenciasRom();

        $proyectos = [ 
            1 => "Sensibilizar a la comunidad sobre la importancia del arte y la cultura a través de la oferta cultural del municipio.",
            2 => "Desarrollar programas de iniciación y sensibilización artística desde las instituciones educativas oficiales dirigidos a la comunidad.",
        ];
		
		return $this->renderAjax('fases', [
            'fases' => $proyectos,
            'form' => $form,
            "model" => $model,
            'actividades_rom' => $actividades_rom,
            'tipo_poblacion_rom' => $tipo_poblacion_rom,
            'evidencias_rom' => $evidencias_rom,
        ]);
		
	}

    /**
     * Displays a single RomReporteOperativoMisional model.
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
     * Creates a new RomReporteOperativoMisional model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RomReporteOperativoMisional();
        $idInstitucion = $_SESSION['instituciones'][0];

        if ($model->load(Yii::$app->request->post())) {
            
            $model->id_institucion = $idInstitucion;
            $model->estado = 1;
            $model->id_sedes = intval($model->id_sedes);

            if(/*$model->save()*/true){
                //$rom_id = $model->id;
                if (Yii::$app->request->post('RomActividadesRom')){
                    $data = Yii::$app->request->post('RomActividadesRom');
                    $count 	= count($data);
                    $modelActividades = [];

                    for( $i = 0; $i < $count; $i++ ){
                        $modelActividades[] = new RomActividadesRom();
                    }

                    if (RomActividadesRom::loadMultiple($modelActividades, Yii::$app->request->post() )) {
                        foreach( $modelActividades as $key => $modelActividad) {
                            if($modelActividad->fehca_desde and $modelActividad->fecha_hasta){
                                $modelActividad->id_rom = 1;
                                
                                if($modelActividad->save()){
                                    //Registro de Tipo Cantidad Poblacion en base al id de la actividad registrada
                                    if(Yii::$app->request->post('RomTipoCantidadPoblacionRom')){
                                        $dataPoblacion = Yii::$app->request->post('RomTipoCantidadPoblacionRom');
                                        $countPoblacion = count( $dataPoblacion );
                                        $modelTipoPoblacion = [];

                                        for( $i = 0; $i < $countPoblacion; $i++ ){
                                            $modelTipoPoblacion[] = new RomTipoCantidadPoblacionRom();
                                        }

                                        if (RomTipoCantidadPoblacionRom::loadMultiple($modelTipoPoblacion, Yii::$app->request->post() )) {
                                            $modelTipoPoblacion[$key]->id_actividad_rom = $modelActividad->id;
                                            $modelTipoPoblacion[$key]->estado = 1;
                                            $modelTipoPoblacion[$key]->save();
                                        }
                                    }
                                    //Registro de las evidencias en base al id de la acitividad registrada
                                    if(Yii::$app->request->post('RomEvidenciasRom')){
                                        $dataEvidencias = Yii::$app->request->post('RomEvidenciasRom');
                                        $countEvidencias = count( $dataEvidencias );
                                        $modelTipoPoblacion = [];

                                    }
                                    
                                    
                                }
                            }
                        }
                    }

                }
                

                
            }
            
            //return $this->redirect(['index']);
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
     * Updates an existing RomReporteOperativoMisional model.
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
     * Deletes an existing RomReporteOperativoMisional model.
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
     * Finds the RomReporteOperativoMisional model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RomReporteOperativoMisional the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RomReporteOperativoMisional::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
