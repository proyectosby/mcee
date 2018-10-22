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

                    <?= $form->field($avances, "[$contador]estado_actual")->DropDownList($estadoActual,['prompt' => 'Seleccione'])->label('Estado Actual') ?>
                    <?= $form->field($avances, "[$contador]logros")->textInput()->label('Logros') ?>
                    <?= $form->field($avances, "[$contador]retos")->textInput()->label('Retos') ?>
                    <?= $form->field($avances, "[$contador]argumentos")->textInput()->label('Argumentos') ?>
                    <?= $form->field($avances, "[$contador]id_acciones")->hiddenInput( [ 'value' => $contador ] )->label( '' ) ?>
                    <?= $form->field($avances, "[$contador]estado")->hiddenInput( [ 'value' => '1' ] )->label( '' ) ?>
                    <?= $form->field($avances, "[$contador]id_informe_proyecto")->textInput() ?>

            </div>
</div>