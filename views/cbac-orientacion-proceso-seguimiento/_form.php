<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\CbacOrientacionProcesoSeguimiento */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="cbac-orientacion-proceso-seguimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seguimieno')->textInput() ?>

    <?= $form->field($model, 'desde')->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
            ],
    ]);  ?>

    <?= $form->field($model, 'hasta')->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
            ],
    ]);  ?>

    <?= $form->field($model, 'nombre_institucion')->textInput(['readonly' => true, 'value' => isset($institucion) ? $institucion : '' ]) ?>

    <?= $form->field($model, 'id_sede')->dropDownList($sedes, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, "estado")->hiddenInput(['value'=> 1])->label(false); ?>

    <div class="panel panel panel-primary" >
        <div class="panel-heading" style="margin-bottom: 15px;"> Implementar estrategias artisticas y culturales que fortalezcan las competencias básicas de los estudiantes de grados sexto a once de las Instituciones Educativas Oficiales.</div>
        <?= $this->context->actionViewFases($model, $form, isset($datos) ? $datos : 0  );   ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
