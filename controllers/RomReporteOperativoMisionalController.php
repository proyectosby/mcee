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
use app\models\Sedes;
use app\models\Instituciones;
use app\models\Parametro;
use app\models\IsaRomProyectos;
use app\models\RomReporteOperativoMisional;
use yii\bootstrap\Collapse;

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
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RomReporteOperativoMisional::find()->where(['estado' => 1]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

	public function obtenerParametros($idTipoParametro)
	{
		//parametros de Fases informe planeación IEO
		$dataParametros = Parametro::find()
						->where( "id_tipo_parametro=$idTipoParametro" )
						->andWhere( 'estado=1' )
						->orderby( 'id' )
						->all();
						
		$parametros		= ArrayHelper::map( $dataParametros, 'id', 'descripcion' );
		
		return $parametros;
	
	}
		
	
    function actionFormulario($model, $form, $datos = 0 ){
        
		
		$proyectos = new IsaRomProyectos();
		$proyectos = $proyectos->find()->orderby("id")->all();
		$proyectos = ArrayHelper::map($proyectos,'id','descripcion');
		
		
		$estados= $this->obtenerParametros(45);
		// $ecProyectos = EcProyectos::find()->where( 'estado=1' )->orderby('id ASC')->all();
		
		foreach ($proyectos as $idProyecto => $v)
		{
			
			 $contenedores[] = 	
				[
					'label' 		=>  $v,
					'content' 		=>  $this->renderPartial( 'procesos', 
													[  
                                                        'idProyecto' => $idProyecto,
														'form' => $form,
														//'modelProyectos' =>  $modelProyectos,
														'datos'=>$datos,
														'estados'=>$estados,
													] 
										),
					'contentOptions'=> []
				];
	
		}
		
		 echo Collapse::widget([
			'items' => $contenedores,
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
        if ($model->load(Yii::$app->request->post())) 
		{
			
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

                                            // $file_actas = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]actas") ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]actas") : null;
                                            // $file_reportes = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]reportes" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]reportes") : null;
                                            // $file_listados = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]listados" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]listados") : null;
                                            // $file_plan_trabajo = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]plan_trabajo" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]plan_trabajo") : null;
                                            // $file_formato_seguimiento = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_seguimiento" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_seguimiento") : null;
                                            // $file_formato_evaluacion = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_evaluacion" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_evaluacion") : null;
                                            // $file_fotografias = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]fotografias" ) ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]fotografias") : null;
                                            // $file_vidoes = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]vidoes") ? UploadedFile::getInstance( $modelEvidencias[$key], "[$key]vidoes") : null;
                                            
											
											$file_actas = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]actas");
                                            $file_reportes = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]reportes" );
                                            $file_listados = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]listados" );
                                            $file_plan_trabajo = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]plan_trabajo" );
                                            $file_formato_seguimiento = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_seguimiento" );
                                            $file_formato_evaluacion = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]formato_evaluacion" );
                                            $file_fotografias = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]fotografias" ) ;
                                            $file_vidoes = UploadedFile::getInstance( $modelEvidencias[$key], "[$key]vidoes");
                                            
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
		$idInstitucion = $_SESSION['instituciones'][0];
        $Sedes  = Sedes::find()->where( "id_instituciones = $idInstitucion" )->all();
        $sedes	= ArrayHelper::map( $Sedes, 'id', 'descripcion' );

        

        return $this->renderAjax('create', [
            'model' => $model,
            'sedes' => $sedes,
            'institucion'=> $this->obtenerInstitucion(),
			
        ]);
    }

	
	public function obtenerInstitucion()
	{
		$idInstitucion = $_SESSION['instituciones'][0];
		$instituciones = new Instituciones();
		$instituciones = $instituciones->find()->where("id = $idInstitucion")->all();
		$instituciones = ArrayHelper::map($instituciones,'id','descripcion');
		
		return $instituciones;
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
		$idInstitucion = $_SESSION['instituciones'][0];
		$Sedes  = Sedes::find()->where( "id_instituciones = $idInstitucion" )->all();
        $sedes	= ArrayHelper::map( $Sedes, 'id', 'descripcion' );
	
        if ($model->load(Yii::$app->request->post()) && $model->save()) 
		{
			

            return $this->redirect(['index']);
        }
		
		$datos = array();
		
		
		$actividadesRom = new RomActividadesRom ();
		$actividadesRom = $actividadesRom->find()->orderby("id")->andWhere("id_reporte_operativo_misional = $id")->all();
	
		//se trae la informacionde la base de datos 
		$result = ArrayHelper::getColumn($actividadesRom, function ($element) 
		{
			$dato[$element['id_reporte_operativo_misional']]['fehca_desde']= $element['fehca_desde'];
			$dato[$element['id_reporte_operativo_misional']]['fecha_hasta']= $element['fecha_hasta'];
			$dato[$element['id_reporte_operativo_misional']]['num_equipos']= $element['num_equipos'];
			$dato[$element['id_reporte_operativo_misional']]['perfiles']= $element['perfiles'];
			$dato[$element['id_reporte_operativo_misional']]['docente_orientador']= $element['docente_orientador'];
			$dato[$element['id_reporte_operativo_misional']]['nombre_actividad']= $element['nombre_actividad'];
			$dato[$element['id_reporte_operativo_misional']]['duracion_sesion']= $element['duracion_sesion'];
			$dato[$element['id_reporte_operativo_misional']]['logros']= $element['logros'];
			$dato[$element['id_reporte_operativo_misional']]['fortalezas']= $element['fortalezas'];
			$dato[$element['id_reporte_operativo_misional']]['debilidades']= $element['debilidades'];
			$dato[$element['id_reporte_operativo_misional']]['alternativas']= $element['alternativas'];
			$dato[$element['id_reporte_operativo_misional']]['retos']= $element['retos'];
			$dato[$element['id_reporte_operativo_misional']]['articulacion']= $element['articulacion'];
			$dato[$element['id_reporte_operativo_misional']]['evaluacion']= $element['evaluacion'];
			$dato[$element['id_reporte_operativo_misional']]['observaciones_generales']= $element['observaciones_generales'];
			$dato[$element['id_reporte_operativo_misional']]['alarmas']= $element['alarmas'];
			$dato[$element['id_reporte_operativo_misional']]['justificacion_activiad_no_realizada']= $element['justificacion_activiad_no_realizada'];
			$dato[$element['id_reporte_operativo_misional']]['fecha_reprogramacion']= $element['fecha_reprogramacion'];
			$dato[$element['id_reporte_operativo_misional']]['diligencia']= $element['diligencia'];
			$dato[$element['id_reporte_operativo_misional']]['rol']= $element['rol'];
			$dato[$element['id_reporte_operativo_misional']]['fecha_diligencia']= $element['alarmas'];
			$dato[$element['id_reporte_operativo_misional']]['estado']= $element['estado'];
			$dato[$element['id_reporte_operativo_misional']]['id_actividad']= $element['id_actividad'];

			return $dato;
		});
		
	//se formate la informacion que deben tener los campos 
		foreach	($result as $r => $valor)
			foreach	($valor as $ids => $valores)
				$datos['actividades'][$valores['id_actividad']] = $valores;
	
		$tipoCantidadPoblacion = new RomTipoCantidadPoblacionRom ();
		$tipoCantidadPoblacion = $tipoCantidadPoblacion->find()->orderby("id")->andWhere("id_reporte_operativo_misional = $id")->all();
	
		//se trae la informacionde la base de datos tabla ec.avances
		$result = ArrayHelper::getColumn($tipoCantidadPoblacion, function ($element) 
		{
			$dato[$element['id_reporte_operativo_misional']]['vecinos']= $element['vecinos'];
			$dato[$element['id_reporte_operativo_misional']]['lideres_comunitarios']= $element['lideres_comunitarios'];
			$dato[$element['id_reporte_operativo_misional']]['empresarios_comerciantes']= $element['empresarios_comerciantes'];
			$dato[$element['id_reporte_operativo_misional']]['organizaciones_locales']= $element['organizaciones_locales'];
			$dato[$element['id_reporte_operativo_misional']]['grupos_comunitarios']= $element['grupos_comunitarios'];
			$dato[$element['id_reporte_operativo_misional']]['otos_actores']= $element['otos_actores'];
			$dato[$element['id_reporte_operativo_misional']]['total_participantes']= $element['total_participantes'];
			$dato[$element['id_reporte_operativo_misional']]['id_actividades_rom']= $element['id_actividades_rom'];

			return $dato;
		});
	
		
	
	
		//se formate la informacion que deben tener los campos 
		foreach	($result as $r => $valor)
			foreach	($valor as $ids => $valores)
				$datos['tipoCantidadPoblacion'][$valores['id_actividades_rom']] = $valores;
		
		
		// echo "<pre>"; print_r($datos); echo "</pre>"; 
				// die;
        return $this->renderAjax('update', [
            'model' => $model,
			'sedes' => $sedes,
			'institucion'=> $this->obtenerInstitucion(),
			'datos' => $datos,
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
		$model = $this->findModel($id);
		$model->estado = 2;
		$model->update(false);
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
