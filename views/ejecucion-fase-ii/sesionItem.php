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



<div class="ejecucion-fase-form">
	
	<?= Html::activeHiddenInput($dataSesion, "[$indexEf]id_sesion", [ 'value' => $sesion->id ]) ?>
	
	<?= Html::activeHiddenInput($dataSesion, "[$indexEf]id") ?>
	
	<?= Html::activeHiddenInput($dataSesion, "[$indexEf]estado", [ 'value' => 1 ]) ?>
	
	<?= $form->field($dataSesion, '['.$indexEf.']fecha_sesion')->widget(
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
		<?= Html::button('Agregar fila' , ['class' => 'btn btn-success', 'id' => 'btnAddFila'.$indexEf ]) ?>
		<?= Html::button('Eliminar fila', ['class' => 'btn btn-success', 'id' => 'btnRemoveFila'.$indexEf, "style" => "display:none" ]) ?>
	</div>
	
	<div class='container-fluid' id='dvSesion<?= $indexEf ?>'>
	
		
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
		
		<?php foreach( $ejecucionesFase as $key => $ejecucionFase ) :  ?>
		
			<div class='row text-center' id='dvFilaSesion<?= $sesion->id ?>'>
				
				<div class='col-sm-1' style='display:none;'>
					<?= Html::activeHiddenInput($ejecucionFase, "[$indexEf][$index]id") ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]docentes", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]asignaturas", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]especialidad", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]numero_apps_desarrolladas", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]nombre_aplicaciones_desarrolladas", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]nombre_aplicaciones_creadas", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]numero", [ 'class' => 'form-control', 'data-type' => 'textarea' ]) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]tipo_obra", [ 'class' => 'form-control', 'data-type' => 'textarea' ]) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]temas_abordados", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]numero_pruebas", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]numero_disecciones", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
				<div class='col-sm-1'>
					<?= Html::activeTextarea($ejecucionFase, "[$indexEf][$index]observaciones_generales", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				</div>
				
			</div>
		
		<?php 
			$index++; 
			endforeach; 
		?>
	
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
				<?= Html::activeTextarea($accioneRecurso, "[$indexEf]tipo_accion", [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-3'>
				<?= Html::activeTextarea($accioneRecurso, "[$indexEf]descripcion_accion", [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-3'>
				<?= Html::activeTextarea($accioneRecurso, "[$indexEf]responsable_accion", [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-3'>
				<?= Html::activeTextarea($accioneRecurso, "[$indexEf]tiempo_desarrollo", [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
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
				<?= Html::activeTextarea($accioneRecurso, "[$indexEf]tic", [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($accioneRecurso, "[$indexEf]tipo_recurso_tic", [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-2'>
				<?= Html::activeTextarea($accioneRecurso, "[$indexEf]digitales", [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-3'>
				<?= Html::activeTextarea($accioneRecurso, "[$indexEf]tipo_recurso_digitales", [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($accioneRecurso, "[$indexEf]escolares", [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-3'>
				<?= Html::activeTextarea($accioneRecurso, "[$indexEf]tipo_recurso_no_tic", [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($accioneRecurso, "[$indexEf]tiempo_uso_recurso", [ 'class' => 'form-control', 'maxlength' => true, 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
		</div>
	
	
		
	</div>

</div>
