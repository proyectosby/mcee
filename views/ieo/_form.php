<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ieo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'persona_id')->textInput() ?>

    <?= $form->field($model, 'institucion_id')->textInput() ?>

    <?= $form->field($model, 'sede_id')->textInput() ?>

    <?= $form->field($model, 'proyecto_id')->textInput() ?>


    
    
    <h3 style='background-color: #ccc;padding:5px;'>I.E.O Avance Ejecución</h3>

    <?= $this->context->actionViewFases($model);   ?>
    
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
   
    <?php ActiveForm::end(); ?>

</div>
