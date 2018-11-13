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
use yii\helpers\ArrayHelper;
/**
 * EcDatosBasicosController implements the CRUD actions for EcDatosBasicos model.
 */
class ResumenOperativoFasesEstudiantesController extends Controller
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
        
        $connection = Yii::$app->getDb();
		$command = $connection->createCommand("
        SELECT	dip.id ,i.codigo_dane as codigo_dane_institucion, i.descripcion as institucion, s.codigo_dane as codigo_dane_sede,
                        s.descripcion as sede, 
                        i.id as id_institucion, 
                        s.id as id_sede, 
                        a.descripcion as anio, 
                        c.descripcion as ciclos,
                        fa.descripcion as fase,
                        sdi.profecional_a,
                        sdi.id as id_semilleros,
                        dip.curso_participantes
        FROM 	semilleros_tic.datos_ieo_profesional_estudiantes as dip,public.sedes as s,public.instituciones as i, semilleros_tic.anio as a, 
                semilleros_tic.fases as fa, semilleros_tic.ciclos as c,	semilleros_tic.ejecucion_fase_i_estudiantes as ef, semilleros_tic.semilleros_datos_ieo_estudiantes as sdi
        WHERE 	dip.id_institucion = i.id
        AND		dip.id_sede = s.id
        AND 	dip.estado = 1
        AND 	dip.id = ef.id_datos_ieo_profesional_estudiantes
        AND 	ef.id_fase=fa.id 
        AND 	ef.id_ciclo = c.id
        AND 	c.id_anio = a.id
        AND 	sdi.id_institucion =dip.id_institucion
        AND 	sdi.id_sede = dip.id_sede 
        AND 	sdi.id_ciclo =ef.id_ciclo
        GROUP BY dip.id,i.codigo_dane,i.descripcion, 
        s.codigo_dane, s.descripcion,i.id,s.id, a.descripcion,
        c.descripcion,fa.descripcion,sdi.profecional_a, sdi.id
        ORDER BY i.id,s.id
        
        ");
        $datos_ieo_profesional = $command->queryAll();
        
        $contador =0;
        $totalDatos = [];
		foreach ($datos_ieo_profesional as $dip)
		{
            $data= [];

            $idInstitucion = $dip['id_institucion'];
            $idSede = $dip['id_sede'];
            $id_datos_ieo_profesional = $dip['id'];
            
        
            //nombres de los profesional a
            $idProfesionalA = $dip['profecional_a'];
			$command = $connection->createCommand
			("
				SELECT concat(p.nombres,' ',p.apellidos) as nombre		
				FROM public.personas as p
				WHERE id in($idProfesionalA)
			");
			$datoPersonalA = $command->queryAll();	
			$nomresPersonalA = $this->arrayArrayComas($datoPersonalA,'nombre');

            //obtener las fecha de inicio de semillero con respecto a la sesion 1
			$command = $connection->createCommand
			("
                SELECT dts.fecha_sesion 
                FROM semilleros_tic.datos_sesiones as dts
                join semilleros_tic.ejecucion_fase_i_estudiantes as efe on efe.id_datos_sesion = dts.id
                join semilleros_tic.datos_ieo_profesional_estudiantes dpro on efe.id_datos_ieo_profesional_estudiantes = dpro.id
                WHERE dts.id_sesion = 1 and dpro.id_sede =  $idSede ORDER BY dts.id desc 
			");
            $fechas = $command->queryAll();

            //Frecuencia fase 1
            $idSemilleros = $dip['id_semilleros'];
            
            array_push($data, $dip['codigo_dane_institucion'], $dip['institucion'], $dip['codigo_dane_sede'],$dip['sede'],  $dip['anio'], $dip['ciclos'], $nomresPersonalA, @$fechas[0]['fecha_sesion']);
            
            
        /**Inicio datos fases 1 */

            $command = $connection->createCommand
            ("
                SELECT 
                frecuencia_sesiones, curso
                FROM semilleros_tic.acuerdos_institucionales_estudiantes
                WHERE id_semilleros_datos_estudiantes = $idSemilleros and id_fase = 1
            ");

            $datoAcuerdosInstitucionales = $command->queryAll();
            $frecuenciaSesion1 = $this->arrayArrayComas($datoAcuerdosInstitucionales,'frecuencia_sesiones') != "" ? $this->arrayArrayComas($datoAcuerdosInstitucionales,'frecuencia_sesiones') : "0" ;
            $cursoSesion1 = $this->arrayArrayComas($datoAcuerdosInstitucionales,'curso') != "" ? $this->arrayArrayComas($datoAcuerdosInstitucionales,'curso') : "0" ;

            /**Obtiene nombres descriptivos en base a los id's de las sesiones */
            $command = $connection->createCommand("
            SELECT descripcion
            FROM public.parametro
            WHERE id in($frecuenciaSesion1)
            ORDER BY id ASC ");
            $frecuenciasSesiones = $command->queryAll();
            $frecuenciasSesiones= $this->arrayArrayComas($frecuenciasSesiones,'descripcion');

            array_push($data,$frecuenciasSesiones);
            
            //Duracion promedio de las sesiones
            //Datos generales de las sesiones

            $command = $connection->createCommand
            ("
                SELECT 
                efe.sesiones_empleadas, efe.apps_creadas, efe.participacion_sesiones, efe.numero_estudiantes, dts.fecha_sesion, dts.duracion_sesion
                FROM semilleros_tic.ejecucion_fase_i_estudiantes as  efe
                inner join semilleros_tic.datos_sesiones as dts on dts.id = efe.id_datos_sesion
                WHERE id_datos_ieo_profesional_estudiantes = $id_datos_ieo_profesional 
            ");
            $datoSemillerosTicEjecucionFase1 = $command->queryAll();
            $segundos = 0;
            foreach ($datoSemillerosTicEjecucionFase1 as $datosSTEF => $valor){ 
                @$numeroApps+= $valor['apps_creadas'];
                $segundos += $this->conversionSegundos($valor['duracion_sesion']);
            }
            $promedioHorasFase1  = $segundos / count($datoSemillerosTicEjecucionFase1);
            $promedioHorasFase1 =  $this->conversionSegundosHora($promedioHorasFase1);
            

            /**Obtiene nombre de los cursos para fase 1 */
            $command = $connection->createCommand("
            SELECT descripcion
            FROM public.paralelos
            WHERE id in($cursoSesion1)
            ORDER BY id ASC ");
            $cusosSesiones = $command->queryAll();
            $cusosSesiones= $this->arrayArrayComas($cusosSesiones,'descripcion');
            array_push($data, $promedioHorasFase1, $cusosSesiones);

            $command = $connection->createCommand("
                SELECT
                    dts.fecha_sesion,
                    efe.apps_creadas,
                    efe.participacion_sesiones,
                    dts.duracion_sesion
                FROM semilleros_tic.ejecucion_fase_i_estudiantes efe
                inner join semilleros_tic.datos_sesiones dts on dts.id = efe.id_datos_sesion
                WHERE id_datos_ieo_profesional_estudiantes = $id_datos_ieo_profesional
                AND efe.estado = 1
                ORDER BY efe.id ASC
                ");
            $datosEjeccionFasei = $command->queryAll();

            foreach ($datosEjeccionFasei as $datos1 => $valor){
                @$totalapps1 += $valor['apps_creadas'];
                @$totalparticipantes1  += $valor['participacion_sesiones'];
                array_push($data, "", $valor['fecha_sesion'], $valor['participacion_sesiones'], $valor['duracion_sesion']);
            }
            /**rellena la cantidad de sesiones vacias */
            $restantes = 6 - count($datosEjeccionFasei);
            if($restantes > 0 ){
                for ($i=0; $i < $restantes; $i++) { 
                    array_push($data, "", "", "", "");
                }
            }
            array_push($data, count($datosEjeccionFasei), $totalparticipantes1, $totalapps1);


        /**Fin datos Fase 1 */
            array_push($totalDatos, $data);
            $contador++;
        }
        
        
        $searchModel = new EcDatosBasicosBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data' => $totalDatos,
        ]);
    }

    public function conversionSegundos($hora)
	{
        list($horas, $minutos) = explode(':',$hora);
        $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 );
    
    return $hora_en_segundos;
    }
    

	public function conversionSegundosHora($segundos) { 
        $h = floor($segundos / 3600); 
        $m = floor(($segundos % 3600) / 60); 
        
        return sprintf('%02d:%02d', $h, $m); 
    }

    public function arrayArrayComas($array,$nombrePos)
	{   
        $datos = [];
		foreach ($array as $ar)
		{	  
			$datos[] = $ar[$nombrePos];
        }
		return  implode(",",$datos);
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
