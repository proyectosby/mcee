<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//$id_sede 		= $_SESSION['sede'][0];
$id_sede 		= 1;
$id_institucion	= $_SESSION['instituciones'][0];
$contenedores = [];

?>
   
<?php
    foreach( $items as $keyFase => $item ){ 

                $contenedores[] = 	[
					'label' 		=>  $item,
					'content' 		=>  $this->render( 'contenedorItem', 
													[  
                                                        'idPE' 		=> "", 
														'index' 	=> $index,
                                                        'item' 		=> $item,
                                                        "tipo_poblacion" => $tipo_poblacion,
                                                        "estudiasntes" => $estudiasntes,
                                                        "visitas"  => $visitas,
                                                        "form" => $form,
                                                        "datos" => $datos
													] 
										),
					'contentOptions'=> []
				];
    }
    
    use yii\bootstrap\Collapse;

    ?>
     
            <h3 style='background-color: #ccc;padding:5px;'>Actividades</h3>
            
            <div class=row style='text-align:center;'>
                <div class="col-sm-1" style='padding:0px;'>
                    <span total class='form-control' style='background-color:#ccc;height:70px;'>Actividad 1</span>
                </div>
                <div class="col-sm-2" style='padding:0px;'>
                    <span total class='form-control' style='background-color:#ccc;height:70px'>Actividad 1 %</span>
                </div>
                <div class="col-sm-1" style='padding:0px;'>
                    <span total class='form-control' style='background-color:#ccc;height:70px'>Actividad 2</span>
                </div>       
                <div class="col-sm-2" style='padding:0px;'>
                    <span total class='form-control' style='background-color:#ccc;height:70px'>Actividad 2 %</span>
                </div>
                <div class="col-sm-1" style='padding:0px;'>
                    <span total class='form-control' style='background-color:#ccc;height:70px'>Actividad 3</span>
                </div>
                <div class="col-sm-2" style='padding:0px;'>
                    <span total class='form-control' style='background-color:#ccc;height:70px'>Actividad 3 %</span>
                </div>
                <div class="col-sm-2" style='padding:0px;'>
                    <span total class='form-control' style='background-color:#ccc;height:70px'>Avance sede %</span>
                </div>
                <div class="col-sm-1" style='padding:0px;'>
                    <span total class='form-control' style='background-color:#ccc;height:70px'>Avance IEO %</span>
                </div>
            </div>

            <div class=row>
                <div class="col-sm-1" style='padding:0px;'>
                    <?= $form->field($actividades, "[$index]actividad_1")->dropDownList( [ 'prompt' => '0', '1', '2', '3', '4' ] )->label(false); ?>
                </div>

                <div class="col-sm-2" style='padding:0px;'>
                <?= $form->field($actividades, "[$index]actividad_1_porcentaje")->textInput([ 'class' => "form-control avance-$index-sede", 'value' => isset($datos[$index]['actividad_1_porcentaje']) ? $datos[$index]['actividad_1_porcentaje'] : '' ])->label(false); ?>
                </div>
                <div class="col-sm-1" style='padding:0px;'>
                    <?= $form->field($actividades, "[$index]actividad_2")->dropDownList( [ 'prompt' => '0', '1', '2', '3', '4' ] )->label(false); ?>
                </div>        
                <div class="col-sm-2" style='padding:0px;'>
                    <?= $form->field($actividades, "[$index]actividad_2_porcentaje")->textInput([ 'class' => "form-control avance-$index-sede", 'value' => isset($datos[$index]['actividad_2_porcentaje']) ? $datos[$index]['actividad_2_porcentaje'] : '' ])->label(false); ?>
                </div>
                <div class="col-sm-1" style='padding:0px;'> 
                    <?= $form->field($actividades, "[$index]actividad_3")->dropDownList( [ 'prompt' => '0', '1', '2', '3', '4' ] )->label(false); ?>
                </div>
                <div class="col-sm-2" style='padding:0px;'>
                    <?= $form->field($actividades, "[$index]actividad_3_porcentaje")->textInput([ 'class' => "form-control avance-$index-sede", 'value' => isset($datos[$index]['actividad_3_porcentaje']) ? $datos[$index]['actividad_3_porcentaje'] : '' ])->label(false); ?>
                </div>
                <div class="col-sm-2" style='padding:0px;'>
                    <?= $form->field($actividades, "[$index]avance_sede")->textInput([ 'value' => isset($datos[$index]['avance_sede']) ? $datos[$index]['avance_sede'] : '' ])->label(false); ?>
                </div>
                <div class="col-sm-1" style='padding:0px;'>
                    <?= $form->field($actividades, "[$index]avance_ieo")->textInput([ 'value' => isset($datos[$index]['avance_ieo']) ? $datos[$index]['avance_ieo'] : '' ])->label(false); ?>
                </div>
            </div>

            <?= $form->field($actividades, "[$index]id_proyecto")->hiddenInput(['value'=> $index+1])->label(false); ?>
    <?php

    echo Collapse::widget([
        'items' => $contenedores,
    ]);
    ?>
        <h3 style='background-color: #ccc;padding:5px;'>Visitas</h3>
        <div class=cell>
            <?= $form->field($visitas, "[$index]cantidad_visitas_realizadas")->textInput([ 'value' => isset($datos2[$index]['cantidad_visitas_realizadas']) ? $datos2[$index]['cantidad_visitas_realizadas'] : '' ]) ?>
        </div>
        <div class=cell>
            <?= $form->field($visitas, "[$index]canceladas")->textInput([ 'value' => isset($datos2[$index]['canceladas']) ? $datos2[$index]['canceladas'] : '' ]) ?>
        </div>
        <div class=cell>
            <?= $form->field($visitas, "[$index]visitas_fallidas")->textInput([ 'value' => isset($datos2[$index]['visitas_fallidas']) ? $datos2[$index]['visitas_fallidas'] : '' ]) ?>
        </div>
        <div class=cell>
            <?= $form->field($visitas, "[$index]observaciones_evidencias")->textInput([ 'value' => isset($datos2[$index]['observaciones_evidencias']) ? $datos2[$index]['observaciones_evidencias'] : '' ]) ?>
        </div>
        <div class=cell>
            <?= $form->field($visitas, "[$index]alarmas")->textInput([ 'value' => isset($datos2[$index]['alarmas']) ? $datos2[$index]['alarmas'] : '' ]) ?>
        </div>
        <div class=cell>
            <?= $form->field($visitas, "[$index]logros")->textInput([ 'value' => isset($datos2[$index]['logros']) ? $datos2[$index]['logros'] : '' ]) ?>
        </div>
        <div class=cell>
            <?= $form->field($visitas, "[$index]dificultades")->textInput([ 'value' => isset($datos2[$index]['dificultades']) ? $datos2[$index]['dificultades'] : '' ]) ?>
        </div>
        <div class=cell style='display:none'>
                <?= $form->field($visitas, "[$index]id_proyecto")->textInput(["value" => $index+1]) ?>
            </div>
    <?php
    
?>  
   



	

