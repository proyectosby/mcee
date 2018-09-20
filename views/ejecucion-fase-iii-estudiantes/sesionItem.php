<?php

/**********
Versión: 001
Fecha: 2018-08-28
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE III ESTUDIANTES
---------------------------------------
Modificaciones:
Fecha: 2018-09-19
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se cambia los campo input de cada sección por textarea, y se le agrega el plugin XEditable, para poderlos editar
---------------------------------------
**********/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\EjecucionFase */
/* @var $form yii\widgets\ActiveForm */

// $form1 = ActiveForm::begin(
	// [
		// 'layout' => 'horizontal',
		// 'fieldConfig' => [
			// 'template' => "{beginWrapper}\n{input}\n{endWrapper}",
			// 'horizontalCssClasses' => [
				// 'label' 	=> 'col-sm-0',
				// 'offset' 	=> 'col-sm-offset-2',
				// 'wrapper' 	=> 'col-sm-1',
				// 'error' 	=> '',
				// 'hint' 		=> '',
				// 'input' 	=> 'col-sm-1',
			// ],
		// ],
	// ]
	// );
?>

<style>
	.col-sm-12, .col-sm-11, .col-sm-10, .col-sm-9, .col-sm-8, .col-sm-7, .col-sm-6, .col-sm-5, .col-sm-4, .col-sm-3, .col-sm-2, .col-sm-1{
		padding: 0px;
	}
	
	.title{
		height: 100px;
	}
	
	.title > div > span{
		height: 100px;
	}
	
	.title2 > div > span{
		height: 70px;
	}
	
	.panel-body{
		overflow: auto;
	}
	
	.row{
		width: 200%;
	}
</style>

<div class="ejecucion-fase-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<!-- <?= $form->field($model, 'docente')->textInput()->label('Curso de los participantes') ?> -->
	
	<?= $form->field($model, '['.$index.']numero_apps')->widget(
		DatePicker::className(), [
			
			 // modify template for custom rendering
			'template' => '{addon}{input}',
			'language' => 'es',
			'clientOptions' => [
				'autoclose' => true,
				'format' => 'dd-mm-yyyy'
			]
	])->label('Fecha de la sesión(dd-mm-aaaa)');?> 	
	
	<div class="form-group">
		<?= Html::button('Agregar fila' , ['class' => 'btn btn-success', 'id' => 'btnAddFila'.$sesion->id ]) ?>
		<?= Html::button('Eliminar fila', ['class' => 'btn btn-success', 'id' => 'btnRemoveFila'.$sesion->id, "style" => "display:none" ]) ?>
	</div>
	
	<div class='container-fluid' id='dvSesion<?= $sesion->id ?>'>
	
		
		<div class='row text-center title2'>
			
			<div class='col-sm-6 title'>
			
				<div class='col-sm-3'>
					<span total class='form-control' style='background-color:#ccc;'></span>
				</div>
				<div class='col-sm-8'>
					<span total class='form-control' style='background-color:#ccc;'>Recursos empleados para usar las App 0.0</span>
				</div>
				
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'></span>
				</div>
			
			</div>
			
			<div class='col-sm-6 title'>
			
				<div class='col-sm-2'>
					<span total class='form-control' style='background-color:#ccc;'>Obras derivadas en el uso de las App 0.0</span>
				</div>
				
				<div class='col-sm-6'>
					<span total class='form-control' style='background-color:#ccc;'></span>
				</div>
				
				<div class='col-sm-2'>
					<span total class='form-control' style='background-color:#ccc;'>Número y tipo de asignaturas en las que se emplea las App 0.0 creadas</span>
				</div>
				
				<div class='col-sm-2'>
					<span total class='form-control' style='background-color:#ccc;'></span>
				</div>
			
			</div>
			
		</div>
		
		<div class='row text-center title'>
			
			<div class='col-sm-6 title'>
			
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>Número de estudiantes participantes</span>
				</div>
				
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>Número de Apps 0.0 usadas</span>
				</div>
				
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>Nombre de las aplicaciones usadas</span>
				</div>
				
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>TIC (infraestructura existente en la IEO)</span>
				</div>
				
				<div class='col-sm-2'>
					<span total class='form-control' style='background-color:#ccc;'>Tipo de Uso del Recurso</span>
				</div>
				
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>Digitales</span>
				</div>
				
				<div class='col-sm-2'>
					<span total class='form-control' style='background-color:#ccc;'>Tipo de Uso del Recurso</span>
				</div>
				
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>Escolares (No TIC)</span>
				</div>
				
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>Tipo de Uso del Recurso</span>
				</div>
				
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>Tiempo de uso de los recursos TIC en el uso de las App 0.0 (Horas)</span>
				</div>
			
			</div>
			
			<div class='col-sm-6 title'>
			
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>Número</span>
				</div>
				
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>Tipo de producción</span>
				</div>
				
				<div class='col-sm-2'>
					<span total class='form-control' style='background-color:#ccc;'>Indice de temas escolares disciplinares tratados y abordados a través del uso de las  App 0.0</span>
				</div>
				
				<div class='col-sm-2'>
					<span total class='form-control' style='background-color:#ccc;'>Indice de problematicas abordadas a través del uso de las  App 0.0</span>
				</div>
				
				<div class='col-sm-2'>
					<span total class='form-control' style='background-color:#ccc;'>Fecha de Uso de las aplicaciones</span>
				</div>
				
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>Número</span>
				</div>
				
				<div class='col-sm-1'>
					<span total class='form-control' style='background-color:#ccc;'>Asignaturas</span>
				</div>
			
				<div class='col-sm-2'>
					<span total class='form-control' style='background-color:#ccc;'>OBSERVACIONES GENERALES</span>
				</div>
			
			
			</div>
			
		</div>
		
		<div class='row text-center' id='dvFilaSesion<?= $sesion->id ?>' style='display:none;'>
		
			<div class='col-sm-6'>
			
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]seiones_empleadas', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]acciones_realiadas', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]temas_problama', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]tipo_conpetencias', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-2'>
					<?= Html::activeTextarea($model, '[$index]observaciones',[ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]id_datos_ieo_profesional', [ 'class' => 'form-control', 'data-type' => 'textarea' ]) ?>
				</div>
				
				<div class='col-sm-2'>
					<?= Html::activeTextarea($model, '[$index]id_datos_ieo_profesional', [ 'class' => 'form-control', 'data-type' => 'textarea' ]) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]id_datos_ieo_profesional', [ 'class' => 'form-control', 'data-type' => 'textarea' ]) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]id_datos_ieo_profesional', [ 'class' => 'form-control', 'data-type' => 'textarea' ]) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]id_datos_ieo_profesional', [ 'class' => 'form-control', 'data-type' => 'textarea' ]) ?>
				</div>
			
			</div>
			
			<div class='col-sm-6'>
			
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]seiones_empleadas', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]acciones_realiadas', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-2'>
					<?= Html::activeTextarea($model, '[$index]temas_problama', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-2'>
					<?= Html::activeTextarea($model, '[$index]tipo_conpetencias', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-2'>
					<?= Html::activeTextarea($model, '[$index]tipo_conpetencias', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]observaciones',[ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($model, '[$index]id_datos_ieo_profesional', [ 'class' => 'form-control', 'data-type' => 'textarea' ]) ?>
				</div>
			
				<div class='col-sm-2'>
					<?= Html::activeTextarea($model, '[$index]id_datos_ieo_profesional', [ 'class' => 'form-control', 'data-type' => 'textarea' ]) ?>
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	<?php ActiveForm::end(); ?>

</div>
