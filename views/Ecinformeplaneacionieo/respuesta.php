<?php
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */


use app\models\EcRespuestas;
use yii\widgets\ActiveForm;


$model = new EcRespuestas();
?>


<div class="container-fluid">

            <div class="ieo-form">

                <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'respuesta')->textInput()->label('respuesta') ?>
                    <?= $form->field($model, 'id_estrategia')->textInput()->label('id_estrategia') ?>
                    <?= $form->field($model, 'estado')->textInput()->label('estado') ?>

                <?php ActiveForm::end(); ?>

            </div>
</div>