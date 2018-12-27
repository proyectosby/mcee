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
use app\models\IsaEncArtisticaMisional;
use app\models\IsaEncArtisticaMisionalBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use app\models\IsaDetArtisticaMisional;
use app\models\IsaDetMisionalArtisticaXActividad;
use app\models\IsaIndicadoresXDetArtisticaMisional;
use app\models\Instituciones;
use app\models\Sedes;
use app\models\IsaIndicadores;
use app\models\IsaActividadesArtisticas;
use yii\helpers\ArrayHelper;



/**
 * IsaEncArtisticaMisionalController implements the CRUD actions for IsaEncArtisticaMisional model.
 */
class IsaEncArtisticaMisionalController extends Controller
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
     * Lists all IsaEncArtisticaMisional models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IsaEncArtisticaMisionalBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IsaEncArtisticaMisional model.
     * @param string $id
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
     * Creates a new IsaEncArtisticaMisional model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		//Este array indica cuantos detalles misionales por actividad deben haber
		//Para el primer detalle debe haber 3 y para el segundo solo uno
		$totalActividades = [ 3, 1 ];
		$totalIndicadores = [ 4, 2 ];
		$idsIndicadores   = [ 1,2,3,4,5,6 ];
		
		$indicadores = [];
		$actividades = [];
		
		$id_sede 		= $_SESSION['sede'][0];
		$id_institucion	= $_SESSION['instituciones'][0];
		
		$institucion = Instituciones::findOne($id_institucion);
		$sede 		 = Sedes::findOne($id_sede);
		
		$guardar = Yii::$app->request->post('guardar') == 1 ? true: false;
		
		$guardado = false;
		
		// $models=[
					// 'encabezado'=> 	new IsaEncArtisticaMisional(),
					// 'detalle' 	=>	[
										// [
											// 'misional'	  => '',
											// 'actividades' => [],
											// 'indicadores' => [],
										// ],
										// [
											// 'misional'	  => '',
											// 'actividades' => [],
											// 'indicadores' => [],
										// ],
									// ],
				// ];
        
		$model = new IsaEncArtisticaMisional();
		
		$models = [];
		
		$models['encabezado'] = new IsaEncArtisticaMisional();
		
		if( Yii::$app->request->post() )
		{
			$encabezado = Yii::$app->request->post("IsaEncArtisticaMisional");
			//Buscando los datos ingresados por el usuario
			if( !empty( $encabezado['id'] ) )
			{
				$models['encabezado'] = IsaEncArtisticaMisional::findOne( $encabezado['id'] );
			}
			
			$models['encabezado']->load( Yii::$app->request->post() );
			
			$models['detalle'] = [];
			
			
			$modelsMisionales = Yii::$app->request->post("IsaDetArtisticaMisional");
			
			foreach( $modelsMisionales as $i => $misional )
			{
				if( !empty( $misional['id'] ) )
				{
					$models['detalle'][$i]['misional'] = IsaDetArtisticaMisional::findOne( $misional['id'] );
				}
				else{
					$models['detalle'][$i]['misional'] = new IsaDetArtisticaMisional();
				}
			
				$models['detalle'][$i]['misional']->load( $misional, '' );
			}
			
			$actividadesArtisticas = Yii::$app->request->post("IsaDetMisionalArtisticaXActividad");
			
			//Por cada detalle debe haber dos detalles misionales por actividad
			foreach( $actividadesArtisticas as $i => $arrArtisticas )
			{
				foreach( $arrArtisticas as $j => $actArtisticas )
				{
					if( !empty($actArtisticas['id']) )
					{
						$models['detalle'][$i]['actividades'][$j] = IsaDetMisionalArtisticaXActividad::findOne( $actArtisticas['id'] );
					}
					else
					{
						$models['detalle'][$i]['actividades'][$j] = new IsaDetMisionalArtisticaXActividad();
					}
					
					$models['detalle'][$i]['actividades'][$j]->load( $actArtisticas, '' );
				}
			}
			
			$isaIndicadores = Yii::$app->request->post("IsaIndicadoresXDetArtisticaMisional");
			
			foreach( $isaIndicadores as $i => $isaind )
			{
				foreach( $isaind as $j => $ind )
				{	
					if( !empty($ind['id']) )
					{
						$models['detalle'][$i]['indicadores'][$j] = IsaIndicadoresXDetArtisticaMisional::findOne( $ind['id'] );
					}
					else{
						$models['detalle'][$i]['indicadores'][$j] = new IsaIndicadoresXDetArtisticaMisional();
					}
					
					$models['detalle'][$i]['indicadores'][$j]->load( $ind, '' );
				}
			}
			
			$valido = true;
			
			if( $guardar )
			{
				$valido = $models['encabezado']->validate([
									'id_institucion',
									'id_sede',
									'periodo',
									'fecha',
								]) && $valido;
				foreach( $models['detalle'] as $keyDet => $valueDetalle )
				{
					$valido = $valueDetalle['misional']->validate([
										'mision',
										'descripcion_proceso',
										'hallazgos',
										'avance_sede_sensibilizacion',
										'avance_sede_desarrollo',
									]) && $valido;
					
					foreach( $valueDetalle['actividades'] as $key => $actividad )
					{
						$valido = $actividad->validate([
										'id_actividad',
										'estado_actual',
										'logros',
										'fortalezas',
										'debilidades',
										'retos',
										'alarmas',
									]) && $valido;
					}
					
					foreach( $valueDetalle['indicadores'] as $key => $indicador )
					{
						$valido = $indicador->validate([
											'id_indicador',
											'valor_indicador',
										]) && $valido;
					}
				}
				
				
				if( $valido )
				{
					$models['encabezado']->estado = 1;
					$models['encabezado']->save(false);
					
					foreach( $models['detalle'] as $keyDet => $valueDetalle )
					{
						$valueDetalle['misional']->id_enc_artistica_misional = $models['encabezado']->id;
						$valueDetalle['misional']->estado = 1;
						$valueDetalle['misional']->save(false);
						
						foreach( $valueDetalle['actividades'] as $key => $actividad )
						{
							$actividad->estado = 1;
							$actividad->id_det_artistica_misional = $valueDetalle['misional']->id;
							$actividad->save(false);
						}
						
						foreach( $valueDetalle['indicadores'] as $key => $indicador )
						{
							$indicador->id_det_artisctica_misional = $valueDetalle['misional']->id;
							$indicador->id_indicador = $valueDetalle['misional']->id;
							$indicador->estado = 1;
							$indicador->save(false);
						}
					}
					
					$guardado = true;
				}
			}
		}
		
		//Por cada encabezado debe haber dos detalles
		//que es lo mismo a: por cada modelo de encabezado debe haber dos modeles de detalle
		for( $i = 0; $i < 2; $i++ )
		{
			if( empty( $models['detalle'][$i] ) )
			{
				if( empty($models['detalle'][$i]['misional']) )
				{
					$models['detalle'][$i]['misional'] = new IsaDetArtisticaMisional();
				}
				
				if( empty( $models['detalle'][$i]['actividades']) )
				{
					//Por cada detalle debe haber dos detalles misionales por actividad
					for( $j = 0; $j < $totalActividades[$i]; $j++ )
					{
						$models['detalle'][$i]['actividades'][$j] = new IsaDetMisionalArtisticaXActividad();
					}
				}
				
				//Por cada detalle debe haber dos detalles misionales por actividad
				for( $j = 0; $j < $totalIndicadores[$i]; $j++ )
				{
					$models['detalle'][$i]['indicadores'][$j] = new IsaIndicadoresXDetArtisticaMisional();
				}
			}
		}
		
		if( empty($indicadores) )
		{	
			for( $i = 0; $i < 4; $i++ )
			{
				$indicadores[0][] = IsaIndicadores::findOne( $idsIndicadores[ $i ] );
			}
			
			for( $i = 4; $i < 6; $i++ )
			{
				$indicadores[1][] = IsaIndicadores::findOne( $idsIndicadores[ $i ] );
			}
		}
		
		for( $i = 0; $i < 3; $i++ )
		{
			$actividades[0][] = IsaActividadesArtisticas::findOne( $i+1 );
		}
		
		$actividades[1][0] = IsaActividadesArtisticas::findOne( 4 );

        return $this->render('create', [
            'model' 		=> $models['encabezado'],
            'models' 		=> $models,
            'institucion' 	=> $institucion,
            'sede' 			=> $sede,
            'indicadores'	=> $indicadores,
            'actividades'	=> $actividades,
            'guardado'		=> $guardado,
        ]);
    }

    /**
     * Updates an existing IsaEncArtisticaMisional model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
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
     * Deletes an existing IsaEncArtisticaMisional model.
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
     * Finds the IsaEncArtisticaMisional model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return IsaEncArtisticaMisional the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IsaEncArtisticaMisional::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
