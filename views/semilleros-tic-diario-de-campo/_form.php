<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SemillerosTicDiarioDeCampo */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- Espacio para los datos que se cargan desde la base de datos-->
<div class="col-sm-9" style='padding:0px;background-color:#ccc;height:30px;text-align:center;'>
			BITACORA FASE I
		</div><br><br>
		<div class="col-sm-9" style='padding:0px;background-color:#ccc;height:30px;text-align:center;'>
			RESUMEN CUANTITATIVO DEL RESULTADO
		</div><br><br>
<div class="container-fluid">

	
	<div class=row style='text-align:center;'>
		<div class="col-sm-1" style='padding:0px;'>
			<span total class='form-control' style='background-color:#ccc;height:110px;'>No. de Docentes</span>
		</div>
		<div class="col-sm-1" style='padding:0px;'>
			<span total class='form-control' style='background-color:#ccc;height:110px'>Nombre de las asignaturas que enseña</span>
		</div>
		<div class="col-sm-1" style='padding:0px;'>
			<span total class='form-control' style='background-color:#ccc;height:110px'>Especialidad de la Media Técnica o Técnica</span>
		</div>
		<div class="col-sm-1" style='padding:0px;'>
			<span total class='form-control' style='background-color:#ccc;height:110px'>No. de Sesiones realizadas</span>
		</div>
		<div class="col-sm-1" style='padding:0px;'>
			<span total class='form-control' style='background-color:#ccc;height:110px'>Frecuencia de sesiones</span>
		</div>
		<div class="col-sm-1" style='padding:0px;'>
			<span total class='form-control' style='background-color:#ccc;height:110px'>Duración de cada sesión</span>
		</div>
		<div class="col-sm-1" style='padding:0px;'>
			<span total class='form-control' style='background-color:#ccc;height:110px'>Aplicaciones creadas</span>
		</div>
		<div class="col-sm-2" style='padding:0px;'>
			<span total class='form-control' style='background-color:#ccc;height:110px'>Temas problemas tratados</span>
		</div>
	</div>
	
	<div class=row>
		<div class="col-sm-1" style='padding:0px;background-color:#fff;height:100px'>
			&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div class="col-sm-1" style='padding:0px;background-color:#fff;height:100px'>
			&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div class="col-sm-1" style='padding:0px;background-color:#fff;height:100px'>
			&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div class="col-sm-1" style='padding:0px;background-color:#fff;height:100px'>
			&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div class="col-sm-1" style='padding:0px;background-color:#fff;height:100px'>
			&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div class="col-sm-1" style='padding:0px;background-color:#fff;height:100px'>
			&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div class="col-sm-1" style='padding:0px;background-color:#fff;height:100px'>
			&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div class="col-sm-1" style='padding:0px;background-color:#fff;height:100px'>
			&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div class="col-sm-1" style='padding:0px;background-color:#fff;height:100px'>
			&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	</div>
	
	<!-- formulario -->
	<div class="semilleros-tic-diario-de-campo-form col-sm-9">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'id_ejecucion_fase')->textInput() ?>-->

	<div class="" style='padding:0px;background-color:#ccc;height:30px;text-align:center;'>
			Espacio de escritura para el profesional
		</div>
	
    <?= $form->field($model, 'descripcion')->textArea(['maxlength' => true])->label("1. Descripción del cómo se lleva a cabo la fase de creación y qué observaciones relevantes pueden anotarse de las acciones y los procesos llevados") ?>

    <?= $form->field($model, 'hallazgos')->textArea(['maxlength' => true])->label("HALLAZGOS 1) sobre las condiciones institucionales que favorecen la creación de aplicaciones 0.0; 2) sobre las estrategias empleadas con los participantes para crear en cada IEO; 3) sobre las dificultades o facilidad de usar la infraestructura tecnológica (condiciones para usar la tecnología) 4) sobre las condiciones para facilitar el uso de espacios y el trabajo con los estudiantes") ?>

    <!-- <?= $form->field($model, 'estado')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
	
	
</div>


