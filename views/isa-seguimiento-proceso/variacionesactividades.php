<?php


use app\models\IsaVariacionesActividades;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;



$variaciones = IsaVariacionesActividades::find()->where( "estado=1 and id_actividades=$idActividad" )->all();
$variaciones = ArrayHelper::map($variaciones,'id','descripcion');
       
foreach ($variaciones as $idVariaciones => $dataVariaciones)
{
		$items[] = 	[
						'label' 		=>  $dataVariaciones,
						'content' 		=>  $this->render( 'fordebret', 
														[ 
															'idVariaciones' => $idVariaciones,
															'form' => $form,
															'datos' => $datos,
														] 
											),
						'contentOptions'=> []
					];			


}


echo Collapse::widget([
    'items' => $items, 
]);