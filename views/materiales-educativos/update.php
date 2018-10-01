<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialesEducativos */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Materiales Educativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "Actualizar";
?>
<div class="materiales-educativos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'tipo' => $tipo,
		'autor' => $autor,
		'nivel' => $nivel,
		'estados' => $estados,
    ]) ?>

</div>
