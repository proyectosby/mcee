<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialesEducativos */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="materiales-educativos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo')->DropDownList($tipo,['prompt'=>'Seleccione...']) ?>

    <?= $form->field($model, 'autor')->DropDownList($autor,['prompt'=>'Seleccione...']) ?>

    <?= $form->field($model, 'nivel')->DropDownList($nivel,['prompt'=>'Seleccione...'])?>
	


    <?= $form->field($model, 'otro_cual')->textInput() ?>

    <?= $form->field($model, 'nombre_apellidos')->textInput() ?>

    <?= $form->field($model, 'reseña')->textArea() ?>
	
	<?= $form->field($model, 'estado')->DropDownList($estados) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
