<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GcCiclos */

$this->title = 'Agregar Ciclo';
$this->params['breadcrumbs'][] = ['label' => 'Gc Ciclos', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="gc-ciclos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'docentes' => $docentes,
        'semanas' => $semanas,
    ]) ?>

</div>
