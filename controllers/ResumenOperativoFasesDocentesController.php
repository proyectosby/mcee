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

		//informacion de la tabla  semilleros_tic.datos_ieo_profesional
		// variable con la conexion a la base de datos 
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("
			SELECT	dip.id ,i.codigo_dane as codigo_dane_institucion, i.descripcion as institucion, s.codigo_dane as codigo_dane_sede,
							s.descripcion as sede, 
							i.id as id_institucion, 
							s.id as id_sede, 
							a.descripcion as anio, 
							c.descripcion as ciclos,
							fa.descripcion as fase,
							sdi.personal_a,
							sdi.id as id_semilleros
			FROM 	semilleros_tic.datos_ieo_profesional as dip,public.sedes as s,public.instituciones as i, semilleros_tic.anio as a, 
					semilleros_tic.fases as fa, semilleros_tic.ciclos as c,	semilleros_tic.ejecucion_fase as ef, semilleros_tic.semilleros_datos_ieo as sdi
			WHERE 	dip.id_institucion = i.id
			AND		dip.id_sede = s.id
			AND 	dip.estado = 1
			AND 	dip.id = ef.id_datos_ieo_profesional
			AND 	ef.id_fase=fa.id 
			AND 	ef.id_ciclo = c.id
			AND 	c.id_anio = a.id
			AND 	sdi.id_institucion =dip.id_institucion
			AND 	sdi.sede = dip.id_sede 
			AND 	sdi.id_ciclo =ef.id_ciclo
			GROUP BY dip.id,i.codigo_dane,i.descripcion, 
			s.codigo_dane, s.descripcion,i.id,s.id, a.descripcion,
			c.descripcion,fa.descripcion,sdi.personal_a, sdi.id
			ORDER BY i.id,s.id
			");
		$datos_ieo_profesional = $command->queryAll();
	
		$html="";
		$contador =0;
		foreach ($datos_ieo_profesional as $dip)
		{
			$html.="<tr>";	
			
			$idInstitucion = $dip['id_institucion'];
			$idSede = $dip['id_sede'];
			
			//obtener las fecha de inicio de semillero 
			$command = $connection->createCommand
			("
				SELECT fecha_sesion FROM semilleros_tic.datos_sesiones WHERE id_sesion = 1 ORDER BY id ASC 
			");
			$fechas = $command->queryAll();

			$id_datos_ieo_profesional = $dip['id'];
			$command = $connection->createCommand
			("
				SELECT 
				id_datos_sesiones,
				docente,
				asignaturas,
				especiaidad,
				seiones_empleadas,
				numero_apps
				
				FROM semilleros_tic.ejecucion_fase 
				WHERE id_datos_ieo_profesional = $id_datos_ieo_profesional 
			");
			$datoSemillerosTicEjecucionFase = $command->queryAll();
			
			
			$docente = array();
			$asignaturas = array();
			$especiaidad = array();
			
			
			//se agrupa la informacion de todas las sesiones para luego ser concatenada
			foreach ($datoSemillerosTicEjecucionFase as $datosSTEF => $valor)
			{	
				
				@$asignatura[$valor['id_datos_sesiones']][]= $valor['asignaturas'];
				@$especiaidad[$valor['id_datos_sesiones']][]= $valor['especiaidad'];
				@$datosSesion[$valor['id_datos_sesiones']]= $valor['id_datos_sesiones'];
				@$seionesEmpleadas+= $valor['seiones_empleadas'];
				@$numeroApps+= $valor['numero_apps'];
					
			}
				
			
			$idDatosSesiones = implode(",",$datosSesion);			
			//se pasa a por comas para mostrar todas la materias
			//variable que guarda los datos a mostrar
			$asignaturas="";
			foreach ($asignatura as $asig)
			{
				$asignaturas .= implode(",",$asig).",";
			}
			$asignaturas = substr($asignaturas,0,-1);
			
		
			
			$command = $connection->createCommand
			("
				SELECT 
				fecha_sesion,
				duracion_sesion
				
				FROM semilleros_tic.datos_sesiones
				WHERE id in($idDatosSesiones)
				GROUP BY fecha_sesion,duracion_sesion,id
				ORDER BY id ASC 
			");
			$datos_sesiones = $command->queryAll();
			
		
			//cambio pendiente
			//para la fecuencia de las sesiones se trae de la conformacion de semilleros
			$frecuenciaSesiones =array();
			$command = $connection->createCommand("
			select ai.frecuencias_sesiones
			from 	semilleros_tic.acuerdos_institucionales as ai, 
					semilleros_tic.fases as f, 
					semilleros_tic.semilleros_datos_ieo as sdi,
					semilleros_tic.datos_ieo_profesional as dip, 
					semilleros_tic.ejecucion_fase as ef, 
					semilleros_tic.anio as a,
					semilleros_tic.ciclos as c
			where f.id in (1,2,3)
			and ai.id_fase = f.id
			and ai.id_semilleros_datos_ieo = sdi.id
			and sdi.id_institucion = dip.id_institucion
			and sdi.sede = dip.id_sede
			and dip.id_institucion = 	$idInstitucion
			and dip.id_sede = $idSede 
			--and c.id = 1
			and ai.id_ciclo = c.id 
			and ef.id_ciclo = c.id
			--and a.id = 1
			and c.id_anio = a.id
			and dip.estado = 1
			and ef.estado = 1
			and sdi.estado = 1
			and ai.estado = 1
			and a.estado = 1
			and c.estado =1
			group by ai.frecuencias_sesiones");

			$frecuenciaSesiones = $command->queryAll();
			$frecuenciaSesiones[0]['frecuencias_sesiones'] =15;
			
			
			//consultar la descripcion de la frecuencia sesiones
			$command = $connection->createCommand("select descripcion
			from parametro
			where id_tipo_parametro = 6 
			and id = ".@$frecuenciaSesiones[0]['frecuencias_sesiones']."
			and estado = 1");
			$result4 = $command->queryAll();
			
			$frecuenciaSesionesDescripcion = "";
			foreach($result4 as $key)
			{
				$frecuenciaSesionesDescripcion.=" ".implode(" ",$key);	
			}
			
			$idProfesionalA = $dip['personal_a'];
			//nombres de los profesional a
			$command = $connection->createCommand
			("
				SELECT concat(p.nombres,' ',p.apellidos) as nombre		
				FROM public.personas as p
				WHERE id in($idProfesionalA )
			");
			$datoPersonalA = $command->queryAll();	
			$nomresPersonalA = $this->arrayArrayComas($datoPersonalA,'nombre');
		
			
			
			
			//nombres de los docentes 
			$idSemilleros = $dip['id_semilleros'];
			$command = $connection->createCommand
			("
				SELECT 
				id_docente,
				especialidad
				FROM semilleros_tic.acuerdos_institucionales
				WHERE id_semilleros_datos_ieo = $idSemilleros
			");
			$datoAcuerdosInstitucionales = $command->queryAll();	
			$datosIdDocentes = $this->arrayArrayComas($datoAcuerdosInstitucionales,'id_docente');
			$especialidades= $this->arrayArrayComas($datoAcuerdosInstitucionales,'especialidad');
			
			
			$command = $connection->createCommand
			("
				SELECT concat(p.nombres,' ',p.apellidos) as nombre		
				FROM public.personas as p
				WHERE id in($datosIdDocentes )
			");
			$datosDocentes = $command->queryAll();	
			$nombresDocentes = $this->arrayArrayComas($datosDocentes,'nombre');
			//datos Fase II
			$command = $connection->createCommand("
			SELECT * 
			FROM semilleros_tic.ejecucion_fase_ii
			ORDER BY id ASC ");
			$datosEjeccionFaseii = $command->queryAll();
			
			//Promedio de duración por cada sesión (hora reloj)
			$totalDuracionSesiones =0;
			
			foreach($datos_sesiones as $ds)
			{
				$totalDuracionSesiones += $ds['duracion_sesion'];
			}
			
			
			$html.="<td style='border: 1px solid black;'>".$dip['codigo_dane_institucion']."</td>";	
			$html.="<td style='border: 1px solid black;'>".$dip['institucion']."</td>";	
			$html.="<td style='border: 1px solid black;'>".$dip['codigo_dane_sede']."</td>";	
			$html.="<td style='border: 1px solid black;'>".$dip['sede']."</td>";
			
			//anio
			$html.="<td style='border: 1px solid black;'>".$dip['anio']."</td>";	
			
			
			//ciclo
			$html.="<td style='border: 1px solid black;'>".$dip['ciclos']."</td>";	
			
			//profesional_a
			$html.="<td style='border: 1px solid black;'>".$nomresPersonalA ."</td>";
			
			//Fecha de inicio del Semillero
			$html.="<td style='border: 1px solid black;'>".@$fechas[$contador]['fecha_sesion']."</td>";	
			
			//nombre del docente
			$html.="<td style='border: 1px solid black;'>".$nombresDocentes."</td>";
			
			//Nombre de las asignaturas que enseña
			$html.="<td style='border: 1px solid black;'>".$asignaturas."</td>";	
			
			//Especialidad de la Media Técnica o Técnica	
			$html.="<td style='border: 1px solid black;'>".$especialidades."</td>";
			
			//Frecuencia sesiones mensual
			$html.="<td style='border: 1px solid black;'>".$frecuenciaSesionesDescripcion ."</td>";	
			
			//Promedio de duración por cada sesión (hora reloj)
			$html.="<td style='border: 1px solid black;'>".$totalDuracionSesiones/count($datos_sesiones)."</td>";
				
			//docente por sesion
			for($i=0;$i<=5;$i++)
			{
				//docentes por sesion
				$html.="<td style='border: 1px solid black;'></td>";
				//fecha de la sesion 
				$html.="<td style='border: 1px solid black;'>".@$datos_sesiones[$i]['fecha_sesion']."</td>";
				//duración de la sesion
				$html.="<td style='border: 1px solid black;'>".@$datos_sesiones[$i]['duracion_sesion']."</td>";
				
			}

			
			//total Sesiones
			$html.="<td style='border: 1px solid black;'>$seionesEmpleadas</td>";
			
			//Número de Apps 0.0 creadas
			$html.="<td style='border: 1px solid black;'>$numeroApps</td>";
			
			//frecuencia sesiones mensual fase ii
			$html.="<td style='border: 1px solid black;'>pendiente</td>";
			
			
			
			$html.="</tr>";
			
			//se borra le variable para que quede vacia en el siguiente ciclo del foreach
			$asignaturas	= null;
			$especiaidades	= null;
			$datosSesion	= null;
			$seionesEmpleadas = null;
			$asignatura		= null;
			$especiaidad	= null;
			$datosSesion	= null;
			$seionEmpleada	= null;
			$numeroApp		= null;
			$numeroApps		= null;
			$contador++;
		}
		echo json_encode($html);
	}
    /**
     * Displays a single EcDatosBasicos model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
	 
	public function arrayArrayComas($array,$nombrePos)
	{
		foreach ($array as $ar)
		{		
			$datos[] = $ar[$nombrePos];
		}
		return  implode(",",$datos);
	}
	
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
