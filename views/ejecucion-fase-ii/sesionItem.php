<?php

/**********
Versión: 001
Fecha: 2018-08-21
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE II
---------------------------------------
Modificaciones:
Fecha: 2018-09-18
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se cambia los campo input de cada sección por textarea, y se le agrega el plugin Textarea, para poderlos editar
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
		height: 150px;
		background-color: #ccc;
	}
	
	.title > div > span{
		height: 150px;
	}
	
	.title2 > div > span{
		height: 70px;
	}
	
	.title3 > div > span{
		height: 120px;
	}
</style>

<div class="ejecucion-fase-form">

    <?php $form = ActiveForm::begin(); ?>
	
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
			
			<div class='col-sm-6'>
				<span total class='form-control' style='background-color:#ccc;'></span>
			</div>
			
			<div class='col-sm-3'>
				<span total class='form-control' style='background-color:#ccc;'>Obras derivadas con el desarrollo e implementación de las App 0.0</span>
			</div>
			
			<div class='col-sm-2'>
				<span total class='form-control' style='background-color:#ccc;'>Mejoras realizadas a las App 0.0</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'></span>
			</div>
			
		</div>
		
		<div class='row text-center title'>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Nombre de docentes participantes</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Nombre de las asignaturas que enseña</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Especialidad de la Media Técnica o Técnica</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Número de Apps 0.0 desarrolladas e implementadas</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Nombre de las aplicaciones desarrolladas</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Nombre de las aplicaciones creadas</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Número</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Tipo de obras</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Indice de temas escolares disciplinares abordados a través de las App 0.0</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Numero de pruebas realizadas a la aplicación</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Número de disecciones realizadas a la aplicación</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>OBSERVACIONES GENERALES</span>
			</div>
			
			
			
		</div>
		
		<div class='row text-center' id='dvFilaSesion<?= $sesion->id ?>' style='display:none;'>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
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
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]observaciones',[ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]id_datos_ieo_profesional', [ 'class' => 'form-control', 'data-type' => 'textarea' ]) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]estado', [ 'class' => 'form-control', 'data-type' => 'textarea' ]) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]numero_sesiones_docente', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]numero_sesiones_docente', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]numero_sesiones_docente', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]numero_sesiones_docente', [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
		</div>
	
	</div>
		
	
	
	
	<div class='container-fluid'>
	
	
		<div class='row text-center'>
			
			<div class='col-sm-12'>
				<span total class='form-control' style='background-color:#ccc;'>ACCIONES REALIZADAS PARA DESARROLLAR E IMPLEMENTAR LAS APP 0.0</span>
			</div>
			
		</div>
		
		<div class='row text-center title3'>
			
			<div class='col-sm-3'>
				<span total class='form-control' style='background-color:#ccc;'>Tipo de Acción </span>
			</div>
			
			<div class='col-sm-3'>
				<span total class='form-control' style='background-color:#ccc;'>Descripción</span>
			</div>
			
			<div class='col-sm-3'>
				<span total class='form-control' style='background-color:#ccc;'>Responsable de la ejecución de la Acción</span>
			</div>
			
			<div class='col-sm-3'>
				<span total class='form-control' style='background-color:#ccc;'>Tiempo de desarrollo de las aplicaciones  (Horas reloj)</span>
			</div>
			
		</div>
		
		<div class='row text-center row-data-2'>
			
			<div class='col-sm-3'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-3'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-3'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-3'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
		</div>
		
		
		
		
		
		
		
		
		
		
		
		<div class='row text-center'>
			
			<div class='col-sm-12'>
				<span total class='form-control' style='background-color:#ccc;'>RECURSOS EMPLEADOS EN LA CONSTRUCCIÓN (DESARROLLO E IMPLEMENTACIÓN) DE APP 0.0</span>
			</div>
			
		</div>
		
		<div class='row text-center title3'>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>TIC (infraestructura existente en la IEO)</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Tipo de Uso del Recurso</span>
			</div>
			
			<div class='col-sm-2'>
				<span total class='form-control' style='background-color:#ccc;'>Digitales</span>
			</div>
			
			<div class='col-sm-3'>
				<span total class='form-control' style='background-color:#ccc;'>Tipo de Uso del Recurso</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Escolares (No TIC)</span>
			</div>
			
			<div class='col-sm-3'>
				<span total class='form-control' style='background-color:#ccc;'>Tipo de Uso del Recurso</span>
			</div>
			
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Tiempo de uso de los recursos TIC en el diseño de las App 0.0 (Horas reloj)</span>
			</div>
			
		</div>
		
		<div class='row text-center row-data-3'>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-2'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-3'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-3'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($model, '[$index]numero_apps', [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
		</div>
	
	
		
	</div>
	
	


	<?php ActiveForm::end(); ?>

</div>
