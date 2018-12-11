<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RomReporteOperativoMisional */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Rom Reporte Operativo Misionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "Actualizar";
?>
<div class="rom-reporte-operativo-misional-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
