<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CbacOrientacionProcesoCbac */

$this->title = 'Planeacion Competencias Basicas Arte y Cultura';
$this->params['breadcrumbs'][] = ['label' => 'Cbac Orientacion Proceso Cbacs', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="cbac-orientacion-proceso-cbac-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'sedes' => $sedes,
        'institucion' => $institucion,
    ]) ?>

</div>
