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
    <?= $form->field($actividades_pom, "[$index]num_equipos")->textInput([ 'value' => isset($datos[$index]['num_equipos']) ? $datos[$index]['num_equipos'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]perfiles")->textInput([ 'value' => isset($datos[$index]['perfiles']) ? $datos[$index]['perfiles'] : '' ]) ?> 

    <?= $form->field($actividades_pom, "[$index]docentes")->textInput([ 'value' => isset($datos[$index]['docentes']) ? $datos[$index]['docentes'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]fases")->textInput([ 'value' => isset($datos[$index]['fases']) ? $datos[$index]['fases'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]num_encuentro")->textInput([ 'value' => isset($datos[$index]['num_encuentro']) ? $datos[$index]['num_encuentro'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]nombre_actividad")->textInput([ 'value' => isset($datos[$index]['nombre_actividad']) ? $datos[$index]['nombre_actividad'] : '' ]) ?>
    <?php
        if($index == 7){
            echo  $form->field($actividades_pom, "[$index]lugares_visitados")->textInput([ 'value' => isset($datos[$index]['lugares_visitados']) ? $datos[$index]['lugares_visitados'] : '' ]);
        }else if($index == 2){
            echo  $form->field($actividades_pom, "[$index]penalistas_invitados")->textInput([ 'value' => isset($datos[$index]['penalistas_invitados']) ? $datos[$index]['penalistas_invitados'] : '' ]);
        }
    ?>

    <?= $form->field($actividades_pom, "[$index]actividades_desarrolladas")->textInput([ 'value' => isset($datos[$index]['actividades_desarrolladas']) ? $datos[$index]['actividades_desarrolladas'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]tematicas")->textInput([ 'value' => isset($datos[$index]['tematicas']) ? $datos[$index]['tematicas'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]objetivos_especificos")->textInput([ 'value' => isset($datos[$index]['objetivos_especificos']) ? $datos[$index]['objetivos_especificos'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]tiempo_previsto")->textInput([ 'value' => isset($datos[$index]['tiempo_previsto']) ? $datos[$index]['tiempo_previsto'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]productos")->textInput([ 'value' => isset($datos[$index]['productos']) ? $datos[$index]['productos'] : '' ]) ?>

    <h3 style='background-color: #ccc;padding:5px;'>¿El contenido de esta actividad  responde al plan de acción construido colectivamente para la institución desde la articulación de la estrategia MCEE?</h3>
    <?= $form->field($actividades_pom, "[$index]contenido_si_no")->dropDownList( [ 'prompt' => 'Seleccione...', 'SI', 'NO' ] ) ?>
    <?= $form->field($actividades_pom, "[$index]contenido_nombre")->textInput([ 'value' => isset($datos[$index]['contenido_nombre']) ? $datos[$index]['contenido_nombre'] : '' ]) ?>
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
    <?= $form->field($actividades_pom, "[$index]contenido_vigencia")->textInput([ 'value' => isset($datos[$index]['contenido_vigencia']) ? $datos[$index]['contenido_vigencia'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]contenido_justificacion")->textInput([ 'value' => isset($datos[$index]['contenido_justificacion']) ? $datos[$index]['contenido_justificacion'] : '' ]) ?>


    <?= $form->field($actividades_pom, "[$index]acticulacion")->textInput([ 'value' => isset($datos[$index]['acticulacion']) ? $datos[$index]['acticulacion'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]cantidad_participantes")->textInput([ 'value' => isset($datos[$index]['cantidad_participantes']) ? $datos[$index]['cantidad_participantes'] : '' ]) ?>
   
    <h3 style='background-color: #ccc;padding:5px;'>Recursos previstos para realizar la actividad</h3>
    <?= $form->field($actividades_pom, "[$index]requerimientos_tecnicos")->textInput([ 'value' => isset($datos[$index]['requerimientos_tecnicos']) ? $datos[$index]['requerimientos_tecnicos'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]requerimientos_logoisticos")->textInput([ 'value' => isset($datos[$index]['requerimientos_logoisticos']) ? $datos[$index]['requerimientos_logoisticos'] : '' ]) ?>
    <h3 style='background-color: #ccc;padding:5px;'>Programación: Entrega o envío de la programación de la actividad a las directivas o representantes de la institución</h3>
    <?= $form->field($actividades_pom, "[$index]destinatarios")->textInput([ 'value' => isset($datos[$index]['destinatarios']) ? $datos[$index]['destinatarios'] : '' ]) ?>
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
    <?= $form->field($actividades_pom, "[$index]observaciones_generales")->textInput([ 'value' => isset($datos[$index]['observaciones_generales']) ? $datos[$index]['observaciones_generales'] : '' ]) ?>
    <h3 style='background-color: #ccc;padding:5px;'>Diligenciamiento del Plan de Actividades</h3>
    <?= $form->field($actividades_pom, "[$index]nombre_dilegencia")->textInput([ 'value' => isset($datos[$index]['nombre_dilegencia']) ? $datos[$index]['nombre_dilegencia'] : '' ]) ?>
    <?= $form->field($actividades_pom, "[$index]rol")->textInput([ 'value' => isset($datos[$index]['rol']) ? $datos[$index]['rol'] : '' ]) ?>
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
    
