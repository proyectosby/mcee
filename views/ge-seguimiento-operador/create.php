<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GeSeguimientoOperador */

$this->title = 'Agregar Ge Seguimiento Operador';
$this->params['breadcrumbs'][] = ['label' => 'Ge Seguimiento Operadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="ge-seguimiento-operador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
