<?php

/**********
Versión: 001
Fecha: 2018-09-03
Desarrollador: Edwin Molina Grisales
Descripción: RESUMEN OPERATIVO FASES ESTUDIANTES
---------------------------------------
**********/

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
use app\models\EcDatosBasicos;
use app\models\EcDatosBasicosBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\EcPlaneacion;
use app\models\EcReportes;
use app\models\EcVerificacion;
use app\models\Parametro;
use app\models\Sedes;
use app\models\Instituciones;
use app\models\SemillerosTicDatosIeoProfesional;
use app\models\EjecucionFase;
use yii\helpers\ArrayHelper;
/**
 * EcDatosBasicosController implements the CRUD actions for EcDatosBasicos model.
 */
class ResumenOperativoFasesDocentesController extends Controller
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
     * Lists all EcDatosBasicos models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $searchModel = new EcDatosBasicosBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

	//retorna la informacion del Resumen_Operativo_ Estudiantes_Docentes_Operativo docentes
	public function actionObtenerInfo()
	{
		$arrayInfo=array();
		$idInstitucion 	= $_SESSION['instituciones'][0];
		$idSedes 		= $_SESSION['sede'][0];
		
		$institucion = Instituciones::findOne($idInstitucion);
		$sede = Sedes::findOne($idSedes);
		
		// $semillerosDatosIeo = new SemillerosTicDatosIeoProfesional();
		// $semillerosDatosIeo = $semillerosDatosIeo->find()->orderby("id")->all();
		// $semillerosDatosIeo = ArrayHelper::map($semillerosDatosIeo,'id_institucion','id_profesional_a','id_sede');
		
		//informacion de la tabla  semilleros_tic.datos_ieo_profesional
		// variable con la conexion a la base de datos 
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("
		SELECT 	i.codigo_dane, i.descripcion as institucion, s.descripcion as sede, concat(p.nombres,' ',p.apellidos) as profesional_a,
		ds.fecha_sesion
		FROM 	semilleros_tic.datos_ieo_profesional as dip,public.sedes as s,public.instituciones as i, public.personas as p,
				semilleros_tic.ejecucion_fase as ef, semilleros_tic.datos_sesiones as ds, semilleros_tic.sesiones as ses
		WHERE 	dip.id_institucion = i.id
		AND		dip.id_sede = s.id
		AND 	dip.id_profesional_a = p.id
		AND		dip.id = ef.id_datos_ieo_profesional
		AND		ef.id_datos_sesiones = ds.id
		AND 	ds.id_sesion= 1
		AND 	ds.id_sesion = ses.id
		GROUP BY ds.fecha_sesion,i.codigo_dane,i.descripcion,s.descripcion,p.nombres,p.apellidos
		");
		$semillerosDatosIeo = $command->queryAll();
	
	// SELECT dip.id,i.codigo_dane, i.descripcion as institucion, s.descripcion as sede, concat(p.nombres,' ',p.apellidos) as profesional_a,
		// ds.fecha_sesion
// FROM 	semilleros_tic.datos_ieo_profesional as dip,public.sedes as s,public.instituciones as i, public.personas as p,
		// semilleros_tic.ejecucion_fase as ef, semilleros_tic.datos_sesiones as ds, semilleros_tic.sesiones as ses
// WHERE 	dip.id_institucion = i.id
// AND		dip.id_sede = s.id
// AND 	dip.id_profesional_a = p.id
// AND		dip.id = ef.id_datos_ieo_profesional
// AND		ef.id_datos_sesiones = ds.id
// AND 	ds.id_sesion= 1
// GROUP BY ds.fecha_sesion,i.codigo_dane,i.descripcion,s.descripcion,p.nombres,p.apellidos,ef.docente,dip.id




echo "<pre>"; print_r($semillerosDatosIeo); echo "</pre>"; 
		$ejecucionFase = new EjecucionFase();
		$ejecucionFase = $ejecucionFase->find()->orderby("id")->all();	
		$docentes = ArrayHelper::getColumn($ejecucionFase, 'docente');
		
	// echo "<pre>"; print_r($docentes); echo "</pre>"; 	
		$arrayInfo[]=$institucion->codigo_dane;
		$arrayInfo[]=$institucion->descripcion;
		$arrayInfo[]=$sede->codigo_dane;
		$arrayInfo[]=$sede->descripcion;
		
		$arrayInfo[]="";
		$arrayInfo[]="";
		$arrayInfo[]=$docentes;
		

		echo json_encode($arrayInfo);
	}
    /**
     * Displays a single EcDatosBasicos model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EcDatosBasicos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelDatosBasico 	= new EcDatosBasicos();
        $modelPlaneacion	= new EcPlaneacion();
        $modelVerificacion	= new EcVerificacion();
        $modelReportes		= new EcReportes();

        if ($modelDatosBasico->load(Yii::$app->request->post()) && $modelDatosBasico->save()) {
            return $this->redirect(['view', 'id' => $modelDatosBasico->id]);
        }
		
		$dataTiposVerificacion = Parametro::find()
									->where( 'id_tipo_parametro=12' )
									->andWhere( 'estado=1' )
									->all();
									
		$tiposVerificacion = ArrayHelper::map( $dataTiposVerificacion, 'id', 'descripcion' );

        return $this->render('create', [
            'modelDatosBasico' 	=> $modelDatosBasico,
            'modelPlaneacion' 	=> $modelPlaneacion,
            'modelVerificacion' => $modelVerificacion,
            'modelReportes' 	=> $modelReportes,
            'tiposVerificacion'	=> $tiposVerificacion,
        ]);
    }

    /**
     * Updates an existing EcDatosBasicos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EcDatosBasicos model.
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
     * Finds the EcDatosBasicos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return EcDatosBasicos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EcDatosBasicos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
