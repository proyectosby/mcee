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
use app\models\EcInformeSemanalTotalEjecutivo;
use app\models\Sedes;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * EcInformeSemanalTotalEjecutivoController implements the CRUD actions for EcInformeSemanalTotalEjecutivo model.
 */
class EcInformeSemanalTotalEjecutivoController extends Controller
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
     * Lists all EcInformeSemanalTotalEjecutivo models.
     * @return mixed
     */
    public function actionIndex($guardado = 0)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => EcInformeSemanalTotalEjecutivo::find(),
        ]);
        
        $_SESSION["tipo_informe"] = isset(($_GET['idTipoInforme'])) ? $_GET['idTipoInforme'] : 0;
        
        return $this->redirect(['create', 'guardado' => $guardado ]);
            
        /*return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);*/
    }

    /**
     * Displays a single EcInformeSemanalTotalEjecutivo model.
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
     * Creates a new EcInformeSemanalTotalEjecutivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $data = [];
        $idInstitucion = $_SESSION['instituciones'][0];
        $secuenciaData = 1;
        if( Yii::$app->request->post('EcInformeSemanalTotalEjecutivo') )
			$data = Yii::$app->request->post('EcInformeSemanalTotalEjecutivo');

        $count 	= count( $data );
        $models = [];
        for( $i = 0; $i < $count; $i++ )
		{
			$models[] = new EcInformeSemanalTotalEjecutivo();
        }
        
        if (EcInformeSemanalTotalEjecutivo::loadMultiple($models, Yii::$app->request->post() )) {
            
            EcInformeSemanalTotalEjecutivo::deleteAll('institucion_id = '. $idInstitucion);
           
           
            foreach( $models as $key => $model) {
                $model->institucion_id = $idInstitucion;
                $model->secuencia = $secuenciaData; 
                $model->id_tipo_informe =  $_SESSION["tipo_informe"];              
                $secuenciaData++;
            }
                                 
            foreach( $models as $key => $model) {
				$model->save();
			}

            return $this->redirect(['index', 'guardado' => 1 ]);
           
        }

		
		
		$sedes = Sedes::find()->andWhere(" estado =1 ")->orderby( 'id' )->all();
		$sedes = ArrayHelper::map( $sedes, 'id', 'id_instituciones' );
			
        $connection = Yii::$app->getDb();
		$command = $connection->createCommand("
		select 
			ise.institucion_id, 
			ise.sede_id, ise.id_tipo_informe,
			ai.avance_sede
		from 
			ec.informe_semanal_ejecucion_ise as ise,
			ec.actividades_ise as ai
		where 
			ise.id = ai.informe_semanal_ejecucion_id
		and 
			ise.estado = 1
		");
		$result = $command->queryAll();
		
		foreach ($result as $r)
		{
			$datos[$r['institucion_id']][$r['sede_id']][$r['id_tipo_informe']] = $r['avance_sede'];
		}
		
		$cantidaEjecutadaIEO  = 0;
		$cantidaEjecutadaSedePPT  = 0;
		$cantidaEjecutadaSedePSSE = 0;
		$cantidaEjecutadaSedePAF  = 0;
		$cantidaTotalSedesXIEOPPT = 0;
		$cantidaTotalSedesXIEOPSSE = 0;
		$cantidaTotalSedesXIEOPAF = 0;
		$datosSedesxIEO = array();
		$arrayTipoInforme= array(7,19,31);
		
		foreach ($sedes as $idSede => $idInstitucion)
		{
			
			$datosSedesxIEO[$idInstitucion][$idSede][7] = @$datos[$idInstitucion][$idSede][7] ;
			$datosSedesxIEO[$idInstitucion][$idSede][19] = @$datos[$idInstitucion][$idSede][19] ;
			$datosSedesxIEO[$idInstitucion][$idSede][31] = @$datos[$idInstitucion][$idSede][31] ;
			// $cantidaTotalSedesXIEO += @$datos[$idInstitucion][$idSede][$tipo];
			
			//ppt
			if (@$datos[$idInstitucion][$idSede][7] == 100)
			{
				$cantidaEjecutadaSedePPT++;
				
			}
			
			//PSSE
			if (@$datos[$idInstitucion][$idSede][19] == 100)
			{
				$cantidaEjecutadaSedePSSE++;
			}
			
			//PAF
			if (@$datos[$idInstitucion][$idSede][31] == 100)
			{
				$cantidaEjecutadaSedePAF++;
			}
		
			//ppt
			if($cantidaEjecutadaSedePPT / count($datosSedesxIEO[$idInstitucion]) == 1)
			{
			
				$cantidaTotalSedesXIEOPPT++;
			}
			
			//PSSE
			if($cantidaEjecutadaSedePSSE / count($datosSedesxIEO[$idInstitucion]) == 1)
			{
					// echo  count($datosSedesxIEO[$idInstitucion]);
				$cantidaTotalSedesXIEOPSSE++;
			}
			
			//PAF
			if($cantidaEjecutadaSedePAF / count($datosSedesxIEO[$idInstitucion]) == 1)
			{
				$cantidaTotalSedesXIEOPAF++;
			}
			
		}
		
			// echo $cantidaEjecutadaSedePSSE;
			// echo $cantidaTotalSedesXIEOPSSE;
			echo "<pre>"; print_r($datos); echo "</pre>"; 
			echo "<pre>"; print_r($datosSedesxIEO); echo "</pre>"; 
			
			die;
		
		echo "<pre>"; print_r($datosSedes); echo "</pre>"; 
		die;
		
		
		
        // $data = EcInformeSemanalTotalEjecutivo::find()
            // ->where('institucion_id = '.$idInstitucion)
            // ->orderby( 'id' )
            // ->all();
        
		// $tipo_poblacion = new EcTipoCantidadPoblacionIse;
        // $estudiasntes =  new EcEstudiantesIse;
        // $actividades =  new EcActividadesIse;
        // $visitas = new EcVisitasIse;
		
        // $cantidad_ieo = ArrayHelper::map( $data, 'secuencia', 'cantidad_ieo' );
        // $cantidad_sedes_ieo = ArrayHelper::map( $data, 'secuencia', 'cantidad_sedes' );
        // $porcentaje_ieo = ArrayHelper::map( $data, 'secuencia', 'porcentaje_ieo' );
        // $porcentaje_sedes = ArrayHelper::map( $data, 'secuencia', 'porcentaje_sedes' );
        // $porcentaje_actividad_uno = ArrayHelper::map( $data, 'secuencia', 'porcentaje_actividad_uno' );
        // $porcentaje_actividad_dos = ArrayHelper::map( $data, 'secuencia', 'porcentaje_actividad_dos' );
        // $porcentaje_actividad_tres = ArrayHelper::map( $data, 'secuencia', 'porcentaje_actividad_tres' );
        // $poblacion_beneficiada_directa = ArrayHelper::map( $data, 'secuencia', 'poblacion_beneficiada_directa' );
        // $poblacion_beneficiada_indirecta = ArrayHelper::map( $data, 'secuencia', 'poblacion_beneficiada_indirecta' );
        // $alarmas_generales = ArrayHelper::map( $data, 'secuencia', 'alarmas_generales' );        

        $model = new EcInformeSemanalTotalEjecutivo();
    
        return $this->render('create', [
            'model' => $model,
            'guardado' => 0,
            // 'cantidad_ieo' => $cantidad_ieo,
            // 'cantidad_sedes_ieo' => $cantidad_sedes_ieo,
            // 'porcentaje_ieo' => $porcentaje_ieo,
            // 'porcentaje_sedes' => $porcentaje_sedes,
            // 'porcentaje_actividad_uno' => $porcentaje_actividad_uno,
            // 'porcentaje_actividad_dos' => $porcentaje_actividad_dos,
            // 'porcentaje_actividad_tres' => $porcentaje_actividad_tres,
            // 'poblacion_beneficiada_directa' => $poblacion_beneficiada_directa,
            // 'poblacion_beneficiada_indirecta' => $poblacion_beneficiada_indirecta,
            // 'alarmas_generales' => $alarmas_generales,
        ]);
    }

    /**
     * Updates an existing EcInformeSemanalTotalEjecutivo model.
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
     * Deletes an existing EcInformeSemanalTotalEjecutivo model.
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
     * Finds the EcInformeSemanalTotalEjecutivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EcInformeSemanalTotalEjecutivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EcInformeSemanalTotalEjecutivo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
