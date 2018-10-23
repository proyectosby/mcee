<?php
use yii\helpers\Html;
//$id_sede 		= $_SESSION['sede'][0];
$id_sede 		= 1;
$id_institucion	= $_SESSION['instituciones'][0];
$contenedores = [];
$index = 0;
?>

<?php
    foreach( $items as $keyFase => $item ){ 

                $contenedores[] = 	[
					'label' 		=>  $item,
					'content' 		=>  $this->render( 'contenedorItem', 
													[  
                                                        'idPE' 		=> "", 
                                                        'actividad_id' => $actividad_id,
														'index' 	=> $index,
                                                        'item' 		=> $item,
                                                        'documentosReconocimiento' => $documentosReconocimiento,
                                                        'tiposCantidadPoblacion' => $tiposCantidadPoblacion,
                                                        'evidencias' => $evidencias,
                                                        'producto' => $producto,
                                                        'requerimientoExtra' => $requerimientoExtra,
                                                        "model" => $model,
													] 
										),
					'contentOptions'=> []
				];

    $index ++;
    }
    
    use yii\bootstrap\Collapse;
    echo Collapse::widget([
        'items' => $contenedores,
    ]);

?>




	

