<?php


use app\models\IsaLogrosActividades;
use app\models\IsaOrientacionMetodologicaActividades;
use app\models\IsaVariacionesActividades;
use app\models\IsaActividadesSeguimiento;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;





$actividadesSeguimiento = IsaActividadesSeguimiento::find()->where( "estado=1 and id_proceso=$idProceso" )->all();
$actividadesSeguimiento = ArrayHelper::map($actividadesSeguimiento,'id','descripcion');
       
foreach ($actividadesSeguimiento as $idActividad => $dataActividad)
{
		$items[] = 	[
						'label' 		=>  $dataActividad,
						'content' 		=>	[  
												$this->render
														( 'porcentajes', 
															[ 
																'idActividad' => $idActividad,
																'form' => $form,
																'datos' => $datos,
															] 
														),
												$this->render
														( 'logros', 
															[ 
																'idActividad' => $idActividad,
																'form' => $form,
																'datos' => $datos,
															] 
														),
												$this->render
														( 'variacionesactividades', 
															[ 
																'idActividad' => $idActividad,
																'form' => $form,
																'datos' => $datos,
															] 
														),														
											],
									
						'contentOptions'=> []
					];								
					
}


// $procesos = IsaOrientacionMetodologicaActividades::find()->where( "estado=1 and id_proyecto=$idProyecto" )->all();
// $procesos = ArrayHelper::map($procesos,'id','descripcion');
       
// foreach ($procesos as $idProceso => $dataProceso)
// {
		// $items[] = 	[
						// 'label' 		=>  $dataProceso,
						// 'content' 		=>  $this->render( 'orientacion', 
														// [ 
															// 'idProceso' => $idProceso,
															// 'form' => $form,
															// 'idProyecto' => $idProyecto,
															// 'datos' => $datos,
														// ] 
											// ),
						// 'contentOptions'=> []
					// ];			


// }




// $procesos = IsaVariacionesActividades::find()->where( "estado=1 and id_proyecto=$idProyecto" )->all();
// $procesos = ArrayHelper::map($procesos,'id','descripcion');
       
// foreach ($procesos as $idProceso => $dataProceso)
// {
		// $items[] = 	[
						// 'label' 		=>  $dataProceso,
						// 'content' 		=>  $this->render( 'variacionesactividades', 
														// [ 
															// 'idProceso' => $idProceso,
															// 'form' => $form,
															// 'idProyecto' => $idProyecto,
															// 'datos' => $datos,
														// ] 
											// ),
						// 'contentOptions'=> []
					// ];			


// }

echo Collapse::widget([
    'items' => $items, 
]);