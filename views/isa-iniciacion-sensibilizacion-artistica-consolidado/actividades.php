<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\IsaIniciacionSensibilizacionArtisticaConsolidado */
/* @var $form yii\widgets\ActiveForm */
?>


    <?= $form->field($actividad, '['.$index.']total_sesiones_realizadas')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']avance_por_mes')->textInput([ 'data-porcentaje' => $index ]) ?>

    <?= $form->field($actividad, '['.$index.']total_sesiones_aplazadas')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']total_sesiones_canceladas')->textInput() ?>
	
	<h3 style='background-color:#ccc;padding:5px;'><?="Número de participantes por actividad comunitaria por sede educativa." ?></h3>

    <?= $form->field($actividad, '['.$index.']vecinos')->textInput([ "data-participante" => $index ]) ?>

    <?= $form->field($actividad, '['.$index.']lideres_comunitarios')->textInput([ "data-participante" => $index ]) ?>

    <?= $form->field($actividad, '['.$index.']empresarios_comerciantes_microempresas')->textInput([ "data-participante" => $index ]) ?>

    <?= $form->field($actividad, '['.$index.']representantes_organizaciones_locales')->textInput([ "data-participante" => $index ]) ?>

    <?= $form->field($actividad, '['.$index.']asociaciones_grupos_comunitarios')->textInput([ "data-participante" => $index ]) ?>

    <?= $form->field($actividad, '['.$index.']otros_actores')->textInput([ "data-participante" => $index ]) ?>
	
	<div class="form-group">
	
		<?= Html::label( "Total de Participantes en la actividad." ) ?>
		
		<?= Html::textInput( $index."-total_participantes", "", [ 
					"class" 		=> "form-control", 
					"style" 		=> "background-color:#eee",
					"disabled" 		=> true, 
					"id" 			=> $index."-total_participantes", 
				] ) ?>
		
	</div>

	<h3 style='background-color:#ccc;padding:5px;'><?="Evidencias (Indique la cantidad y destino de evidencias que resultaron de la actividad, tales  como fotografías, videos, actas, trabajos de los participantes, etc )" ?></h3>
	
	<?= $form->field($actividad, '['.$index.']actas')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']reportes')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']listados')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']plan_trabajo')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']formato_seguimiento')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']formato_evaluacion')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']fotografias')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']videos')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']otros_productos')->textInput() ?>