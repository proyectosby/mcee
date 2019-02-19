<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\GcResultadosMomento1Buscar;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $model app\models\GcMomento1 */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

$this->registerCssFile("@web/css/momentos.css");
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/momentos.js',['depends' => [\yii\web\JqueryAsset::className()]]);

//se captura el valor de la semana
$id_bitacora= $_GET['id_bitacora'];
$id_semana= $_GET['id'];
$id_momento1= 1;
?>
    
	
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
					<!-- Form Step 1 -->
					<div class="gc-momento1-form">
					<?php $form = ActiveForm::begin(); ?>
					
                    <fieldset>
						<h4>Seleccione los propósitos que se trabajarán a través de las actividades planteadas para esta semana</h4>
						<hr>
						<label><h4>Propósitos de acompañamiento</h4></label>
						<h6>
							<?=Html::checkboxList('list', '', $propositos,['separator' => "<br />",'id' =>'checkboxMomento1Semana1',
							'itemOptions' => [
							'labelOptions' => [
								'style' => 'font-weight: normal',
								// 'class' => 'some-custom-class',
								],
							],
							]) ?>
						</h6>
						<hr>
						<label><h4>Planeación por día</h4></label>
						<div class="row">
							<div class="col-md-6"><?= $form->field($modelPlaneacionxdia, 'descripcion_plan')->textArea(['maxlength' => 300, 'rows' => 6, 'cols' => 50] )?></div>
							
							<div class="col-md-6"><?= $form->field($modelPlaneacionxdia, 'id_dia')->dropDownList($diasPlaneacion,['prompt'=> 'Seleccione...']) ?></div>
						</div>
						<div class="form-group">
							<?= Html::submitButton('Agregar día', ['class' => 'btn btn-primary btn-sm']) ?>
						</div>
						
						<?= $form->field($model, 'id_semana')->hiddenInput(['value' => $id_semana])->label(false) ?>

						<?= $form->field($model, "estado")->hiddenInput(['value'=> 1])->label(false) ?>
						
						

						<div class="form-group form-wizard-buttons">
							<?= Html::submitButton('Guardar y continuar', ['class' => 'btn btn-success']) ?>
							<button type="button" class="btn btn-next">Next</button>
						</div>
					</fieldset>
				</div>
					
					<?php ActiveForm::end(); ?>
					<!-- Form Step 1 -->
	
					<!-- Form Step 2 -->
                    <fieldset>
				<div class="gc-resultados-momento1-form">

						<h4>Describa los resultados que se esperan obtener de las actividades que se adelantarán en la semana.</h4>
						<hr>
							
					<div class="row">
							<div class="col-md-6">
								<label><h4>Registro de un nuevo resultado esperado</h4></label>	
								
								<?php $form1 = ActiveForm::begin(); ?>

								<?= $form1->field($modelResultadosMomento1, 'nombre')->textInput(['maxlength' => true,'placeholder' => 'Nombre del resultado esperado'])->label('Nombre del resultado esperado') ?>
								
								<?= $form1->field($modelResultadosMomento1, 'descripcion')->textArea(['maxlength' => 300, 'rows' => 6, 'cols' => 50 ,'placeholder' => 'Descripción del resultado esperado'] )->label('Descripción del resultado esperado')?>

								<?= $form1->field($modelResultadosMomento1, 'id_momento1')->hiddenInput(['value' => $id_momento1])->label(false) ?>

								<?= $form1->field($modelResultadosMomento1, 'estado')->hiddenInput(['value'=> 1])->label(false) ?>

								<div class="form-group">
									<?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
								</div>
							</div>

						<?php ActiveForm::end(); ?>

						
						
						<!-- data table-->
						<div class="col-md-6">
							<div class="gc-resultados-momento1-index">

   
								<?php $searchModel = new GcResultadosMomento1Buscar();
									  $dataProvider = $searchModel->search(Yii::$app->request->queryParams); 
								?>

								<h4>Listado de resultados esperados registrados</h4>

								<?= DataTables::widget([
									'dataProvider' => $dataProvider,
									'clientOptions' => [
									'language'=>[
											'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
										],
									"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
									"info"=>false,
									"responsive"=>true,
									 "dom"=> 'lfTrtip',
									 "tableTools"=>[
										 "aButtons"=> [  
												// [
												// "sExtends"=> "copy",
												// "sButtonText"=> Yii::t('app',"Copiar")
												// ],
												// [
												// "sExtends"=> "csv",
												// "sButtonText"=> Yii::t('app',"CSV")
												// ],
												[
												"sExtends"=> "xls",
												"oSelectorOpts"=> ["page"=> 'current']
												],
												[
												"sExtends"=> "pdf",
												"oSelectorOpts"=> ["page"=> 'current']
												],
												// [
												// "sExtends"=> "print",
												// "sButtonText"=> Yii::t('app',"Imprimir")
												// ],
											],
										],
								],
									   'columns' => [
										['class' => 'yii\grid\SerialColumn'],

										// 'id',
										'nombre',
										// 'id_momento1',
										// 'estado',
										'descripcion',

										[
										'class' => 'yii\grid\ActionColumn',
										'template'=>'{view}{update}{delete}',
											'buttons' => [
											'view' => function ($url, $model) {
												return Html::a('<span name="detalle" class="glyphicon glyphicon-eye-open" value ="'.$url.'" ></span>', $url, [
															'title' => Yii::t('app', 'lead-view'),
												]);
											},

											'update' => function ($url, $model) {
												return Html::a('<span name="actualizar" class="glyphicon glyphicon-pencil" value ="'.$url.'"></span>', $url, [
															'title' => Yii::t('app', 'lead-update'),
												]);
											}

										  ],
										
										],

									],
								]); ?>
							</div>
						</div>
					</div>
				</div>
						<!-- fin data table-->
					
					</fieldset>
					<!-- Form Step 2 -->

    


