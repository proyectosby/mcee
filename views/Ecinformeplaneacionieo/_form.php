<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\models\EcProyectos;
use app\models\EcAcciones;
use app\models\EcProductos;
use app\models\EcEstrategias;
use app\models\EcProcesos;
use app\models\ComunasCorregimientos;
use app\models\BarriosVeredas;
use nex\chosen\Chosen;
use	yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\EcInformePlaneacionIeo */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="ec-informe-planeacion-ieo-form">

    <?php 
    	$form = ActiveForm::begin();

     ?>

    <?= $form->field($model, 'zona_educativa')->textInput() ?>
		
		<?= $form->field($modelComunas, 'descripcion')->widget(
			Chosen::className(), [
				'items' => $comunas,
				'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
				'placeholder' => 'Seleccione...',
				'clientOptions' => [
					'search_contains' => true,
					'single_backstroke_delete' => false,
				],
			])->label('Comunas');
		?>
		<?= $form->field($modelBarrios, 'descripcion')->widget(
			Chosen::className(), [
				'items' => $barrios,
				'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
				'placeholder' => 'Seleccione...',
				'clientOptions' => [
					'search_contains' => true,
					'single_backstroke_delete' => false,
				],
			])->label('Barrios');
		?>		

	    <?= $form->field($model, 'fase')->textInput() ?>

		<?= $form->field($model, 'fecha_reporte')->widget(
			DatePicker::className(), [
				
				 // modify template for custom rendering
				'template' => '{addon}{input}',
				'language' => 'es',
				'clientOptions' => [
					'autoclose' => true,
					'format' => 'dd-mm-yyyy'
				]
		])->label('Fecha del reporte (dd-mm-aaaa)');?> 	

	    <h3 style='background-color: #ccc;padding:5px;'>I.E.O Misional</h3>

	    <?= $this->context->actionViewFases($model);   ?>


    <?php ActiveForm::end(); ?>

</div>
