<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Collapse;
/* @var $this yii\web\View */
/* @var $model app\models\EcInformeAvanceEjecucionMisional */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="ec-informe-avance-ejecucion-misional-form">

    <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'id_institucion')->DropDownList($instituciones) ?>

    <?= $form->field($model, 'id_eje')->DropDownList($ejes,['prompt'=>"Seleccione..."]) ?>
	
    <?= $form->field($model, 'id_persona')->DropDownList($persona) ?>

    <?= $form->field($model, 'id_coordinador')->DropDownList($coordinador,['prompt'=>"Seleccione..."]) ?>
	
    <?= $form->field($model, 'id_secretaria')->DropDownList($secretario,['prompt'=>"Seleccione..."]) ?>
	
	<?php	$items[] = 	[
					'label' 		=> "1.	Acorde a cada una de las transformaciones esperadas desarrolle los siguientes tres aspectos" ,
					'content' 		=>  
					$form->field($model, 'descripcion')->textArea().
					$form->field($model, 'presentacion')->textArea().
					$form->field($model, 'productos')->textArea().
					$form->field($model, 'productos')->textArea(),
					
					'contentOptions'=> ['class' => ' panel-primary in'],
					'options' => ['class' => ' panel-primary']
				];	
				
	?>
	
	
    <?= $form->field($model, 'descripcion')->textArea() ?>

    <?= $form->field($model, 'presentacion')->textArea() ?>

    <?= $form->field($model, 'productos')->textArea() ?>

    <?= $form->field($model, 'presentacion_retos')->textArea() ?>
		
		<?php echo Collapse::widget(['items' => $items, 		]); ?>
    <?= $form->field($model, 'alarmas')->textArea() ?>

    <?= $form->field($model, 'consolidad_avance')->textArea() ?>


   <?= $form->field($model, 'estado')->hiddenInput(['value'=> 1])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
