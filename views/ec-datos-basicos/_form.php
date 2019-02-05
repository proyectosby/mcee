<?php

/**********
Modificaciones:
Fecha: 2019-01-22
Persona encargada: Edwin Molina Grisales
Cambios realizados: Si no se ha seleccionado una sede, se pide
---------------------------------------
**********/


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\bootstrap\Collapse;

use dosamigos\datepicker\DatePicker;
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

/* @var $this yii\web\View */
/* @var $model app\models\EcDatosBasicos */
/* @var $form yii\widgets\ActiveForm */

if( !$sede ){
	$this->registerJs( "$( cambiarSede ).click()" );
	return;
}
?>

<div class="ec-datos-basicos-form">

    <?php $form = ActiveForm::begin([ 'layout' => 'horizontal']); ?>

    <?= $form->field($modelDatosBasico, 'profesional_campo')->dropDownList( $profesional, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($modelDatosBasico, 'id_institucion')->dropDownList( [ $institucion->id => $institucion->descripcion ] ) ?>

    <?= $form->field($modelDatosBasico, 'id_sede')->dropDownList( [ $sede->id => $sede->descripcion ] ) ?>

	<?= $form->field($modelDatosBasico, 'fecha_diligenciamiento')->widget(
					DatePicker::className(), [
						
						 // modify template for custom rendering
						'template' => '{addon}{input}',
						'language' => 'es',
						'clientOptions' => [
							'autoclose' => true,
							'format' => 'dd-mm-yyyy'
						]
				]); ?>

    <?php // echo $form->field($modelDatosBasico, 'estado')->textInput(); ?>
	
	
	<?= Collapse::widget([
		'items' => [
						[
							'label' 		=>  'AGREGANDO PLANEACIÓN MISIONAL',
							'content' 		=>  $this->render( 'planeacionMisional', [ 
														'form' 				=> $form,
														'modelPlaneacion' 	=> $modelPlaneacion,
														'modelVerificacion' => $modelVerificacion,
														'modelReportes' 	=> $modelReportes,
														'tiposVerificacion'	=> $tiposVerificacion,
														'modelDatosBasico' => $modelDatosBasico,
												] ),
								'contentOptions' => ['class' => 'in']
						]
					] 
				]); ?>
	
	<?php $this->render( 'planeacionMisional', [ 
			'form' 				=> $form,
			'modelPlaneacion' 	=> $modelPlaneacion,
			'modelVerificacion' => $modelVerificacion,
			'modelReportes' 	=> $modelReportes,
			'tiposVerificacion'	=> $tiposVerificacion,
			'modelDatosBasico' => $modelDatosBasico,
	] ); ?>
		
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
