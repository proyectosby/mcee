<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GeSeguimientoOperadorFrente */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="ge-seguimiento-operador-frente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php /*$form->field($model, 'id_tipo_seguimiento')->textInput()*/ ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_persona_diligencia')->textInput() ?>

    <?= $form->field($model, 'id_gestor_a_evaluar')->textInput() ?>

    <?= $form->field($model, 'mes_reporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_corte')->textInput() ?>

    <?= $form->field($model, 'cumple_cronograma')->checkbox() ?>

    <?= $form->field($model, 'descripcion_cronograma')->textInput() ?>

    <?= $form->field($model, 'compromisos_establecidos')->dropDownList( [], [ 'prompt' => 'Seleccione...' ]) ?>

    <?= $form->field($model, 'cuantas_reuniones')->textInput() ?>

    <?= $form->field($model, 'aportes_reuniones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logros')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dificultades')->textInput(['maxlength' => true]) ?>

    <?php /* $form->field($model, 'estado')->textInput() */ ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
