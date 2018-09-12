<?php

//use app\models\PoblacionDocentesSesion;
//use app\models\Sesiones;

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
                                                        'items' 	=> [
                                                                        "Reconocimiento previo y documentos a desarrollar por el profesional de apoyo",
                                                                        "Actividad 1.Mesa de trabajo para la presentación de resultados de la caracterización y mapeo (puntos de partida y llegada)",
                                                                        "Actividad 2. Acompañamiento en práctica",
                                                                        "Actividad 3. Mesa de trabajo: contrucción del plan de acción",
                                                                        "Productos"
                                                                        ], 
														'index' 	=> $index,
														'sesiones' 	=> $index,
                                                        'fase' 		=> $fase,
                                                        'model'     => $model
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