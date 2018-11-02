<?php
/**********
Versión: 001
Fecha: Fecha en formato (15-08-2018)
Desarrollador: Viviana Rodas
Descripción: diario de campo semilleros tic
******************/

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
use app\models\SemillerosTicDiarioDeCampo;
use app\models\SemillerosTicDiarioDeCampoBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Fases;
use yii\helpers\ArrayHelper;
use app\models\SemillerosTicCiclos;
use app\models\SemillerosTicAnio;
use app\models\Parametro;
use app\models\DatosIeoProfesional;
use app\models\EjecucionFase;


/**
 * SemillerosTicDiarioDeCampoController implements the CRUD actions for SemillerosTicDiarioDeCampo model.
 */
class SemillerosTicDiarioDeCampoController extends Controller
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
     * Lists all SemillerosTicDiarioDeCampo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SemillerosTicDiarioDeCampoBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SemillerosTicDiarioDeCampo model.
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
     * Creates a new SemillerosTicDiarioDeCampo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$ciclos = new SemillerosTicCiclos();
		
		$ciclos->load( Yii::$app->request->post() );
		
        $model = new SemillerosTicDiarioDeCampo();

		//se crea una instancia del modelo fases
		$fasesModel 		 	= new Fases();
		//se traen los datos de fases
		$dataFases		 	= $fasesModel->find()->orderby( 'id' )->all();
		//se guardan los datos en un array
		$fases	 	 	 	= ArrayHelper::map( $dataFases, 'id', 'descripcion' );
		
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
		
		$dataAnios 	= SemillerosTicAnio::find()
							->where( 'estado=1' )
							->orderby( 'descripcion' )
							->all();
			
		$anios	= ArrayHelper::map( $dataAnios, 'id', 'descripcion' );
		
		$cicloslist = [];
		
		// if( $ciclos->id_anio ){
			
			$dataCiclos = SemillerosTicCiclos::find()
							->where( 'estado=1' )
							->where( 'id_anio=1' )
							->orderby( 'descripcion' )
							->all();
			
			$cicloslist	= ArrayHelper::map( $dataCiclos, 'id', 'descripcion' );
		// }

		
        return $this->renderAjax('create', [
            'model' => $model,
            'fases' => $fases,
            'fasesModel' => $fasesModel,
            'ciclos' => $ciclos,
            'cicloslist' => $cicloslist,
            'anios' => $anios,
        ]);
    }

    /**
     * Updates an existing SemillerosTicDiarioDeCampo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $ciclos = new SemillerosTicCiclos();
		
		$ciclos->load( Yii::$app->request->post() );
		
        $model = new SemillerosTicDiarioDeCampo();
		
		$model = $this->findModel($id);

		//se crea una instancia del modelo fases
		$fasesModel 		 	= new Fases();
		//se traen los datos de fases
		$dataFases		 	= $fasesModel->find()->all();
		//se guardan los datos en un array
		$fases	 	 	 	= ArrayHelper::map( $dataFases, 'id', 'descripcion' );
		
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
		
		$dataAnios 	= SemillerosTicAnio::find()
							->where( 'estado=1' )
							->all();
			
		$anios	= ArrayHelper::map( $dataAnios, 'id', 'descripcion' );
		
		$cicloslist = [];
		
		// if( $ciclos->id_anio ){
			
			$dataCiclos = SemillerosTicCiclos::find()
							->where( 'estado=1' )
							->where( 'id_anio=1' )
							->all();
			
			$cicloslist	= ArrayHelper::map( $dataCiclos, 'id', 'descripcion' );
		// }

        return $this->renderAjax('update', [
            'model' => $model,
            'fases' => $fases,
            'fasesModel' => $fasesModel,
			'ciclos' => $ciclos,
            'cicloslist' => $cicloslist,
            'anios' => $anios,
        ]);
    }

    /**
     * Deletes an existing SemillerosTicDiarioDeCampo model.
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
     * Finds the SemillerosTicDiarioDeCampo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SemillerosTicDiarioDeCampo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SemillerosTicDiarioDeCampo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	/**
     * Esta funcion lista las opciones de la ejecución diario de campo
     * 
     * @param Recibe id fase
     * @return la lista de los campos
     * @throws no tiene excepciones
     */	
	public function actionOpcionesEjecucionDiarioCampo($idFase, $idAnio, $idCiclo)
    {
       $data = array('mensaje'=>'','html'=>'','contenido'=>'','descripcion'=>'','hallazgos'=>'','html1'=>'','contenido1'=>'',);
	   
	   //se crea una instancia del modelo parametro
		$parametroTable 		 	= new Parametro();
		
		//Para traer las descripciones de los encabezados
		if ($idFase == 14) {$idParametro = 9;}
		elseif ($idFase == 15) {$idParametro = 10;}
		elseif ($idFase == 16) {$idParametro = 11;}
		
		//se traen los datos de paramero								  
		$dataParametro		 	= $parametroTable->find()->where('estado=1 and id_tipo_parametro ='.$idParametro)->all();										  
		//se guardan los datos en un array
		$opcionesEjecucion	 	 	 = ArrayHelper::map( $dataParametro, 'id', 'descripcion' );
		
		
		//se debe consultar el año, el ciclo y la fase para llegar a los datos de la fase
		
		//se crean las instancias de los modelos para traer los textos la base de datos
		$datosIeoProfesional = new DatosIeoProfesional();
		$ejecucionFase = new EjecucionFase();
		
		//se hacen las consultas
		/**
		* Concexion a la db, traer los textos segun la fase
		*/
		//variable con la conexion a la base de datos 
		
		// $connection = Yii::$app->getDb();
		// $perfilesSelected =array();
		// $command = $connection->createCommand("select ef.id_fase, ef.asignaturas, ef.especiaidad, ef.seiones_empleadas
		// from semilleros_tic.anio as a, semilleros_tic.ciclos as c, semilleros_tic.fases as f, semilleros_tic.ejecucion_fase as ef
		// where a.id = 2
		// and c.id = 4
		// and f.id = 1
		// and ef.id_fase = f.id;");
		// $result = $command->queryAll();
		
		
		
		
		
		//Para traer las descripciones para ingresar el texto
		if ($idFase == 14) {$idParametro = 78;}
		elseif ($idFase == 15) {$idParametro = 79;}
		elseif ($idFase == 16) {$idParametro = 80;}
		
		//se crea una instancia del modelo parametro
		$descripcionTexto = Parametro::findOne($idParametro)->descripcion;
		
		
		$data['descripcion']=$descripcionTexto;
		
		//Para traer los hallazgos
		if ($idFase == 14) {$idParametro = 81;}
		elseif ($idFase == 15) {$idParametro = 82;}
		elseif ($idFase == 16) {$idParametro = 85;}
		
		//se crea una instancia del modelo parametro
		$hallazgosTexto = Parametro::findOne($idParametro)->descripcion;
		
		
		$data['hallazgos']=$hallazgosTexto;

        
	 
	
		$data['html']="";
		$data['contenido']="";
		$data['html1']="";
		$data['contenido1']="";
		$contador =0;
		
		
		//este foreach toma los primeros 4 resultados de la consulta y los formatea para mostrarlos
		foreach ($opcionesEjecucion as $key => $value)
		{
			
			$contador++;
			$data['html'].="<div class='col-xs-3'>";
			$data['html'].=$value;
			$data['html'].="</div>";
			
			$data['contenido'].="<div class='col-xs-3' >";
			$data['contenido'].="dddddd";
			$data['contenido'].="</div>";
			
			// unset(current($opcionesEjecucion));
			array_shift($opcionesEjecucion);
			if ($contador ==4)
				break;
			
		}
		
		//este foreach toma los ultimos 4 resultados de la consulta y los formatea para mostrarlos
		foreach ($opcionesEjecucion as $key => $value)
		{
			
			$data['html1'].="<div class='col-xs-3'>";
			$data['html1'].=$value;
			$data['html1'].="</div>";
			
			$data['contenido1'].="<div class='col-xs-3' >";
			$data['contenido1'].="dddddd";
			$data['contenido1'].="</div>";
		}
		
		echo json_encode( $data );
    }
}
