<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RomReporteOperativoMisional */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="rom-reporte-operativo-misional-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_institucion')->dropDownList($institucion) ?>

    <?= $form->field($model, 'id_sedes')->dropDownList( $sedes, [ 'prompt' => 'Seleccione...' ] ) ?>


    <div class="panel panel panel-primary" >
        <div class="panel-heading" style="margin-bottom: 15px;">Fortalecer el vínculo comunidad-escuela mediante el mejoramiento de la oferta en artes y cultura desde las instituciones educativas oficiales para la ocupación del tiempo libre en las comunas y corregimientos de Santiago de Cali.</div>
        <?= $this->context->actionViewFases($model, $form, $datos);   ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
