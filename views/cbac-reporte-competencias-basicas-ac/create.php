<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CbacReporteCompetenciasBasicasAc */

$this->title = 'Nuevo Reporte Competencias Básicas Arte y Cultura';
$this->params['breadcrumbs'][] = ['label' => 'Reporte Competencias Basicas Arte y Cultura', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="cbac-reporte-competencias-basicas-ac-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'sedes' => $sedes,
        'institucion' => $institucion,
    ]) ?>

</div>
