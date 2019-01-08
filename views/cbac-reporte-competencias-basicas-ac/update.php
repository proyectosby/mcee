<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CbacReporteCompetenciasBasicasAc */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Cbac Reporte Competencias Basicas Acs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "Actualizar";
?>
<div class="cbac-reporte-competencias-basicas-ac-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'sedes' => $sedes,
        'institucion' => $institucion,
        'datos' => $datos
    ]) ?>

</div>
