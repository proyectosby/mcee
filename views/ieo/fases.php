<?php
use yii\helpers\Html;

$items = [];
$index = 0;

foreach( $fases as $keyFase => $fase ){
	
	/*$sesiones = Sesiones::find()
					->andWhere( 'id_fase='.$fase->id )
					->all();*/

	$items[] = 	[
					'label' 		=>  $fase,
					'content' 		=>  $this->render( 'faseItem', 
													[  
														'form' => $form,
														'numProyecto' 	=> $keyFase,
														'sesiones' 	=> $index,
                                                        'fase' 		=> $fase,
														'documentosReconocimiento' => $documentosReconocimiento,
														'tiposCantidadPoblacion' => $tiposCantidadPoblacion,
														'evidencias' => $evidencias,
														'producto' => $producto,
														'requerimientoExtra' => $requerimientoExtra,
														"model" => $model,
														"estudiantesGrado" =>  $estudiantesGrado,
														'datos'=> $datos,
														"persona" => $persona,
														"nombres" => $nombres,
													] 
										),
					//'options' => ['style' => 'background-color: red;'],
					'contentOptions'=> []
				];
				
	$index ++;
}

use yii\bootstrap\Collapse;
use yii\bootstrap\Tabs;

/*echo Collapse::widget([
    'items' => $items,
]);*/
echo Tabs::widget([
    'items' => $items,
]);