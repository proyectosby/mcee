<?php

namespace app\controllers;

use Yii;
use app\models\Docentes;
use app\models\DocentesBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use app\models\Estados;
use app\models\Escalafones;
use app\models\Personas;
use app\models\PerfilesXPersonas;
use yii\helpers\ArrayHelper;

/**
 * DocentesController implements the CRUD actions for Docentes model.
 */
class DocentesController extends Controller
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
     * Lists all Docentes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocentesBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere( 'docentes.estado=1' )
					 ->innerJoin( 'perfiles_x_personas pf', 'docentes.id_perfiles_x_personas=pf.id' )
					 ->innerJoin( 'personas p', 'pf.id_personas=p.id' );

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Docentes model.
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
     * Creates a new Docentes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$estadosData 	= Estados::find()->where( 'id=1' )->all();
		$estados 	 	= ArrayHelper::map( $estadosData, 'id', 'descripcion' );
		
		$escalafonesData= Escalafones::find()->where( 'estado=1' )->all();
		$escalafones 	= ArrayHelper::map( $escalafonesData, 'id', 'descripcion' );
		
		$personasData 	= Personas::find() ->where( 'personas.estado=1' )->all();
		$personas 	  	= ArrayHelper::map( $personasData, 'id', 'nombres' );
		
        $model					= new Docentes();
        $modelPerfilesXPersonas = new PerfilesXPersonas();

        // if($model->load(Yii::$app->request->post()) )
        if($modelPerfilesXPersonas->load(Yii::$app->request->post()) )
		{
			$modelPerfilesXPersonas->id_perfiles = 10;	//ID del perfil docente
			
			if( $modelPerfilesXPersonas->save() )
			{	
				$model->id_perfiles_x_personas = $modelPerfilesXPersonas->id;
				if( $model->load(Yii::$app->request->post()) && $model->save() )
					return $this->redirect(['view', 'id' => $model->id_perfiles_x_personas]);
			}
			
        }

        return $this->render('create', [
            'model' 	  			=> $model,
            'modelPerfilesXPersonas'=> $modelPerfilesXPersonas,
            'personas' 	  			=> $personas,
            'escalafones' 			=> $escalafones,
            'estados' 	  			=> $estados,
        ]);
    }

    /**
     * Updates an existing Docentes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$modelPerfilesXPersonas = PerfilesXPersonas::findOne($model->id_perfiles_x_personas);
		
		$estadosData 	= Estados::find()->all();
		$estados 	 	= ArrayHelper::map( $estadosData, 'id', 'descripcion' );
		
		$escalafonesData= Escalafones::find()->where( 'estado=1' )->all();
		$escalafones 	= ArrayHelper::map( $escalafonesData, 'id', 'descripcion' );
		
		$personasData 	= Personas::find() ->where( 'personas.estado=1' )->andWhere( 'id='.$modelPerfilesXPersonas->id_personas )->all();
		$personas 	  	= ArrayHelper::map( $personasData, 'id', 'nombres' );
		
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_perfiles_x_personas]);
        }

        return $this->render('update', [
            'model' 	  			=> $model,
			'modelPerfilesXPersonas'=> $modelPerfilesXPersonas,
            'personas' 	  			=> $personas,
            'escalafones' 			=> $escalafones,
            'estados' 	  			=> $estados,
        ]);
    }

    /**
     * Deletes an existing Docentes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();
        $model = $this->findModel($id);
		$model->estado = 2;
		$model->update(false);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Docentes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Docentes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Docentes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
