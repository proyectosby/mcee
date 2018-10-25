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

use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Instituciones;

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
        /**
         * Se realiza registro del modelo base IEO
         * Obtenemos el id de iserción para usarlo como llave foranea en los demas modelos 
         */
        $model = new Ieo();
        $requerimientoExtra = new RequerimientoExtraIeo();
        $documentosReconocimiento = new DocumentosReconocimiento();
        $tiposCantidadPoblacion = new TiposCantidadPoblacion();

        $ieo_id = 0;
        $idInstitucion = $_SESSION['instituciones'][0];
        $data = [];
        $institucion = Instituciones::findOne( $idInstitucion );

        if (Yii::$app->request->post('TiposCantidadPoblacion')){
            $data = Yii::$app->request->post('Ieo');
            $count 	= count( $data );
            $modelCantidadPoblacion = [];

            for( $i = 0; $i < $count; $i++ ){
                $modelCantidadPoblacion[] = new TiposCantidadPoblacion();
            }

            if (TiposCantidadPoblacion::loadMultiple($modelCantidadPoblacion, Yii::$app->request->post() )) {
                foreach( $modelCantidadPoblacion as $key => $model) {
                    
                }

            }
        }
        
        if (Yii::$app->request->post('Ieo')) {
            
            $model->institucion_id = $idInstitucion;
            $model->estado = 1;
            $model->sede_id = 2;          
            $model->codigo_dane = $institucion->codigo_dane;
            
            if(/*$model->save()*/true){
                 
                $ieo_id = $model->id;
                $data = Yii::$app->request->post('Ieo');
                $count 	= count( $data );
        
                $models = [];
                $modelDocumentosReconocimiento = [];
                $modelRequerimientoExtra = [];
                for( $i = 0; $i < $count; $i++ ){
                    $models[] = new Ieo();
                }
                 
                $countRequeimientos = 0;
                $countDocumentos = 0;
                if (Ieo::loadMultiple($models, Yii::$app->request->post() )) {
                    
                    foreach( $models as $key => $model) {
                        
                        // Generación de instancias de los documentos REQUERIMIENTO EXTRA IEO
                        $file_socializacion_ruta = UploadedFile::getInstance( $model, "[$key]file_socializacion_ruta" );
                        $file_soporte_necesidad = UploadedFile::getInstance( $model, "[$key]file_soporte_necesidad" );
                        
                        // Generación de instancias de los documentos Reconocimiento previo y documentos a desarrollar por el profesional de apoyo
                        $file_informe_caracterizacion = UploadedFile::getInstance( $model, "[$key]file_informe_caracterizacion" );
                        $file_matriz_caracterizacion = UploadedFile::getInstance( $model, "[$key]file_matriz_caracterizacion" );
                        $file_revision_pei = UploadedFile::getInstance( $model, "[$key]file_revision_pei" );
                        $file_revision_autoevaluacion = UploadedFile::getInstance( $model, "[$key]file_revision_autoevaluacion" );
                        $file_revision_pmi = UploadedFile::getInstance( $model, "[$key]file_revision_pmi" );
                        $file_resultados_caracterizacion = UploadedFile::getInstance( $model, "[$key]file_resultados_caracterizacion" );
                        $file_horario_trabajo = UploadedFile::getInstance( $model, "[$key]file_horario_trabajo" );


                        //Validación para el registro de documentos requerimientos extras IEO
                        if( $file_socializacion_ruta && $file_soporte_necesidad){
                           
                            $modelRequerimientoExtra [] = new RequerimientoExtraIeo();
                            //Se crea carpeta para almecenar los documentos de Socializacion
                            $carpetaSocializacion = "../documentos/documentosIeo/requerimientoExtra/socializacion/".$institucion->codigo_dane;
                            if (!file_exists($carpetaSocializacion)) {
                                mkdir($carpeta, 0777, true);
                            }

                            //Se crea carpeta para almecenar los documentos de Soporte Necesidad
                            $carpetaSocializacion = "../documentos/documentosIeo/requerimientoExtra/soporteNecesidad/".$institucion->codigo_dane;
                            if (!file_exists($carpetaSocializacion)) {
                                mkdir($carpetaSocializacion, 0777, true);
                            }
                            
                            //Construyo la ruta completa del archivo IEO Socialiazacion a guardar 
                            $rutaFisicaDirectoriaUploadSocializacion  = "../documentos/documentosIeo/requerimientoExtra/socializacion/".$institucion->codigo_dane."/";
                            $rutaFisicaDirectoriaUploadSocializacion .= $file_socializacion_ruta->baseName;
                            $rutaFisicaDirectoriaUploadSocializacion .= date( "_Y_m_d_His" ) . '.' . $file_socializacion_ruta->extension;
                            $saveSocializacion = $file_socializacion_ruta->saveAs( $rutaFisicaDirectoriaUploadSocializacion );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.
                            

                            //Construyo la ruta completa del archivo IEO Soporte Necesidad a guardar 
                            $rutaFisicaDirectoriaUploadSoporteNecesidad  = "../documentos/documentosIeo/requerimientoExtra/soporteNecesidad/".$institucion->codigo_dane."/";
                            $rutaFisicaDirectoriaUploadSoporteNecesidad .= $file_soporte_necesidad->baseName;
                            $rutaFisicaDirectoriaUploadSoporteNecesidad .= date( "_Y_m_d_His" ) . '.' . $file_soporte_necesidad->extension;
                            $saveSoporteNecesidad = $file_soporte_necesidad->saveAs( $rutaFisicaDirectoriaUploadSoporteNecesidad );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.

                            if( $saveSocializacion && $saveSoporteNecesidad){
                                
                                //Le asigno la ruta al arhvio
                                $modelRequerimientoExtra[$countRequeimientos]->socializacion_ruta = $rutaFisicaDirectoriaUploadSocializacion;
                                $modelRequerimientoExtra[$countRequeimientos]->soporte_necesidad = $rutaFisicaDirectoriaUploadSoporteNecesidad;
                                $modelRequerimientoExtra[$countRequeimientos]->ieo_id = 13;
                                $modelRequerimientoExtra[$countRequeimientos]->proyecto_ieo_id = $key + 1;
                                

                            }else{
                                echo $file->error;
                                exit("finnn....");
                            }
                            $countRequeimientos++;
                        }

                        //Validación para el registro de documentos Reconocimiento previo y documentos a desarrollar por el profesional de apoyo
                        if( $file_informe_caracterizacion && $file_matriz_caracterizacion && $file_revision_pei && $file_revision_autoevaluacion && $file_revision_pmi && $file_resultados_caracterizacion && $file_horario_trabajo){   
                           
                            $modelDocumentosReconocimiento []= new DocumentosReconocimiento();
                            //Se crea carpeta para almecenar los documentos de Socializacion
                            $carpetaDocumentosReconocimiento = "../documentos/documentosIeo/documentosReconocimiento/".$institucion->codigo_dane;
                            if (!file_exists($carpetaDocumentosReconocimiento)) {
                                mkdir($carpetaDocumentosReconocimiento, 0777, true);
                            }

                            $ruta =   "../documentos/documentosIeo/documentosReconocimiento/".$institucion->codigo_dane."/";

                            //Construyo la ruta completa del archivo IEO Documentos de reconocimiento por cada uno de los archos 
                            
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoInformeCaracterizacion = $ruta.$file_informe_caracterizacion->baseName;
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoInformeCaracterizacion .= date( "_Y_m_d_His" ) . '.' . $file_informe_caracterizacion->extension;
                            $saveInformeCaracterizacion = $file_informe_caracterizacion->saveAs( $rutaFisicaDirectoriaUploadDocumentosReconocimientoInformeCaracterizacion );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.
                            
                           
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoMatrizCaracterizacion = $ruta.$file_matriz_caracterizacion->baseName;
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoMatrizCaracterizacion .= date( "_Y_m_d_His" ) . '.' . $file_matriz_caracterizacion->extension;
                            $saveMatrizCaracterizacion = $file_matriz_caracterizacion->saveAs( $rutaFisicaDirectoriaUploadDocumentosReconocimientoMatrizCaracterizacion );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.

                            
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoRevisionPei = $ruta.$file_revision_pei->baseName;
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoRevisionPei .= date( "_Y_m_d_His" ) . '.' . $file_revision_pei->extension;
                            $saveRevisionPei = $file_revision_pei->saveAs( $rutaFisicaDirectoriaUploadDocumentosReconocimientoRevisionPei );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.

                            
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoAutoevaluacion = $ruta.$file_revision_autoevaluacion->baseName;
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoAutoevaluacion .= date( "_Y_m_d_His" ) . '.' . $file_revision_autoevaluacion->extension;
                            $saveAutoevaluacion = $file_revision_autoevaluacion->saveAs( $rutaFisicaDirectoriaUploadDocumentosReconocimientoAutoevaluacion );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.

                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoRevisionPmi = $ruta.$file_revision_pmi->baseName;
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoRevisionPmi .= date( "_Y_m_d_His" ) . '.' . $file_revision_pmi->extension;
                            $saveRevisionPmi = $file_revision_pmi->saveAs( $rutaFisicaDirectoriaUploadDocumentosReconocimientoRevisionPmi );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.


                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoResultadosCaracterizacion = $ruta.$file_resultados_caracterizacion->baseName;
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoResultadosCaracterizacion .= date( "_Y_m_d_His" ) . '.' . $file_resultados_caracterizacion->extension;
                            $saveResultadosCaracterizacion = $file_resultados_caracterizacion->saveAs( $rutaFisicaDirectoriaUploadDocumentosReconocimientoResultadosCaracterizacion );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.

                            
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoHorarioTrabajo = $ruta.$file_horario_trabajo->baseName;
                            $rutaFisicaDirectoriaUploadDocumentosReconocimientoHorarioTrabajo .= date( "_Y_m_d_His" ) . '.' . $file_horario_trabajo->extension;
                            $saveHorarioTrabajo = $file_horario_trabajo->saveAs( $rutaFisicaDirectoriaUploadDocumentosReconocimientoHorarioTrabajo );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.
                            
                            

                            if( $saveInformeCaracterizacion && $saveMatrizCaracterizacion && $saveRevisionPei && $saveAutoevaluacion && $saveRevisionPmi && $saveResultadosCaracterizacion && $saveHorarioTrabajo){
                                //Le asigno la ruta al arhvio

                                $modelDocumentosReconocimiento[$countDocumentos]->informe_caracterizacion = $rutaFisicaDirectoriaUploadDocumentosReconocimientoInformeCaracterizacion;
                                $modelDocumentosReconocimiento[$countDocumentos]->matriz_caracterizacion = $rutaFisicaDirectoriaUploadDocumentosReconocimientoMatrizCaracterizacion;
                                $modelDocumentosReconocimiento[$countDocumentos]->revision_pei = $rutaFisicaDirectoriaUploadDocumentosReconocimientoRevisionPei;
                                $modelDocumentosReconocimiento[$countDocumentos]->revision_autoevaluacion = $rutaFisicaDirectoriaUploadDocumentosReconocimientoAutoevaluacion;
                                $modelDocumentosReconocimiento[$countDocumentos]->revision_pmi = $rutaFisicaDirectoriaUploadDocumentosReconocimientoRevisionPmi;
                                $modelDocumentosReconocimiento[$countDocumentos]->resultados_caracterizacion = $rutaFisicaDirectoriaUploadDocumentosReconocimientoResultadosCaracterizacion;
                                $modelDocumentosReconocimiento[$countDocumentos]->horario_trabajo = $rutaFisicaDirectoriaUploadDocumentosReconocimientoHorarioTrabajo;
                                $modelDocumentosReconocimiento[$countDocumentos]->ieo_id = 5;
                                $modelDocumentosReconocimiento[$countDocumentos]->proyecto_ieo_id = $key+1;
                            }else{
                                echo $file->error;
                                exit("finnn....");
                            }
                            $countDocumentos ++;
                        }

                        
                    }
                    
                    foreach( $modelRequerimientoExtra as $key => $model) {
                        $model->save();
                    }

                    foreach( $modelDocumentosReconocimiento as $key => $model) {
                        
                       
                        $model->save();
                    }

                    die();
                }

            }
                
        }
        
        
        return $this->renderAjax('create', [
            'model' => $model,
            'requerimientoExtra' => $requerimientoExtra,
            "documentosReconocimiento" =>  $documentosReconocimiento,
            'tiposCantidadPoblacion' => $tiposCantidadPoblacion,
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
