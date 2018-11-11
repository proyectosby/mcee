<?php
/**********
Versión: 001
Fecha: Fecha en formato (30-08-2018)
Desarrollador: Viviana Rodas
Descripción: diario de campo estudiantes semilleros tic
******************/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SemillerosTicDiarioDeCampoEstudiantes */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/diarioCampoEstudiantes.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<!-- Se inicia el formulario-->
<?php $form = ActiveForm::begin(); ?>

	<!-- Espacio para seleccionar la fase, ciclo y año-->
	<div class="" style=''>

	<?= $form->field( $ciclos, 'id_anio' )->dropDownList( $anios, [ 
													'prompt' 	=> 'Seleccione...', 'id' =>'selAnio'
													
												] ) ?>

	<?= $form->field( $model, 'id_ciclo' )->dropDownList( $cicloslist, [ 
												'prompt' => 'Seleccione...', 'id' =>'selCiclo'
												
											] )->label( 'Ciclo' ); ?>



		<?= $form->field($model, 'id_fase')->dropDownList($fases, ['prompt'=>'Seleccione...', 'id' =>'selFases'])->label("Fase") ?>
	</div><br>
	
	<!--  div contenedor de todo el formulario y los campos que se muestran-->
 <div id="principal">
 
 <!-- Espacio para los datos que se cargan desde la base de datos-->
		<div class="" id='titulo' style='padding:0px;background-color:#ccc;height:30px;text-align:center;display:none;font-weight: bold;'>
			
		</div><br>
		<div class="" style='padding:0px;background-color:#ccc;height:30px;text-align:center;font-weight: bold;'>
			RESUMEN CUANTITATIVO DEL RESULTADO
		</div>
<div class="">
	
	<div class="" style='padding:0px;background-color:#ccc;text-align:center;height:100px;display:none;font-weight: bold;' id="encabezado">
		
	</div>
	
	<div class="" style='padding:0px;background-color:white;text-align:center;height:150px;display:none' id="contenido">
		
	</div>
	
	<div class="" style='padding:0px;background-color:#ccc;text-align:center;height:100px;display:none;font-weight: bold;' id="encabezado1">
		
	</div>
	
	<div class="" style='padding:0px;background-color:white;text-align:center;height:150px;display:none' id="contenido1">
		
	</div>

<!-- formulario -->
<div class="semilleros-tic-diario-de-campo-estudiantes-form">

  <br>
	<div class="" style='padding:0px;background-color:#ccc;height:30px;text-align:center;font-weight: bold;'>
			Espacio de escritura para el profesional
		</div>
	<br>
	
	<div class="" id="descripcion">
		
	</div>
	
    <?= $form->field($model, 'descripcion')->textArea(['maxlength' => true,'placeholder'=> 'Campo de escritura'])->label() ?>

	<div class="" id="hallazgos">
		
	</div>
	
    <?= $form->field($model, 'hallazgos')->textArea(['maxlength' => true,'placeholder'=> 'Campo de escritura'])->label() ?>

    
	<?= $form->field($model, "estado")->hiddenInput( [ 'value' => '1' ] )->label( false) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
	
	
</div>

</div>
