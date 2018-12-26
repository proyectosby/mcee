<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CbacPlanMisionalOperativo */

$this->title = 'Agregar Cbac Plan Misional Operativo';
$this->params['breadcrumbs'][] = ['label' => 'Cbac Plan Misional Operativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="cbac-plan-misional-operativo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'sedes' => $sedes,
        'institucion' => $institucion,
    ]) ?>

</div>
