<?php

use app\models\EcAcciones;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;



$ecAcciones = EcAcciones::find()->where( "estado=1 and id_proceso=$idProceso" )->all();
$ecAcciones = ArrayHelper::map($ecAcciones,'id','descripcion');
       


foreach( $ecAcciones as $a => $v )
{

	// if (strpos($v,"Productos del eje") > 0)
	// {
		$items[] = 	[
					'label' 		=>  $v,
					'content' 		=>  $this->render( 'avances',[] ),
					'contentOptions'=> []
				];	
	// }
	// else
	// {
		
	
		// $items[] = 	[
					// 'label' 		=>  $v,
					// 'content' 		=>  $this->render( 'avances',[] ),
					// 'contentOptions'=> []
				// ];			
	// }
}




echo Collapse::widget([
    'items' => $items, 
]);