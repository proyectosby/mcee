<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//$id_sede 		= $_SESSION['sede'][0];
$id_sede 		= 1;
$id_institucion	= $_SESSION['instituciones'][0];
$contenedores = [];

?>
   
<?php
    /*foreach( $items as $keyFase => $item ){ 

                $contenedores[] = 	[
					'label' 		=>  $item,
					'content' 		=>  $this->render( 'contenedorItem', 
													[  
                                                        'idPE' 		=> "", 
														'index' 	=> $index,
                                                        'item' 		=> $item,
                                                        "tipo_poblacion" => $fases,
                                                        "estudiasntes" => $estudiasntes,
                                                        "visitas"  => $visitas,
                                                        "form" => $form,
                                                        "datos" => $datos
													] 
										),
					'contentOptions'=> []
				];
    }
    
    use yii\bootstrap\Collapse;*/

    if($index == 0){
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
     }
    /*echo Collapse::widget([
        'items' => $contenedores,
    ]);*/

    if($index == 2){

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
    }
    if($index == 1){
    ?>

        <h3 style='background-color: #ccc;padding:5px;'>Docentes</h3>
        <div class=row style='text-align:center;'>
            <div class="col-sm-2" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px;'>Tiempo Libre</span>
            </div>
            <div class="col-sm-2" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Edu derechos</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Sexualidad</span>
            </div>       
            <div class="col-sm-2" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Medio Ambiente</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Familia</span>
            </div>
            <div class="col-sm-2" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Directivos</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Total</span>
            </div>
        </div>
        <div class=row>
            <div class="col-sm-2" style='padding:0px;'>
                <?=  Html::activeTextInput($tipo_poblacion, "[$index]tiempo_libre", [ 'type' => 'number', 'class' => "form-control docentes-$index-cantidad", 'value' => isset($datos[$index]['tiempo_libre']) ? $datos[$index]['tiempo_libre'] : ''] ) ?>
            </div>
            <div class="col-sm-2" style='padding:0px;'>
                <?=  Html::activeTextInput($tipo_poblacion, "[$index]edu_derechos", [ 'type' => 'number', 'class' =>  "form-control docentes-$index-cantidad", 'value' => isset($datos[$index]['edu_derechos']) ? $datos[$index]['edu_derechos'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($tipo_poblacion, "[$index]sexualidad_ciudadania", [ 'type' => 'number', 'class' =>  "form-control docentes-$index-cantidad", 'value' => isset($datos[$index]['sexualidad']) ? $datos[$index]['sexualidad'] : ''] ) ?>
            </div>        
            <div class="col-sm-2" style='padding:0px;'>
                <?=  Html::activeTextInput($tipo_poblacion, "[$index]medio_ambiente", [ 'type' => 'number', 'class' =>  "form-control docentes-$index-cantidad", 'value' => isset($datos[$index]['medio_ambiente']) ? $datos[$index]['medio_ambiente'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($tipo_poblacion, "[$index]familia", [ 'type' => 'number', 'class' =>  "form-control docentes-$index-cantidad", 'value' => isset($datos[$index]['familia']) ? $datos[$index]['familia'] : ''] ) ?>
            </div>
            <div class="col-sm-2" style='padding:0px;'>
                <?=  Html::activeTextInput($tipo_poblacion, "[$index]directivos", [ 'type' => 'number', 'class' =>  "form-control docentes-$index-cantidad", 'value' => isset($datos[$index]['directivos']) ? $datos[$index]['directivos'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($tipo_poblacion, "[$index]total", [ 'type' => 'number', 'class' => 'form-control', 'value' => isset($datos[$index]['total']) ? $datos[$index]['total'] : ''] ) ?>
            </div>
        </div>

        <?= $form->field($tipo_poblacion, "[$index]id_tip")->hiddenInput( [ 'value' => isset($datos[$index]['id_tip']) ? $datos[$index]['id_tip'] : ''  ] )->label(false ) ?>
        
        <h3 style='background-color: #ccc;padding:5px;'>Estudiantes</h3>
        <div class=row style='text-align:center;'>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px;'>Gra.0</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Gra.1</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Gra.2</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Gra.3</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Gra.4</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Gra.5</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Gra.6</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Gra.7</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Gra.8</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Gra.9</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Gra.10</span>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <span total class='form-control' style='background-color:#ccc;height:70px'>Gra.11</span>
            </div>
        </div>
        <div class=row>
            <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_0", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_0']) ? $datos[$index]['grado_0'] : '' ] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($estudiasntes, "[$index]grado_1", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_1']) ? $datos[$index]['grado_1'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($estudiasntes, "[$index]grado_2", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_2']) ? $datos[$index]['grado_2'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($estudiasntes, "[$index]grado_3", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_3']) ? $datos[$index]['grado_3'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($estudiasntes, "[$index]grado_4", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_4']) ? $datos[$index]['grado_4'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($estudiasntes, "[$index]grado_5", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_5']) ? $datos[$index]['grado_5'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($estudiasntes, "[$index]grado_6", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_6']) ? $datos[$index]['grado_6'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($estudiasntes, "[$index]grado_7", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_7']) ? $datos[$index]['grado_7'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($estudiasntes, "[$index]grado_8", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_8']) ? $datos[$index]['grado_8'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($estudiasntes, "[$index]grado_9", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_9']) ? $datos[$index]['grado_9'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($estudiasntes, "[$index]grado_10", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_10']) ? $datos[$index]['grado_10'] : ''] ) ?>
            </div>
            <div class="col-sm-1" style='padding:0px;'>
                <?=  Html::activeTextInput($estudiasntes, "[$index]grado_11", [ 'type' => 'number', 'class' => 'form-control','value' => isset($datos[$index]['grado_11']) ? $datos[$index]['grado_11'] : ''] ) ?>
            </div>
            <?= $form->field($estudiasntes, "[$index]total")->textInput([ 'value' => isset($datos[$index]['total']) ? $datos[$index]['total'] : '' ]) ?>
            <?= $form->field($estudiasntes, "[$index]est_id")->hiddenInput( [ 'value' => isset($datos[$index]['est_id']) ? $datos[$index]['est_id'] : ''  ] )->label(false ) ?>
        
            <div class=cell style='display:none'>
                <?= $form->field($estudiasntes, "[$index]id_proyecto")->textInput(["value" => $index+1]) ?>
            </div> 
        </div>


    <?php
    }                                   
?>  
   



	

