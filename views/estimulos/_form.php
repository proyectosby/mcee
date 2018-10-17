<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estimulos */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="estimulos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'tipo_documento_id')->textInput() ?>

    <?= $form->field($model, 'ruta')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
