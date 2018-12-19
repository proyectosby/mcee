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
                                                        "model" => $model,
                                                        'proyecto' => $keyFase,
                                                        'actividades_rom' => $actividades_rom,
                                                        'tipo_poblacion_rom' => $tipo_poblacion_rom,
                                                        'evidencias_rom' => $evidencias_rom,
														
													] 
										),
					'contentOptions'=> []
				];
				
	$index ++;
}

use yii\bootstrap\Collapse;

echo Collapse::widget([
    'items' => $items,
]);