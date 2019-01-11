<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\GcCiclos */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="gc-ciclos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->widget(
			DatePicker::className(), [
				// modify template for custom rendering
				'template' => '{addon}{input}',
				'language' => 'es',
				'clientOptions' => [
					'autoclose' => true,
					'format'    => 'yyyy-mm-dd',
			],
		]); ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'fecha_inicio')->widget(
			DatePicker::className(), [
				// modify template for custom rendering
				'template' => '{addon}{input}',
				'language' => 'es',
				'clientOptions' => [
					'autoclose' => true,
					'format'    => 'yyyy-mm-dd',
			],
		]); ?>

    <?= $form->field($model, 'fecha_finalizacion')->widget(
			DatePicker::className(), [
				// modify template for custom rendering
				'template' => '{addon}{input}',
				'language' => 'es',
				'clientOptions' => [
					'autoclose' => true,
					'format'    => 'yyyy-mm-dd',
			],
		]); ?>

    <?= $form->field($model, 'fecha_cierre')->widget(
			DatePicker::className(), [
				// modify template for custom rendering
				'template' => '{addon}{input}',
				'language' => 'es',
				'clientOptions' => [
					'autoclose' => true,
					'format'    => 'yyyy-mm-dd',
			],
		]); ?>

    <?= $form->field($model, 'fecha_maxima_acceso')->widget(
			DatePicker::className(), [
				// modify template for custom rendering
				'template' => '{addon}{input}',
				'language' => 'es',
				'clientOptions' => [
					'autoclose' => true,
					'format'    => 'yyyy-mm-dd',
			],
		]); ?>

    <?= $form->field($model, 'id_creador')->dropDownList( $docentes, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'id_semana')->dropDownList( $semanas, [ 'prompt' => 'Seleccione...' ] ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
