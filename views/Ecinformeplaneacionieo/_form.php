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
use yii\helpers\Url;

use yii\bootstrap\Progress;
/* @var $this yii\web\View */
/* @var $model app\models\EcInformePlaneacionIeo */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/ecinformeplaneacionieo.js',['depends' => [\yii\web\JqueryAsset::className()]]);


?>
  <?=  Html::button('Porcentajes de avance',['value'=>Url::to(['create']),'class'=>'btn btn-success','id'=>'porcentajes']) ?>
<br>
<br>
<br>

<style>
#myProgress {
  width: 50%;
   height: 3%;
  background-color: #ddd;
}

.myBar {
   width: 0%;
   height: 100%;
  background-color: green;
  text-align: center;
  color: white;
}
</style>
<div id="divPorcentajes">
   <div class="panel panel-danger">
		
		<div class="panel-heading">
			<h3 class="panel-title">Proyecto Pedagógicos Transversales</h3>
		</div>
		<div class="panel-body">
		
			Cuál es el estado general de avance de los procesos de gestión de los Proyectos Pedagógicos Transversales		
			<div id="myProgress">
			  <div id="porcentajeAvance1" class="myBar">0%</div>
			</div>
			<br>
			Cuál es el estado de avance del proceso de transversalización y vinculación al PEI de los Proyectos Pedagógicos Transversales
			<div id="myProgress">
			  <div id="porcentajeAvance2" class="myBar">0%</div>
			</div>
			<br>

			Cuál es el estado de avance de la orientación conceptual y metodológica de los Proyectos Pedagógicos Transversales
			<div id="myProgress">
			  <div id="porcentajeAvance3" class="myBar">0%</div>
			</div>
			<br>

			Cuál es el estado de avance de los productos correspondientes al eje PPT 
			<div id="myProgress">
			  <div id="porcentajeAvance4" class="myBar">0%</div>
			</div>
			<br>
		</div>

	
	<div class="panel panel-success">
		
		<div class="panel-heading">
			<h3 class="panel-title">Proyecto de Servicio Social Estudiantil </h3>
		</div>
		<div class="panel-body">
 
		Cuál es el estado de avance de la gestión de los PSSE
		<div id="myProgress">
			<div id="porcentajeAvance5" class="myBar">0%</div>
		</div>
		<br>
		  
		Cuál es el estado de avance de los procesos con la comunidad en el eje PSSE
		<div id="myProgress">
			<div id="porcentajeAvance6" class="myBar">0%</div>
		</div>
		<br>
		Cuál es el estado de avance de la orientación conceptual y metodológica de los Proyectos de servicio social
		<div id="myProgress">
			<div id="porcentajeAvance7" class="myBar">0%</div>
		</div>
		<br>
		Cuál es el estado de avance de los productos del eje PSSE
		<div id="myProgress">
			  <div id="porcentajeAvance8" class="myBar">0%</div>
			</div>
		</div>
	</div> 
	
	<div class="panel panel-primary">
		
		<div class="panel-heading">
			<h3 class="panel-title">Articulación Familiar</h3>
		</div>
		<div class="panel-body">
 
	  Cuál es el estado de avance del acompañamiento pedagógico que realizar las familias en el desarrollo de las CB y HV de los estudiantes.
	  <div id="myProgress">
			<div id="porcentajeAvance9" class="myBar">0%</div>
		</div>
		<br>
	  Cuál es el estado de avance de los procesos de comunicación entre la familia y la escuela
	  <div id="myProgress">
			<div id="porcentajeAvance10" class="myBar">0%</div>
		</div>
		<br>
	  
	  
	  Cuál es el estado de avance en la articulación de los organismos y mecanismos de participación de las familias en la escuela 
	  <div id="myProgress">
			<div id="porcentajeAvance11" class="myBar">0%</div>
		</div>
		<br>

	  Cuál es el estado de avance de los productos requeridos por el eje de Articulación Familiar
	<div id="myProgress">
			<div id="porcentajeAvance12" class="myBar">0%</div>
		</div>
		<br>

		</div>
	</div>  
	
	<div class="panel panel-info">
		
		<div class="panel-heading">
			<h3 class="panel-title"> Proyecto Fortalecimiento de Competencias Básicas desde la Transversalidad </h3>
		</div>
		<div class="panel-body">
 
	Estado general de avance de las transformaciones esperadas por el Proyecto Fortalecimiento de las Competencias Básicas y las Habilidades para la Vida desde la transversalidad
	  
		<div id="myProgress">
			<div id="porcentajeAvance13" class="myBar">0%</div>
		</div>
		<br>
	 

		</div>
	</div>  
	
</div>  
	
</div>
	
  <div class="ec-informe-planeacion-ieo-form">
	
    <?php 
    	$form = ActiveForm::begin();
     ?>
	 
	 <?= $form->field($model, 'id_institucion')->dropDownList($instituciones) ?>
	 
	 <?= $form->field($model, 'id_sede')->dropDownList($sedes) ?>
	 
	 <label> Código Dane </label>

	<h6 style='border: 1px solid #ccc;padding:10px;border-radius:4px;'><?=$codigoDane?></h6>
	 
	<?= $form->field($model, 'zona_educativa')->textInput() ?>

	

	
	<label> Comuna </label>

	<h6 style='border: 1px solid #ccc;padding:10px;border-radius:4px;'><?=$comunas?></h6>

	<label> Barrio</label>
	<h6 style='border: 1px solid #ccc;padding:10px;border-radius:4px;'><?=$barrios?></h6>
	
	<?= $form->field($model, 'fase')->DropDownList($fases,['prompt'=>'Seleccione...']) ?>
	
	<?= $form->field($model, 'id_tipo_informe')->hiddenInput( [ 'value' => '2' ] )->label( false ) ?>
	

		
        
        
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

	    <?= $this->context->actionViewFases($model,$form,$datos,$datoRespuesta,$datoInformePlaneacionProyectos);   ?>


        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
