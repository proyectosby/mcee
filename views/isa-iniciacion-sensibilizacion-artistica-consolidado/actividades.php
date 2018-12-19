<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\IsaIniciacionSensibilizacionArtisticaConsolidado */
/* @var $form yii\widgets\ActiveForm */
?>

	<?php // $form->field($actividad, '['.$index.']id_actividad')->dropDownList( [ 'prompt' => 'Seleccione...' ]) ?>

    <?= $form->field($actividad, '['.$index.']total_sesiones_realizadas')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']avance_por_mes')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']total_sesiones_aplazadas')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']total_sesiones_canceladas')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']vecinos')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']lideres_comunitarios')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']empresarios_comerciantes_microempresas')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']representantes_organizaciones_locales')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']asociaciones_grupos_comunitarios')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']otros_actores')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']actas')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']reportes')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']listados')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']plan_trabajo')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']formato_seguimiento')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']formato_evaluacion')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']fotografias')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']videos')->textInput() ?>

    <?= $form->field($actividad, '['.$index.']otros_productos')->textInput() ?>