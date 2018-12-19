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

                    <?= $form->field($porcentajes, "[$idProyecto]total_sesiones")->textInput([ 'value' => $datos[$idProyecto]['total_sesiones'] ])?>
                    <?= $form->field($porcentajes, "[$idProyecto]avance_sede")->textInput([ 'value' => $datos[$idProyecto]['avance_sede'] ])?>
                    <?= $form->field($porcentajes, "[$idProyecto]avance_ieo")->textInput([ 'value' => $datos[$idProyecto]['avance_ieo'] ])?> 
                    <?= $form->field($porcentajes, "[$idProyecto]seguimiento_actividades")->textInput([ 'value' => $datos[$idProyecto]['seguimiento_actividades'] ])?>
                    <?= $form->field($porcentajes, "[$idProyecto]evaluacion_actividades")->textInput([ 'value' => $datos[$idProyecto]['evaluacion_actividades'] ])?>
                    <?= $form->field($porcentajes, "[$idProyecto]estado")->hiddenInput( [ 'value' => '1' ] )->label(false ) ?>
            </div>
</div>