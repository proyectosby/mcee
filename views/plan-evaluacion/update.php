<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlanEvaluacion */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Plan Evaluacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "Actualizar";
?>
<div class="plan-evaluacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
