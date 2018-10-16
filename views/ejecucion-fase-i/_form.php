<?php

/**********
Versión: 001
Fecha: 2018-08-21
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE I
---------------------------------------
**********/


use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\editable\Editable;

if( !$sede ){
	$this->registerJs( "$( cambiarSede ).click()" );
	return;
}
	
$this->registerJsFile(
    '@web/js/ejecucionFaseI.js',
    [
		'depends' => [
						\yii\web\JqueryAsset::className(),
						\dosamigos\editable\EditableBootstrapAsset::className(),
					]
	]
);


/* @var $this yii\web\View */
/* @var $model app\models\EjecucionFase */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="ejecucion-fase-form">

	<h3 style='background-color:#ccc;padding:5px;'><?= Html::encode( 'DATOS IEO' ) ?></h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($datosIeoProfesional, 'id_institucion')->dropDownList([ $institucion->id => $institucion->descripcion ])->label( 'Institución educativa' )?>

    <?= $form->field($sede, 'id')->dropDownList([ $sede->id => $sede->descripcion ])->label( 'Sede' ) ?>

    <?= $form->field($datosIeoProfesional, 'id_profesional_a')->dropDownList( $docentes, [ 'prompt' => 'Seleccione...', 'onchange' => 'guardar.value=0; this.form.submit();' ] )->label('Profesional A.') ?>
    
	<?= $form->field($datosIeoProfesional, 'estado')->hiddenInput( [ 'value' => 1 ] )->label( null , [ 'style' => 'display:none' ] ); ?>
    
	<?= Html::hiddenInput( 'guardar', 1, [ 'id' => 'guardar', 'value' => 1 ]) ?>
	
	<?= $this->render( 'sesiones', [ 
										'idPE' 			=> null,
										'model' 		=> $model,
										'sesiones'		=> $sesiones,
										'form'			=> $form,
										'condiciones'	=> $condiciones,
										'datosModelos'	=> $datosModelos,
									]) ?>

									
	<div class='container-fluid' style='margin:10px 0;'>
	
		<div class='row text-center'>
			
			<div class='col-sm-12'>
				<span total class='form-control' style='background-color:#ccc;'>CONDICIONES INSTITUCIONALES</span>
			</div>
		
		</div>
		
		<div class='row text-center title2'>
			<div class='col-sm-2'>
				<span total class='form-control' style='background-color:#ccc;'>Por parte de la IEO</span>
			</div>
			<div class='col-sm-2'>
				<span total class='form-control' style='background-color:#ccc;'>Por parte de UNIVALLE</span>
			</div>
			<div class='col-sm-2'>
				<span total class='form-control' style='background-color:#ccc;'>Por parte de la SEM</span>
			</div>
			<div class='col-sm-2'>
				<span total class='form-control' style='background-color:#ccc;'>OTRO</span>
			</div>
			<div class='col-sm-2'>
				<span total class='form-control' style='background-color:#ccc;'>Número de Sesiones por docentes participante </span>
			</div>
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Total sesiones por IEO</span>
			</div>
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Total Docentes participantes por IEO</span>
			</div>
			
		</div>
		
		<div class='row text-center' id='condiciones-institucionales'>
			
			<div class='col-sm-2'>
				<?= $form->field($condiciones, "parte_ieo")->textarea( [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea'])->label(null,[ 'style' => 'display:none' ]) ?>
			</div>
			
			<div class='col-sm-2'>
				<?= $form->field($condiciones, "parte_univalle")->textarea( [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea'])->label(null,[ 'style' => 'display:none' ]) ?>
			</div>
			
			<div class='col-sm-2'>
				<?= $form->field($condiciones, "parte_sem")->textarea( [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea'])->label(null,[ 'style' => 'display:none' ]) ?>
			</div>
			
			<div class='col-sm-2'>
				<?php Html::activeTextarea($condiciones, "otro", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				<?= $form->field($condiciones, "otro")->textarea( [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea'])->label(null,[ 'style' => 'display:none' ]) ?>
			</div>
			
			<div class='col-sm-2'>
				<?php Html::activeTextarea($condiciones, "otro", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				<?= $form->field($condiciones, "otro")->textarea( [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea'])->label(null,[ 'style' => 'display:none' ]) ?>
			</div>
			
			<div class='col-sm-1'>
				<?php Html::activeTextarea($condiciones, "total_sesiones_ieo", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				<?= $form->field($condiciones, "total_sesiones_ieo")->textarea( [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea'])->label(null,[ 'style' => 'display:none' ]) ?>
			</div>
			
			<div class='col-sm-1'>
				<?php Html::activeTextarea($condiciones, "total_docentes_ieo", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
				<?= $form->field($condiciones, "total_docentes_ieo")->textarea( [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea'])->label(null,[ 'style' => 'display:none' ]) ?>
			</div>

		</div>
			
	</div>
	
	
									
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>
    
	<?php ActiveForm::end(); ?>


</div>
