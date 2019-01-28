<?php


use app\models\IsaRomProcesos;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;

// $model = new IsaRomProcesos();

$procesos = IsaRomProcesos::find()->where( "estado=1 and id_rom_proyectos=$idProyecto" )->all();
$procesos = ArrayHelper::map($procesos,'id','descripcion');
       


// foreach ($procesos as $porcentaje_avance => $dataProceso)
// {
	foreach( $procesos as $idProceso => $v )
	{
	 
		$items[] = 	[
						'label' 		=>  $v,
						'content' 		=>  $this->render( 'actividades', 
														[ 
															'idProceso' => $idProceso,
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