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

/**********
Versión: 002
Fecha: 16-04-2018
Desarrollador: Oscar David Lopez
Descripción: Forulario informe planeacion IEO
---------------------------------------
Modificaciones:
Fecha: 16-04-2018
Persona encargada: Oscar David Lopez
Cambios realizados: Se reestructua el formulario, reduccion de codigo y correcion de errores

---------------------------------------
**********/


use Yii;
use app\models\EcInformePlaneacionIeo;
use app\models\EcInformePlaneacionIeoSearch;
use app\models\EcProyectos;
use app\models\EcProcesos;
use app\models\EcAvances;
use app\models\EcRespuestas;
use app\models\EcInformePlaneacionProyectos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ComunasCorregimientos;
use app\models\BarriosVeredas;
use yii\helpers\ArrayHelper;
use app\models\Instituciones;
use app\models\Sedes;
use app\models\Parametro;
use yii\bootstrap\Collapse;

/**
 * EcinformeplaneacionieoController implements the CRUD actions for EcInformePlaneacionIeo model.
 */
class EcinformeplaneacionieoController extends Controller
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

    function actionViewfases($model,$form,$datos = 0,$datoRespuesta=0,$datoInformePlaneacionProyectos=0)
	{
        
       $ecProyectos = EcProyectos::find()->where( 'estado=1' )->orderby('id ASC')->all();
       $numProyectos = count($ecProyectos);

	   $modelProyectos = new EcProyectos();
		$estadoActual = [ 
					1 => '1',
					2 => '2',
					3 => '3',
					4 => '4'
				];
		 
		$ecProyectos = ArrayHelper::map($ecProyectos,'id','descripcion');
		foreach ($ecProyectos as $idProyecto => $v)
		{
			
			 $contenedores[] = 	
				[
					'label' 		=>  $v,
					'content' 		=>  $this->renderPartial( 'procesos', 
													[  
                                                        'idProyecto' => $idProyecto,
														'form' => $form,
														'estadoActual' => $estadoActual,
														'modelProyectos' =>  $modelProyectos,
														'datos'=>$datos,
														'datoRespuesta'=> $datoRespuesta,
														'datoInformePlaneacionProyectos'=> $datoInformePlaneacionProyectos,
													] 
										),
					'contentOptions'=> []
				];
				
				
		}
		
		 echo Collapse::widget([
			'items' => $contenedores,
		]);
		 
		 
		
    }

	public function obtenerParametros()
	{
		//parametros de Fases informe planeación IEO
		$dataParametros = Parametro::find()
						->where( 'id_tipo_parametro=24' )
						->andWhere( 'estado=1' )
						->orderby( 'id' )
						->all();
						
		$parametros		= ArrayHelper::map( $dataParametros, 'id', 'descripcion' );
		
		return $parametros;
	
	}

    /**
     * Lists all EcInformePlaneacionIeo models.
     * @return mixed
     */
    public function actionIndex()
    {
		$idSedes 		= $_SESSION['sede'][0];
        $searchModel = new EcInformePlaneacionIeoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->query->andWhere( "estado=1 and id_sede= $idSedes" ); 

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

	public function obtenerSedes()
	{
		$idSedes 		= $_SESSION['sede'][0];
		$sedes = new Sedes();
		$sedes = $sedes->find()->where("id =  $idSedes")->all();
		$sedes = ArrayHelper::map($sedes,'id','descripcion');
		
		return $sedes;
	}
	
	public function obtenerInstituciones()
	{
		$idInstitucion = $_SESSION['instituciones'][0];
		$instituciones = new Instituciones();
		$instituciones = $instituciones->find()->where("id = $idInstitucion")->all();
		$instituciones = ArrayHelper::map($instituciones,'id','descripcion');
		
		return $instituciones;
	}
	
	
    /**
     * Displays a single EcInformePlaneacionIeo model.
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
     * Creates a new EcInformePlaneacionIeo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EcInformePlaneacionIeo();

        if ($model->load(Yii::$app->request->post())) 
		{
			
			$model->save();
			$post = Yii::$app->request->post();
			
			$idInforme = $model->id;
			$arrayDatosEcAvances = $post['EcAvances'];
			
			//se agrega el id del informe despues de haber sido creado 
			foreach($arrayDatosEcAvances as $datos => $valores)
			{
				$arrayDatosEcAvances[$datos]['id_informe']=$idInforme;
			}
			
			$columnNameArrayEcAvances=['estado_actual','logros','retos','argumentos','id_acciones','estado','id_informe'];
			
			// inserta todos los datos que trae el array en posicon EcAvances
			$insertCount = Yii::$app->db->createCommand()
                   ->batchInsert(
                         'ec.avances', $columnNameArrayEcAvances, $arrayDatosEcAvances
                     )
					 ->execute();
					 
			$arrayDatosEcRespuestas = $post['EcRespuestas'];
			
				//se agrega el id del informe despues de haber sido creado 
			foreach($arrayDatosEcRespuestas as $datos => $valores)
			{
				$arrayDatosEcRespuestas[$datos]['id_informe']=$idInforme;
			}
			
			$columnNameArrayEcRespuestas=['respuesta','id_estrategia','estado','id_informe'];
			//inserta todos los datos que trae el array en posicon EcRespuestas
			$insertCount = Yii::$app->db->createCommand()
                   ->batchInsert(
                         'ec.respuestas', $columnNameArrayEcRespuestas, $arrayDatosEcRespuestas
                     )
					 ->execute();
			
			
			$arrayDatosEcInformePlaneacionProyectos = $post['EcInformePlaneacionProyectos'];
			
			//se agrega el id del informe despues de haber sido creado 
			foreach($arrayDatosEcInformePlaneacionProyectos as $datose => $valorese)
			{
				$arrayDatosEcInformePlaneacionProyectos[$datose]['id_informe']=$idInforme;
			}

			$columnNameArrayEcInformePlaneacionProyectos=['horario_de_trabajo_docentes','id_proyecto','estado','id_informe_planeacion'];
			
			// inserta todos los datos que trae el array en posicon EcInformePlaneacionProyectos
			$insertCount = Yii::$app->db->createCommand()
                   ->batchInsert(
                         'ec.informe_planeacion_proyectos', $columnNameArrayEcInformePlaneacionProyectos, $arrayDatosEcInformePlaneacionProyectos
                     )
					 ->execute();
			
			
            return $this->redirect(['index']);
        }

		$idSedes 		= $_SESSION['sede'][0];
		
		$sedes = Sedes::findOne($idSedes );
		$idSedesComunas = @$sedes->comuna; 
		$idSedesBarrios = @$sedes->id_barrios_veredas;
		$codigoDane = @$sedes->codigo_dane;
		$comunas = @ComunasCorregimientos::findOne($idSedesComunas);
		if ( @$comunas->descripcion != null)
			$comunas = $comunas->descripcion;
		else
			$comunas ="No asignada";

		$barrios = @BarriosVeredas::findOne($idSedesBarrios);
		if ( @$barrios->descripcion != null)
			$barrios = $barrios->descripcion;
		else
			$barrios ="No asignado";
		
		
        return $this->renderAjax('create', [
			'model' => $model,           
			'comunas' => $comunas,
            'barrios' => $barrios,
			'sedes'=> $this->obtenerSedes(),
			'instituciones' => $this->obtenerInstituciones(),
			'fases' =>$this->obtenerParametros(),
			'codigoDane' => $codigoDane,
			
        ]);
    }

    /**
     * Updates an existing EcInformePlaneacionIeo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) 
		{
			
			// echo "<pre>"; print_r(Yii::$app->request->post()); echo "</pre>"; 
			// die;
			$model->save();
			$post = Yii::$app->request->post();
			
			$idInforme = $model->id;
			$arrayDatosEcAvances = $post['EcAvances'];
			
			//se agrega el id del informe despues de haber sido creado 
			$connection = Yii::$app->getDb();
			foreach($arrayDatosEcAvances as $idAcciones => $valores)
			{
				$arrayDatosEcAvances[$idAcciones]['id_informe']=$idInforme;
				
				$command = $connection->createCommand
				(" 
					UPDATE ec.avances set 			
					estado_actual 	='". $valores['estado_actual']."',
					logros			='" .$valores['logros']."',
					retos			='". $valores['retos']."',
					argumentos		='". $valores['argumentos']."'
					WHERE id_acciones = $idAcciones and id_informe = $idInforme
				");
				$result = $command->queryAll();
			}
			
					 
			$arrayDatosEcRespuestas = $post['EcRespuestas'];
			
			foreach($arrayDatosEcRespuestas as $idRespuestas => $val)
			{
				$command = $connection->createCommand
				(" 
					UPDATE ec.respuestas set 			
					respuesta		='". $val['respuesta']."'
					WHERE id_estrategia = $idRespuestas and id_informe = $idInforme
				");
				$result = $command->queryAll();
			}
			
			$arrayDatosEcInformePlaneacionProyectos = $post['EcInformePlaneacionProyectos'];
			
			foreach($arrayDatosEcInformePlaneacionProyectos as $idRespuestas => $val)
			{
				$command = $connection->createCommand
				(" 
					UPDATE ec.informe_planeacion_proyectos set 			
					horario_de_trabajo_docentes		='". $val['horario_de_trabajo_docentes']."'
					WHERE id_informe_planeacion = $idInforme and id_proyecto =  $idRespuestas
				");
				$result = $command->queryAll();
			}
			
            return $this->redirect(['index']);
        }

		$idSedes 		= $_SESSION['sede'][0];
		$sedes = Sedes::findOne($idSedes );
		
		
		$ecAvances = new EcAvances();
		$ecAvances = $ecAvances->find()->orderby("id")->andWhere("id_informe=$id")->all();
		
		//se trae la informacionde la basse de datos tabla ec.avances
		$result = ArrayHelper::getColumn($ecAvances, function ($element) 
		{
			$dato[$element['id_acciones']]['estado_actual']= $element['estado_actual'];
			$dato[$element['id_acciones']]['logros']= $element['logros'];
			$dato[$element['id_acciones']]['retos']= $element['retos'];
			$dato[$element['id_acciones']]['argumentos']= $element['argumentos'];
			return $dato;
		});
		
		
		//se formate la informacion que deben tener los campos tabla ec.avances
		foreach	($result as $r => $valor)
		{
			foreach	($valor as $ids => $valores)
				
				$datos[$ids] = $valores;
		}
	
		
		$ecRespuestas = new EcRespuestas();
		$ecRespuestas = $ecRespuestas->find()->orderby("id")->andWhere("id_informe=$id")->all();
		$datoRespuesta = ArrayHelper::map($ecRespuestas,'id_estrategia','respuesta');
		
		
		$ecInformePlaneacionProyectos= new EcInformePlaneacionProyectos();
		$ecInformePlaneacionProyectos = $ecInformePlaneacionProyectos->find()->orderby("id")->andWhere("id_informe_planeacion=$id")->all();
		$datoInformePlaneacionProyectos = ArrayHelper::map($ecInformePlaneacionProyectos,'id_proyecto','horario_de_trabajo_docentes');
		
		
		//se formate la informacion que deben tener los campos tabla ec.avances
		
		
		
		$idSedesComunas = @$sedes->comuna; 
		$idSedesBarrios = @$sedes->id_barrios_veredas;
		$codigoDane = @$sedes->codigo_dane;
		$comunas = @ComunasCorregimientos::findOne($idSedesComunas);
		if ( @$comunas->descripcion != null)
			$comunas = $comunas->descripcion;
		else
			$comunas ="No asignada";

		$barrios = @BarriosVeredas::findOne($idSedesBarrios);
		if ( @$barrios->descripcion != null)
			$barrios = $barrios->descripcion;
		else
			$barrios ="No asignado";
		
		$informacoin;
        return $this->renderAjax('update', [
            'model' => $model,
			'comunas' => $comunas,
            'barrios' => $barrios,
			'sedes'=> $this->obtenerSedes(),
			'instituciones' => $this->obtenerInstituciones(),
			'fases' =>$this->obtenerParametros(),
			'codigoDane' => $codigoDane,
			'datos'=>$datos,
			'datoRespuesta'=>$datoRespuesta,
			'datoInformePlaneacionProyectos'=>$datoInformePlaneacionProyectos
			
        ]);
    }

    /**
     * Deletes an existing EcInformePlaneacionIeo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
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
     * Finds the EcInformePlaneacionIeo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EcInformePlaneacionIeo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EcInformePlaneacionIeo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
