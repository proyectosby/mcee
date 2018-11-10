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
				s.descripcion as sede,dip.id_profesional_a,i.id as id_institucion, s.id as id_sede
		FROM 	semilleros_tic.datos_ieo_profesional_estudiantes as dip, public.sedes as s,public.instituciones as i
		WHERE 	dip.id_institucion = i.id
		AND		dip.id_sede = s.id");
        $datos_ieo_profesional = $command->queryAll();
        
        $html="";
        $contador =0;
        $totalDatos = [];
        $datosFase1 = [];
		foreach ($datos_ieo_profesional as $dip)
		{
            if($contador == 0){
                $datos= [];
                array_push($datos, $dip['codigo_dane_institucion'], $dip['institucion'], $dip['codigo_dane_sede'],$dip['sede']); 

                $idInstitucion = $dip['id_institucion'];
                $idSede = $dip['id_sede'];
                $profesional_a = $dip['id_profesional_a'];
                
                $command = $connection->createCommand
                    ("
                        SELECT concat(p.nombres,' ',p.apellidos) FROM public.personas as p WHERE id in($profesional_a)
                    ");
                $nombres = $command->queryAll();
                $nombre=null;
                
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
                
            
                /**Listado de quedamos. Pendientes por validar su origen */
                array_push($datos, 'Frecuencia '.$contador, 'Duracion '.$contador, 'Cursos participantes '.$contador);

                /**Consulta datos fase 1 **/
                
                /* Estas consulta queda pendiente adicionar el campo 
                duracion sesion para de esta forma poder obtener el dato por medio del inner join a la tabla datos sesion 
                */
                $id_datos_ieo_profesional = $dip['id'];
                $command = $connection->createCommand
                ("
                    SELECT sum(efi.participacion_sesiones) as asistentes, 
                        sum(efi.numero_estudiantes) as numestudiantes ,
                        sum(efi.apps_creadas) as appcreadas,
                        sum(ds.duracion_sesion) as duracion
                    FROM  semilleros_tic.ejecucion_fase_i_estudiantes efi
                    INNER JOIN semilleros_tic.datos_sesiones ds ON ds.id = efi.id_datos_sesion
                    INNER JOIN semilleros_tic.sesiones se on se.id = ds.id_sesion
                    WHERE  id_datos_ieo_profesional_estudiantes =$id_datos_ieo_profesional AND se.id_fase = 1 
                    GROUP BY efi.id_datos_sesion;
                    
                ");
                
                
                $datoSemillerosTicEjecucionFase = $command->queryAll();
                $fechaSesion1 = "";
                $contadorSesionesFase1 = 0;
                $totalEstudiantes = 0;
                $totalappcreadsa = 0;
                foreach ($datoSemillerosTicEjecucionFase as $datosSTEF => $valor)
                {	        
                    $totalEstudiantes += $valor['numestudiantes'];
                    $totalappcreadsa += $valor['appcreadas'];
                    array_push($datosFase1, $contador,  $fechas[$contador]['fecha_sesion'], $valor['asistentes'], $valor['duracion']  );
                    $contadorSesionesFase1 ++;				
                }
            

                array_push($datos, $contadorSesionesFase1, $totalEstudiantes, $totalappcreadsa);


            

                /*$idDatosSesiones = implode(",",$datosSesion);	
                
                $command = $connection->createCommand
                ("
                    SELECT fecha_sesion 
                    FROM semilleros_tic.datos_sesiones
                    WHERE id in($idDatosSesiones)
                    ORDER BY id ASC 
                ");
                $datos_sesiones = $command->queryAll();


            
                $frecuenciaSesiones =array();
                $command = $connection->createCommand("
                select ai.frecuencia_sesiones
                from 	semilleros_tic.acuerdos_institucionales_estudiantes as ai, semilleros_tic.fases as f, semilleros_tic.semilleros_datos_ieo_estudiantes as sdi, semilleros_tic.datos_ieo_profesional_estudiantes as dip, 
                        semilleros_tic.ejecucion_fase_i_estudiantes as ef, semilleros_tic.anio as a,semilleros_tic.ciclos as c
                where f.id in (1,2,3)
                and ai.id_fase = f.id and ai.id_semilleros_datos_estudiantes = sdi.id and sdi.id_institucion = dip.id_institucion and sdi.id_sede = dip.id_sede
                and dip.id_institucion = 	$idInstitucion and dip.id_sede = $idSede  --and c.id = 1 and ai.id_ciclo = c.id and ef.id_ciclo = c.id
                --and a.id = 1 and c.id_anio = a.id and dip.estado = 1 and ef.estado = 1 and sdi.estado = 1 and ai.estado = 1 and a.estado = 1 and c.estado =1
                group by ai.frecuencia_sesiones");

                $frecuenciaSesiones = $command->queryAll();
                $frecuenciaSesiones[0]['frecuencias_sesiones'] =15;
                
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
                array_push($datos, $frecuenciaSesionesDescripcion, '*********** '.$contador, '*********'.$contador, $contador);
                

                for($i=0;$i<=5;$i++)
                {
                    array_push($datos,@$datos_sesiones[$i]['fecha_sesion']);

                }*/
                



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
            'datosFase1' => $datosFase1
        ]);
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
