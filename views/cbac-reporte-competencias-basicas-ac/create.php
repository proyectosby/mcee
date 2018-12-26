<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CbacReporteCompetenciasBasicasAc */

$this->title = 'Nuevo Reporte Competencias Basicas Arte y Cultura';
$this->params['breadcrumbs'][] = ['label' => 'Cbac Reporte Competencias Basicas Acs', 'url' => ['index']];
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
