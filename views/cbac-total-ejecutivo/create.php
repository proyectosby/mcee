<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CbacTotalEjecutivo */

$this->title = 'Agregar Cbac Total Ejecutivo';
$this->params['breadcrumbs'][] = ['label' => 'Cbac Total Ejecutivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="cbac-total-ejecutivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'avance_ieo' => $avance_ieo
    ]) ?>

</div>
