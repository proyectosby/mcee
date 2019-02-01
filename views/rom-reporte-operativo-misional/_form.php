<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RomReporteOperativoMisional */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="rom-reporte-operativo-misional-form">


	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= $form->field($model, 'id_institucion')->dropDownList($institucion) ?>

    <?= $form->field($model, 'id_sedes')->dropDownList( $sedes, [ 'prompt' => 'Seleccione...' ] ) ?>
	
    <?= $form->field($model, 'estado')->hiddenInput( [ 'value' => '1' ] )->label(false ) ?>


    <div class="panel panel panel-primary" >
        
        <?= $this->context->actionFormulario($model, $form, $datos);   ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
