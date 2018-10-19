<?php

use app\models\EcProcesos;
use app\models\EcProductos;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;



$ecProcesos = EcProcesos::find()->where( "estado=1 and id_proyecto=$idProyecto" )->all();
$ecProcesos = ArrayHelper::map($ecProcesos,'id','descripcion');
       


foreach( $ecProcesos as $idProceso => $v )
{
 
	$items[] = 	[
					'label' 		=>  $v,
					'content' 		=>  $this->render( 'acciones', 
													[ 
                                                        'idProceso' => $idProceso
														
													] 
										),
					'contentOptions'=> []
				];			
	
}

$ecProductos = EcProductos::find()->where( "estado=1 and id_proyecto=$idProyecto" )->all();
$ecProductos = ArrayHelper::map($ecProductos,'id','descripcion');

foreach( $ecProductos as $idProductos => $v )
{
 
	$items[] = 	[
					'label' 		=>  $v,
					'content' 		=>  $this->render( 'estrategias', 
													[ 
                                                        'idProductos' => $idProductos
														
													] 
										),
					'contentOptions'=> []
				];			
	
}


echo Collapse::widget([
    'items' => $items, 
]);