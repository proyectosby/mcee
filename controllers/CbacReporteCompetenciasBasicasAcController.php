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
use app\models\CbacReporteCompetenciasBasicasAc;
use app\models\Sedes;
use app\models\Instituciones;
use app\models\CbacActividadesRcb;
use app\models\CbacTipoCantidadPoblacionRcb;
use app\models\CbacEvidenciasRbc;

use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CbacReporteCompetenciasBasicasAcController implements the CRUD actions for CbacReporteCompetenciasBasicasAc model.
 */
class CbacReporteCompetenciasBasicasAcController extends Controller
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
     * Lists all CbacReporteCompetenciasBasicasAc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CbacReporteCompetenciasBasicasAc::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CbacReporteCompetenciasBasicasAc model.
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

    function actionViewFases($model, $form, $datos = 0){
        
        $actividades_rcb = new CbacActividadesRcb();
        $tipo_poblacion_rcb = new CbacTipoCantidadPoblacionRcb();
        $evidencias_rcb = new CbacEvidenciasRbc();

        $proyectos = [ 
            1 => "Desarrollar herramientas en docentes y directivos docentes de las IEO que implementen componentes artísticos y culturales.",
            2 => "Fortalecer la oferta de programas culturales para estudiantes en el proceso formativo de competencias básicas dentro y fuera del aula.",
            3 => "Promover el acompañamiento de padres de familia desde el arte y la cultura en el proceso de fortalecimiento de competencias básicas de estudiantes de las IEO."
        ];
		
		return $this->renderAjax('fases', [
            'fases' => $proyectos,
            'form' => $form,
            "model" => $model,
            'actividades_rom' => $actividades_rcb,
            'tipo_poblacion_rom' => $tipo_poblacion_rcb,
            'evidencias_rom' => $evidencias_rcb,
            'datos' => $datos
        ]);
		
	}

    /**
     * Creates a new CbacReporteCompetenciasBasicasAc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CbacReporteCompetenciasBasicasAc();

        $idInstitucion = $_SESSION['instituciones'][0];
        $institucion = Instituciones::findOne($idInstitucion);

        if ($model->load(Yii::$app->request->post())) {
            
            $model->id_institucion = $idInstitucion;

            if($model->save()){
                $rcb_id = $model->id;
                //$rcb_id = 1;

                if (Yii::$app->request->post('CbacActividadesRcb')){
                    $data = Yii::$app->request->post('CbacActividadesRcb');
                    $count 	= count($data);
                    $modelActividades = [];

                    for( $i = 0; $i < $count; $i++ ){
                        $modelActividades[] = new CbacActividadesRcb();
                    }

                    if (CbacActividadesRcb::loadMultiple($modelActividades, Yii::$app->request->post() )) {
                        foreach( $modelActividades as $key => $modelActividad) {
                            if($modelActividad->fehca_desde and $modelActividad->fecha_hasta){
                                $modelActividad->id_rcb = $rcb_id;

                                if($modelActividad->save()){
                                    if(Yii::$app->request->post('CbacTipoCantidadPoblacionRcb')){
                                        $dataPoblacion = Yii::$app->request->post('CbacTipoCantidadPoblacionRcb');
                                        $countPoblacion = count( $dataPoblacion );
                                        $modelTipoPoblacion = [];

                                        for( $i = 0; $i < $countPoblacion; $i++ ){
                                            $modelTipoPoblacion[] = new CbacTipoCantidadPoblacionRcb();
                                        }

                                        if (CbacTipoCantidadPoblacionRcb::loadMultiple($modelTipoPoblacion, Yii::$app->request->post() )) {
                                            $modelTipoPoblacion[$key]->id_actividad_rcb = $modelActividad->id;
                                            $modelTipoPoblacion[$key]->save();
                                        }
                                    }
                                    
                                    if(Yii::$app->request->post('CbacEvidenciasRbc')){
                                        $dataEvidencias = Yii::$app->request->post('CbacEvidenciasRbc');
                                        $countEvidencias = count( $dataEvidencias );
                                        $modelEvidencias = [];

                                        for( $i = 0; $i < $countEvidencias; $i++ ){
                                            $modelEvidencias[] = new CbacEvidenciasRbc();
                                        }

                                        if (CbacEvidenciasRbc::loadMultiple($modelEvidencias, Yii::$app->request->post() )) {
                                            
                                            $file_actas = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]actas") ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]actas") : null;
                                            $file_reportes = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]reportes" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]reportes") : null;
                                            $file_listados = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]listados" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]listados") : null;
                                            $file_plan_trabajo = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]plan_trabajo" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]plan_trabajo") : null;
                                            $file_formato_seguimiento = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_seguimiento" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_seguimiento") : null;
                                            $file_formato_evaluacion = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_evaluacion" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_evaluacion") : null;
                                            $file_fotografias = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]fotografias" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]fotografias") : null;
                                            $file_vidoes = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]vidoes") ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]vidoes") : null;
                                        
                                            $carpetaEvidencias = "../documentos/documentosROM/evidenciasRBC/".$institucion->codigo_dane;
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

                                            $modelEvidencias[$key]->id_actividad_rcb = $modelActividad->id;
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


            return $this->redirect(['index']);
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
     * Updates an existing CbacReporteCompetenciasBasicasAc model.
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

        $command = Yii::$app->db->createCommand("SELECT act.fehca_desde, act.fecha_hasta, act.estado, act.num_equipos, act.perfiles, act.docente_orientador, act.nombre_actividad, act.duracion_sesion, act.logros, act.fortalezas, act.debilidades, act.alternativas, act.retos, act.articulacion, act.evaluacion, act.observaciones_generales, act.alarmas, act.justificacion_activiad_no_realizada, act.fecha_reprogramacion, act.diligencia, act.rol, act.fecha_diligencia, act.id_actividad,
                                                tip.ciencias_naturales, tip.ciencias_sociales, tip.educacion_artistica, tip.educacion_etica, tip.educacion_fisica, tip.educacion_religiosa, tip.estadistica, tip.humanidades, tip.idiomas_extranjeros, tip.lengua_castellana, tip.matematicas, tip.tecnologia, tip.otras
                                                FROM cbac.actividades_rcb AS act
                                                INNER JOIN cbac.tipo_cantidad_poblacion_rcb AS tip ON tip.id_actividad_rcb = act.id
                                                WHERE act.id_rcb = $id" );

        $result= $command->queryAll();                                       
        
        $result = ArrayHelper::getColumn($result, function ($element) 
		{
            $dato[$element['id_actividad']]['fehca_desde']= $element['fehca_desde'];
            $dato[$element['id_actividad']]['fecha_hasta']= $element['fecha_hasta'];
            $dato[$element['id_actividad']]['estado']= $element['estado'];
            $dato[$element['id_actividad']]['num_equipos']= $element['num_equipos'];
            $dato[$element['id_actividad']]['perfiles']= $element['perfiles'];
            $dato[$element['id_actividad']]['docente_orientador']= $element['docente_orientador'];
            $dato[$element['id_actividad']]['nombre_actividad']= $element['nombre_actividad'];
            $dato[$element['id_actividad']]['duracion_sesion']= $element['duracion_sesion'];
            $dato[$element['id_actividad']]['logros']= $element['logros'];
            $dato[$element['id_actividad']]['fortalezas']= $element['fortalezas'];
            $dato[$element['id_actividad']]['debilidades']= $element['debilidades'];
            $dato[$element['id_actividad']]['alternativas']= $element['alternativas'];
            $dato[$element['id_actividad']]['retos']= $element['retos'];
            $dato[$element['id_actividad']]['articulacion']= $element['articulacion'];
            $dato[$element['id_actividad']]['evaluacion']= $element['evaluacion'];
            $dato[$element['id_actividad']]['observaciones_generales']= $element['observaciones_generales'];
            $dato[$element['id_actividad']]['alarmas']= $element['alarmas'];
            $dato[$element['id_actividad']]['justificacion_activiad_no_realizada']= $element['justificacion_activiad_no_realizada'];
            $dato[$element['id_actividad']]['fecha_reprogramacion']= $element['fecha_reprogramacion'];
            $dato[$element['id_actividad']]['diligencia']= $element['diligencia'];
            $dato[$element['id_actividad']]['rol']= $element['rol'];
            $dato[$element['id_actividad']]['fecha_diligencia']= $element['fecha_diligencia'];

            $dato[$element['id_actividad']]['ciencias_naturales']= $element['ciencias_naturales'];
            $dato[$element['id_actividad']]['ciencias_sociales']= $element['ciencias_sociales'];
            $dato[$element['id_actividad']]['educacion_artistica']= $element['educacion_artistica'];
            $dato[$element['id_actividad']]['educacion_etica']= $element['educacion_etica'];
            $dato[$element['id_actividad']]['educacion_fisica']= $element['educacion_fisica'];
            $dato[$element['id_actividad']]['educacion_religiosa']= $element['educacion_religiosa'];
            $dato[$element['id_actividad']]['estadistica']= $element['estadistica'];
            $dato[$element['id_actividad']]['humanidades']= $element['humanidades'];
            $dato[$element['id_actividad']]['idiomas_extranjeros']= $element['idiomas_extranjeros'];
            $dato[$element['id_actividad']]['lengua_castellana']= $element['lengua_castellana'];
            $dato[$element['id_actividad']]['matematicas']= $element['matematicas'];
            $dato[$element['id_actividad']]['tecnologia']= $element['tecnologia'];
            $dato[$element['id_actividad']]['otras']= $element['otras'];
            
            return $dato;

        });

        foreach	($result as $r => $valor)
        {
            foreach	($valor as $ids => $valores)
                
                $datos[$ids] = $valores;
        }

        $idInstitucion = $_SESSION['instituciones'][0];
        $institucion = Instituciones::findOne($idInstitucion);

        return $this->renderAjax('update', [
            'model' => $model,
            'sedes' => $this->obtenerSede(),
            'institucion' => $institucion->descripcion,
            'datos'=> $datos,
        ]);
    }

      public function obtenerSede()
	{
        $idInstitucion = $_SESSION['instituciones'][0];
		$Sedes  = Sedes::find()->where( "id_instituciones = $idInstitucion" )->all();
        $sedes	= ArrayHelper::map( $Sedes, 'id', 'descripcion' );
		
		return $sedes;
    }
    /**
     * Deletes an existing CbacReporteCompetenciasBasicasAc model.
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
     * Finds the CbacReporteCompetenciasBasicasAc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CbacReporteCompetenciasBasicasAc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CbacReporteCompetenciasBasicasAc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
