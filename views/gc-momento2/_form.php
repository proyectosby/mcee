<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GcMomento2 */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

$this->registerCssFile("@web/css/momentos.css");
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/momentos.js',['depends' => [\yii\web\JqueryAsset::className()]]);

//se captura el valor de la semana
$id_bitacora= $_GET['id_bitacora'];
$id_semana= $_GET['id'];
$id_momento1= 2;


?>

<div class="gc-momento2-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<fieldset>
						<h4>Registre las evidencias desarrolladas durante cada día.</h4>
						<hr>
						<label><h4>Formulario de una visita</h4></label>

						<?= $form->field($model, 'id_semana')->hiddenInput(['value' => $id_semana])->label(false) ?>

						<?= $form->field($model, 'realizo_visita')->checkbox() ?>

						<?= $form->field($model, 'estudiantes')->textInput() ?>

						<?= $form->field($model, 'docentes')->textInput() ?>

						<?= $form->field($model, 'directivos')->textInput() ?>

						<?= $form->field($model, 'otro')->textInput() ?>

						<?= $form->field($model, 'justificacion_no_visita')->textInput() ?>

						<?= $form->field($model, "estado")->hiddenInput(['value'=> 1])->label(false) ?>

						<div class="form-group form-wizard-buttons">
								<?= Html::submitButton('Guardar y continuar', ['class' => 'btn btn-success']) ?>	
						</div>
					</fieldset>

    <?php ActiveForm::end(); ?>

</div>
