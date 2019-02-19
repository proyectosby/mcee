<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GcMomento2 */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="gc-momento2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_semana')->textInput() ?>

    <?= $form->field($model, 'realizo_visita')->checkbox() ?>

    <?= $form->field($model, 'estudiantes')->textInput() ?>

    <?= $form->field($model, 'docentes')->textInput() ?>

    <?= $form->field($model, 'directivos')->textInput() ?>

    <?= $form->field($model, 'otro')->textInput() ?>

    <?= $form->field($model, 'justificacion_no_visita')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
