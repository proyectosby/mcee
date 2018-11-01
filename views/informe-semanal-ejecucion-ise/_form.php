<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InformeSemanalEjecucionIse */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="informe-semanal-ejecucion-ise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'institucion_id')->textInput() ?>

    <?= $form->field($model, 'sede_id')->textInput() ?>

    <?= $this->context->actionViewFases($model);   ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
