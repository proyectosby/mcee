<?php
/**********
Modificación: 
Fecha: 14-01-2019
Desarrollador: Edwin Molina G
Descripción: - Se corrige guardado agregando campo faltante en el modelo EcDatosBasicos
			 - Se agregan corrigen titulos en el model EcDatosBasicos
			 - Se agrega un swithc para que el botón volver regrese al menu correspondiente
---------------------------------------
*/


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
use app\models\EcDatosBasicos;
use app\models\EcDatosBasicosBuscar;
use app\models\Instituciones;
use app\models\EcPlaneacion;
use app\models\EcReportes;
use app\models\EcVerificacion;
use app\models\Parametro;

use app\models\Personas;
use app\models\Sedes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * EcDatosBasicosController implements the CRUD actions for EcDatosBasicos model.
 */
class EcDatosBasicosController extends Controller
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
     * Lists all EcDatosBasicos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EcDatosBasicosBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EcDatosBasicos model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $guardado, $urlVolver )
    {
        return $this->render('view', [
            'model' 	=> $this->findModel($id),
            'guardado' 	=> $guardado,
            'urlVolver' => $urlVolver,
        ]);
    }

    /**
     * Creates a new EcDatosBasicos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$id_sede 		= $_SESSION['sede'][0];
		$id_institucion	= $_SESSION['instituciones'][0];
		
        $modelDatosBasico 	= new EcDatosBasicos();
        $modelPlaneacion	= new EcPlaneacion();
        $modelVerificacion	= new EcVerificacion();
        $modelReportes		= new EcReportes();
		
		$urlVolver = "";

		switch( intval($_GET['idTipoInforme']) ){
			
			case 1: 
				$urlVolver = 'ec-competencias-basicas-proyectos/index';
				break;
				
			case 13: 
				$urlVolver = 'ec-competencias-basicas-proyectos-obligatorio/index';
				break;
				
			case 25: 
				$urlVolver = 'ec-competencias-basicas-proyectos-articulacion/index';
				break;
			
		}

        if ($modelDatosBasico->load(Yii::$app->request->post())) {
            $modelDatosBasico->id_institucion = $_SESSION['instituciones'][0];
            $modelDatosBasico->id_sede = $id_sede;
            $modelDatosBasico->estado = 1;
            $modelDatosBasico->id_tipo_informe = intval($_GET['idTipoInforme']);

            if($modelDatosBasico->save()){
            
                if ($modelPlaneacion->load(Yii::$app->request->post())){
                    
                    $modelPlaneacion->id_datos_basicos = $modelDatosBasico->id;
                    $modelPlaneacion->estado = 1;
                    
                    if($modelPlaneacion->save()){

                        if ($modelVerificacion->load(Yii::$app->request->post())){

                            $ruta_archivo = UploadedFile::getInstance( $modelVerificacion, "ruta_archivo" );
            
                            if($ruta_archivo){
                                $institucion = Instituciones::findOne($_SESSION['instituciones'][0]);
                                $carpetaVerificacion = "../documentos/documentosPlaneacionReporteActividad/".$institucion->codigo_dane;
                                if (!file_exists($carpetaVerificacion)) {
                                    mkdir($carpetaVerificacion, 0777, true);
                                }
            
                                $rutaFisicaDirectoriaUploadVerificacion  = "../documentos/documentosPlaneacionReporteActividad/".$institucion->codigo_dane."/";
                                $rutaFisicaDirectoriaUploadVerificacion .= $ruta_archivo->baseName;
                                $rutaFisicaDirectoriaUploadVerificacion .= date( "_Y_m_d_His" ) . '.' . $ruta_archivo->extension;
                                $saveVerificacion = $ruta_archivo->saveAs( $rutaFisicaDirectoriaUploadVerificacion );
            
                                if($saveVerificacion){
                                    $modelVerificacion->id_planeacion = $modelPlaneacion->id;
                                    $modelVerificacion->ruta_archivo = $rutaFisicaDirectoriaUploadVerificacion;
                                    $modelVerificacion->estado = 1;            
                                    $modelVerificacion->save();
            
                                }
            
                            }
                        }

                       if ($modelReportes->load(Yii::$app->request->post())){
                            $modelReportes->id_planeacion = $modelPlaneacion->id;
                            $modelReportes->estado = 1;
                            $modelReportes->save();
                        }                        
                    }
                }
            }
            
            return $this->redirect(['view', 'id' => $modelDatosBasico->id, 'guardado' => 1 , 'urlVolver' => $urlVolver ]);
        }


		
		$dataTiposVerificacion = Parametro::find()
									->where( 'id_tipo_parametro=12' )
									->andWhere( 'estado=1' )
									->all();
									
		$tiposVerificacion = ArrayHelper::map( $dataTiposVerificacion, 'id', 'descripcion' );
		
		$dataPersonas 		= Personas::find()
								->select( "( nombres || ' ' || apellidos ) as nombres, personas.id" )
								->innerJoin( 'perfiles_x_personas pp', 'pp.id_personas=personas.id' )
								->innerJoin( 'docentes d', 'd.id_perfiles_x_personas=pp.id' )
								->innerJoin( 'perfiles_x_personas_institucion ppi', 'ppi.id_perfiles_x_persona=pp.id' )
								->where( 'personas.estado=1' )
								->andWhere( 'id_institucion='.$id_institucion )
								->all();
		
		$profesional		= ArrayHelper::map( $dataPersonas, 'id', 'nombres' );
		
		$sede = Sedes::findOne( $id_sede );
		$institucion = Instituciones::findOne( $id_institucion );

        return $this->render('create', [
            'modelDatosBasico' 	=> $modelDatosBasico,
            'modelPlaneacion' 	=> $modelPlaneacion,
            'modelVerificacion' => $modelVerificacion,
            'modelReportes' 	=> $modelReportes,
            'tiposVerificacion'	=> $tiposVerificacion,
            'profesional'		=> $profesional,
            'sede'				=> $sede,
            'institucion'		=> $institucion,
            'urlVolver'			=> $urlVolver,
        ]);
    }

    /**
     * Updates an existing EcDatosBasicos model.
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
     * Deletes an existing EcDatosBasicos model.
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
     * Finds the EcDatosBasicos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EcDatosBasicos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EcDatosBasicos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
