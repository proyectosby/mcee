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
            SELECT	dip.id, i.codigo_dane as codigo_dane_institucion, i.descripcion as institucion, s.codigo_dane as codigo_dane_sede,
                    s.descripcion as sede,dip.id_profesional_a,i.id as id_institucion, s.id as id_sede, a.descripcion as anio, 
                    c.descripcion as ciclos, dip.curso_participantes
            
            FROM    semilleros_tic.datos_ieo_profesional_estudiantes as dip, 
                    public.sedes as s,
                    public.instituciones as i, 
                    semilleros_tic.ejecucion_fase_i_estudiantes as ef, 
                    semilleros_tic.ciclos as c, 
                    semilleros_tic.anio as a,
                    semilleros_tic.fases as fa
            WHERE 	dip.id_institucion = i.id
                    AND	dip.id_sede = s.id
                    AND ef.id_fase=fa.id
                    AND ef.id_ciclo = c.id
                    AND c.id_anio = a.id
            GROUP BY dip.id,  i.codigo_dane, i.descripcion, s.codigo_dane, s.descripcion, i.id,s.id, a.descripcion,c.descripcion
        
        ");
        $datos_ieo_profesional = $command->queryAll();
        
        $html="";
        $contador =0;
        $totalDatos = [];
        $datosFase1 = [];
        $datosFase2 = [];
        $datosFase3 = [];
		foreach ($datos_ieo_profesional as $dip)
		{
            
            if($contador == 0){
                $datos= [];
                array_push($datos, $dip['codigo_dane_institucion'], $dip['institucion'], $dip['codigo_dane_sede'],$dip['sede'],  $dip['anio'], $dip['ciclos']); 

                $idInstitucion = $dip['id_institucion'];
                $idSede = $dip['id_sede'];
                $profesional_a = $dip['id_profesional_a'];
                
                $command = $connection->createCommand
                    ("
                        SELECT concat(p.nombres,' ',p.apellidos) FROM public.personas as p WHERE id in($profesional_a)
                    ");
                $nombres = $command->queryAll();
				//se cambia de $nombre=null; a $nombre=array();
                $nombre=array();
                
                foreach( $nombres as $nom)
                {
                    $nombre[]= $nom['concat'];
                }
                $nombres = implode(",",$nombre);
                $nombre=null;
                
                array_push($datos, $nombres);

                $command = $connection->createCommand
                    ("
                        SELECT fecha_sesion FROM semilleros_tic.datos_sesiones WHERE id_sesion = 1 ORDER BY id ASC 
                    ");
                $fechas = $command->queryAll();
            
                array_push($datos, $fechas[$contador]['fecha_sesion']);
                $totalAsistentes= 0;
                
                /**Consulta datos fase 1 **/
                
                /**********************************/

                $id_datos_ieo_profesional = $dip['id'];
                $command = $connection->createCommand
                ("
                SELECT 
                        aci.frecuencia_sesiones,
                        sum(efi.participacion_sesiones) as asistentes, 
                        sum(efi.numero_estudiantes) as numestudiantes ,
                        sum(efi.apps_creadas) as appcreadas,
                        ds.duracion_sesion as duracion
                    FROM  semilleros_tic.ejecucion_fase_i_estudiantes efi
                    INNER JOIN semilleros_tic.datos_sesiones ds ON ds.id = efi.id_datos_sesion
                    INNER JOIN semilleros_tic.sesiones se on se.id = ds.id_sesion
                    INNER JOIN semilleros_tic.acuerdos_institucionales_estudiantes as aci ON efi.id_fase = aci.id_fase
                    WHERE  id_datos_ieo_profesional_estudiantes =7
                    GROUP BY efi.id_datos_sesion, aci.frecuencia_sesiones, ds.duracion_sesion;
                ");
                
                
                $datoSemillerosTicEjecucionFase = $command->queryAll();
                $frecuenciaSesion1 = "";
                $duracuionPromedio1 = 0;
                $contadorSesionesFase1 = 0;
                $totalEstudiantes = 0;
                $totalappcreadsa = 0;
                foreach ($datoSemillerosTicEjecucionFase as $datosSTEF => $valor)
                {	
                    $totalAsistentes +=  $valor['asistentes'];
                    $duracuionPromedio1 +=  $this->conversionSegundos($valor['duracion']);
                    $frecuenciaSesion1 = $valor['frecuencia_sesiones'];       
                    $totalEstudiantes += $valor['numestudiantes'];
                    $totalappcreadsa += $valor['appcreadas'];
                    array_push($datosFase1, 1,  $fechas[$contador]['fecha_sesion'], $valor['asistentes'], $valor['duracion']  );
                    $contadorSesionesFase1 ++;				
                }
                $duracuionPromedio1 = $duracuionPromedio1 / $contadorSesionesFase1;
                $duracuionPromedio1 =  $this->conversionSegundosHora($duracuionPromedio1);
            
                array_push($datos, $frecuenciaSesion1, $duracuionPromedio1, $dip['curso_participantes'] );

                array_push($datos, $contadorSesionesFase1, $totalEstudiantes, $totalappcreadsa);

                 /**Consulta datos fase 2**/
                $command = $connection->createCommand
                ("
                    SELECT
                        aci.frecuencia_sesiones,
                        sum(efi.estudiantes_participantes) as numestudiantes ,
                        sum(efi.apps_desarrolladas) as appcreadas,
                        ds.duracion_sesion as duracion
                    FROM  semilleros_tic.ejecucion_fase_ii_estudiantes efi
                    INNER JOIN semilleros_tic.datos_sesiones ds ON ds.id = efi.id_datos_sesion
                    INNER JOIN semilleros_tic.sesiones se on se.id = ds.id_sesion
                    INNER JOIN semilleros_tic.acuerdos_institucionales_estudiantes as aci ON efi.id_fase = aci.id_fase
                    WHERE efi.id_datos_ieo_profesional_estudiantes =$id_datos_ieo_profesional
                    GROUP BY efi.id_datos_sesion, aci.frecuencia_sesiones, ds.duracion_sesion;
                    
                ");
                
                
                $datoSemillerosTicEjecucionFase2 = $command->queryAll();
                $frecuenciaSesion2 = "";
                $contadorSesionesFase2 = 0;
                $totalEstudiantesSesion2 = 0;
                $totalappcreadsaSesion2 = 0;
                $duracuionPromedio2 = 0;
                foreach ($datoSemillerosTicEjecucionFase2 as $datosSTEF => $valor)
                {	
                    $totalAsistentes += $valor['numestudiantes'];
                    $duracuionPromedio2 += $this->conversionSegundos($valor['duracion']);
                    $frecuenciaSesion2 = $valor['frecuencia_sesiones'];
                    $totalEstudiantesSesion2 += $valor['numestudiantes'];
                    $totalappcreadsaSesion2 += $valor['appcreadas'];
                    array_push($datosFase2, 1,  $fechas[$contador]['fecha_sesion'], $valor['numestudiantes'], $valor['duracion']  );
                    $contadorSesionesFase2 ++;				
                }
                $duracuionPromedio2 = $duracuionPromedio2 / $contadorSesionesFase2;
                $duracuionPromedio2 =  $this->conversionSegundosHora($duracuionPromedio2);
                
                array_push($datos, $frecuenciaSesion2,  $duracuionPromedio2 , $dip['curso_participantes']);

                array_push($datos, $contadorSesionesFase2, $totalEstudiantesSesion2, $totalappcreadsaSesion2);

                /**Consulta datos fase 3**/
                $command3 = $connection->createCommand
                ("
                    SELECT
                        aci.frecuencia_sesiones,
                        sum(efi.estudiantes_participantes) as numestudiantes ,
                        sum(efi.numero_apps) as appcreadas,
                        ds.duracion_sesion as duracion
                    FROM  semilleros_tic.ejecucion_fase_iii_estudiantes efi
                    INNER JOIN semilleros_tic.datos_sesiones ds ON ds.id = efi.id_datos_sesion
                    INNER JOIN semilleros_tic.sesiones se on se.id = ds.id_sesion
                    INNER JOIN semilleros_tic.acuerdos_institucionales_estudiantes as aci ON efi.id_fase = aci.id_fase
                    WHERE efi.id_datos_ieo_profesional_estudiantes =$id_datos_ieo_profesional
                    GROUP BY efi.id_datos_sesion, aci.frecuencia_sesiones, ds.duracion_sesion;
                    
                ");
                
                
                $datoSemillerosTicEjecucionFase3 = $command3->queryAll();
                $frecuenciaSesion3 = "";
                $contadorSesionesFase3 = 0;
                $totalEstudiantesSesion3 = 0;
                $totalappcreadsaSesion3 = 0;
                $duracuionPromedio3 = 0;
                foreach ($datoSemillerosTicEjecucionFase3 as $datosSTEF => $valor)
                {	        
                    $totalAsistentes += $valor['numestudiantes'];
                    $duracuionPromedio3+= $this->conversionSegundos($valor['duracion']);
                    $frecuenciaSesion3 = $valor['frecuencia_sesiones'];
                    $totalEstudiantesSesion3 += $valor['numestudiantes'];
                    $totalappcreadsaSesion3 += $valor['appcreadas'];
                    array_push($datosFase3, 1,  $fechas[$contador]['fecha_sesion'], $valor['numestudiantes'], $valor['duracion']  );
                    $contadorSesionesFase3 ++;				
                }

                $duracuionPromedio3 = $duracuionPromedio3 / $contadorSesionesFase3;
                $duracuionPromedio3 =  $this->conversionSegundosHora($duracuionPromedio3);

                array_push($datos, $frecuenciaSesion3, $duracuionPromedio3 , $dip['curso_participantes']);
                array_push($datos, $contadorSesionesFase3, $totalEstudiantesSesion3, $totalappcreadsaSesion3);
                
                array_push($datos, $totalAsistentes, $contadorSesionesFase1 + $contadorSesionesFase3 + $contadorSesionesFase2);

                array_push($totalDatos, $datos);

                
            }
            $contador++;
        }
        
        
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
