<?php
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */


use app\models\EcAvances;
use yii\widgets\ActiveForm;
use app\models\IsaPorcentajesActividades;


$porcentajes = new IsaPorcentajesActividades();
 

?>

<div class="container-fluid">
            <div class="ieo-form">

                    <?= $form->field($porcentajes, "[$idActividad]total_sesiones")->textInput([ 'value' => $datos[$idActividad]['total_sesiones'] ])?>
                    <?= $form->field($porcentajes, "[$idActividad]avance_sede")->textInput([ 'value' => $datos[$idActividad]['avance_sede'] ])?>
                    <?= $form->field($porcentajes, "[$idActividad]avance_ieo")->textInput([ 'value' => $datos[$idActividad]['avance_ieo'] ])?> 
                    <?= $form->field($porcentajes, "[$idActividad]seguimiento_actividades")->textInput([ 'value' => $datos[$idActividad]['seguimiento_actividades'] ])?>
                    <?= $form->field($porcentajes, "[$idActividad]evaluacion_actividades")->textInput([ 'value' => $datos[$idActividad]['evaluacion_actividades'] ])?>
                    <?= $form->field($porcentajes, "[$idActividad]estado")->hiddenInput( [ 'value' => '1' ] )->label(false ) ?>
            </div>
</div>