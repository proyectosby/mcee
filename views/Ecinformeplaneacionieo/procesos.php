<?php

use app\models\EcProcesos;
use app\models\EcProductos;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;



$ecProcesos = EcProcesos::find()->where( "estado=1 and id_proyecto=$idProyecto" )->all();
$ecProcesos = ArrayHelper::map($ecProcesos,'id','descripcion','porcentaje_avance');
       
$items[] = 	
		[
			'label' 		=>  "Horario fijo de trabajo con docentes",
			'content' 		=>  $form->field($modelProyectos, 'horario')->textInput()->label("Horario fijo de trabajo con docentes"),
								'contentOptions' => ['class' => 'in']
		];

$contador=0;
foreach ($ecProcesos as $porcentaje_avance => $dataProceso)
{
	foreach( $dataProceso as $idProceso => $v )
	{
	 
		$items[] = 	[
						'label' 		=>  $v,
						'content' 		=>  $this->render( 'acciones', 
														[ 
															'idProceso' => $idProceso,
															'form' => $form,
															'estadoActual' => $estadoActual,
														] 
											),
						'contentOptions'=> []
					];			
		
	}
	
	
	
}

				
$ecProductos = EcProductos::find()->where( "estado=1 and id_proyecto=$idProyecto" )->all();
$ecProductos = ArrayHelper::map($ecProductos,'id','descripcion');

foreach( $ecProductos as $idProductos => $v )
{
 
	$items[] = 	[
					'label' 		=>  $v,
					'content' 		=>  $this->render( 'estrategias', 
													[ 
                                                        'idProductos' => $idProductos,
														'form' => $form,
														'estadoActual' => $estadoActual
													] 
										),
					'contentOptions'=> []
				];			
	
}


echo Collapse::widget([
    'items' => $items, 
]);