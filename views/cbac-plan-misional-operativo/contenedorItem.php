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


    if($index <= 2){?>
        <div style ="display : none">
            <?= $form->field($actividades_pom, "[$index]id_componentes")->textInput(["value" => 3]) ?>
            <?= $form->field($actividades_pom, "[$index]id_actividad")->textInput(["value" => $index]) ?>
        </div>
    <?php
    }else if($index > 2 && $index <= 7){ ?>
        <div style ="display : none">
            <?= $form->field($actividades_pom, "[$index]id_componentes")->textInput(["value" => 4]) ?>
            <?= $form->field($actividades_pom, "[$index]id_actividad")->textInput(["value" => $index]) ?>
        </div>
    <?php
    }else{ ?>
        <div style ="display : none">
            <?= $form->field($actividades_pom, "[$index]id_componentes")->textInput(["value" => 5]) ?>
            <?= $form->field($actividades_pom, "[$index]id_actividad")->textInput(["value" => $index]) ?>
        </div>
    <?php 
        }
    ?>
    <h3 style='background-color: #ccc;padding:5px;'>Fecha de realización de la o las actividades</h3>
    <?= $form->field($actividades_pom, "[$index]desde")->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]);  ?> 
    <?= $form->field($actividades_pom, "[$index]hasta")->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]);  ?>

    <h3 style='background-color: #ccc;padding:5px;'>Equipo o equipos de intervención encargado(s)</h3>
    <?= $form->field($actividades_pom, "[$index]num_equipos")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]perfiles")->textInput() ?> 

    <?= $form->field($actividades_pom, "[$index]docentes")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]fases")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]num_encuentro")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]nombre_actividad")->textInput() ?>
    <?php
        if($index == 7){
            echo  $form->field($actividades_pom, "[$index]lugares_visitados")->textInput();
        }else if($index == 2){
            echo  $form->field($actividades_pom, "[$index]penalistas_invitados")->textInput();
        }
    ?>

    <?= $form->field($actividades_pom, "[$index]actividades_desarrolladas")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]tematicas")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]objetivos_especificos")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]tiempo_previsto")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]productos")->textInput() ?>

    <h3 style='background-color: #ccc;padding:5px;'>¿El contenido de esta actividad  responde al plan de acción construido colectivamente para la institución desde la articulación de la estrategia MCEE?</h3>
    <?= $form->field($actividades_pom, "[$index]contenido_si_no")->dropDownList( [ 'prompt' => 'Seleccione...', 'SI', 'NO' ] ) ?>
    <?= $form->field($actividades_pom, "[$index]contenido_nombre")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]contenido_fecha")->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]);  ?>
    <?= $form->field($actividades_pom, "[$index]contenido_vigencia")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]contenido_justificacion")->textInput() ?>


    <?= $form->field($actividades_pom, "[$index]acticulacion")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]cantidad_participantes")->textInput() ?>
   
    <h3 style='background-color: #ccc;padding:5px;'>Recursos previstos para realizar la actividad</h3>
    <?= $form->field($actividades_pom, "[$index]requerimientos_tecnicos")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]requerimientos_logoisticos")->textInput() ?>
    <h3 style='background-color: #ccc;padding:5px;'>Programación: Entrega o envío de la programación de la actividad a las directivas o representantes de la institución</h3>
    <?= $form->field($actividades_pom, "[$index]destinatarios")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]fehca_entrega")->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]);  ?>
    <?= $form->field($actividades_pom, "[$index]observaciones_generales")->textInput() ?>
    <h3 style='background-color: #ccc;padding:5px;'>Diligenciamiento del Plan de Actividades</h3>
    <?= $form->field($actividades_pom, "[$index]nombre_dilegencia")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]rol")->textInput() ?>
    <?= $form->field($actividades_pom, "[$index]fehca")->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]);  ?>
    
