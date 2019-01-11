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
use app\models\GcBitacora;
use app\models\GcBitacoraBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Personas;
use app\models\GcSemanas;
use app\models\Sedes;
use app\models\Parametro;
use app\models\GcCiclos;
use yii\helpers\ArrayHelper;

/**
 * GcBitacoraController implements the CRUD actions for GcBitacora model.
 */
class GcBitacoraController extends Controller
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
     * Lists all GcBitacora models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GcBitacoraBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GcBitacora model.
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
     * Creates a new GcBitacora model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$id_sede 		= $_SESSION['sede'][0];
		$id_institucion	= $_SESSION['instituciones'][0];
		
		$sede = Sedes::findOne( $id_sede );
		
        $model = new GcBitacora();
        
		$model->estado = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['gc-ciclos/index']);
            // return $this->redirect(['index']);
        }
		
		$dataPersonas 		= Personas::find()
								->select( "( nombres || ' ' || apellidos ) as nombres, personas.id" )
								->innerJoin( 'perfiles_x_personas pp', 'pp.id_personas=personas.id' )
								->innerJoin( 'docentes d', 'd.id_perfiles_x_personas=pp.id' )
								->innerJoin( 'perfiles_x_personas_institucion ppi', 'ppi.id_perfiles_x_persona=pp.id' )
								->where( 'personas.estado=1' )
								->andWhere( 'id_institucion='.$id_institucion )
								->all();
		
		$docentes		= ArrayHelper::map( $dataPersonas, 'id', 'nombres' );
		
		$dataJornadas 		= Parametro::find()
								->where( 'estado=1' )
								->andWhere( 'id_tipo_parametro=7' )
								->all();
		
		$jornadas		= ArrayHelper::map( $dataJornadas, 'id', 'descripcion' );
		
		$dataCiclos 		= GcCiclos::find()
								->where( 'estado=1' )
								->all();
		
		$ciclos		= ArrayHelper::map( $dataCiclos, 'id', 'descripcion' );

        return $this->renderAjax('create', [
            'model' => $model,
            'docentes' => $docentes,
            'sede' => $sede,
            'jornadas' => $jornadas,
            'ciclos' => $ciclos,
        ]);
    }

    /**
     * Updates an existing GcBitacora model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		$id_sede 		= $_SESSION['sede'][0];
		$id_institucion	= $_SESSION['instituciones'][0];
		
		$sede = Sedes::findOne( $id_sede );
		
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['index']);
            return $this->redirect(['gc-ciclos/index']);
        }
		
		$dataPersonas 		= Personas::find()
								->select( "( nombres || ' ' || apellidos ) as nombres, personas.id" )
								->innerJoin( 'perfiles_x_personas pp', 'pp.id_personas=personas.id' )
								->innerJoin( 'docentes d', 'd.id_perfiles_x_personas=pp.id' )
								->innerJoin( 'perfiles_x_personas_institucion ppi', 'ppi.id_perfiles_x_persona=pp.id' )
								->where( 'personas.estado=1' )
								->andWhere( 'id_institucion='.$id_institucion )
								->all();
		
		$docentes		= ArrayHelper::map( $dataPersonas, 'id', 'nombres' );
		
		$dataJornadas 		= Parametro::find()
								->where( 'estado=1' )
								->andWhere( 'id_tipo_parametro=7' )
								->all();
		
		$jornadas		= ArrayHelper::map( $dataJornadas, 'id', 'descripcion' );
		
		$dataCiclos 		= GcCiclos::find()
								->where( 'estado=1' )
								->all();
		
		$ciclos		= ArrayHelper::map( $dataCiclos, 'id', 'descripcion' );

        return $this->renderAjax('update', [
            'model' => $model,
			'sede' => $sede,
			'jornadas' => $jornadas,
			'ciclos' => $ciclos,
			'docentes' => $docentes,
        ]);
    }

    /**
     * Deletes an existing GcBitacora model.
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
     * Finds the GcBitacora model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return GcBitacora the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GcBitacora::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
