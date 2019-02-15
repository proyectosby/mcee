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
use app\models\Instituciones;
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
			
		
		$instituciones = Instituciones::find()->andWhere(" estado =1 ")->orderby( 'id' )->all();
		$instituciones = ArrayHelper::map( $instituciones, 'id', 'descripcion' );		
			
			
        $connection = Yii::$app->getDb();
		$command = $connection->createCommand("
		select 
			ise.institucion_id, 
			ise.sede_id,
			ise.id_tipo_informe,
			ai.avance_sede,
			ai.avance_ieo,
			ai.actividad_1_porcentaje,
			ai.actividad_2_porcentaje,
			ai.actividad_3_porcentaje,
			ise.fecha_inicio,
			ise.fecha_fin
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
		foreach ($result as $r)
		{	
			$datos[$r['fecha_inicio']. " A " .$r['fecha_fin']][$r['institucion_id']][$r['sede_id']][$r['id_tipo_informe']]['avance_sede'] = $r['avance_sede'];
			$datos[$r['fecha_inicio']. " A " .$r['fecha_fin']][$r['institucion_id']][$r['sede_id']][$r['id_tipo_informe']]['actividad_1_porcentaje'] = $r['actividad_1_porcentaje'];
			$datos[$r['fecha_inicio']. " A " .$r['fecha_fin']][$r['institucion_id']][$r['sede_id']][$r['id_tipo_informe']]['actividad_2_porcentaje'] = $r['actividad_2_porcentaje'];
			$datos[$r['fecha_inicio']. " A " .$r['fecha_fin']][$r['institucion_id']][$r['sede_id']][$r['id_tipo_informe']]['actividad_3_porcentaje'] = $r['actividad_3_porcentaje'];	
		}
		
		// echo "<pre>"; print_r($datos); echo "</pre>"; 
		
		$avanceSede = [];
		$avanceIEO = [];
		$activiadad1 = [];
		foreach($datos as $key => $valor)
		{
			foreach($valor as $ieo)
			{
				foreach($ieo as $sede)
				{
					//Saber cuantas sedes estan al 100% en el rango de fecha (semana)
					//PPT 7
					if(@$sede[7]['avance_sede'] == 100)
					{
						@$avanceSede[$key][7]+= 1;
					}
					
					//PSSE	19
					if(@$sede[19]['avance_sede'] == 100)
					{
						@$avanceSede[$key][19]+= 1;
					}
					
					//PAF 31
					if(@$sede[31]['avance_sede'] == 100)
					{
						@$avanceSede[$key][31]+= 1;
					}
					
					@$activiadades[$key][7]['actividad_1_porcentaje'] += $sede[7]['actividad_1_porcentaje'];
					@$activiadades[$key][7]['actividad_2_porcentaje'] += $sede[7]['actividad_2_porcentaje'];
					@$activiadades[$key][7]['actividad_3_porcentaje'] += $sede[7]['actividad_3_porcentaje'];
					@$activiadades[$key][19]['actividad_1_porcentaje'] += $sede[19]['actividad_1_porcentaje'];
					@$activiadades[$key][19]['actividad_2_porcentaje'] += $sede[19]['actividad_2_porcentaje'];
					@$activiadades[$key][19]['actividad_3_porcentaje'] += $sede[19]['actividad_3_porcentaje'];
					@$activiadades[$key][31]['actividad_1_porcentaje'] += $sede[31]['actividad_1_porcentaje'];
					@$activiadades[$key][31]['actividad_2_porcentaje'] += $sede[31]['actividad_2_porcentaje'];
					@$activiadades[$key][31]['actividad_3_porcentaje'] += $sede[31]['actividad_3_porcentaje'];
					
				}
				
					//Saber cuantas IEO estan al 100% en el rango de fecha (semana)
				//PPT 7
				if(@$avanceSede[$key][7] / count($ieo) == 1)
				{
					@$avanceIEO[$key][7]+=1;
				}
					
				//PSSE	19
				if(@$avanceSede[$key][19] / count($ieo) == 1)
				{
					@$avanceIEO[$key][19]+=1;
				}
				
				//PAF 31
				if(@$avanceSede[$key][31] / count($ieo) == 1)
				{
					@$avanceIEO[$key][31]+=1;
				}
			}
		}
		
	
		
		$porcentajeIEO = [];
		$cantidadIEO = count($instituciones);

		foreach($avanceIEO as $key => $aIEO) 
		{
			@$porcentajeIEO[$key][7] = round ( $aIEO[7] / 45  * 100) . "%";
			@$porcentajeIEO[$key][19] = round ( $aIEO[19] / 45  * 100) . "%";
			@$porcentajeIEO[$key][31] = round ( $aIEO[31] / 45 * 100) . "%";
		}
		// echo "<pre>"; print_r($porcentajeIEO); echo "</pre>"; 		
		
		// echo "<pre>"; print_r($avanceIEO); echo "</pre>"; 
		
		//porcentaje sobre la actividad 1 2 y 3
		$cantidadSedes = count($sedes);
		
		foreach($activiadades as $key => $actividad )
		{
			@$activiadades[$key][7]['actividad_1_porcentaje'] = round ( $actividad[7]['actividad_1_porcentaje'] / $cantidadSedes * 100 ) . "%";
			@$activiadades[$key][7]['actividad_2_porcentaje'] = round ( $actividad[7]['actividad_2_porcentaje'] / $cantidadSedes * 100 ) . "%";
			@$activiadades[$key][7]['actividad_3_porcentaje'] = round ( $actividad[7]['actividad_3_porcentaje'] / $cantidadSedes * 100 ) . "%";
			@$activiadades[$key][19]['actividad_1_porcentaje'] = round ( $actividad[19]['actividad_1_porcentaje'] / $cantidadSedes * 100 ) . "%";
			@$activiadades[$key][19]['actividad_2_porcentaje'] = round ( $actividad[19]['actividad_2_porcentaje'] / $cantidadSedes * 100 ) . "%";
			@$activiadades[$key][19]['actividad_3_porcentaje'] = round ( $actividad[19]['actividad_3_porcentaje'] / $cantidadSedes * 100 ) . "%";
			@$activiadades[$key][31]['actividad_1_porcentaje'] = round ( $actividad[31]['actividad_1_porcentaje'] / $cantidadSedes * 100 ) . "%";
			@$activiadades[$key][31]['actividad_2_porcentaje'] = round ( $actividad[31]['actividad_2_porcentaje'] / $cantidadSedes * 100 ) . "%";
			@$activiadades[$key][31]['actividad_3_porcentaje'] = round ( $actividad[31]['actividad_3_porcentaje'] / $cantidadSedes * 100 ) . "%";
		}
	
		$porcentajesSedes = [];
		foreach ($avanceSede as $key => $aSedes )
		{
			@$porcentajesSedes[$key][7] = round ( $aSedes[7] / $cantidadSedes  * 100) . "%";
			@$porcentajesSedes[$key][19] = round ( $aSedes[19] / 59  * 100) . "%";
			@$porcentajesSedes[$key][31] = round ( $aSedes[31] / $cantidadSedes * 100) . "%";
		}
		
			
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("
		SELECT 
			ise.fecha_inicio,
			ise.fecha_fin,
			ise.id_tipo_informe,
			tcpi.tiempo_libre, 
			tcpi.edu_derechos, 
			tcpi.sexualidad_ciudadania, 
			tcpi.medio_ambiente,
			tcpi.familia,
			tcpi.directivos
		FROM 
			ec.tipo_cantidad_poblacion_ise as tcpi, 
			ec.informe_semanal_ejecucion_ise as ise
		WHERE 
			tcpi.id_informe_semanal_ejecucion_ise  = ise.id
		");
		$result1 = $command->queryAll();
		
		
			
		
		echo "<pre>"; print_r($result1); echo "</pre>"; 
		
		$poblacionBenficiadaDirecta =  [];
		foreach($result1 as $d )
		{
			@$poblacionBenficiadaDirecta[$d['fecha_inicio'] . " A " .$d['fecha_fin']][$d['id_tipo_informe']] += $d['tiempo_libre'];
            @$poblacionBenficiadaDirecta[$d['fecha_inicio'] . " A " .$d['fecha_fin']][$d['id_tipo_informe']] += $d['edu_derechos'];
            @$poblacionBenficiadaDirecta[$d['fecha_inicio'] . " A " .$d['fecha_fin']][$d['id_tipo_informe']] += $d['sexualidad_ciudadania'];
            @$poblacionBenficiadaDirecta[$d['fecha_inicio'] . " A " .$d['fecha_fin']][$d['id_tipo_informe']] += $d['medio_ambiente'];
			
		}
		
		
		$poblacionBenficiadaIndirecta
		foreach($result1 as $d )
		{
			@$poblacionBenficiadaIndirecta[$d['fecha_inicio'] . " A " .$d['fecha_fin']][$d['id_tipo_informe']] += $d['familia'];
            @$poblacionBenficiadaIndirecta[$d['fecha_inicio'] . " A " .$d['fecha_fin']][$d['id_tipo_informe']] += $d['directivos'];
		}
		echo "<pre>"; print_r($poblacionBenficiada); echo "</pre>"; 
		
		//porcentaje sobre Sedes
		die;
	
	
		
        $model = new EcInformeSemanalTotalEjecutivo();
    
        return $this->render('create', [
            'model' => $model,
            'guardado' => 0,
       
			
        ]);
    }
	
	public function porcentaje($valor , $porcentaje)
	{
		return  explode(".",$valor / $porcentaje * 100 )[0] . "%" ;
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
