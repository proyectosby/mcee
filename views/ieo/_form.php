<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="ieo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'persona_acargo')->textInput() ?>

    <?= $form->field($model, 'zona_educativa')->textInput() ?>

    <?= $form->field($model, 'comuna')->textInput() ?>

    <?= $form->field($model, 'barrio')->textInput() ?>

    
    
    <h3 style='background-color: #ccc;padding:5px;'>I.E.O Avance Ejecución</h3>

    <?= $this->context->actionViewFases($model);   ?>
    
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
   
    <?php ActiveForm::end(); ?>

</div>
