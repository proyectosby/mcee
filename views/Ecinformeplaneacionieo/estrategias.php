<?php

use app\models\EcEstrategias;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;



$ecEstrategias = EcEstrategias::find()->where( "estado=1 and id_producto=$idProductos" )->all();
$ecEstrategias = ArrayHelper::map($ecEstrategias,'id','descripcion');
       


foreach( $ecEstrategias as $a => $v )
{

		$items[] = 	[
					'label' 		=>  $v,
					'content' 		=>  $this->render( 'respuesta',[] ),
					'contentOptions'=> []
				];	

}




echo Collapse::widget([
    'items' => $items, 
]);