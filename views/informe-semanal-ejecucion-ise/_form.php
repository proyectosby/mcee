<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InformeSemanalEjecucionIse */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/ise.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/ise-docentes.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="informe-semanal-ejecucion-ise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_institucion')->textInput(['value' => $institucion]) ?>
    
    <?= $form->field($model, 'sede_id')->dropDownList( $sedes, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $this->context->actionViewFases($model, $form, isset($datos) ? $datos : 0, isset($datos2) ? $datos2 : 0);   ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
