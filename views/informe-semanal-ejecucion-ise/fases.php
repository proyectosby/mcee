<?php
use yii\helpers\Html;

$items = [];
$index = 0;

foreach( $fases as $keyFase => $fase ){
	
	/*$sesiones = Sesiones::find()
					->andWhere( 'id_fase='.$fase->id )
					->all();*/

	if($keyFase == 0){
		$items[] = 	[
			'label' 		=>  $fase,
			'content' 		=>  $this->render( 'faseItem', 
											[ 
												'items' 	=> ["Tipo y cantidad de población"], 
												'index' 	=> $index,
												'fase' 		=> $fase,
												"tipo_poblacion" => $tipo_poblacion,
												"estudiasntes" => $estudiasntes,
												"actividades" => $actividades,
												"visitas"  => $visitas,
												"form" => $form,
												"datos" => $datos,
												"datos2" => $datos2,
											] 
								),
			'headerOptions' => ['class' => 'tab1', 'style' => 'background-color: #f2dedf;'],
			'contentOptions'=> []
		];
	}
	if($keyFase == 1){
		$items[] = 	[
			'label' 		=>  $fase,
			'content' 		=>  $this->render( 'faseItem', 
											[ 
												'items' 	=> ["Tipo y cantidad de población"], 
												'index' 	=> $index,
												'fase' 		=> $fase,
												"tipo_poblacion" => $tipo_poblacion,
												"estudiasntes" => $estudiasntes,
												"actividades" => $actividades,
												"visitas"  => $visitas,
												"form" => $form,
												"datos" => $datos,
												"datos2" => $datos2,
											] 
								),
			'headerOptions' => ['style' => 'background-color: #def0d8;'],
			'contentOptions'=> []
		];
	}
	if($keyFase == 2){
		$items[] = 	[
			'label' 		=>  $fase,
			'content' 		=>  $this->render( 'faseItem', 
											[ 
												'items' 	=> ["Tipo y cantidad de población"], 
												'index' 	=> $index,
												'fase' 		=> $fase,
												"tipo_poblacion" => $tipo_poblacion,
												"estudiasntes" => $estudiasntes,
												"actividades" => $actividades,
												"visitas"  => $visitas,
												"form" => $form,
												"datos" => $datos,
												"datos2" => $datos2,
											] 
								),
			'headerOptions' => ['style' => 'background-color: #347ab6'],
			'contentOptions'=> []
		];
	}
	
				
	$index ++;
}


use yii\bootstrap\Collapse;
use yii\bootstrap\Tabs;

echo Tabs::widget([
    'items' => $items,
]);

$this->registerJs("$('.tab1').removeClass('active');");

$this->registerCss("li > a {
						color: black;
					}");