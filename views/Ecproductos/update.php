<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EcProductos */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Ec Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "Actualizar";
?>
<div class="ec-productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
