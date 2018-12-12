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

use yii\web\UploadedFile;
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
    public function actionIndex($guardado = 0)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RomReporteOperativoMisional::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'guardado' => $guardado,
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
        $institucion = Instituciones::findOne($idInstitucion);

        if ($model->load(Yii::$app->request->post())) {
            
            $model->id_institucion = $idInstitucion;
            $model->estado = 1;
            $model->id_sedes = intval($model->id_sedes);

            if($model->save()){
                $rom_id = $model->id;
                //$rom_id = 1;
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
                                $modelActividad->id_rom = $rom_id;
                                
                                /*var_dump($modelActividad->id_componente);
                                die();*/

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
                                        $modelEvidencias = [];

                                        for( $i = 0; $i < $countEvidencias; $i++ ){
                                            $modelEvidencias[] = new RomEvidenciasRom();
                                        }

                                        if (RomEvidenciasRom::loadMultiple($modelEvidencias, Yii::$app->request->post() )) {

                                            $file_actas = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]actas") ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]actas") : null;
                                            $file_reportes = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]reportes" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]reportes") : null;
                                            $file_listados = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]listados" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]listados") : null;
                                            $file_plan_trabajo = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]plan_trabajo" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]plan_trabajo") : null;
                                            $file_formato_seguimiento = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_seguimiento" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_seguimiento") : null;
                                            $file_formato_evaluacion = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_evaluacion" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_evaluacion") : null;
                                            $file_fotografias = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]fotografias" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]fotografias") : null;
                                            $file_vidoes = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]vidoes") ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]vidoes") : null;
                                            
                                            $carpetaEvidencias = "../documentos/documentosROM/evidenciasROM/".$institucion->codigo_dane;
                                            if (!file_exists($carpetaEvidencias)) {
                                                mkdir($carpetaEvidencias, 0777, true);
                                            }

                                            if($file_actas){
                                                $rutaFisicaActas  = $carpetaEvidencias."/";
                                                $rutaFisicaActas .= $file_actas->baseName;
                                                $rutaFisicaActas .= date( "_Y_m_d_His" ) . '.' . $file_actas->extension;
                                                $saveActa = $file_actas->saveAs( $rutaFisicaActas );
                                                $file_actas = $rutaFisicaActas;
                                            }

                                            if($file_reportes){
                                                $rutaFisicaReportes  = $carpetaEvidencias."/";
                                                $rutaFisicaReportes .= $file_reportes->baseName;
                                                $rutaFisicaReportes .= date( "_Y_m_d_His" ) . '.' . $file_reportes->extension;
                                                $saveReportes = $file_reportes->saveAs( $rutaFisicaReportes );
                                                $file_reportes = $rutaFisicaReportes;
                                            }

                                            if($file_listados){
                                                $rutaFisicaListados  = $carpetaEvidencias."/";
                                                $rutaFisicaListados .= $file_listados->baseName;
                                                $rutaFisicaListados .= date( "_Y_m_d_His" ) . '.' . $file_listados->extension;
                                                $saveListados = $file_listados->saveAs( $rutaFisicaListados );
                                                $file_listados = $rutaFisicaListados;
                                            }

                                            if($file_plan_trabajo){
                                                $rutaFisicaPlanTrabajo  = $carpetaEvidencias."/";
                                                $rutaFisicaPlanTrabajo .= $file_plan_trabajo->baseName;
                                                $rutaFisicaPlanTrabajo .= date( "_Y_m_d_His" ) . '.' . $file_plan_trabajo->extension;
                                                $savePlanTrabajo = $file_plan_trabajo->saveAs( $rutaFisicaPlanTrabajo );
                                                $file_plan_trabajo = $rutaFisicaPlanTrabajo;
                                            }


                                            if($file_formato_seguimiento){
                                                $rutaFisicaFormato  = $carpetaEvidencias."/";
                                                $rutaFisicaFormato .= $file_formato_seguimiento->baseName;
                                                $rutaFisicaFormato .= date( "_Y_m_d_His" ) . '.' . $file_formato_seguimiento->extension;
                                                $saveFormato = $file_formato_seguimiento->saveAs( $rutaFisicaFormato );
                                                $file_formato_seguimiento = $rutaFisicaFormato;
                                            }

                                            if($file_formato_evaluacion){
                                                $rutaFisicaFormatoEvaluacion  = $carpetaEvidencias."/";
                                                $rutaFisicaFormatoEvaluacion .= $file_formato_evaluacion->baseName;
                                                $rutaFisicaFormatoEvaluacion .= date( "_Y_m_d_His" ) . '.' . $file_formato_evaluacion->extension;
                                                $saveFormato = $file_formato_evaluacion->saveAs( $rutaFisicaFormatoEvaluacion );
                                                $file_formato_evaluacion = $rutaFisicaFormatoEvaluacion;
                                            }

                                            if($file_fotografias){
                                                $rutaFisicaFotografias  = $carpetaEvidencias."/";
                                                $rutaFisicaFotografias .= $file_fotografias->baseName;
                                                $rutaFisicaFotografias .= date( "_Y_m_d_His" ) . '.' . $file_fotografias->extension;
                                                $saveFotografias = $file_fotografias->saveAs( $rutaFisicaFotografias );
                                                $file_fotografias = $rutaFisicaFotografias;
                                            }

                                            if($file_vidoes){
                                                $rutaFisicaVideos  = $carpetaEvidencias."/";
                                                $rutaFisicaVideos .= $file_vidoes->baseName;
                                                $rutaFisicaVideos .= date( "_Y_m_d_His" ) . '.' . $file_vidoes->extension;
                                                $saveVideos = $file_vidoes->saveAs( $rutaFisicaVideos );
                                                $file_vidoes = $rutaFisicaVideos;
                                            }


                                            $modelEvidencias[$key]->id_actividad_rom = $modelActividad->id;
                                            $modelEvidencias[$key]->actas = $file_actas;
                                            $modelEvidencias[$key]->reportes = $file_reportes;
                                            $modelEvidencias[$key]->listados = $file_listados;
                                            $modelEvidencias[$key]->plan_trabajo = $file_plan_trabajo;
                                            $modelEvidencias[$key]->formato_seguimiento = $file_formato_seguimiento;
                                            $modelEvidencias[$key]->formato_evaluacion = $file_formato_evaluacion;
                                            $modelEvidencias[$key]->fotografias = $file_fotografias;
                                            $modelEvidencias[$key]->vidoes = $file_vidoes;
                                            $modelEvidencias[$key]->estado = 1;
                                            $modelEvidencias[$key]->save();
                                            
                                            
                                        }

                                    }
                                    
                                }
                            }
                        }
                    }

                }
                
            }
            return $this->redirect(['index', 'guardado' => 1 ]);            
            //return $this->redirect(['index']);
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
