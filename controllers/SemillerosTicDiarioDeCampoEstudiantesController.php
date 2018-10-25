<?php
/**********
Versión: 001
Fecha: Fecha en formato (30-08-2018)
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
use app\models\SemillerosTicDiarioDeCampoEstudiantes;
use app\models\SemillerosTicDiarioDeCampoEstudiantesBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\SemillerosTicFases;
use app\models\SemillerosTicCiclos;
use app\models\SemillerosTicAnio;
use yii\helpers\ArrayHelper;
use app\models\Parametro;

/**
 * SemillerosTicDiarioDeCampoEstudiantesController implements the CRUD actions for SemillerosTicDiarioDeCampoEstudiantes model.
 */
class SemillerosTicDiarioDeCampoEstudiantesController extends Controller
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
     * Lists all SemillerosTicDiarioDeCampoEstudiantes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SemillerosTicDiarioDeCampoEstudiantesBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SemillerosTicDiarioDeCampoEstudiantes model.
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
     * Creates a new SemillerosTicDiarioDeCampoEstudiantes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$ciclos = new SemillerosTicCiclos();
		
		$ciclos->load( Yii::$app->request->post() );
		
        $model = new SemillerosTicDiarioDeCampoEstudiantes();

		//se crea una instancia del modelo fases
		$fasesModel 		 	= new SemillerosTicFases();
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
     * Updates an existing SemillerosTicDiarioDeCampoEstudiantes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		//se crea una instancia del modelo fases
		$fasesModel 		 	= new SemillerosTicFases();
		//se traen los datos de fases
		$dataFases		 	= $fasesModel->find()->all();
		//se guardan los datos en un array
		$fases	 	 	 	= ArrayHelper::map( $dataFases, 'id', 'descripcion' );
		
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax('update', [
            'model' => $model,
			'fases' => $fases,
            'fasesModel' => $fasesModel,
        ]);
    }

    /**
     * Deletes an existing SemillerosTicDiarioDeCampoEstudiantes model.
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
     * Finds the SemillerosTicDiarioDeCampoEstudiantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SemillerosTicDiarioDeCampoEstudiantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SemillerosTicDiarioDeCampoEstudiantes::findOne($id)) !== null) {
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
	public function actionOpcionesEjecucionDiarioCampo($idFase,$descripcion,$hallazgo)
    {
       $data = array('mensaje'=>'','html'=>'','contenido'=>'','descripcion'=>'','hallazgo'=>'');
	   
	   //se crea una instancia del modelo parametro
		$parametroTable 		 	= new Parametro();
		//se traen los datos de paramero								  
		$dataParametroFase		 	= $parametroTable->find()->where('estado=1 and id_tipo_parametro ='.$idFase)->all();										  
		//se guardan los datos en un array
		$opcionesEjecucionFase	 	 	 = ArrayHelper::map( $dataParametroFase, 'id', 'descripcion' );

		
		
		//se traen los datos de paramero para descripcion							  
		$dataParametroDescripcion		 	= $parametroTable->find()->where('estado=1 and id_tipo_parametro ='.$descripcion)->all();										  
		//se guardan los datos en un array
		$opcionesEjecucionDescripcion	 	 	 = ArrayHelper::map( $dataParametroDescripcion, 'id', 'descripcion' );

		
		//se traen los datos de paramero para hallazgo							  
		$dataParametroHallazgo		 	= $parametroTable->find()->where('estado=1 and id_tipo_parametro ='.$hallazgo)->all();										  
		//se guardan los datos en un array
		$opcionesEjecucionHallazgo	 	 = ArrayHelper::map( $dataParametroHallazgo, 'id', 'descripcion' );

        
		$data['html']="";
		$data['contenido']="";
		$data['descripcion']=$opcionesEjecucionDescripcion;
		$data['hallazgo']=$opcionesEjecucionHallazgo;
		
		foreach ($opcionesEjecucionFase as $key => $value)
		{
			// print_r($key."-".$value);
			
			$data['html'].="<div class='col-sm-1' style='padding:0px;'>";
			$data['html'].="<span total class='form-control' style='background-color:#ccc;height:110px;'>".$value."</span>";
			$data['html'].="</div>";
			
			$data['contenido'].="<div class='col-sm-1' style='padding:0px;background-color:#fff;height:100px'>";
			$data['contenido'].="&nbsp;&nbsp;&nbsp;&nbsp;";
			$data['contenido'].="</div>";
		}
        
		echo json_encode( $data );
    }
}
