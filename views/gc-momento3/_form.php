<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GcMomento3 */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="gc-momento3-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_semana')->textInput() ?>

    <?= $form->field($model, 'id_proposito_momento1')->textInput() ?>

    <?= $form->field($model, 'nivel_avance')->textInput() ?>

    <?= $form->field($model, 'justificacion_avance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones_prof')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
