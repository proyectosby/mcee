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
use app\models\Parametro;

use yii\bootstrap\Progress;
/* @var $this yii\web\View */
/* @var $model app\models\EcInformePlaneacionIeo */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);



$idTipoInforme = (isset($_GET['idTipoInforme'])) ?  $_GET['idTipoInforme'] :  $model->id_tipo_informe;

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
<!-- se coloca el jquery en esta parte ya que en el archivo ecinformeplaneacionieo.js externo por alguna razon no lo coje -->
<script>


$("#divPorcentajes").hide();
$.get( "index.php?r=ecinformeplaneacionieo/info-porcentajes",
			function( data )
			{
				// alert(data);
				
					$("#divPorcentajes").html(data);
				
			},
		"json");
		
		
		
function colorBarra(valor)
{
	
	color ="gray";
	return color;
}

//calcula los porcentaje de avances 
$( "#porcentajes" ).click(function() 
{
	
	$("#divPorcentajes").toggle();
	var i;
	valor = 0;
	for (i = 1; i <=49 ; i++) 
	{ 
		valor += $("#ecavances-"+i+"-estado_actual").val()*1;
		
		switch (i) 
		{
			
			//Proyecto Pedagógicos Transversales primeros 3 indicadores
			case 3:
				PorcentajeAvanceProceso     = Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			
			case 6:
				porcentajeAvanceEstrategias = Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			
			case 9:
				porcentajeAvanceOrientaciones = Math.trunc(((valor)/12)*100);
				valor =0;
				i = 14
			break;
			//Proyecto Pedagógicos Transversales
			
			//Proyecto de Servicio Social Estudiantil primeros 3 indicadores
			case 17:
				porcentajeAvanceGestion= Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			
			case 20:
				porcentajeAvanceProyectos = Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			
			case 23:
				porcentajeAvanceCompetencias= Math.trunc(((valor)/12)*100);
				valor =0;
				i=29;
			break;
			//Proyecto de Servicio Social Estudiantil
			
			// Articulación Familiar primeros 3 indicadores
			case 32:
				porcentajeAvanceAcompanamiento = Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			
			case 35:
				porcentajeAvanceComunicacion= Math.trunc(((valor)/12)*100);
				valor =0;
			break;
			
			case 38:
				porcentajeAvanceDotar= Math.trunc(((valor)/12)*100);
				valor =0;
				i=44;
			break;
			// Articulación Familiar 
			
			
			//Proyecto Fortalecimiento de Competencias Básicas desde la Transversalidad indicador
		
			case 49:
				porcentajeAvanceEstado= Math.trunc(((valor)/20)*100);
				valor =0;
			break;
			
			//Proyecto Fortalecimiento de Competencias Básicas desde la Transversalidad 
			
		}	
	}
	
	//Proyecto Pedagógicos Transversales 3 indicadores
	$("#porcentajeAvance1").css({"width": ""+PorcentajeAvanceProceso      +"%","background-color":""+colorBarra(PorcentajeAvanceProceso)}).text(PorcentajeAvanceProceso+"%");	
	$("#porcentajeAvance2").css({"width": ""+porcentajeAvanceEstrategias  +"%","background-color":""+colorBarra(porcentajeAvanceEstrategias)}).text(porcentajeAvanceEstrategias+"%");
	$("#porcentajeAvance3").css({"width": ""+porcentajeAvanceOrientaciones+"%","background-color":""+colorBarra(porcentajeAvanceOrientaciones)}).text(porcentajeAvanceOrientaciones+"%");
	
	//Proyecto de Servicio Social Estudiantil 3 indicadores
	$("#porcentajeAvance5").css({"width": ""+porcentajeAvanceGestion+"%","background-color":""+colorBarra(porcentajeAvanceGestion)}).text(porcentajeAvanceGestion+"%");
	$("#porcentajeAvance6").css({"width": ""+porcentajeAvanceProyectos+"%","background-color":""+colorBarra(porcentajeAvanceProyectos)}).text(porcentajeAvanceProyectos+"%");
	$("#porcentajeAvance7").css({"width": ""+porcentajeAvanceCompetencias+"%","background-color":""+colorBarra(porcentajeAvanceCompetencias)}).text(porcentajeAvanceCompetencias+"%");
	
	 
	// Articulación Familiar primeros 3 indicadores
	$("#porcentajeAvance9").css({"width": ""+porcentajeAvanceAcompanamiento+"%","background-color":""+colorBarra(porcentajeAvanceAcompanamiento)}).text(porcentajeAvanceAcompanamiento+"%");
	$("#porcentajeAvance10").css({"width": ""+porcentajeAvanceComunicacion+"%","background-color":""+colorBarra(porcentajeAvanceComunicacion)}).text(porcentajeAvanceComunicacion+"%");
	$("#porcentajeAvance11").css({"width": ""+porcentajeAvanceDotar+"%","background-color":""+colorBarra(porcentajeAvanceDotar)}).text(porcentajeAvanceDotar+"%");
	
	
	//Proyecto Fortalecimiento de Competencias Básicas desde la Transversalidad indicador
	$("#porcentajeAvance13").css({"width": ""+porcentajeAvanceEstado+"%","background-color":""+colorBarra(porcentajeAvanceEstado)}).text(porcentajeAvanceEstado+"%");
	

	for (j = 1; j <=17 ; j++) 
	{ 
		valor += $("#ecrespuestas-"+j+"-respuesta").val()*1;
		switch (j) 
		{
			//Proyecto Pedagógicos Transversales ultimo indicador - productos del eje
			case 5:
				porcentajeAvanceProductos1     = Math.trunc(((valor)/20)*100);
				valor =0;
				i=10
			break;
			
			//Proyecto de Servicio Social Estudiantil ultimo indicador - productos
			
			case 11:
				porcentajeAvanceProductos2 = Math.trunc(((valor)/24)*100);
				valor =0;
			break;
			
			//Articulación Familiar ultimo indicador - productos
			case 17:
				porcentajeAvanceProductos3 = Math.trunc(((valor)/24)*100);
				valor =0;
			break;
			
			
		}	
	}
	
	$("#porcentajeAvance4").css({"width": ""+porcentajeAvanceProductos1+"%","background-color":""+colorBarra(porcentajeAvanceProductos1)}).text(porcentajeAvanceProductos1+"%");
	$("#porcentajeAvance8").css({"width": ""+porcentajeAvanceProductos2+"%","background-color":""+colorBarra(porcentajeAvanceProductos2)}).text(porcentajeAvanceProductos2+"%");
	$("#porcentajeAvance12").css({"width": ""+porcentajeAvanceProductos3+"%","background-color":""+colorBarra(porcentajeAvanceProductos3)}).text(porcentajeAvanceProductos3+"%");
	
});

function selector(obj)
{
	
	var selectores = [  

'No se ha avanzado',
'Existen dificultades en las relaciones interpersonales de los docentes que dificultan el dialogo entre ellos, y por ende, se han logrado únicamente espacios de trabajo individual con los docentes',
'Se han logrado espacios de encuentro entre los docentes, pero aún no se ha avanzado en la movilización del trabajo colaborativo entre docentes',
'Se ha logrado movilizar espacios de escucha entre los docentes, lo que ha posibilitado avanzar en los procesos de transversalización de los PPT',
'Se han logrado desarrollar algunos espacios de trabajo colaborativo entre los docentes, lo que ha posibilitado avanzar en los procesos de transversalización de los PPT',
'Se ha logrado incluir otros actores de la comunidad educativa en los espacios de trabajo colaborativo entre los docentes, lo que ha posibilitado avanzar en los procesos de transversalización de los PPT',
'Se ha logrado incluir otros sectores de la ciudad en los espacios de trabajo colaborativo entre los docentes, lo que ha posibilitado avanzar en los procesos de transversalización de los PPT',
'Se ha avanzado en el desarrollo de productos elaborados de manera conjunta por los docentes de los Proyectos Pedagógicos Transversales ',
'Los docentes participan en el diseño de una Red Municipal de docentes de Proyectos Pedagógicos Transversales',
'Los docentes participan en la consolidación de una Red Municipal de docentes de Proyectos Pedagógicos Transversales',
'La Red Municipal de docentes de Proyectos Pedagógicos Transversales está activa y tiene procesos de auto-sostenimiento'

	];
	$(obj).parent().siblings().children("[id*='logros']").val(selectores[$(obj).val()]);
	
}
</script>	

 <?php // $this->context->actionInfoPorcentajes(); ?>
 
 <div id='divPorcentajes'>
 </div>



	
  <div class="ec-informe-planeacion-ieo-form">
	
    <?php 
    	$form = ActiveForm::begin();
     ?>
	 
	 <?= $form->field($model, 'id_institucion')->dropDownList($instituciones) ?>
	 
	 <?= $form->field($model, 'id_sede')->dropDownList($sedes) ?>
	 
	 <label> Código Dane </label>

	<h6 style='border: 1px solid #ccc;padding:10px;border-radius:4px;'><?=$codigoDane?></h6>
	 
	<?= $form->field($model, 'zona_educativa')->dropDownList($zonaEducativa,['prompt' => 'Seleccione...']) ?>

	

	
	<label> Comuna </label>

	<h6 style='border: 1px solid #ccc;padding:10px;border-radius:4px;'><?=$comunas?></h6>

	<label> Barrio</label>
	<h6 style='border: 1px solid #ccc;padding:10px;border-radius:4px;'><?=$barrios?></h6>
	
	<?= $form->field($model, 'fase')->DropDownList($fases,['prompt'=>'Seleccione...']) ?>
	
	<?= $form->field($model, 'id_tipo_informe')->hiddenInput( [ 'value' => $idTipoInforme ] )->label( false ) ?>
	

		
        
        
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
