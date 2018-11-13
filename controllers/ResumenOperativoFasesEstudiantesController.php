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
        $datosFase1 = [];
        $datosFase2 = [];
        $datosFase3 = [];
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

            //obtener las fecha de inicio de semillero 
			$command = $connection->createCommand
			("
				SELECT fecha_sesion FROM semilleros_tic.datos_sesiones WHERE id_sesion = 1 ORDER BY id ASC 
			");
            $fechas = $command->queryAll();
            
            
            //frecuencia
            $idSemilleros = $dip['id_semilleros'];
			$command = $connection->createCommand
			("
				SELECT 
				frecuencias_sesiones
				FROM semilleros_tic.acuerdos_institucionales
				WHERE id_semilleros_datos_ieo = $idSemilleros
			");
            $datoAcuerdosInstitucionales = $command->queryAll();
            $frecuenciaSesion = $this->arrayArrayComas($datoAcuerdosInstitucionales,'frecuencias_sesiones') != "" ? $this->arrayArrayComas($datoAcuerdosInstitucionales,'frecuencias_sesiones') : "0" ;

            $command = $connection->createCommand("
			SELECT descripcion
			FROM public.parametro
			WHERE id in($frecuenciaSesion)
			ORDER BY id ASC ");
			$frecuenciasSesiones = $command->queryAll();
            $frecuenciasSesiones= $this->arrayArrayComas($frecuenciasSesiones,'descripcion');
            

            $command = $connection->createCommand
			("
				SELECT 
				id_datos_sesion,
				sesiones_empleadas,
                apps_creadas,
                participacion_sesiones,
                numero_estudiantes
				FROM semilleros_tic.ejecucion_fase_i_estudiantes 
				WHERE id_datos_ieo_profesional_estudiantes = $id_datos_ieo_profesional 
			");
            $datoSemillerosTicEjecucionFase1 = $command->queryAll();
            
            //se agrupa la informacion de todas las sesiones para luego ser concatenada
			foreach ($datoSemillerosTicEjecucionFase1 as $datosSTEF => $valor){	
				@$datosSesion[$valor['id_datos_sesiones']]= $valor['id_datos_sesion'];
                @$seionesEmpleadas[$valor['id_datos_sesiones']]= $valor['id_datos_sesion'];
                @$numeroEstudiantes+= $valor['numero_estudiantes'];
                @$cantidadParticipante[$valor['id_datos_sesiones']][]= $valor['participacion_sesiones'];
                @$numeroApps+= $valor['apps_creadas'];
			}
            $idDatosSesiones = implode(",",$datosSesion);

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
            
            $segundos = 0;
			foreach($datos_sesiones as $ds)
			{
				$segundos += $this->conversionSegundos($ds['duracion_sesion']);
            }          
            
            $promedioHorasFase1  = $segundos / count($datos_sesiones);
			$promedioHorasFase1 =  $this->conversionSegundosHora($promedioHorasFase1);
            
            array_push($data, $dip['codigo_dane_institucion'], $dip['institucion'], $dip['codigo_dane_sede'],$dip['sede'],  $dip['anio'], $dip['ciclos'], $nomresPersonalA, @$fechas[$contador]['fecha_sesion'], $frecuenciasSesiones, $promedioHorasFase1, '10-1, 10-1'); 
            
            //cantidad estudiantes fase 1 sesiones
			foreach ($cantidadParticipante as $cd => $value)
			{
				$cantidadParticipantes[] = count($value);
			}
            //docente por sesion fase 1
			for($i=0;$i<=5;$i++){
                array_push($data, " ", @$datos_sesiones[$i]['fecha_sesion'], @$cantidadParticipantes[$i], @$datos_sesiones[$i]['duracion_sesion']);
            }
            
            array_push($data, count($seionesEmpleadas), $numeroEstudiantes ,$numeroApps);
            $sede = $dip['id_sede'];
            $command = $connection->createCommand
				("
                    select ai.frecuencia_sesiones, p.descripcion,  ai.curso
                    from semilleros_tic.acuerdos_institucionales_estudiantes as ai, semilleros_tic.fases as f, semilleros_tic.semilleros_datos_ieo_estudiantes as sdi,
                        semilleros_tic.datos_ieo_profesional_estudiantes as dip, semilleros_tic.ejecucion_fase_ii_estudiantes as ef, semilleros_tic.anio as a,
                        semilleros_tic.ciclos as c, public.parametro as p
                    
                    where f.id = 2
                    and ai.id_fase = f.id
                    and ai.id_semilleros_datos_estudiantes = sdi.id
                    and sdi.id_institucion = dip.id_institucion
                    and sdi.id_sede = dip.id_sede
                    and dip.id_institucion = 55 
                    and dip.id_sede = $sede
                    and c.id_anio = a.id
                    and dip.estado = 1
                    and ef.estado = 1
                    and sdi.estado = 1
                    and ai.estado = 1
                    and a.estado = 1
                    and c.estado =1
                    and  ai.frecuencia_sesiones = p.id
                    group by ai.frecuencia_sesiones,p.descripcion,  ai.curso

				");
                $frecuenciaSesiones2 = $command->queryAll();
                $frecunciaSesionesFase2 = $this->arrayArrayComas($frecuenciaSesiones2,'descripcion');
                var_dump($frecunciaSesionesFase2);
                $cursosFase2 = $this->arrayArrayComas($frecuenciaSesiones2,'curso');

                array_push($data, $frecunciaSesionesFase2);
                               
                //datos de la fase 2
                $command = $connection->createCommand("
                SELECT 
                id_datos_sesion,
                apps_desarrolladas,
                estudiantes_participantes
                FROM semilleros_tic.ejecucion_fase_ii_estudiantes
                WHERE id_datos_ieo_profesional_estudiantes = $id_datos_ieo_profesional
                AND estado = 1
                ORDER BY id ASC ");
                $datosEjeccionFaseii = $command->queryAll();
                
                $cantidadEstudianteFase2 = array();
                
                $datosSesionFase2= array();
                foreach ($datosEjeccionFaseii as $datosSTEF2 => $valor)
                {	
                    @$datosSesionFase2[$valor['id_datos_sesiones']]= $valor['id_datos_sesion'];
                    @$seionesEmpleadasFase2[$valor['id_datos_sesiones']]= $valor['id_datos_sesion'];
                    @$numeroAppsFase2+= $valor['apps_desarrolladas'];
                    @$cantidadEstudianteFase2[$valor['id_datos_sesiones']][]= $valor['estudiantes_participantes'];
                    @$numeroEstudiantesFase2+= $valor['estudiantes_participantes'];
                }
            
                foreach ($cantidadEstudianteFase2 as $cd => $value)
                {
                    $cantidadEstudiantesFase2[] = count($value);
                }
                
                             
                
                if(!(empty($cantidadEstudiantesFase2)))
                {  
                    
                    $idDatosSesionesFase2 = implode(",",$datosSesionFase2);
                    
                    if($idDatosSesionesFase2 != ""){                        
                        $command = $connection->createCommand
                        ("
                            SELECT 
                            id,
                            fecha_sesion,
                            duracion_sesion
                            FROM semilleros_tic.datos_sesiones
                            WHERE id in($idDatosSesionesFase2)
                            GROUP BY fecha_sesion,duracion_sesion,id
                            ORDER BY id ASC 
                        ");
                        $datos_sesionesFase2 = $command->queryAll();
                        
                        $cantidadSesionesEmpleadasFase2 =  count($seionesEmpleadasFase2);                        
                    
                        $totalDuracionSesionesFse2 =0;
                        foreach($datos_sesionesFase2 as $ddsf2)
                        {
                            
                            $totalDuracionSesionesFse2+=$this->conversionSegundos( $ddsf2['duracion_sesion']);
                        }
                        
                        $promedio2 =  @$this->conversionSegundosHora( $totalDuracionSesionesFse2 / count($datos_sesionesFase2));

                        $listaCursos2 = [];
                        $cursos2 = explode(",",$cursosFase2);
                        for ($i=0; $i <count($cursos2); $i++) { 
                            $command = $connection->createCommand
                            ("
                                SELECT descripcion
                                FROM public.paralelos
                                WHERE id = $cursos2[$i]
                            ");
                            $dataaa = $command->queryOne();
                            array_push($listaCursos2,$dataaa['descripcion']);
                        }

                        array_push($data, $promedio2, implode(", ",$listaCursos2));

                        $promedio = "";

                        for($i=0;$i<=5;$i++)
                        {
                            array_push($data, " ", @$datos_sesionesFase2[$i]['fecha_sesion'], @$cantidadEstudiantesFase2[$i], @$datos_sesionesFase2[$i]['duracion_sesion']);                    
                        }
                        array_push($data, $cantidadSesionesEmpleadasFase2, $numeroEstudiantesFase2 ,$numeroAppsFase2);
                    }

                }else
                {
                    $cantidadSesionesEmpleadasFase2 = "";
                }

                $command = $connection->createCommand
				("
                    select ai.frecuencia_sesiones, p.descripcion, ai.curso
                    from semilleros_tic.acuerdos_institucionales_estudiantes as ai, semilleros_tic.fases as f, semilleros_tic.semilleros_datos_ieo_estudiantes as sdi,
                        semilleros_tic.datos_ieo_profesional_estudiantes as dip, semilleros_tic.ejecucion_fase_iii_estudiantes as ef, semilleros_tic.anio as a,
                        semilleros_tic.ciclos as c, public.parametro as p
                    
                        where f.id = 2
                    and ai.id_fase = f.id
                    and ai.id_semilleros_datos_estudiantes = sdi.id
                    and sdi.id_institucion = dip.id_institucion
                    and sdi.id_sede = dip.id_sede
                    and dip.id_institucion = 55 
                    and dip.id_sede = $sede
                    and c.id_anio = a.id
                    and dip.estado = 1
                    and ef.estado = 1
                    and sdi.estado = 1
                    and ai.estado = 1
                    and a.estado = 1
                    and c.estado =1
                    and  ai.frecuencia_sesiones = p.id
                    group by ai.frecuencia_sesiones,p.descripcion, ai.curso

				");
                $frecuenciaSesiones3 = $command->queryAll();
                $frecunciaSesionesFase3 = $this->arrayArrayComas($frecuenciaSesiones3,'descripcion');
                $cursosFase3 = $this->arrayArrayComas($frecuenciaSesiones3,'curso');
                


                array_push($data, $frecunciaSesionesFase3);
                
                //datos de la fase 3
                $command = $connection->createCommand("
                SELECT 
                id_datos_sesion,
                numero_apps,
                estudiantes_participantes
                FROM semilleros_tic.ejecucion_fase_iii_estudiantes
                WHERE id_datos_ieo_profesional_estudiantes = $id_datos_ieo_profesional
                AND estado = 1
                ORDER BY id ASC ");
                $datosEjeccionFaseiii = $command->queryAll();
                
                $cantidadEstudianteFase3 = array();
                $datosSesionFase3= array();
                foreach ($datosEjeccionFaseii as $datosSTEF2 => $valor)
                {	
                    @$datosSesionFase3[$valor['id_datos_sesiones']]= $valor['id_datos_sesion'];
                    @$seionesEmpleadasFase3[$valor['id_datos_sesiones']]= $valor['id_datos_sesion'];
                    @$numeroAppsFase3+= $valor['numero_apps'];
                    @$cantidadEstudianteFase3[$valor['id_datos_sesiones']][]= $valor['estudiantes_participantes'];
                    @$numeroEstudiantesFase3+= $valor['estudiantes_participantes'];
                }

                foreach ($cantidadEstudianteFase3 as $cd => $value)
                {
                    $cantidadEstudiantesFase3[] = count($value);
                }

                if(!(empty($cantidadEstudiantesFase3)))
                { 
                    
                    $idDatosSesionesFase3 = implode(",",$datosSesionFase3);

                    if($idDatosSesionesFase3 != ""){

                        $command = $connection->createCommand
                        ("
                            SELECT 
                            id,
                            fecha_sesion,
                            duracion_sesion
                            FROM semilleros_tic.datos_sesiones
                            WHERE id in($idDatosSesionesFase3)
                            GROUP BY fecha_sesion,duracion_sesion,id
                            ORDER BY id ASC 
                        ");
                        $datos_sesionesFase3 = $command->queryAll();
                        $cantidadSesionesEmpleadasFase3 =  count($seionesEmpleadasFase3);
                        
                        $totalDuracionSesionesFse3 =0;
                        foreach($datos_sesionesFase3 as $ddsf3)
                        {   
                            $totalDuracionSesionesFse3+=$this->conversionSegundos( $ddsf3['duracion_sesion']);
                        }

                        $promedio3 =  @$this->conversionSegundosHora( $totalDuracionSesionesFse3 / count($datos_sesionesFase3));
                        
                        $listaCursos3 = [];
                        $cursos = explode(",",$cursosFase3);
                        for ($i=0; $i <count($cursos); $i++) { 
                            $command = $connection->createCommand
                            ("
                                SELECT descripcion
                                FROM public.paralelos
                                WHERE id = $cursos[$i]
                            ");
                            $dataa = $command->queryOne();
                            array_push($listaCursos3,$dataa['descripcion']);
                        }

                        array_push($data, $promedio3, implode(", ",$listaCursos3));
                        $promedio3 = "";
                        
                        for($i=0;$i<=5;$i++)
                        {
                            array_push($data, " ", @$datos_sesionesFase3[$i]['fecha_sesion'], @$cantidadEstudiantesFase3[$i], @$datos_sesionesFase3[$i]['duracion_sesion']);                    
                        }
                        array_push($data, $cantidadSesionesEmpleadasFase3, $numeroEstudiantesFase3 ,$numeroAppsFase3);

                        
                        $totalPaticipante = explode(',',$dip['curso_participantes']);
                        
                        $i= 0;
                        $totalPaticipantes = 0;
                        for ($i; $i <count($totalPaticipante) ; $i++) { 
                            $totalPaticipantes += $totalPaticipante[$i];
                        }
                        $totalPaticipantes = $totalPaticipantes / $i;
                        

                        @$totalSesiones  = @count($seionesEmpleadas) + @$cantidadSesionesEmpleadasFase2 + @$cantidadSesionesEmpleadasFase3;
                        @$totalParticipantes  = @count($seionesEmpleadas) + @$cantidadSesionesEmpleadasFase2 + @$cantidadSesionesEmpleadasFase3;
                        array_push($data,$totalPaticipantes, $totalSesiones);

                    }
                    

                }


            array_push($totalDatos, $data);

          

            $contador++;
        }
        //die();
        
        $searchModel = new EcDatosBasicosBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data' => $totalDatos,
            'datosFase1' => $datosFase1,
            'datosFase2' => $datosFase2,
            'datosFase3' => $datosFase3
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
