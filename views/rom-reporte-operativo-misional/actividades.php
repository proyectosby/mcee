<?php


use app\models\IsaRomActividades;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;

// $model = new IsaRomActividades();

$actividades= IsaRomActividades::find()->where( "estado=1 and id_rom_procesos=$idProceso" )->all();
$actividades = ArrayHelper::map($actividades,'id','descripcion');
       


// foreach ($actividades as $porcentaje_avance => $dataProceso)
// {
	foreach( $actividades as $idActividad => $v )
	{
	 
		$items[] = 	[
						'label' 		=>  $v,
						'content' 		=>  $this->render( 'formulario', 
														[ 
															'idActividad' => $idActividad,
															'form' => $form,
															'idProyecto' => $idProyecto,
															'datos'=>$datos,
															'estados'=>$estados,
														] 
											),
						'contentOptions'=> []
					];			
		
	}
	
		
// }

				


echo Collapse::widget([
    'items' => $items, 
]);