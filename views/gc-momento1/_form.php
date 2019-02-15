<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GcMomento1 */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
$this->registerJsFile("@web/js/momentos.js");
$this->registerCssFile("@web/css/momentos.css");
?>

<div class="gc-momento1-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<section class="form-box" >
            <div class="container">
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-1 form-wizard">
					
						 	<h3>Planeación de la semana</h3>
                    		<p>Debe terminar un paso para continuar con el siguiente</p>
							
							<!-- Form progress -->
                    		<div class="form-wizard-steps form-wizard-tolal-steps-2">
                    			<div class="form-wizard-progress">
                    			    <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                    			</div>
								<!-- Step 1 -->
                    			<div class="form-wizard-step active">
                    				<div class="form-wizard-step-icon"><i class="fa fa-address-book" aria-hidden="true"></i></div>
                    				<p>Paso 1 Propositos de acompañamiento</p>
                    			</div>
								<!-- Step 1 -->
								
								<!-- Step 2 -->
                    			<div class="form-wizard-step">
                    				<div class="form-wizard-step-icon"><i class="fa fa-archive" aria-hidden="true"></i></div>
                    				<p>Paso 2 Resultados esperados</p>
                    			</div>
								<!-- Step 2 -->
								
								<!-- Step 3 
								<div class="form-wizard-step">
                    				<div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                    				<p>Official</p>
                    			</div>
								<!-- Step 3 -->
								
								<!-- Step 4 
								<div class="form-wizard-step">
                    				<div class="form-wizard-step-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                    				<p>Payment</p>
                    			</div>
								<!-- Step 4 -->
                    		</div>
							<!-- Form progress -->
                    	</div>
				</div>
                    
			</div>
    </section>	

						<label><h6>Propósitos de acompañamiento</h6></label>
						<h6>
							<?=Html::checkboxList('list', '', $propositos,['separator' => "<br /><br/><br/>",'id' =>'checkboxMomento1Semana1']) ?>
						</h6>
						
						<?= $form->field($model, 'id_semana')->textInput() ?>

						<?= $form->field($model, 'descripcion_proposito')->textInput(['maxlength' => true]) ?>

						<?= $form->field($model, 'estado')->textInput() ?>
						
						

						<div class="form-group">
							<?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
						</div>
	
					

    <?php ActiveForm::end(); ?>

</div>
