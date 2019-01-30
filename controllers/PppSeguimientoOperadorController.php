<?php
/**********
Versión: 001
Fecha: 02-01-2019
Desarrollador: Oscar David Lopez Villa
Descripción: crud Seguimiento operador
---------------------------------------
Modificaciones:
Fecha: 02-01-2019
Persona encargada: Oscar David Lopez Villa
Cambios realizados: Modificaciones en los actionCreate y actionDelete
----------------------------------------
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
use app\models\PppSeguimientoOperador;
use app\models\PppSeguimientoOperadorBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Parametro;
use app\models\Personas;
use app\models\Instituciones;
use app\models\PppIndicadores;
use app\models\PppObjetivos;
use app\models\PppActividades;
use yii\helpers\ArrayHelper;


/**
 * PppSeguimientoOperadorController implements the CRUD actions for PppSeguimientoOperador model.
 */
class PppSeguimientoOperadorController extends Controller
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
     * Lists all PppSeguimientoOperador models.
     * @return mixed
     */
    public function actionIndex($idTipoSeguimiento = 1)
    {
        $searchModel = new PppSeguimientoOperadorBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PppSeguimientoOperador model.
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
     * Creates a new PppSeguimientoOperador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idTipoSeguimiento)
    {
		
		$id_sede 		= $_SESSION['sede'][0];
		$id_institucion	= $_SESSION['instituciones'][0];
		
		$guardado = false;
		
		$tipo_seguimiento = Yii::$app->request->get( 'idTipoSeguimiento' );
		
        $model = new PppSeguimientoOperador();

        if( $model->load(Yii::$app->request->post()) )
		{
			$model->estado 				= 1;		//Siempre 1(activo)
			$model->id_tipo_seguimiento = $idTipoSeguimiento;
			if( $model->save() )
			{
				$guardado = true;
				
				return $this->redirect(['index','idTipoSeguimiento' => $idTipoSeguimiento,'guardado' => 1]);
			}
        }

		$dataNombresOperador = Parametro::find()
									->where( 'estado=1' )
									->andWhere( 'id_tipo_parametro=37' )
									->all();
		
		$nombresOperador = ArrayHelper::map( $dataNombresOperador, 'id', 'descripcion' );
		
		$mesReporte = [
						1  => 'Enero',
						2  => 'Febrero',
						3  => 'Marzo',
						4  => 'Abril',
						5  => 'Mayo',
						6  => 'Junio',
						7  => 'Julio',
						8  => 'Agosto',
						9  => 'Septiembre',
						10 => 'Octubre',
						11 => 'Noviembre',
						12 => 'Diciembre',
					];
					
		$dataPersonas 		= Personas::find()
								->select( "( nombres || ' ' || apellidos ) as nombres, personas.id" )
								->innerJoin( 'perfiles_x_personas pp', 'pp.id_personas=personas.id' )
								->innerJoin( 'docentes d', 'd.id_perfiles_x_personas=pp.id' )
								->innerJoin( 'perfiles_x_personas_institucion ppi', 'ppi.id_perfiles_x_persona=pp.id' )
								->where( 'personas.estado=1' )
								->andWhere( 'id_institucion='.$id_institucion )
								->all();
		
		$personas			= ArrayHelper::map( $dataPersonas, 'id', 'nombres' );
		
		$institucion 		= Instituciones::findOne( $id_institucion );
		
		$dataIndicadores	= PppIndicadores::find()
								->where( 'estado=1' )
								->all();
		
		$indicadores		= ArrayHelper::map( $dataIndicadores, 'id', 'descripcion' );
		
		$dataObjetivos	= PppObjetivos::find()
								->where( 'estado=1' )
								->all();
		
		$objetivos		= ArrayHelper::map( $dataObjetivos, 'id', 'descripcion' );
		
		$dataActividades	= PppActividades::find()
								->where( 'estado=1' )
								->all();
		
		$actividades		= ArrayHelper::map( $dataActividades, 'id', 'descripcion' );
		
        return $this->renderAJax('create', [
            'model' 			=> $model,
            'nombresOperador' 	=> $nombresOperador,
            'mesReporte' 		=> $mesReporte,
            'personas' 			=> $personas,
            'institucion' 		=> $institucion,
            'indicadores' 		=> $indicadores,
            'objetivos' 		=> $objetivos,
            'actividades' 		=> $actividades,
            'guardado' 			=> $guardado,
			'idTipoSeguimiento' => $idTipoSeguimiento,
        ]);
    }

    /**
     * Updates an existing PppSeguimientoOperador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		
		$idInstitucion 	= $_SESSION['instituciones'][0];
		
		$idTipoSeguimiento = $model->id_tipo_seguimiento;
		$guardado = false;
        if ($model->load(Yii::$app->request->post()) && $model->save()) 
		{
			$guardado = true;
            return $this->redirect(['index','idTipoSeguimiento' => $idTipoSeguimiento,'guardado' => 1]);
        }
		
		$dataNombresOperador = Parametro::find()
									->where( 'estado=1' )
									->andWhere( 'id_tipo_parametro=37' )
									->all();
		
		$nombresOperador = ArrayHelper::map( $dataNombresOperador, 'id', 'descripcion' );
		
		$mesReporte = [
						1  => 'Enero',
						2  => 'Febrero',
						3  => 'Marzo',
						4  => 'Abril',
						5  => 'Mayo',
						6  => 'Junio',
						7  => 'Julio',
						8  => 'Agosto',
						9  => 'Septiembre',
						10 => 'Octubre',
						11 => 'Noviembre',
						12 => 'Diciembre',
					];
					
		$dataPersonas 		= Personas::find()
								->select( "( nombres || ' ' || apellidos ) as nombres, personas.id" )
								->innerJoin( 'perfiles_x_personas pp', 'pp.id_personas=personas.id' )
								->innerJoin( 'docentes d', 'd.id_perfiles_x_personas=pp.id' )
								->innerJoin( 'perfiles_x_personas_institucion ppi', 'ppi.id_perfiles_x_persona=pp.id' )
								->where( 'personas.estado=1' )
								->andWhere( 'id_institucion='.$idInstitucion )
								->all();
		
		$personas			= ArrayHelper::map( $dataPersonas, 'id', 'nombres' );
		
		$institucion 		= Instituciones::findOne( $idInstitucion );
		
		$dataIndicadores	= PppIndicadores::find()
								->where( 'estado=1' )
								->all();
		
		$indicadores		= ArrayHelper::map( $dataIndicadores, 'id', 'descripcion' );
		
		$dataObjetivos	= PppObjetivos::find()
								->where( 'estado=1' )
								->all();
		
		$objetivos		= ArrayHelper::map( $dataObjetivos, 'id', 'descripcion' );
		
		$dataActividades	= PppActividades::find()
								->where( 'estado=1' )
								->all();
		
		$actividades		= ArrayHelper::map( $dataActividades, 'id', 'descripcion' );
		
        return $this->renderAJax('create', [
            'model' 			=> $model,
            'nombresOperador' 	=> $nombresOperador,
            'mesReporte' 		=> $mesReporte,
            'personas' 			=> $personas,
            'institucion' 		=> $institucion,
            'indicadores' 		=> $indicadores,
            'objetivos' 		=> $objetivos,
            'actividades' 		=> $actividades,
            'guardado' 			=> $guardado,
			'idTipoSeguimiento' => $idTipoSeguimiento,
        ]);
        return $this->renderAjax('update', [
            'model' => $model,
            'nombresOperador' 	=> $nombresOperador,
            'mesReporte' 		=> $mesReporte,
            'personas' 			=> $personas,
            'institucion' 		=> $institucion,
            'indicadores' 		=> $indicadores,
            'objetivos' 		=> $objetivos,
            'actividades' 		=> $actividades,
            'guardado' 			=> $guardado,
			'idTipoSeguimiento' => $idTipoSeguimiento,
        ]);
    }

    /**
     * Deletes an existing PppSeguimientoOperador model.
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
     * Finds the PppSeguimientoOperador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PppSeguimientoOperador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PppSeguimientoOperador::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
