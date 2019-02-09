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
			ai.avance_sede,
			ai.avance_ieo
		from 
			ec.informe_semanal_ejecucion_ise as ise,
			ec.actividades_ise as ai
		where 
			ise.id = ai.informe_semanal_ejecucion_id
		and 
			ise.estado = 1
		");
		$result = $command->queryAll();
		
		// echo "<pre>"; print_r($result); echo "</pre>"; 
		// die;
		
		foreach ($result as $r)
		{
			$datos[$r['institucion_id']]["i" . $r['id_tipo_informe']]['avance_ieo'] = $r['avance_ieo'];
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
			
		}
		
		foreach ($datos as $dato )
		{
			
			//ppt
			if( @$dato['i7']['avance_ieo'] == 100)
			{
			
				$cantidaTotalSedesXIEOPPT++;
			}
			
			// PSSE
			if( @$dato['i19']['avance_ieo'] == 100)
			{
				$cantidaTotalSedesXIEOPSSE++;
			}
			
			// PAF
			if( @$dato['i31']['avance_ieo'] == 100)
			{
				$cantidaTotalSedesXIEOPAF++;
			}
		}
		
        $model = new EcInformeSemanalTotalEjecutivo();
    
        return $this->render('create', [
            'model' => $model,
            'guardado' => 0,
            'cantidaEjecutadaSedePPT' => $cantidaEjecutadaSedePPT,
            'cantidaEjecutadaSedePSSE' => $cantidaEjecutadaSedePSSE,
			'cantidaEjecutadaSedePAF' => $cantidaEjecutadaSedePAF,
			'cantidaTotalSedesXIEOPPT'  => $cantidaTotalSedesXIEOPPT,
			'cantidaTotalSedesXIEOPSSE' => $cantidaTotalSedesXIEOPSSE,
			'cantidaTotalSedesXIEOPAF'  => $cantidaTotalSedesXIEOPAF,
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
