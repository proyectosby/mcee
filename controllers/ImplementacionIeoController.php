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
use app\models\ImplementacionIeo;
use app\models\CantidadPoblacionImpIeo;
use app\models\EvidenciasImpIeo;
use app\models\EstudiantesImpIeo;
use app\models\ProductoImplementacionIeo;
use app\models\Instituciones;

use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ImplementacionIeoController implements the CRUD actions for ImplementacionIeo model.
 */
class ImplementacionIeoController extends Controller
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
     * Lists all ImplementacionIeo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ImplementacionIeo::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ImplementacionIeo model.
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
     * Creates a new ImplementacionIeo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $ieo_model = new ImplementacionIeo();
        $idInstitucion = $_SESSION['instituciones'][0];
        $institucion = Instituciones::findOne( $idInstitucion );
        $ieo_id = 0;
        $status = false;

       
    
        if ($ieo_model->load(Yii::$app->request->post())) {
            
            $ieo_model->institucion_id = $idInstitucion;
            $ieo_model->estado = 1;
            $ieo_model->sede_id = 2;
            $ieo_model->codigo_dane = $institucion->codigo_dane;
            

            if(/*$ieo_model->save()*/true){
                $ieo_id = 2;

                $data = Yii::$app->request->post('ImplementacionIeo');
                $count 	= count( $data );
                $models = [];
                $modelEvidencias = [];
                $countEvidencias = 0;

                for( $i = 0; $i < $count; $i++ ){
                    $models[] = new ImplementacionIeo();
                }

                if (ImplementacionIeo::loadMultiple($models, Yii::$app->request->post() )) {

                    foreach( $models as $key => $model) {

                        //Generación de instancias de los documentos Actividades Evidencias
                        $producto_acuerdo = UploadedFile::getInstance( $model, "[$key]producto_acuerdo" );
                        $resultado_actividad = UploadedFile::getInstance( $model, "[$key]resultado_actividad" );
                        $acta = UploadedFile::getInstance( $model, "[$key]acta" );
                        $listado = UploadedFile::getInstance( $model, "[$key]listado" );
                        $fotografias = UploadedFile::getInstance( $model, "[$key]fotografias" );

                        //Validación para el registro de documentos Actividades Evidencias
                        if( $producto_acuerdo && $resultado_actividad && $acta && $listado && $fotografias){
                                                       
                            $modelEvidencias [] = new EvidenciasImpIeo();
                            //Se crea carpeta para almecenar los documentos de Socializacion
                            $carpetaEvidencias = "../documentos/documentosIeo/actividades/evidenciasImlementacionIeo/".$institucion->codigo_dane;
                            if (!file_exists($carpetaEvidencias)) {
                                mkdir($carpetaEvidencias, 0777, true);
                            }

                            //Se crea carpeta para almecenar los documentos de Soporte Necesidad
                            $carpetaSocializacion = "../documentos/documentosIeo/actividades/evidenciasImlementacionIeo/".$institucion->codigo_dane;
                            if (!file_exists($carpetaSocializacion)) {
                                mkdir($carpetaSocializacion, 0777, true);
                            }
                            
                            $base = "../documentos/documentosIeo/actividades/evidenciasImlementacionIeo/".$institucion->codigo_dane."/";
                          
                            $rutaFisicaDirectoriaUploadProducto = $base.$producto_acuerdo->baseName;
                            $rutaFisicaDirectoriaUploadProducto .= date( "_Y_m_d_His" ) . '.' . $producto_acuerdo->extension;
                            $saveProducto = $producto_acuerdo->saveAs( $rutaFisicaDirectoriaUploadProducto );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.
                            
                            $rutaFisicaDirectoriaUploadResultadoActividad = $base.$resultado_actividad->baseName;
                            $rutaFisicaDirectoriaUploadResultadoActividad .= date( "_Y_m_d_His" ) . '.' . $resultado_actividad->extension;
                            $saveResultadoActividad = $resultado_actividad->saveAs( $rutaFisicaDirectoriaUploadResultadoActividad );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.
                            
                            $rutaFisicaDirectoriaUploadActa = $base.$acta->baseName;
                            $rutaFisicaDirectoriaUploadActa .= date( "_Y_m_d_His" ) . '.' . $acta->extension;
                            $saveActa = $acta->saveAs( $rutaFisicaDirectoriaUploadActa );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.
                             
                            $rutaFisicaDirectoriaUploadListado = $base.$listado->baseName;
                            $rutaFisicaDirectoriaUploadListado .= date( "_Y_m_d_His" ) . '.' . $listado->extension;
                            $saveListado = $listado->saveAs( $rutaFisicaDirectoriaUploadListado );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.

                            $rutaFisicaDirectoriaUploadFotografia = $base.$fotografias->baseName;
                            $rutaFisicaDirectoriaUploadFotografia .= date( "_Y_m_d_His" ) . '.' . $fotografias->extension;
                            $saveFotografia = $fotografias->saveAs( $rutaFisicaDirectoriaUploadFotografia );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.
                             

                            if( $saveProducto && $saveResultadoActividad && $saveActa && $saveListado && $saveFotografia){ 
                                
                                //Le asigno la ruta al arhvio
                                $modelEvidencias[$countEvidencias]->implementacion_ieo_id = $ieo_id;
                                $modelEvidencias[$countEvidencias]->producto_acuerdo = $rutaFisicaDirectoriaUploadProducto;
                                $modelEvidencias[$countEvidencias]->resultado_actividad = $rutaFisicaDirectoriaUploadResultadoActividad;
                                $modelEvidencias[$countEvidencias]->acta = $rutaFisicaDirectoriaUploadActa;
                                $modelEvidencias[$countEvidencias]->listado = $rutaFisicaDirectoriaUploadListado;
                                $modelEvidencias[$countEvidencias]->fotografias = $rutaFisicaDirectoriaUploadFotografia;


                            }else{
                                echo $file->error;
                                exit("finnn....");
                            }
                            $countEvidencias++;
                        }

                    }

                    foreach( $modelEvidencias as $key => $model) {
                        if(!$model->save()){
                            exit( "Error al guardar documentos Evidencias" );
                        }
                    }


                }

                if (Yii::$app->request->post('CantidadPoblacionImpIeo')){
                    $data = Yii::$app->request->post('CantidadPoblacionImpIeo');
                    $count 	= count( $data );
                    $modelCantidadPoblacion = [];
        
                    for( $i = 0; $i < $count; $i++ ){
                        $modelCantidadPoblacion[] = new CantidadPoblacionImpIeo();
                    }
        
                    if (CantidadPoblacionImpIeo::loadMultiple($modelCantidadPoblacion, Yii::$app->request->post() )) {
                        foreach( $modelCantidadPoblacion as $key => $model) {
                            if($model->tiempo_libre){
                                $model->implementacion_ieo_id = 2;
                                                                               
                                
                                if($model->save() && Yii::$app->request->post('EstudiantesImpIeo')){
                                    $status = true;
                                    $dataEstudiantes = Yii::$app->request->post('EstudiantesImpIeo');
                                    
                                    $countEstudiantes 	= count( $dataEstudiantes );
                                    $modelEstudiantesIeo = [];
                                    
                                    for( $i = 0; $i < $countEstudiantes; $i++ ){
                                        $modelEstudiantesIeo[] = new EstudiantesImpIeo();
                                    }
                                    if (EstudiantesImpIeo::loadMultiple($modelEstudiantesIeo, Yii::$app->request->post() )) {
                                        foreach( $modelEstudiantesIeo as $key => $modelEstudiantes) {
                                                if($modelEstudiantes->grado_0){
                                                    $modelEstudiantes->cantidad_poblacion_imp_ieo_id = $model->id;
                                                    
                                                    if(!$modelEstudiantes->save()){
                                                        $status = false;
                                                    }
                                                    
                                                    break;
                                                }
                                                
                                            }
                                    }
                                }
                            }
                        }
                    }
                    
                }
            }

            
        }
     

        
        $tiposCantidadPoblacion = new CantidadPoblacionImpIeo();
        $estudiantesGrado = new EstudiantesImpIeo();
        $evidencias = new EvidenciasImpIeo();
        $producto = new ProductoImplementacionIeo();

        return $this->renderAjax('create', [
            'model' => $ieo_model,
            'tiposCantidadPoblacion' => $tiposCantidadPoblacion,
            'estudiantesGrado' => $estudiantesGrado,
            "evidencias" => $evidencias,
            "producto" => $producto
        ]);
    }

    /**
     * Updates an existing ImplementacionIeo model.
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
     * Deletes an existing ImplementacionIeo model.
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
     * Finds the ImplementacionIeo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ImplementacionIeo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ImplementacionIeo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
