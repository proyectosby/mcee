<?php
use yii\helpers\Html;
//$id_sede 		= $_SESSION['sede'][0];
$id_sede 		= 1;
$id_institucion	= $_SESSION['instituciones'][0];
$contenedores = [];
$index = 0;
?>

<?php
    
     $actividades =[
        1 =>    "Actividad 1. Realizar encuentros de sensibilización sobre el valor del arte y la cultura en la comunidad, desde las instituciones educativas oficiales.",
        2 =>    "Actividad No. 2: Realizar visitas eventos culturales de la ciudad para sensibilizar en torno a la importancia de la iniciación artística.",
        3 =>    "Actividad No. 3: Promover la oferta cultural del municipio para sensibilización e iniciación artística.",
        4 =>    "Actividad No. 4: Realizar talleres de iniciación y sensibilización artística con la comunidad.",
    ];
    
    foreach( $actividades as $keyFase => $actividad ){ 

            if($proyecto ==  1 && $keyFase <= 3){
                $contenedores[] = 	[
					'label' 		=>  $actividad,
					'content' 		=>  $this->render( 'contenedorItem', 
													[  
                                                        'form' => $form,
                                                        "model" => $model,
                                                        'actividades_isa' => $actividades_isa,
                                                        'index' => $keyFase
													] 
										),
					'contentOptions'=> []
				];
            }else if($proyecto ==  2 && $keyFase > 3){
                $contenedores[] = 	[
					'label' 		=>  $actividad,
					'content' 		=>  $this->render( 'contenedorItem', 
													[  
                                                        'form' => $form,
                                                        "model" => $model,
                                                        'actividades_isa' => $actividades_isa,
                                                        'index' => $keyFase
													] 
										),
					'contentOptions'=> []
				];
            }    
        
            

    $index ++;
    }
    
    use yii\bootstrap\Collapse;
    echo Collapse::widget([
        'items' => $contenedores,
    ]);

?>




	

