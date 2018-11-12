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
use app\models\DatosIeoProfesional;
use app\models\EjecucionFase;
use app\models\Fases;
use app\models\Sesiones;
use app\models\AcuerdosInstitucionalesEstudiantes;
use app\models\Paralelos;

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
		$dataProvider->query->andWhere('estado=1');
		
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
		
		// $ciclos->load( Yii::$app->request->post() );
		
        $model = new SemillerosTicDiarioDeCampoEstudiantes();

		//se crea una instancia del modelo fases
		$fasesModel 		 	= new Fases();
		//se traen los datos de fases
		$dataFases		 	= $fasesModel->find()->orderby( 'id' )->all();
		//se guardan los datos en un array
		$fases	 	 	 	= ArrayHelper::map( $dataFases, 'id', 'descripcion' );
		
		// echo "<pre>"; print_r(Yii::$app->request->post()); echo "</pre>"; die();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['index']);
        }
		
		$dataAnios 	= SemillerosTicAnio::find()
							->where( 'estado=1' )
							->orderby( 'descripcion' )
							->all();
			
		$anios	= ArrayHelper::map( $dataAnios, 'id', 'descripcion' );
		
		$cicloslist = [];
		
		// // if( $ciclos->id_anio ){
			
			// $dataCiclos = SemillerosTicCiclos::find()
							// ->where( 'estado=1' )
							// ->where( 'id_anio=1' )
							// ->orderby( 'descripcion' )
							// ->all();
			
			// $cicloslist	= ArrayHelper::map( $dataCiclos, 'id', 'descripcion' );
		// // }

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
        $ciclos = new SemillerosTicCiclos();
		
		// $ciclos->load( Yii::$app->request->post() );
		
		// $model = new SemillerosTicDiarioDeCampoEstudiantes();
		
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
		
		$dataAnios 	= SemillerosTicAnio::find()
							->where( 'estado=1' )
							->all();
			
		$anios	= ArrayHelper::map( $dataAnios, 'id', 'descripcion' );
		
		//Se saca la el id del anio
		$anioSelected = SemillerosTicCiclos::findOne( $model->id_ciclo )->id_anio;
		
		
		$cicloslist = [];
		
		
			

        return $this->renderAjax('update', [
            'model' => $model,
			'fases' => $fases,
            'fasesModel' => $fasesModel,
			'ciclos' => $ciclos,
            'cicloslist' => $cicloslist,
            'anios' => $anios,
            'anioSelected' => $anioSelected,
            'cicloSelected' => $model->id_ciclo,
			
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
        $model = $this->findModel($id);
		$model->estado = 2;
		$model->update(false);

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
	public function actionOpcionesEjecucionDiarioCampo($idFase, $idAnio, $idCiclo,$faseO)
    {
       
	  $data = array('mensaje'=>'','html'=>'','contenido'=>'','descripcion'=>'','hallazgos'=>'','html1'=>'','contenido1'=>'',);
	   
	   $idInstitucion 	= $_SESSION['instituciones'][0];
	   $idSedes 		= $_SESSION['sede'][0];

	   //se crea una instancia del modelo parametro
		$parametroTable 		 	= new Parametro();
		
		//Para traer las descripciones de los encabezados
		if ($idFase == 14) {$idParametro = 14;}
		elseif ($idFase == 15) {$idParametro = 15;}
		elseif ($idFase == 16) {$idParametro = 16;}
		
		//se traen los datos de paramero								  
		$dataParametro		 	= $parametroTable->find()->where('estado=1 and id_tipo_parametro ='.$idParametro)->all();										  
		//se guardan los datos en un array
		$opcionesEjecucion	 	 	 = ArrayHelper::map( $dataParametro, 'id', 'descripcion' );
		
		// echo "<pre>"; print_r($opcionesEjecucion); echo "</pre>";
		
		//se debe consultar el año, el ciclo y la fase para llegar a los datos de la fase
		
		//se crean las instancias de los modelos para traer los textos la base de datos
		$datosIeoProfesional = new DatosIeoProfesional();
		$ejecucionFase = new EjecucionFase();
		
		//se hacen las consultas
		
		/**
		* Concexion a la db, traer los textos segun la fase
		*/
		//variable con la conexion a la base de datos 
		
		$connection = Yii::$app->getDb();
		
		if ($faseO == 1)
		{
			$nro_estudiantes =0;		//No. de estudiantes
			$grados;				//Grados: sale de acuerdos institucionales
			$nro_sesiones=0;			//No. de sesiones realizadas
			$frecuencia;			//Frecuencia de sesiones: este es de la tabla semilleros_datos_ieo_estudiantes
			$duracion_sesion;		//Duración de cada sesión
			$aplicaciones_creadas;	//Aplicaciones creadas
			$temas_tratados;		//Temas problemas tratados


				
				
				$command = $connection->createCommand("
					 select ef.numero_estudiantes, ef.aplicaciones_creadas, ef.problemas_creacion, p.curso_participantes, ds.duracion_sesion, ds.id_sesion
					   from semilleros_tic.ejecucion_fase_i_estudiantes ef, 
							semilleros_tic.datos_ieo_profesional_estudiantes p,
							semilleros_tic.datos_sesiones ds
					  where ef.id_ciclo								= $idCiclo
						and ef.id_fase 								= $faseO
						and ef.id_datos_sesion						= ds.id
						and ef.id_datos_ieo_profesional_estudiantes	= p.id
						and p.id_institucion						= $idInstitucion
						and p.id_sede								= $idSedes
						and ef.estado								= 1
						and p.estado								= 1
						and ds.estado								= 1
				 ");
				$result1 = $command->queryAll();
				
				
				if (count($result1) < 1){
					$data['mensaje']="No se encontraron datos almacenados";
					
				}
				else{
					
					//se llena el resultado de a consulta en un array
					foreach( $result1 as $key ){
						
						//Solo se suma el número de estudiantes
						$nro_estudiantes += $key['numero_estudiantes'];
						
						//es el id de acuerdos institucionales
						$grados[] 				= $key['curso_participantes'];
						
						// //Se suma las sesiones
						// $nro_sesiones 			+= $key['participacion_sesiones'];
						
						// Se hace en un array todas las duraciones de las sesiones
						$duracion_sesion[ $key['id_sesion'] ] = Sesiones::findOne( $key['id_sesion'] )->descripcion.": ".$key['duracion_sesion'];
						
						//Array del nombre de las aplicacioens creadas
						$aplicaciones_creadas[] = $key['aplicaciones_creadas'];
						
						//Total de temas tratados
						$temas_tratados[] 		= $key['problemas_creacion'];
					}
					
					//Contiene la lista de los grados en la ejecución fase i estudiantes
					$cursos = [];
					
					//Buscando frecuencias y cursos
					if( is_array( $grados ) )
					{
						foreach( $grados as $grado ){
							
							$acuerdo = AcuerdosInstitucionalesEstudiantes::findOne( $grado );
							
							//muestra la lista de cursos por id
							$lista_cursos_id = explode( ",", $acuerdo->curso );
							
							foreach( $lista_cursos_id as $id_curso )
							{
								//Saco la descripcion del curso
								$des = Paralelos::findOne( $id_curso )->descripcion;
								
								//Si el curso no esta en la lista la agrego
								if( !in_array($des, $cursos) )
								{
									$cursos[] = Paralelos::findOne( $id_curso )->descripcion;
								}
							}
							
							
						}
						
						$frecuencias[] = Parametro::findOne( $acuerdo->frecuencia_sesiones )->descripcion;
					
					//se formatea para mostrarlos separados por , cursos
						foreach($cursos as $key){
							
							$cursosDescripcion[]=$key;
							
							}
						$cursosDescripcion = implode(",",$cursosDescripcion);
						
						//se formatea para mostrarlos separados por , frecuencias
						foreach($frecuencias as $key){
							
							$frecuenciasDescripcion[]=$key;
							
							}
						$frecuenciasDescripcion = implode(",",$frecuenciasDescripcion);
						
						//se formatea para mostrarlos separados por , aplicaciones_creadas
						foreach($aplicaciones_creadas as $key){
							
							$aplicacionesCreadasDescripcion[]=$key;
							
							}
						$aplicacionesCreadasDescripcion = implode(",",$aplicacionesCreadasDescripcion);
					
						//se formatea para mostrarlos separados por , temas_tratados
						foreach($temas_tratados as $key){
							
							$temasTratadosDescripcion[]=$key;
							
							}
						$temasTratadosDescripcion = implode(",",$temasTratadosDescripcion);
						
						//se formatea para mostrarlos separados por , duracion_sesion
						foreach($duracion_sesion as $key){
							
							$duracionSesionDescripcion[]=$key;
							
							}
						$duracionSesionDescripcion = implode(",",$duracionSesionDescripcion);
					
					// echo "<pre>"; print_r($cursosDescripcion); echo "</pre>"; die();
					}
					
					//para traer sesiones realizadas
						$command = $connection->createCommand("select count(ds.fecha_sesion) as sesiones_realizadas
							from semilleros_tic.datos_sesiones as ds, 
							semilleros_tic.ejecucion_fase_i_estudiantes as ef, semilleros_tic.datos_ieo_profesional_estudiantes as dip
							where ds.id = ef.id_datos_sesion
							and ef.id_ciclo = ".$idCiclo."
							and ef.id_fase = ".$faseO."
							and ef.estado = 1
							and ds.estado = 1
							and ef.id_datos_ieo_profesional_estudiantes = dip.id
							and dip.id_institucion = ".$idInstitucion."
							and dip.id_sede = ".$idSedes."");
						$result4 = $command->queryAll();
						
						$nro_sesiones = $result4[0]['sesiones_realizadas'];
						
						
						//se llena la información a mostrar en el formulario
						
						$data['html']="";
						$data['contenido']="";
						$data['html1']="";
						$data['contenido1']="";
						$contador =0;
						//este foreach toma los primeros 4 resultados de la consulta y los formatea para mostrarlos
						foreach ($opcionesEjecucion as $key => $value)
						{
							
							
							$data['html'].="<div class='col-xs-3'>";
							$data['html'].=$value;
							$data['html'].="</div>";
							
								switch ($contador) 
								{
									case 0:
										$data['contenido'].="<div class='col-xs-3' >";
										$data['contenido'].=$nro_estudiantes;
										$data['contenido'].="</div>";
										
										break;
									case 1:
										$data['contenido'].="<div class='col-xs-3' >";
										$data['contenido'].=$cursosDescripcion;
										$data['contenido'].="</div>";
										
										break;
									case 2:
										$data['contenido'].="<div class='col-xs-3' >";
										$data['contenido'].=$nro_sesiones;
										$data['contenido'].="</div>";
										
										break;
									case 3:
										$data['contenido'].="<div class='col-xs-3' >";
										$data['contenido'].=$frecuenciasDescripcion;
										$data['contenido'].="</div>";
										
										break;
									
								}

							$contador++;
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
							
							switch ($key) 
								{
									case 0:
										$data['contenido1'].="<div class='col-xs-3' >";
										$data['contenido1'].=$duracionSesionDescripcion;
										$data['contenido1'].="</div>";
										
										break;
									case 1:
										$data['contenido1'].="<div class='col-xs-3' >";
										$data['contenido1'].=$aplicacionesCreadasDescripcion;
										$data['contenido1'].="</div>";
										
										break;
									case 2:
										$data['contenido1'].="<div class='col-xs-3' >";
										$data['contenido1'].=$temasTratadosDescripcion;  
										$data['contenido1'].="</div>";
										
										break;
									case 3:
										$data['contenido1'].="<div class='col-xs-3' >";
										$data['contenido1'].="";
										$data['contenido1'].="</div>";
										
										break;
									
								}
						}
					
				} //else
				
				
					
		} //if
		else if ($faseO == 2 || $faseO == 3)
		{
			$nro_estudiantes =0;		//No. de estudiantes
			$grados;				//Grados: sale de acuerdos institucionales
			$nro_sesiones=0;			//No. de sesiones realizadas
			$frecuencia;			//Frecuencia de sesiones: este es de la tabla semilleros_datos_ieo_estudiantes
			$duracion_sesion;		//Duración de cada sesión
			$aplicaciones_desarrolladas;	//Aplicaciones desarrolladas
			$tic;		//Tic

			if ($faseO == 2){$tabla = "ejecucion_fase_ii_estudiantes";}
			if ($faseO == 3){$tabla = "ejecucion_fase_iii_estudiantes";}
				
				$command = $connection->createCommand("
					 select ef.estudiantes_participantes, ef.nombre_aplicaciones, ef.tic, p.curso_participantes, ds.duracion_sesion, ds.id_sesion
					   from semilleros_tic.$tabla ef, 
							semilleros_tic.datos_ieo_profesional_estudiantes p,
							semilleros_tic.datos_sesiones ds
					  where ef.id_ciclo								= $idCiclo
						and ef.id_fase 								= $faseO
						and ef.id_datos_sesion						= ds.id
						and ef.id_datos_ieo_profesional_estudiantes	= p.id
						and p.id_institucion						= $idInstitucion
						and p.id_sede								= $idSedes
						and ef.estado								= 1
						and p.estado								= 1
						and ds.estado								= 1
				 ");
				$result1 = $command->queryAll();
				
				if (count($result1) < 1){
					$data['mensaje']="No se encontraron datos almacenados";
					
				}
				else{
					
						//se llena el resultado de a consulta en un array
				foreach( $result1 as $key ){
					
					//Solo se suma el número de estudiantes
					$nro_estudiantes += $key['estudiantes_participantes'];
					
					//es el id de acuerdos institucionales
					$grados[] 				= $key['curso_participantes'];
					
					// //Se suma las sesiones
					// $nro_sesiones 			+= $key['participacion_sesiones'];
					
					// Se hace en un array todas las duraciones de las sesiones
					$duracion_sesion[ $key['id_sesion'] ] = Sesiones::findOne( $key['id_sesion'] )->descripcion.": ".$key['duracion_sesion'];
					
					//Array del nombre de las aplicacioens desarrolladas
					$aplicaciones_desarrolladas[] = $key['nombre_aplicaciones'];
					
					//Total de temas tratados
					$tic[] 		= $key['tic'];
				}
				
				//Contiene la lista de los grados en la ejecución fase i estudiantes
				$cursos = [];
				
				//Buscando frecuencias y cursos
				if( is_array( $grados ) )
				{
					foreach( $grados as $grado ){
						
						$acuerdo = AcuerdosInstitucionalesEstudiantes::findOne( $grado );
						
						//muestra la lista de cursos por id
						$lista_cursos_id = explode( ",", $acuerdo->curso );
						
						foreach( $lista_cursos_id as $id_curso )
						{
							//Saco la descripcion del curso
							$des = Paralelos::findOne( $id_curso )->descripcion;
							
							//Si el curso no esta en la lista la agrego
							if( !in_array($des, $cursos) )
							{
								$cursos[] = Paralelos::findOne( $id_curso )->descripcion;
							}
						}
						
						
					}
					
					$frecuencias[] = Parametro::findOne( $acuerdo->frecuencia_sesiones )->descripcion;
					
				
				//se formatea para mostrarlos separados por , cursos
					foreach($cursos as $key){
						
						$cursosDescripcion[]=$key;
						
						}
					$cursosDescripcion = implode(",",$cursosDescripcion);
					
					//se formatea para mostrarlos separados por , frecuencias
					foreach($frecuencias as $key){
						
						$frecuenciasDescripcion[]=$key;
						
						}
					$frecuenciasDescripcion = implode(",",$frecuenciasDescripcion);
					
					//se formatea para mostrarlos separados por , aplicaciones_creadas
					foreach($aplicaciones_desarrolladas as $key){
						
						$aplicacionesDesarrolladasDescripcion[]=$key;
						
						}
					$aplicacionesDesarrolladasDescripcion = implode(",",$aplicacionesDesarrolladasDescripcion);
				
				    //se formatea para mostrarlos separados por , tic
					foreach($tic as $key){
						
						$ticDescripcion[]=$key;
						
						}
					$ticDescripcion = implode(",",$ticDescripcion);
					
					//se formatea para mostrarlos separados por , duracion_sesion
					foreach($duracion_sesion as $key){
						
						$duracionSesionDescripcion[]=$key;
						
						}
					$duracionSesionDescripcion = implode(",",$duracionSesionDescripcion);
				
				// echo "<pre>"; print_r($cursosDescripcion); echo "</pre>"; die();
				}
				
				//para traer sesiones realizadas
					$command = $connection->createCommand("select count(ds.fecha_sesion) as sesiones_realizadas
						from semilleros_tic.datos_sesiones as ds, 
						semilleros_tic.$tabla as ef, semilleros_tic.datos_ieo_profesional_estudiantes as dip
						where ds.id = ef.id_datos_sesion
						and ef.id_ciclo = ".$idCiclo."
						and ef.id_fase = ".$faseO."
						and ef.estado = 1
						and ds.estado = 1
						and ef.id_datos_ieo_profesional_estudiantes = dip.id
						and dip.id_institucion = ".$idInstitucion."
						and dip.id_sede = ".$idSedes."");
					$result4 = $command->queryAll();
					
					$nro_sesiones = $result4[0]['sesiones_realizadas'];
					
					
					//se llena la información a mostrar en el formulario
					
					$data['html']="";
					$data['contenido']="";
					$data['html1']="";
					$data['contenido1']="";
					$contador =0;
					//este foreach toma los primeros 4 resultados de la consulta y los formatea para mostrarlos
					foreach ($opcionesEjecucion as $key => $value)
					{
						
						
						$data['html'].="<div class='col-xs-3'>";
						$data['html'].=$value;
						$data['html'].="</div>";
						
							switch ($contador) 
							{
								case 0:
									$data['contenido'].="<div class='col-xs-3' >";
									$data['contenido'].=$nro_estudiantes;
									$data['contenido'].="</div>";
									
									break;
								case 1:
									$data['contenido'].="<div class='col-xs-3' >";
									$data['contenido'].=$cursosDescripcion;
									$data['contenido'].="</div>";
									
									break;
								case 2:
									$data['contenido'].="<div class='col-xs-3' >";
									$data['contenido'].=$nro_sesiones;
									$data['contenido'].="</div>";
									
									break;
								case 3:
									$data['contenido'].="<div class='col-xs-3' >";
									$data['contenido'].=$frecuenciasDescripcion;
									$data['contenido'].="</div>";
									
									break;
								
							}

						$contador++;
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
						
						switch ($key) 
							{
								case 0:
									$data['contenido1'].="<div class='col-xs-3' >";
									$data['contenido1'].=$duracionSesionDescripcion;
									$data['contenido1'].="</div>";
									
									break;
								case 1:
									$data['contenido1'].="<div class='col-xs-3' >";
									$data['contenido1'].=$aplicacionesDesarrolladasDescripcion;
									$data['contenido1'].="</div>";
									
									break;
								case 2:
									$data['contenido1'].="<div class='col-xs-3' >";
									$data['contenido1'].=$ticDescripcion;  
									$data['contenido1'].="</div>";
									
									break;
								case 3:
									$data['contenido1'].="<div class='col-xs-3' >";
									$data['contenido1'].="";
									$data['contenido1'].="</div>";
									
									break;
								
							}
					}
					
				} //else
				
				
		} //fase 2 0 fase 3
	
		
		// echo "<pre>"; print_r($datosEF); echo "</pre>";
		
		
		
		
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

        
		 // echo "<pre>"; print_r($data); echo "</pre>";
		
		echo json_encode( $data ); 
	   
    }
	
	/**
     * Esta funcion lista las opciones de ciclo
     * 
     * @param Recibe id anio
     * @return la lista de los ciclos
     * @throws no tiene excepciones
     */	
	public function actionLlenarCiclos($idAnio)
    {
		$data = array('mensaje'=>'','html'=>'');
	   
		
		$ciclosSelected =array();
		
			// $ciclos = new SemillerosTicCiclos();
			
			$dataCiclos = SemillerosTicCiclos::find()
							->where( 'estado=1' )
							->where( 'id_anio='.$idAnio.'' )
							->orderby('id')
							->all();
			
			$result	= ArrayHelper::map( $dataCiclos, 'id', 'descripcion' );
			
			if (count($result) < 1 ){
				$data['html'].= '<option value="">Seleccione...</option>';
			}
			else{
				$data['html'].= '<option value="">Seleccione...</option>';
					foreach ($result as $key => $value) {
				$data['html'].= '<option value="'.$key.'">'.$value.'</option>';
				
						}
			}
			// echo "<pre>"; print_r($result); echo "</pre>";  die();
			// echo "<pre>"; print_r($data); echo "</pre>"; die();
		echo json_encode( $data );	
			
	}
	
	/**
     * Esta funcion recibe un array y lo devuelve separado por comas
     * 
     * @param Recibe el array
     * @return lista de items separados por comas
     * @throws no tiene excepciones
     */	
	public function arrayArrayComas($array,$nombrePos)
	{
		foreach ($array as $ar)
		{		
			$datos[] = $ar[$nombrePos];
		}
		return  implode(",",$datos);
	}
}
