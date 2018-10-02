<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstrategiaEmbellecimientoEspacios */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="estrategia-embellecimiento-espacios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seguimiento_uso_espacios')->dropDownList($parametrosUsos) ?>

    <?= $form->field($model, 'plan_enlucimiento')->textInput() ?>

    <?= $form->field($model, 'estrateguia_enbellecimiento')->dropDownList($parametrosEmbellecimiento) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
