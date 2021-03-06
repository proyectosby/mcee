<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EcInformePlaneacionIeoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ec-informe-planeacion-ieo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_institucion') ?>

    <?= $form->field($model, 'id_sede') ?>

    <?= $form->field($model, 'codigo_dane') ?>

    <?= $form->field($model, 'zona_educativa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
