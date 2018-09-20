<?php

/**********
Versión: 001
Fecha: 2018-08-28
Desarrollador: Edwin Molina Grisales
Descripción: Formulario SEMILLEROS DATOS IEO
---------------------------------------
Modificaciones:
Fecha: 2018-09-19
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se cambia los campo input de cada sección por textarea, y se le agrega el plugin XEditable, para poderlos editar
---------------------------------------
**********/

use app\models\PoblacionDocentesSesion;
use app\models\Sesiones;

$items = [];
$index = 0;

foreach( $fases as $keyFase => $fase ){
							
	$sesiones = Sesiones::find()
					->andWhere( 'id_fase='.$fase->id )
					->all();
	
	$items[] = 	[
					'label' 		=>  $fase->descripcion,
					'content' 		=>  $this->render( 'faseItem', 
													[ 
														'idPE' 		=> $idPE, 
														'index' 	=> $index,
														'sesiones' 	=> $sesiones,
														'fase' 		=> $fase,
													] 
										),
					'contentOptions'=> []
				];
				
	$index += count($sesiones);
}

use yii\bootstrap\Collapse;

echo Collapse::widget([
    'items' => $items,
]);