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
use yii\web\UploadedFile;
use app\models\Sedes;
use app\models\Instituciones;
use app\models\Parametro;
use app\models\IsaRomProyectos;
use app\models\IsaActividadesRom;
use app\models\RomReporteOperativoMisional;
use app\models\IsaTipoCantidadPoblacionRom;
use app\models\IsaEvidenciasRom;
use yii\bootstrap\Collapse;
use app\models\UploadForm;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\DateTime;

/**
 * RomReporteOperativoMisionalController implements the CRUD actions for RomReporteOperativoMisional model.
 */
class RomReporteOperativoMisionalController extends Controller
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
     * Lists all RomReporteOperativoMisional models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RomReporteOperativoMisional::find()->where(['estado' => 1]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

	public function obtenerParametros($idTipoParametro)
	{
		//parametros de Fases informe planeación IEO
		$dataParametros = Parametro::find()
						->where( "id_tipo_parametro=$idTipoParametro" )
						->andWhere( 'estado=1' )
						->orderby( 'id' )
						->all();
						
		$parametros		= ArrayHelper::map( $dataParametros, 'id', 'descripcion' );
		
		return $parametros;
	
	}
		
	
    function actionFormulario($model, $form, $datos = 0 )
	{
        
		
		$proyectos = new IsaRomProyectos();
		$proyectos = $proyectos->find()->orderby("id")->all();
		$proyectos = ArrayHelper::map($proyectos,'id','descripcion');
		
		$estados= $this->obtenerParametros(45);
		// $ecProyectos = EcProyectos::find()->where( 'estado=1' )->orderby('id ASC')->all();
		
		foreach ($proyectos as $idProyecto => $v)
		{
			
			 $contenedores[] = 	
				[
					'label' 		=>  $v,
					'content' 		=>  $this->renderPartial( 'procesos', 
													[  
                                                        'idProyecto' => $idProyecto,
														'form' => $form,
														//'modelProyectos' =>  $modelProyectos,
														'datos'=>$datos,
														'estados'=>$estados,
													] 
										),
					'contentOptions'=> ['class' => 'in'],
					'options' => ['class' => ' panel-primary']
					
				];
				
	
		}
		
		 echo Collapse::widget([
			'items' => $contenedores,
			
		]);
		
	}

    /**
     * Displays a single RomReporteOperativoMisional model.
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
     * Creates a new RomReporteOperativoMisional model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RomReporteOperativoMisional();
		
       
		$idInstitucion = $_SESSION['instituciones'][0];
		
        $institucion = Instituciones::findOne($idInstitucion);
        if ($model->load(Yii::$app->request->post())) 
		{
            if($model->save())
			{
				
                $rom_id = $model->id;
				
				if($arrayDatosActividades = Yii::$app->request->post('IsaActividadesRom'))
				{
					
				// se agrega el id del reporte despues de haber sido creado 
					foreach($arrayDatosActividades as $datos => $valores)
					{
						$arrayDatosActividades[$datos]['id_reporte_operativo_misional']= $rom_id;
					}
					
					$columnNameArrayActividades=['alarmas','alternativas','articulacion','debilidades','diligencia','docente_orientador','duracion_sesion','estado','evaluacion','fecha_desde','fecha_diligencia','fecha_hasta','fecha_reprogramacion','fortalezas','id_rom_actividad','justificacion_activiad_no_realizada','logros','nombre_actividad','num_equipos','observaciones_generales','perfiles','retos','rol','id_reporte_operativo_misional'];
					// inserta todos los datos que trae el array arrayDatosActividades
					$insertCount = Yii::$app->db->createCommand()
					   ->batchInsert('isa.actividades_rom', $columnNameArrayActividades, $arrayDatosActividades) ->execute();
				}
				
				if($arrayDatosPoblacion = Yii::$app->request->post('IsaTipoCantidadPoblacionRom'))
				{
					
					// se agrega el id del reporte despues de haber sido creado 
					foreach($arrayDatosPoblacion as $datos => $valores)
					{
						$arrayDatosPoblacion[$datos]['id_reporte_operativo_misional'] = $rom_id;
					}
					
					$columnNameArrayPoblacion=['vecinos','lideres_comunitarios','empresarios_comerciantes','organizaciones_locales','grupos_comunitarios','otos_actores','total_participantes','id_rom_actividades','id_reporte_operativo_misional'];
					// inserta todos los datos que trae el array arrayDatosActividades
					$insertCount = Yii::$app->db->createCommand()
					   ->batchInsert('isa.tipo_cantidad_poblacion_rom', $columnNameArrayPoblacion, $arrayDatosPoblacion)->execute(); 
				}
				
				
				if($arrayDatosEvidencias = Yii::$app->request->post('IsaEvidenciasRom'))
				{
					
					$modeloEvidencias = [];
					$cantidad = count($arrayDatosEvidencias);
					for( $i = 0; $i < $cantidad; $i++ )
					{
						$modeloEvidencias[] = new IsaEvidenciasRom();
					}
					
					
					if (IsaEvidenciasRom::loadMultiple($modeloEvidencias,  Yii::$app->request->post() )) 
					{	
						
						$idInstitucion 	= $_SESSION['instituciones'][0];
						$institucion = Instituciones::findOne( $idInstitucion )->codigo_dane;
						
						//Si no existe la carpeta se crea
						$carpeta = "../documentos/reporteOperativo/".$institucion;
						if (!file_exists($carpeta)) 
						{
							mkdir($carpeta, 0777, true);
						}
						
						$propiedades = array( "actas", "reportes", "listados", "plan_trabajo", "formato_seguimiento", "formato_evaluacion", "fotografias", "vidoes", "otros_productos");
						
						
						
						
						
						foreach( $modeloEvidencias as $key => $model) 
						{
							$key +=1;
							
							
							
							foreach($propiedades as $propiedad)
							{
								$arrayRutasFisicas = array();
								// se guarda el archivo en file
								
								$files = UploadedFile::getInstances( $model, "[$key]$propiedad" );
								// se sube el archivo y se obtiene la ruta en del archivo en el servidor
								
								if( $files )
								{
									foreach($files as $file)
									{
										//se usan microsegundos para evitar un nombre de archivo repetido
										$t = microtime(true);
										$micro = sprintf("%06d",($t - floor($t)) * 1000000);
										$d = new \DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
										
										// Construyo la ruta completa del archivo a guardar
										$rutaFisicaDirectoriaUploads  = "../documentos/reporteOperativo/".$institucion."/".$file->baseName . $d->format("Y_m_d_H_i_s.u") . '.' . $file->extension;
										$save = $file->saveAs( $rutaFisicaDirectoriaUploads );
										$arrayRutasFisicas[] = $rutaFisicaDirectoriaUploads;
									}
									
									// asignacion de la ruta al campo de la db
									$model->$propiedad =  implode(",", $arrayRutasFisicas);
									$arrayRutasFisicas = null;
								}
								else
								{
									echo "No hay archivo cargado";
								}
								
							}
							
							
							
							
							//se sube el archivo y se obtiene la ruta en del archivo en el servidor
							
							//asginacion del id del reporte 
							$model->id_reporte_operativo_misional = $rom_id;
							//Siempre activo
							// $model->estado = 1;
							//Se valida que todos los campos de todos los modelos sean correctos
							if (!IsaEvidenciasRom::validateMultiple($modeloEvidencias)) 
							{
								Yii::$app->response->format = 'json';
								 return \yii\widgets\ActiveForm::validateMultiple($modeloEvidencias);
							}
							
							//Guardo todos los modelos
							foreach( $modeloEvidencias as $key => $model) 
							{
								$model->save();
							}
						}
						return $this->redirect(['index', 'guardado' => true ]);
							
					} 
							 
				}
				
				return $this->redirect(['index', 'guardado' => 1 ]);
			}
			// $idInstitucion = $_SESSION['instituciones'][0];
			
		}	
			$Sedes  = Sedes::find()->where( "id_instituciones = $idInstitucion" )->all();
			$sedes	= ArrayHelper::map( $Sedes, 'id', 'descripcion' );

			return $this->renderAjax('create', [
				'model' => $model,
				'sedes' => $sedes,
				'institucion'=> $this->obtenerInstitucion(),
				
			]);
		
	}

	
	public function obtenerInstitucion()
	{
		$idInstitucion = $_SESSION['instituciones'][0];
		$instituciones = new Instituciones();
		$instituciones = $instituciones->find()->where("id = $idInstitucion")->all();
		$instituciones = ArrayHelper::map($instituciones,'id','descripcion');
		
		return $instituciones;
	}
	

	
    /**
     * Updates an existing RomReporteOperativoMisional model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$idInstitucion = $_SESSION['instituciones'][0];
		$Sedes  = Sedes::find()->where( "id_instituciones = $idInstitucion" )->all();
        $sedes	= ArrayHelper::map( $Sedes, 'id', 'descripcion' );
	
        if ($model->load(Yii::$app->request->post()) && $model->save()) 
		{
			

            return $this->redirect(['index']);
        }
		
		$datos = array();
		
		
		$actividadesRom = new RomActividadesRom ();
		$actividadesRom = $actividadesRom->find()->orderby("id")->andWhere("id_reporte_operativo_misional = $id")->all();
	
		//se trae la informacionde la base de datos 
		$result = ArrayHelper::getColumn($actividadesRom, function ($element) 
		{
			$dato[$element['id_reporte_operativo_misional']]['fecha_desde']= $element['fecha_desde'];
			$dato[$element['id_reporte_operativo_misional']]['fecha_hasta']= $element['fecha_hasta'];
			$dato[$element['id_reporte_operativo_misional']]['num_equipos']= $element['num_equipos'];
			$dato[$element['id_reporte_operativo_misional']]['perfiles']= $element['perfiles'];
			$dato[$element['id_reporte_operativo_misional']]['docente_orientador']= $element['docente_orientador'];
			$dato[$element['id_reporte_operativo_misional']]['nombre_actividad']= $element['nombre_actividad'];
			$dato[$element['id_reporte_operativo_misional']]['duracion_sesion']= $element['duracion_sesion'];
			$dato[$element['id_reporte_operativo_misional']]['logros']= $element['logros'];
			$dato[$element['id_reporte_operativo_misional']]['fortalezas']= $element['fortalezas'];
			$dato[$element['id_reporte_operativo_misional']]['debilidades']= $element['debilidades'];
			$dato[$element['id_reporte_operativo_misional']]['alternativas']= $element['alternativas'];
			$dato[$element['id_reporte_operativo_misional']]['retos']= $element['retos'];
			$dato[$element['id_reporte_operativo_misional']]['articulacion']= $element['articulacion'];
			$dato[$element['id_reporte_operativo_misional']]['evaluacion']= $element['evaluacion'];
			$dato[$element['id_reporte_operativo_misional']]['observaciones_generales']= $element['observaciones_generales'];
			$dato[$element['id_reporte_operativo_misional']]['alarmas']= $element['alarmas'];
			$dato[$element['id_reporte_operativo_misional']]['justificacion_activiad_no_realizada']= $element['justificacion_activiad_no_realizada'];
			$dato[$element['id_reporte_operativo_misional']]['fecha_reprogramacion']= $element['fecha_reprogramacion'];
			$dato[$element['id_reporte_operativo_misional']]['diligencia']= $element['diligencia'];
			$dato[$element['id_reporte_operativo_misional']]['rol']= $element['rol'];
			$dato[$element['id_reporte_operativo_misional']]['fecha_diligencia']= $element['alarmas'];
			$dato[$element['id_reporte_operativo_misional']]['estado']= $element['estado'];
			$dato[$element['id_reporte_operativo_misional']]['id_actividad']= $element['id_actividad'];

			return $dato;
		});
		
	//se formate la informacion que deben tener los campos 
		foreach	($result as $r => $valor)
			foreach	($valor as $ids => $valores)
				$datos['actividades'][$valores['id_actividad']] = $valores;
	
		$tipoCantidadPoblacion = new RomTipoCantidadPoblacionRom ();
		$tipoCantidadPoblacion = $tipoCantidadPoblacion->find()->orderby("id")->andWhere("id_reporte_operativo_misional = $id")->all();
	
		//se trae la informacionde la base de datos tabla ec.avances
		$result = ArrayHelper::getColumn($tipoCantidadPoblacion, function ($element) 
		{
			$dato[$element['id_reporte_operativo_misional']]['vecinos']= $element['vecinos'];
			$dato[$element['id_reporte_operativo_misional']]['lideres_comunitarios']= $element['lideres_comunitarios'];
			$dato[$element['id_reporte_operativo_misional']]['empresarios_comerciantes']= $element['empresarios_comerciantes'];
			$dato[$element['id_reporte_operativo_misional']]['organizaciones_locales']= $element['organizaciones_locales'];
			$dato[$element['id_reporte_operativo_misional']]['grupos_comunitarios']= $element['grupos_comunitarios'];
			$dato[$element['id_reporte_operativo_misional']]['otos_actores']= $element['otos_actores'];
			$dato[$element['id_reporte_operativo_misional']]['total_participantes']= $element['total_participantes'];
			$dato[$element['id_reporte_operativo_misional']]['id_actividades_rom']= $element['id_actividades_rom'];

			return $dato;
		});
	
		
	
	
		//se formate la informacion que deben tener los campos 
		foreach	($result as $r => $valor)
			foreach	($valor as $ids => $valores)
				$datos['tipoCantidadPoblacion'][$valores['id_actividades_rom']] = $valores;
		
		
		// echo "<pre>"; print_r($datos); echo "</pre>"; 
				// die;
        return $this->renderAjax('update', [
            'model' => $model,
			'sedes' => $sedes,
			'institucion'=> $this->obtenerInstitucion(),
			'datos' => $datos,
        ]);
    }

    /**
     * Deletes an existing RomReporteOperativoMisional model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
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
     * Finds the RomReporteOperativoMisional model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RomReporteOperativoMisional the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RomReporteOperativoMisional::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
