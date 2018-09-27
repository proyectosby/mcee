<?php

use app\models\EcProyectos;
use app\models\EcProcesos;
use app\models\EcAcciones;
use nex\chosen\Chosen;


$items = [];
$index = 0;
$i = 1;

foreach( $fases as $keyFase => $fase ){

		$proyectosall = EcProcesos::find()->where( 'estado=1' )->andWhere( 'id_proyecto='.$i )->all();
		$procesos = array();

		foreach ($proyectosall as $r)
	 	{
	     	$procesos[$r['id']]= $r['descripcion'];

	 	}
	   
	$items[] = 	[
					'label' 		=>  $fase,
					'content' 		=>  $this->render( 'faseItem', 
													[ 
                                                        'items' 	=> $procesos, 
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