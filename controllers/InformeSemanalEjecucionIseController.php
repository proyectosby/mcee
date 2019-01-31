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
use app\models\InformeSemanalEjecucionIse;
use app\models\EcTipoCantidadPoblacionIse;
use app\models\EcDocentesIse;
use app\models\EcEstudiantesIse;
use app\models\EcActividadesIse;
use app\models\EcVisitasIse;

use app\models\Instituciones;
use app\models\Sedes;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * InformeSemanalEjecucionIseController implements the CRUD actions for InformeSemanalEjecucionIse model.
 */
class InformeSemanalEjecucionIseController extends Controller
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


    function actionViewFases($model, $form, $datos, $datos2){
        
        
        //$model = new InformeSemanalEjecucionIse();
        $tipo_poblacion = new EcTipoCantidadPoblacionIse;
        $estudiasntes =  new EcEstudiantesIse;
        $actividades =  new EcActividadesIse;
        $visitas = new EcVisitasIse;

		return $this->renderAjax('fases', [
			'idPE' 	=> null,
			'fases' => ["Proyectos Pedagógicos Transversales", "Ariculación Familiar", "Proyecto de Servicio Social"],
            "tipo_poblacion" => $tipo_poblacion,
            "estudiasntes" => $estudiasntes,
            "actividades" => $actividades,
            "visitas"  => $visitas,
            "form" => $form,
            "datos" => $datos,
            "datos2" => $datos2,
        ]);
		
	}

    /**
     * Lists all InformeSemanalEjecucionIse models.
     * @return mixed
     */
    public function actionIndex($guardado = 0)
    {
        $query = InformeSemanalEjecucionIse::find()->where(['estado' => 1]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        
        $_SESSION["tipo_informe"] = isset(($_GET['idTipoInforme'])) ? intval($_GET['idTipoInforme']) : 0; 

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'guardado' => $guardado,
        ]);
    }

    /**
     * Displays a single InformeSemanalEjecucionIse model.
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
     * Creates a new InformeSemanalEjecucionIse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InformeSemanalEjecucionIse();
        $idInstitucion = $_SESSION['instituciones'][0];
        $institucion = Instituciones::findOne( $idInstitucion );

        $Sedes = Sedes::find()->where( "id_instituciones =  $idInstitucion" )->all();
		$sedes = ArrayHelper::map( $Sedes, 'id', 'descripcion' );

        if ($model->load(Yii::$app->request->post())) {
            $model->institucion_id =  $idInstitucion;
            //$model->sede_id = 55;
            $model->proyecto_id = 1;
            $model->estado = 1;
            
            $model->id_tipo_informe = $_SESSION["idTipoInforme"];
           
            $id_informe = 0;

            if($model->save()){
                $id_informe = $model->id;

                $dataActividades = Yii::$app->request->post('EcActividadesIse');
                $modelsActividades = [];

                for( $i = 0; $i < count($dataActividades); $i++ ){
                    $modelsActividades[] = new EcActividadesIse();
                }
                
                if (EcActividadesIse::loadMultiple($modelsActividades, Yii::$app->request->post() )) {
                    foreach( $modelsActividades as $key => $model2) {
                        
                        if($model2->avance_ieo){
                            
                            $model2->actividad_1_porcentaje = explode("%",$model2->actividad_1_porcentaje)[0];
                            $model2->actividad_2_porcentaje = explode("%",$model2->actividad_2_porcentaje)[0];
                            $model2->actividad_3_porcentaje = explode("%",$model2->actividad_3_porcentaje)[0];                            

                            $model2->informe_semanal_ejecucion_id = $id_informe;
                            $model2->nombre= "";
                            $model2->estado = 1;
                            
                            if($model2->save()){

                                $dataCantidadPoblacion = Yii::$app->request->post('EcTipoCantidadPoblacionIse')[$key];
                                
                                if($dataCantidadPoblacion["edu_derechos"]){
                                    $modelPoblacion = new EcTipoCantidadPoblacionIse();
                                    $modelPoblacion->edu_derechos = $dataCantidadPoblacion["edu_derechos"];
                                    $modelPoblacion->sexualidad_ciudadania = $dataCantidadPoblacion["sexualidad_ciudadania"];
                                    $modelPoblacion->familia = $dataCantidadPoblacion["familia"];
                                    $modelPoblacion->directivos = $dataCantidadPoblacion["directivos"];
                                    $modelPoblacion->tiempo_libre = $dataCantidadPoblacion["tiempo_libre"];
                                    $modelPoblacion->id_proyecto = $key+1;
                                    $modelPoblacion->estado = 1;
                                    $modelPoblacion->id_actividad_ise = $model2->id;
                                    
                                    if($modelPoblacion->save()){
                                        $dataEstudiantes = Yii::$app->request->post('EcEstudiantesIse')[$key];

                                        if($dataEstudiantes["grado_0"]){
                                            $modelEstudiantes = new EcEstudiantesIse();
                                            $modelEstudiantes->grado_0 = $dataEstudiantes["grado_0"];
                                            $modelEstudiantes->grado_1 = $dataEstudiantes["grado_1"];
                                            $modelEstudiantes->grado_2 = $dataEstudiantes["grado_2"];
                                            $modelEstudiantes->grado_3 = $dataEstudiantes["grado_3"];
                                            $modelEstudiantes->grado_4 = $dataEstudiantes["grado_4"];
                                            $modelEstudiantes->grado_5 = $dataEstudiantes["grado_5"];
                                            $modelEstudiantes->grado_6 = $dataEstudiantes["grado_6"];
                                            $modelEstudiantes->grado_7 = $dataEstudiantes["grado_7"];
                                            $modelEstudiantes->grado_8 = $dataEstudiantes["grado_8"];
                                            $modelEstudiantes->grado_9 = $dataEstudiantes["grado_9"];
                                            $modelEstudiantes->grado_10 = $dataEstudiantes["grado_10"];
                                            $modelEstudiantes->grado_11 = $dataEstudiantes["grado_11"];
                                            $modelEstudiantes->total = $dataEstudiantes["total"];
                                            $modelEstudiantes->id_proyecto = $key +1;
                                            $modelEstudiantes->estado = 1;
                                            $modelEstudiantes->id_tipo_cantidad_poblacion = $modelPoblacion->id;
                                            $modelEstudiantes->save();
                                        }
                                    }
                                    
                                }

                               
                            }
                        }
                        
                    }

                }
            
                $dataVisitas = Yii::$app->request->post('EcVisitasIse');
                $modelsVisitas = [];

                for( $i = 0; $i < count($dataVisitas); $i++ ){
                    $modelsVisitas[] = new EcVisitasIse();
                }

                if (EcVisitasIse::loadMultiple($modelsVisitas, Yii::$app->request->post() )) {
                    foreach( $modelsVisitas as $key => $model) {
                        if($model->cantidad_visitas_realizadas){
                            
                            $model->informe_semanal_ejecucion_id = $id_informe;
                            $model->estado = 1;
                            if(!$model->save()){
                                var_dump("Error al guarda Estudiantes ".$key);
                                die();
                            }

                        }
                    }
                }    
            }

            return $this->redirect(['index', "guardado" => 1]);
        }
       
        return $this->renderAjax('create', [
            'model' => $model,
            'institucion' => $institucion->descripcion,
            'sedes' => $sedes,
        ]);
    }

    /**
     * Updates an existing InformeSemanalEjecucionIse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $model->save();
            $idInforme = $model->id;

            $post = Yii::$app->request->post();

            $connection = Yii::$app->getDb();
            
            $arrayDatosActividad = $post['EcActividadesIse'];

            foreach($arrayDatosActividad as $idAcciones => $valores)
			{
                if($valores['actividad_1']){
                    $index = $idAcciones +1;
                    $command = $connection->createCommand
                    (" 
                        UPDATE ec.actividades_ise set 			
                        actividad_1 	='". $valores['actividad_1']."',
                        actividad_1_porcentaje			='" .$valores['actividad_1_porcentaje']."',
                        actividad_2			='". $valores['actividad_2']."',
                        actividad_2_porcentaje		='". $valores['actividad_2_porcentaje']."',
                        actividad_3		='". $valores['actividad_3']."',
                        actividad_3_porcentaje		='". $valores['actividad_3_porcentaje']."',
                        avance_sede		='". $valores['avance_sede']."',
                        avance_ieo		='". $valores['avance_ieo']."'
                        WHERE informe_semanal_ejecucion_id = $idInforme and id_proyecto = $index
                    ");
                    $result = $command->queryAll();
                }
            }

            
            
            $arrayDatosTipoPoblacion = $post['EcTipoCantidadPoblacionIse'];

            foreach($arrayDatosTipoPoblacion as $idAcciones => $valores)
			{
                if($valores['edu_derechos']){
                    
                    $index = $idAcciones +1;
                    $id =  $valores['id_tip'];
                    $command = $connection->createCommand
                    (" 
                        UPDATE ec.tipo_cantidad_poblacion_ise set 			
                        edu_derechos 	='". $valores['edu_derechos']."',
                        sexualidad_ciudadania			='" .$valores['sexualidad_ciudadania']."',
                        medio_ambiente			='". $valores['medio_ambiente']."',
                        familia		='". $valores['familia']."',
                        directivos		='". $valores['directivos']."',
                        tiempo_libre		='". $valores['tiempo_libre']."'
                        WHERE id =  $id
                    ");
                    $result = $command->queryAll();
                }
            }

            $arrayDatosEstudiantes = $post['EcEstudiantesIse'];

            foreach($arrayDatosEstudiantes as $idAcciones => $valores)
			{
                if($valores['grado_0']){
                    
                    $index = $idAcciones +1;
                    $id =  $valores['est_id'];
                    $command = $connection->createCommand
                    (" 
                        UPDATE ec.estudiantes_ise set 			
                        grado_0 	='". $valores['grado_0']."',
                        grado_1			='" .$valores['grado_1']."',
                        grado_2			='". $valores['grado_2']."',
                        grado_3		='". $valores['grado_3']."',
                        grado_4		='". $valores['grado_4']."',
                        grado_5		='". $valores['grado_5']."',
                        grado_6		='". $valores['grado_6']."',
                        grado_7		='". $valores['grado_7']."',
                        grado_8		='". $valores['grado_8']."',
                        grado_9		='". $valores['grado_9']."',
                        grado_10		='". $valores['grado_10']."',
                        grado_11		='". $valores['grado_11']."',
                        total		='". $valores['total']."'
                        WHERE id =  $id
                    ");
                    $result = $command->queryAll();
                }
            }

            $arrayDatosVisitas = $post['EcVisitasIse'];

            foreach($arrayDatosVisitas as $idAcciones => $valores)
			{
                if($valores['cantidad_visitas_realizadas']){
                    
                    $index = $idAcciones +1;
                    $command = $connection->createCommand
                    (" 
                        UPDATE ec.visitas_ise set 			
                        cantidad_visitas_realizadas 	='". $valores['cantidad_visitas_realizadas']."',
                        canceladas			='" .$valores['canceladas']."',
                        visitas_fallidas			='". $valores['visitas_fallidas']."',
                        observaciones_evidencias		='". $valores['observaciones_evidencias']."',
                        alarmas		='". $valores['alarmas']."',
                        logros		='". $valores['logros']."',
                        dificultades		='". $valores['dificultades']."'
                        WHERE informe_semanal_ejecucion_id = $idInforme and id_proyecto = $index
                    ");
                    $result = $command->queryAll();
                }
			}

            

            
            
            return $this->redirect(['index']);
        }

        $command = Yii::$app->db->createCommand("SELECT act.nombre, act.actividad_1, act.actividad_1_porcentaje, act.actividad_2, act.actividad_2_porcentaje, act.actividad_3, act.actividad_3_porcentaje, act.avance_sede, act.avance_ieo, act.id_proyecto,
                                                        tip.edu_derechos, tip.sexualidad_ciudadania, tip.medio_ambiente, tip.familia, tip.directivos, tip.tiempo_libre, tip.id as id_tip,
                                                        est.grado_0, est.grado_1, est.grado_2, est.grado_3, est.grado_4, est.grado_5, est.grado_6, est.grado_7, est.grado_8, est.grado_9, est.grado_10, est.grado_11, est.total, est.id as est_id
                                                FROM ec.actividades_ise AS act
                                                INNER JOIN ec.tipo_cantidad_poblacion_ise AS tip on act.id = tip.id_actividad_ise
                                                INNER JOIN ec.estudiantes_ise AS est ON tip.id = est.id_tipo_cantidad_poblacion
                                                WHERE act.informe_semanal_ejecucion_id = $id");

        $result= $command->queryAll();                                       

        $result = ArrayHelper::getColumn($result, function ($element) 
        {
            $index = $element['id_proyecto'] - 1;
            $dato[$index]['nombre']= $element['nombre'];
            $dato[$index]['actividad_1']= $element['actividad_1'];
            $dato[$index]['actividad_1_porcentaje']= $element['actividad_1_porcentaje'];
            $dato[$index]['actividad_2']= $element['actividad_2'];
            $dato[$index]['actividad_2_porcentaje']= $element['actividad_2_porcentaje'];
            $dato[$index]['actividad_3']= $element['actividad_3'];
            $dato[$index]['actividad_3_porcentaje']= $element['actividad_3_porcentaje'];
            $dato[$index]['avance_sede']= $element['avance_sede'];
            $dato[$index]['avance_ieo']= $element['avance_ieo'];
            $dato[$index]['edu_derechos']= $element['edu_derechos'];
            $dato[$index]['sexualidad_ciudadania']= $element['sexualidad_ciudadania'];
            $dato[$index]['medio_ambiente']= $element['medio_ambiente'];
            $dato[$index]['familia']= $element['familia'];
            $dato[$index]['directivos']= $element['directivos'];
            $dato[$index]['tiempo_libre']= $element['tiempo_libre'];
            $dato[$index]['id_tip']= $element['id_tip'];
            $dato[$index]['grado_0']= $element['grado_0'];
            $dato[$index]['grado_1']= $element['grado_1'];
            $dato[$index]['grado_2']= $element['grado_2'];
            $dato[$index]['grado_3']= $element['grado_3'];
            $dato[$index]['grado_4']= $element['grado_4'];
            $dato[$index]['grado_5']= $element['grado_5'];
            $dato[$index]['grado_6']= $element['grado_6'];
            $dato[$index]['grado_7']= $element['grado_7'];
            $dato[$index]['grado_8']= $element['grado_8'];
            $dato[$index]['grado_9']= $element['grado_9'];
            $dato[$index]['grado_10']= $element['grado_10'];
            $dato[$index]['grado_11']= $element['grado_11'];
            $dato[$index]['total']= $element['total'];
            $dato[$index]['est_id']= $element['est_id'];

            return $dato;
           
        });

        $command2 = Yii::$app->db->createCommand("SELECT vis.cantidad_visitas_realizadas, vis.canceladas, vis.visitas_fallidas, vis.observaciones_evidencias, vis.alarmas,   vis.logros, vis.dificultades, vis.id_proyecto 
                                                FROM ec.visitas_ise AS vis
                                                WHERE vis.informe_semanal_ejecucion_id = $id");

        $result2= $command2->queryAll();

        $result2 = ArrayHelper::getColumn($result2, function ($element) 
        {
            $index = $element['id_proyecto'] - 1;
            $dato[$index]['cantidad_visitas_realizadas']= $element['cantidad_visitas_realizadas'];
            $dato[$index]['canceladas']= $element['canceladas'];
            $dato[$index]['visitas_fallidas']= $element['visitas_fallidas'];
            $dato[$index]['observaciones_evidencias']= $element['observaciones_evidencias'];
            $dato[$index]['alarmas']= $element['alarmas'];
            $dato[$index]['logros']= $element['logros'];
            $dato[$index]['dificultades']= $element['dificultades'];

            return $dato;
        
        });

      
                
        
        foreach	($result as $r => $valor)
        {
            foreach	($valor as $ids => $valores)
                
                $datos[$ids] = $valores;
        }

        foreach	($result2 as $r => $valor)
        {
            foreach	($valor as $ids => $valores)
                
                $datos2[$ids] = $valores;
        }

        $idInstitucion = $_SESSION['instituciones'][0];
        $institucion = Instituciones::findOne( $idInstitucion );

        $Sedes = Sedes::find()->where( "id_instituciones =  $idInstitucion" )->all();
		$sedes = ArrayHelper::map( $Sedes, 'id', 'descripcion' );
       
        return $this->renderAjax('update', [
            'model' => $model,
            'institucion' => $institucion->descripcion,
            'sedes' => $sedes,
            'datos'=> $datos,
            'datos2'=> $datos2,
            
        ]);
    }

    /**
     * Deletes an existing InformeSemanalEjecucionIse model.
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
        //$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InformeSemanalEjecucionIse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InformeSemanalEjecucionIse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InformeSemanalEjecucionIse::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
