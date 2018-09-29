<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
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
														'index' 	=> $index,
                                                        'item' 		=> $item,
                                                        "tipo_poblacion" => $tipo_poblacion,
                                                        "docentes" => $docentes,
                                                        "estudiasntes" => $estudiasntes,
                                                        
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
    <?php $form = ActiveForm::begin(); ?>
            <h3 style='background-color: #ccc;padding:5px;'>Actividades</h3>
            <div class=cell>
                <?= $form->field($actividades, 'actividad_1')->textInput() ?>
            </div>
            <div class=cell>
                <?= $form->field($actividades, 'actividad_1_porcentaje')->textInput() ?>
            </div>
            <div class=cell>
                <?= $form->field($actividades, 'actividad_2')->textInput() ?>
            </div>
            <div class=cell>
                <?= $form->field($actividades, 'actividad_2_porcentaje')->textInput() ?>
            </div>
            <div class=cell>
                <?= $form->field($actividades, 'actividad_3')->textInput() ?>
            </div>
            <div class=cell>
                <?= $form->field($actividades, 'actividad_3_porcentaje')->textInput() ?>
            </div>
            <div class=cell>
                <?= $form->field($actividades, 'avance_sede')->textInput() ?>
            </div>
            <div class=cell>
                <?= $form->field($actividades, 'avance_ieo')->textInput() ?>
            </div>
   
            <h3 style='background-color: #ccc;padding:5px;'>Visitas</h3>
            <div class=cell>
                <?= $form->field($visitas, 'cantidad_visitas_realizadas')->textInput() ?>
            </div>
            <div class=cell>
                <?= $form->field($visitas, 'canceladas')->textInput() ?>
            </div>
            <div class=cell>
                <?= $form->field($visitas, 'visitas_fallidas')->textInput() ?>
            </div>
            <div class=cell>
                <?= $form->field($visitas, 'observaciones_evidencias')->textInput() ?>
            </div>
            <div class=cell>
                <?= $form->field($visitas, 'alarmas')->textInput() ?>
            </div>
    <?php ActiveForm::end(); ?>



	

