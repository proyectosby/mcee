<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasEscolaridadesBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-escolaridades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_personas') ?>

    <?= $form->field($model, 'id_escolaridades') ?>

    <?= $form->field($model, 'ultimo_nivel_cursado') ?>

    <?= $form->field($model, 'ano_curso') ?>

    <?= $form->field($model, 'titulacion')->checkbox() ?>

    <?php // echo $form->field($model, 'titulo') ?>

    <?php // echo $form->field($model, 'institucion') ?>

    <?php // echo $form->field($model, 'id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
