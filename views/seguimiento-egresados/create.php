<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SeguimientoEgresados */

$this->title = 'Agregar Seguimiento Egresados';
$this->params['breadcrumbs'][] = ['label' => 'Seguimiento Egresados', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="seguimiento-egresados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'parametros' => $parametros,
    ]) ?>

</div>
