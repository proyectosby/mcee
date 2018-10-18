<?php
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */


use app\models\EcAvances;
use yii\widgets\ActiveForm;


$avances = new EcAvances();
?>


<div class="container-fluid">

            <div class="ieo-form">

                <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($avances, 'estado_actual')->textInput()
                    ->label('Estado Actual') ?>
                    <?= $form->field($avances, 'logros')->textInput()
                    ->label('Logros') ?>
                    <?= $form->field($avances, 'retos')->textInput()
                    ->label('Retos') ?>
                    <?= $form->field($avances, 'argumentos')->textInput()
                    ->label('Argumentos') ?>

                <?php ActiveForm::end(); ?>

            </div>
</div>