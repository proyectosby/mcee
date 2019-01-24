<?php
use yii\helpers\Html;

$items = [];
$index = 0;

foreach( $fases as $keyFase => $fase ){
	
	/*$sesiones = Sesiones::find()
					->andWhere( 'id_fase='.$fase->id )
					->all();*/

	if($keyFase  == 1){
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
			
			'headerOptions' => ['class' => 'tab1', 'style' => 'background-color: #f2dedf;'],
			'contentOptions'=> []
		];
	}
	if($keyFase  == 2){
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
			'headerOptions' => ['style' => 'background-color: #def0d8;'],
			'contentOptions'=> []
		];
	}
	if($keyFase  == 3){
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
			'headerOptions' => ['style' => 'background-color: #347ab6'],
			'options' => ['style' => 'color: black;'],
			'contentOptions'=> []
		];
	}
	
				
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

$this->registerJs("$('.tab1').removeClass('active');");

$this->registerCss("li > a {
						color: black;
					}");

