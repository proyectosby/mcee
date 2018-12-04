<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GeSeguimientoOperador */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="ge-seguimiento-operador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php /* $form->field($model, 'id_tipo_seguimiento')->textInput() */ ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'id_operador')->textInput() ?>

    <?= $form->field($model, 'cual_operador')->textInput() ?>

    <?= $form->field($model, 'proyecto_reportar')->textInput() ?>

    <?= $form->field($model, 'id_ie')->dropDownList( [], [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'mes_reporte')->textInput() ?>

    <?= $form->field($model, 'semana_reporte')->textInput() ?>

    <?= $form->field($model, 'id_persona_responsable')->textInput() ?>

    <?= $form->field($model, 'descripcion_actividad')->textInput() ?>

    <?= $form->field($model, 'poblacion_beneficiaria')->dropDownList( [], [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'quienes')->textInput() ?>

    <?= $form->field($model, 'numero_participantes')->textInput() ?>

    <?= $form->field($model, 'duracion_actividad')->textInput() ?>

    <?= $form->field($model, 'logros_alcanzados')->textInput() ?>

    <?= $form->field($model, 'dificultadades')->textInput() ?>

    <?= $form->field($model, 'avances_cumplimiento_cuantitativos')->textInput() ?>

    <?= $form->field($model, 'avances_cumplimiento_cualitativos')->textInput() ?>

    <?= $form->field($model, 'dificultades')->textInput() ?>

    <?= $form->field($model, 'propuesta_dificultades')->textInput() ?>

    <?php /*$form->field($model, 'estado')->textInput() */ ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
