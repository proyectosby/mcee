<?php
/**********
---------------------------------------
Versión: 001
Fecha: 18-10-2018
Desarrollador: Maria Viviana Rodas
Descripción: Controlador de la vista que contiene los botones de semilleros tic
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
	header('Location: index.php?r=site%2Flogin');
	die;
}

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Estudiantes;
use yii\data\SqlDataProvider;


use app\models\Asignaturas;
use app\models\AsginaturasBuscar;
use app\models\Estados;
use app\models\Sedes;
use app\models\Instituciones;
use app\models\Paralelos;
use app\models\SedesJornadas;
use app\models\SemillerosDatosIeo;
use app\models\Personas;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;




/**
 * AsignaturasController implements the CRUD actions for Asignaturas model.
 */
class SemillerosController extends Controller
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
     * Lists all Asignaturas models.
     * @return mixed
     */
	 //recibe 2 parametros con la intencion de filtrar por institucion y por sede
    // public function actionIndex($idInstitucion = 0, $idSedes = 0)
    public function actionIndex()
    {
		
	
			return $this->render('index', [
				
			]);
		
    }

    /**
     * Displays a single Asignaturas model.
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

	
	public function actionSemilleros($idReporte)
    {
		$idInstitucion 	= $_SESSION['instituciones'][0];
		$idSedes 		= $_SESSION['sede'][0];
		
		
		$dataProviderCantidad = "";
		
		switch ($idReporte) 
		{
			case 1:
				$model = new SemillerosDatosIeo();
				$institucion = Instituciones::findOne($idInstitucion);
				$sede 		 = Sedes::findOne($idSedes);
				$dataPersonas 		= Personas::find()
								->select( "( nombres || ' ' || apellidos ) as nombres, personas.id" )
								->innerJoin( 'perfiles_x_personas pp', 'pp.id_personas=personas.id' )
								->innerJoin( 'docentes d', 'd.id_perfiles_x_personas=pp.id' )
								->innerJoin( 'perfiles_x_personas_institucion ppi', 'ppi.id_perfiles_x_persona=pp.id' )
								->where( 'personas.estado=1' )
								->andWhere( 'id_institucion='.$idInstitucion )
								->all();
		
		$docentes		= ArrayHelper::map( $dataPersonas, 'id', 'nombres' );
		
					return $this->render('../semilleros-datos-ieo/create', [
					'model' 		=> $model,
					'institucion' 	=> $institucion,
					'sede' 			=> $sede,
					'docentes' 		=> $docentes,
					'controller'	=> $this,
					// return $this->render('../semilleros-tic-semilleros-datos-ieo/create', [
					
					
			]);
				break;
			case 2:
			
				return $this->render('ejecucion-fase-i/create', [
					
					
			]);
				
				
				
				break;
			case 3:
				
				return $this->render('ejecucion-fase-ii/create', [
					
					
			]);
				
				
			
				break;
				
			case 4:
				
				return $this->render('ejecucion-fase-iii/create', [
					
					
			]);
				
							
				break;//fin break 4
				
				case 5:
				
					return $this->render('semilleros-tic-diario-de-campo/index', [
					
					
			]);
						
				break;//fin break 5
				
				case 6:
				
				return $this->render('resumen-operativo-fases-docentes/index', [
					
					
			]);
				
				
				break;//fin break 6
				
				case 7:	
					
					return $this->render('semilleros-datos-ieo-estudiantes/create', [
					
					
			]);
					
			
				break;//fin break 7
				
				case 8:
			
				return $this->render('ejecucion-fase-i-estudiantes/create', [
					
					
			]);
				
				break;//fin case 8
				
				case 9:	
					
				return $this->render('ejecucion-fase-ii-estudiantes/create', [
					
					
			]);	
					
			
				break;//fin break 9
				
				case 10:	
					
				return $this->render('ejecucion-fase-iii-estudiantes/create', [
					
					
			]);	
					
			
				break;//fin break 10
				
				case 11:	
					
				return $this->render('semilleros-tic-diario-de-campo-estudiantes/index', [
					
					
			]);	
					
			
				break;//fin break 11 
				
				case 12:	
					
				return $this->render('resumen-operativo-fases-estudiantes/index', [
					
					
			]);	
					
			
				break;//fin break 12
				
				case 13:	
						
					return $this->render('instrumento-poblacion-estudiantes/create', [
						
					
			]);	
					
			
				break;//fin break 13
				
				case 14:	
						
					return $this->render('reportes/index', [
						
					
			]);	
					
			
				break;//fin break 14
				
				case 15:	
						
					return $this->render('semilleros-tic/index', [
						
					
			]);	
					
			
				break;//fin break 15
				
				case 16:	
						
					return $this->render('instrumento-poblacion-docentes/create', [
						
					
			]);	
					
			
				break;//fin break 16
		}
		
		
    }
	
	
	public function printr ($valor)
	{
		echo "<pre>"; print_r($valor ); echo "</pre>";
	}
	
    /**
     * Creates a new Asignaturas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idSedes, $idInstitucion)
    {
				
		//se selecciona el estado activo siempre se crea activo
		$estados = new Estados();
		$estados = $estados->find()->where('id=1')->all();
		$estados = ArrayHelper::map($estados,'id','descripcion');
		
		//se seleccionan solo la sede actual 
		$sedes = new Sedes();
		$sedes = $sedes->find()->where('id='.$idSedes)->all();
		$sedes = ArrayHelper::map($sedes,'id','descripcion');
		
        $model = new Asignaturas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
			'estados'=>$estados,
			'sedes'=>$sedes,
        ]);
    }

    /**
     * Updates an existing Asignaturas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		$model = $this->findModel($id);
		
		//se seleccionan todos los estados para mostrarlos en la vista 
		$estados = new Estados();
		$estados = $estados->find()->all();
		$estados = ArrayHelper::map($estados,'id','descripcion');
		
		//se seleccionan solo la sede actual para mostrar en la vista update
		$sedes = new Sedes();
		$sedes = $sedes->find()->where('id='.$model->id_sedes)->all();
		$sedes = ArrayHelper::map($sedes,'id','descripcion');
		
		
       
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
			'estados'=>$estados,
			'sedes'=>$sedes,
        ]);
    }

    /**
     * Deletes an existing Asignaturas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
	 
	 //Se cambia para que no borre, en cambio actualiza el campo estado a 2;
    public function actionDelete($id)
    {
		
		$model = $this->findModel($id);
		$idSedes= $model->id_sedes;
		//variable con la conexion a la base de datos
		$connection = Yii::$app->getDb();
		//saber el id de la sede para redicionar al index correctamente
		$command = $connection->createCommand("
		SELECT i.id
		FROM instituciones as i,sedes as s
		WHERE s.id_instituciones = i.id
		and s.id = $idSedes
		");
		$result = $command->queryAll();
		$idInstituciones = $result[0]['id'];
		
		$model = Asignaturas::findOne($id);
		$model->estado = 2;
		$idInstitucion = $model->id;
		$model->update(false);

		return $this->redirect(['index', 'idInstitucion' => $idInstituciones,'idSedes'=>$idSedes]);		
		
    }

    /**
     * Finds the Asignaturas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Asignaturas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Asignaturas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La página que está solicitando no existe.');
    }
}
