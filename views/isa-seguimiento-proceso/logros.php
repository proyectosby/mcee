<?php

use app\models\IsaLogrosActividades;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;



$logros = IsaLogrosActividades::find()->where( "estado=1 and id_actividades=$idActividad" )->all();
$logros = ArrayHelper::map($logros,'id','descripcion');
       
foreach ($logros as $idLogros => $dataLogros)
{
		$items[] = 	[
						'label' 		=>  $dataLogros,
						'content' 		=>  $this->render( 'semanalogros', 
														[ 
															'idLogros' => $idLogros,
															'form' => $form,
															'idProyecto' => $idProyecto,
															'datos' => $datos,
														] 
											),
						'contentOptions'=> []
					];			


}


echo Collapse::widget([
    'items' => $items, 
]);