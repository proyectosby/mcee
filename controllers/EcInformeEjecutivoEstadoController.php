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
use app\models\EcInformeEjecutivoEstado;
use app\models\EcInformeEjecutivoEstadoBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Instituciones;
use app\models\EcProyectos;
use app\models\PerfilesXPersonas;
use app\models\Personas;
use app\models\PerfilesXPersonasInstitucion;



/**
 * EcInformeEjecutivoEstadoController implements the CRUD actions for EcInformeEjecutivoEstado model.
 */
class EcInformeEjecutivoEstadoController extends Controller
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
     * Lists all EcInformeEjecutivoEstado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EcInformeEjecutivoEstadoBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EcInformeEjecutivoEstado model.
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

	public function obtenerNombresXPerfiles($idPerfil)
	{
		$idInstitucion 	= $_SESSION['instituciones'][0];
		/**
		* Llenar nombre de los cooordinadores-eje
		*/
		//variable con la conexion a la base de datos 
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("
			SELECT ppi.id, concat(pe.nombres,' ',pe.apellidos) as nombres
			FROM perfiles_x_personas as pp, 
			personas as pe,
			perfiles_x_personas_institucion ppi
			WHERE pp.id_personas = pe.id
			AND pp.id_perfiles = $idPerfil
			AND ppi.id_perfiles_x_persona = pp.id
			AND ppi.id_institucion = $idInstitucion
		");
		$result = $command->queryAll();
		$nombresPerfil = array();
		foreach ($result as $r)
		{
			$nombresPerfil[$r['id']]= $r['nombres'];
		}
		
		return $nombresPerfil;
	}
	
	
	public function obtenerNombrePersona()
	{
		$idPersona 	= $_SESSION['perfilesxpersonas'];
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("
			SELECT pp.id, concat(pe.nombres,' ',pe.apellidos) as nombres
			FROM perfiles_x_personas as pp, 
			personas as pe
			WHERE pp.id_personas = pe.id
            and pp.id = $idPersona
		");
		$result = $command->queryAll();
		$persona = array();
		foreach ($result as $r)
		{
			$persona[$r['id']]= $r['nombres'];
		}
		
		return $persona;
		
	}
	
	public function obtenerInstituciones()
	{
		$idInstitucion = $_SESSION['instituciones'][0];
		$instituciones = new Instituciones();
		$instituciones = $instituciones->find()->where("id = $idInstitucion")->all();
		$instituciones = ArrayHelper::map($instituciones,'id','descripcion');
		
		return $instituciones;
	}
	
	
	public function obtenerProyectosEjes()
	{
		
		$ejes = new EcProyectos();
		$ejes = $ejes->find()->orderby("id")->all();
		$ejes = ArrayHelper::map($ejes,'id','descripcion');
		
		return $ejes;
	}
	
    /**
     * Creates a new EcInformeEjecutivoEstado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$idInstitucion 	= $_SESSION['instituciones'][0];
		
		
        $model = new EcInformeEjecutivoEstado();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax('create', [
            'model' => $model,
			'persona' => $this->obtenerNombrePersona(),
			'coordinador' =>$this->obtenerNombresXPerfiles(23),
			'secretario' =>$this->obtenerNombresXPerfiles(24),
			'instituciones'=> $this->obtenerInstituciones(),
			'ejes'=> $this->obtenerProyectosEjes(),
        ]);
    }

    /**
     * Updates an existing EcInformeEjecutivoEstado model.
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
			'persona' => $this->obtenerNombrePersona(),
			'coordinador' =>$this->obtenerNombresXPerfiles(23),
			'secretario' =>$this->obtenerNombresXPerfiles(24),
			'instituciones'=> $this->obtenerInstituciones(),
			'ejes'=> $this->obtenerProyectosEjes(),
        ]);
    }
	
	
	public function actionInforme($id)
    {
		
		$model = $this->findModel($id);
		
		$institucionNombre  = Instituciones::findOne($model->id_institucion)->descripcion;
		$ejeNombre  		= EcProyectos::findOne($model->id_eje)->descripcion;
		$idPersona			= PerfilesXPersonas::findOne($model->id_persona)->id_personas;
		$nombrePersona 		= Personas::findOne($idPersona);
		$nombrePersona 		= $nombrePersona->nombres." ".$nombrePersona->apellidos ;
		
		$idPerfilesXpersonasCoordinador	= PerfilesXPersonasInstitucion::findOne($model->id_coordinador)->id_perfiles_x_persona;
		$perfiles_x_personaCoordinador 	= PerfilesXPersonas::findOne($idPerfilesXpersonasCoordinador)->id_personas;		
		$coordinador 					= Personas::findOne($perfiles_x_personaCoordinador);
		$coordinador					= $coordinador->nombres." ".$coordinador->apellidos;
		
		
		
		$idPerfilesXpersonasSecretaria	= PerfilesXPersonasInstitucion::findOne($model->id_secretaria)->id_perfiles_x_persona;
		$perfiles_x_personaSecretaria 	= PerfilesXPersonas::findOne($idPerfilesXpersonasCoordinador)->id_personas;		
		$secretaria 					= Personas::findOne($perfiles_x_personaCoordinador);
		$secretaria 					= $secretaria->nombres." ".$secretaria->apellidos;
		
		
		$mision			= $model->mision;
		$descripcion	= $model->descripcion;
		$avances		= $model->avance_producto;
		$hallazgos		= $model->hallazgos;
		$logros			= $model->logros;

		// echo "<pre>"; print_r($idPerfilesXpersonasCoordinador); echo "</pre>"; 
		// die;
		
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
		$document = $phpWord->loadTemplate('plantillas\4.InformePlantilla.docx');
		$document->setValue('ieo', $institucionNombre);
		$document->setValue('eje', $ejeNombre);
		$document->setValue('nombreLogin', $nombrePersona);
		$document->setValue('coordinador', $coordinador);
		$document->setValue('secretaria', $secretaria);
		$document->setValue('año', date("Y"));
		
		$document->setValue('mision', $mision);
		$document->setValue('descripcion', $descripcion);
		$document->setValue('avances', $avances);
		$document->setValue('hallazgos', $hallazgos);
		$document->setValue('logros', $logros);
		
		$document->saveAs('temp.docx'); // Save to temp file
    }

    /**
     * Deletes an existing EcInformeEjecutivoEstado model.
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
     * Finds the EcInformeEjecutivoEstado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EcInformeEjecutivoEstado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EcInformeEjecutivoEstado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
