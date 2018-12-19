<?php

use app\models\IsaPorcentajesActividades;
use app\models\IsaLogrosActividades;
use app\models\IsaLogrosActividades;
use app\models\IsaLogrosActividades;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;



$procesos = IsaPorcentajesActividades::find()->where( "estado=1 and id_proyecto=$idProyecto" )->all();
$procesos = ArrayHelper::map($procesos,'id','descripcion');
       
foreach ($procesos as $idProceso => $dataProceso)
{
		$items[] = 	[
						'label' 		=>  $dataProceso,
						'content' 		=>  $this->render( 'porcentajes', 
														[ 
															'idProceso' => $idProceso,
															'form' => $form,
															'idProyecto' => $idProyecto,
															'datos' => $datos,
														] 
											),
						'contentOptions'=> []
					];			


}


$procesos = IsaLogrosActividades::find()->where( "estado=1 and id_proyecto=$idProyecto" )->all();
$procesos = ArrayHelper::map($procesos,'id','descripcion');
       
foreach ($procesos as $idProceso => $dataProceso)
{
		$items[] = 	[
						'label' 		=>  $dataProceso,
						'content' 		=>  $this->render( 'actividades', 
														[ 
															'idProceso' => $idProceso,
															'form' => $form,
															'idProyecto' => $idProyecto,
															'datos' => $datos,
														] 
											),
						'contentOptions'=> []
					];			


}


$procesos = IsaProcesoSeguimiento::find()->where( "estado=1 and id_proyecto=$idProyecto" )->all();
$procesos = ArrayHelper::map($procesos,'id','descripcion');
       
foreach ($procesos as $idProceso => $dataProceso)
{
		$items[] = 	[
						'label' 		=>  $dataProceso,
						'content' 		=>  $this->render( 'actividades', 
														[ 
															'idProceso' => $idProceso,
															'form' => $form,
															'idProyecto' => $idProyecto,
															'datos' => $datos,
														] 
											),
						'contentOptions'=> []
					];			


}




$procesos = IsaProcesoSeguimiento::find()->where( "estado=1 and id_proyecto=$idProyecto" )->all();
$procesos = ArrayHelper::map($procesos,'id','descripcion');
       
foreach ($procesos as $idProceso => $dataProceso)
{
		$items[] = 	[
						'label' 		=>  $dataProceso,
						'content' 		=>  $this->render( 'actividades', 
														[ 
															'idProceso' => $idProceso,
															'form' => $form,
															'idProyecto' => $idProyecto,
															'datos' => $datos,
														] 
											),
						'contentOptions'=> []
					];			


}
echo Collapse::widget([
    'items' => $items, 
]);