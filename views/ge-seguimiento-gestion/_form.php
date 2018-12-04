<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GeSeguimientoGestion */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="ge-seguimiento-gestion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php /* $form->field($model, 'id_tipo_seguimiento')->textInput() */ ?>

    <?= $form->field($model, 'id_ie')->dropDownList( [], [ 'prompt' => 'Seleccione...' ]) ?>

    <?= $form->field($model, 'id_cargo')->textInput() ?>

    <?= $form->field($model, 'id_nombre')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'id_persona_gestor')->textInput() ?>

    <?= $form->field($model, 'numero_visitas')->textInput() ?>

    <?= $form->field($model, 'socializo_plan')->textInput() ?>

    <?= $form->field($model, 'plan_trabajo_socializo')->textInput() ?>

    <?= $form->field($model, 'descripcion_plan_trabajo')->textInput() ?>

    <?= $form->field($model, 'cronocrama_propuesto')->textInput() ?>

    <?= $form->field($model, 'descripcion_cronograma')->textInput() ?>

    <?= $form->field($model, 'avances_proyectos')->textInput() ?>

    <?= $form->field($model, 'dificultades')->textInput() ?>

    <?= $form->field($model, 'mejoras')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput() ?>

    <?= $form->field($model, 'calificacion_nivel')->textInput() ?>

    <?= $form->field($model, 'descripcion_calificacion')->textInput() ?>

    <?php /* $form->field($model, 'estado')->textInput() */ ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
