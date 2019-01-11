<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GcBitacora */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="gc-bitacora-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ciclo')->dropDownList( $ciclos, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'id_docente')->dropDownList( $docentes, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'id_jefe')->dropDownList( $docentes, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'id_sede')->dropDownList( [ $sede->id => $sede->descripcion ] ) ?>

    <?= $form->field($model, 'observaciones')->textarea() ?>

    <?= $form->field($model, 'jornada')->dropDownList( $jornadas, [ 'prompt' => 'Seleccione...' ] ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
