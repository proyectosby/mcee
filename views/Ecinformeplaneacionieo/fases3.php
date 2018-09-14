<?php

use app\models\EcProyectos;
use app\models\EcProcesos;
use app\models\EcAcciones;
use nex\chosen\Chosen;


$items = [];
$index = 0;
$i = 1;



foreach( $acciones as $keyFase => $fase ){
 
	$items[] = 	[
					'label' 		=>  $fase,
					'content' 		=>  $this->render( 'contenedoritem', 
													[ 
                                                        //'items' 	=> $procesos, 
														'index' 	=> $index,
														'sesiones' 	=> $index,
                                                        'fase' 		=> $fase,
                                                        'model'     => $model
													] 
										),
					'contentOptions'=> []
				];
	
				
	$index ++;
	$i ++;
	}


use yii\bootstrap\Collapse;

echo Collapse::widget([
    'items' => $items, 
]);