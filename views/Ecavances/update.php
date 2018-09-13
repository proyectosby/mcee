<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EcAvances */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Ec Avances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "Actualizar";
?>
<div class="ec-avances-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
