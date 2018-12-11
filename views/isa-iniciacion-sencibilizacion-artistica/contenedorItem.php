<?php
if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion | redirecciona al login
else
{
	echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
	die;
}
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

    if($index == 1 || $index == 2 || $index == 3){?>
        <div style ="display : none">
            <?= $form->field($actividades_isa, "[$index]id_componente")->textInput(["value" => 1]) ?>
            <?= $form->field($actividades_isa, "[$index]id_actividad")->textInput(["value" => $index]) ?>
        </div>
    <?php
    }else{ ?>
        <div style ="display : none">
            <?= $form->field($actividades_isa, "[$index]id_componente")->textInput(["value" => 2]) ?>
            <?= $form->field($actividades_isa, "[$index]id_actividad")->textInput(["value" => $index]) ?>
        </div>
    <?php
    }
?>


    <h3 style='background-color: #ccc;padding:5px;'>Fecha prevista para realizar la actividad</h3>
    <?= $form->field($actividades_isa, "[$index]fecha_prevista_desde")->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]);  ?> 

     <?= $form->field($actividades_isa, "[$index]fecha_prevista_hasta")->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]);  ?> 
   <h3 style='background-color: #ccc;padding:5px;'>Equipo o equipos de intervención encargado(s) </h3>
   <?= $form->field($actividades_isa, "[$index]num_equipo_campo")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]perfiles")->textInput() ?>

   <?= $form->field($actividades_isa, "[$index]docente_orientador")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]fases")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]num_encuentro")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]nombre_actividad")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]actividad_desarrollar")->textInput() ?>
   <?php
        if($index == 2){
            ?>
                 <?= $form->field($actividades_isa, "[$index]lugares_recorrer")->textInput() ?>
            <?php
        }
   ?>  
   <?= $form->field($actividades_isa, "[$index]tematicas_abordadas")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]objetivos_especificos")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]tiempo_previsto")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]productos")->textInput() ?>
   <h3 style='background-color: #ccc;padding:5px;'>¿El contenido de esta actividad  responde al plan de acción construido colectivamente para la institución desde la articulación de la estrategia MCEE?</h3>
   <?= $form->field($actividades_isa, "[$index]contenido_si_no")->dropDownList([ 'prompt' => 'Seleccione...' , 'SI', 'NO' ] ) ?>
   <?= $form->field($actividades_isa, "[$index]cotenido_nombre")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]cotenido_fecha")->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]);  ?> 
   <?= $form->field($actividades_isa, "[$index]contenido_justificacion")->textInput() ?>
   <br>
   <?= $form->field($actividades_isa, "[$index]acticulacion")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]cantidad_participantes")->textInput() ?>
   <h3 style='background-color: #ccc;padding:5px;'>Recursos previstos para realizar la actividad</h3>
   <?= $form->field($actividades_isa, "[$index]requerimientos_tecnicos")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]requerimientos_logisticos")->textInput() ?>
   <h3 style='background-color: #ccc;padding:5px;'>Programación: Entrega o envío de la programación de la actividad a los participantes,  líderes comunitarios o directivas de la institución</h3>
   <?= $form->field($actividades_isa, "[$index]destinatarios")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]fecha_entega_envio")->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]);  ?> 
   <?= $form->field($actividades_isa, "[$index]observaciones_generales")->textInput() ?>
   <h3 style='background-color: #ccc;padding:5px;'>Diligenciamiento del Plan de Actividades</h3>
   <?= $form->field($actividades_isa, "[$index]nombre_diligencia")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]rol")->textInput() ?>
   <?= $form->field($actividades_isa, "[$index]fecha")->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]);  ?> 