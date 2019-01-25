<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use nex\chosen\Chosen;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\GcCiclos */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

//Registro el js (gc-ciclos.j)
$this->registerJs( file_get_contents( '../web/js/gc-ciclos.js' ) );

// echo "<pre>"; var_dump( $modelSemanas->getAttributes() ); echo "</pre>";

$this->registerJs( "var attibutesWeek = ".\yii\helpers\Json::htmlEncode( $modelSemanas->getAttributes() ).";" );
?>




<div class="gc-ciclos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelCiclo, 'fecha')->widget(
		DatePicker::className(), [
			
			 // modify template for custom rendering
			'template' => '{addon}{input}',
			'language' => 'es',
			'clientOptions' => [
				'autoclose' => true,
				'format' => 'yyyy-mm-dd'
			]
	]); ?>

    <?= $form->field($modelCiclo, 'descripcion')->textarea() ?>

    <?= $form->field($modelCiclo, 'fecha_inicio')->widget(
		DatePicker::className(), [
			
			 // modify template for custom rendering
			'template' => '{addon}{input}',
			'language' => 'es',
			'clientOptions' => [
				'autoclose' => true,
				'format' => 'yyyy-mm-dd'
			]
	]); ?>

    <?= $form->field($modelCiclo, 'fecha_finalizacion')->widget(
		DatePicker::className(), [
			
			 // modify template for custom rendering
			'template' => '{addon}{input}',
			'language' => 'es',
			'clientOptions' => [
				'autoclose' => true,
				'format' => 'yyyy-mm-dd'
			]
	]); ?>

    <?= $form->field($modelCiclo, 'fecha_cierre')->widget(
		DatePicker::className(), [
			
			 // modify template for custom rendering
			'template' => '{addon}{input}',
			'language' => 'es',
			'clientOptions' => [
				'autoclose' => true,
				'format' => 'yyyy-mm-dd'
			]
	]); ?>

    <?= $form->field($modelCiclo, 'fecha_maxima_acceso')->widget(
		DatePicker::className(), [
			
			 // modify template for custom rendering
			'template' => '{addon}{input}',
			'language' => 'es',
			'clientOptions' => [
				'autoclose' => true,
				'format' => 'yyyy-mm-dd'
			]
	]); ?>

    <?= $form->field($modelCiclo, 'id_creador')->widget(
				Chosen::className(), [
					'items' => $docentes,
					'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
					'multiple' => false,
					'clientOptions' => [
						'search_contains' => true,
						'single_backstroke_delete' => false,
					]
			]); ?>
	
	<?= $form->field( $modelDocentesXBitacora, "docente" )->widget(
				Chosen::className(), [
					'items' => $docentes,
					'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
					'multiple' => true,
					'clientOptions' => [
						'search_contains' => true,
						'single_backstroke_delete' => false,
					]
			]); ?>

			
	<div id='dv-btn-Semanas' style='background-color:#;padding:5px;'>
		
		<div>
			 <div class="form-group text-right"'>
				<?= Html::button('Agregar semana', ['class' => 'btn btn-success btn-add-semanas']) ?>
				<?= Html::button('Eliminar semana', ['class' => 'btn btn-danger btn-remove-semanas']) ?>
			</div>
		</div>
	
	</div>
	
	<div id='dvSemanas' style='background-color:#eee;'>
		
		<div id='dv-semana-0' style='background-color:#eee;padding:5px;'>
			
			<div id='semana-title' style='font-size:18pt;background-color:#3c8dbc;padding:0 5px 0;'>
				Semana 0
			</div>
			
			<div class='semana-contenido' style='padding:5px;'>
	
				<?= $form->field($modelSemanas, '[0]fecha_inicio')->widget(
					DatePicker::className(), [
						
						 // modify template for custom rendering
						'template' => '{addon}{input}',
						'language' => 'es',
						'clientOptions' => [
							'autoclose' => true,
							'format' => 'yyyy-mm-dd'
						]
				]); ?>
				
				<?= $form->field($modelSemanas, '[0]fecha_finalizacion')->widget(
					DatePicker::className(), [
						
						 // modify template for custom rendering
						'template' => '{addon}{input}',
						'language' => 'es',
						'clientOptions' => [
							'autoclose' => true,
							'format' => 'yyyy-mm-dd'
						]
				]); ?>
				
				<?= $form->field($modelSemanas, '[0]fecha_cierre')->widget(
					DatePicker::className(), [
						
						 // modify template for custom rendering
						'template' => '{addon}{input}',
						'language' => 'es',
						'clientOptions' => [
							'autoclose' => true,
							'format' => 'yyyy-mm-dd'
						]
				]); ?>
				
				<?= $form->field($modelSemanas, 'descripcion')->textarea(); ?>
			
			</div>
			
		</div>
	
	</div>
			
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>