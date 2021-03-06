<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CbacTotalEjecutivo */

$this->title = "Detalles";
$this->params['breadcrumbs'][] = ['label' => 'Cbac Total Ejecutivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>
<div class="cbac-total-ejecutivo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'objetivos_generale',
            'objetivos_especificos',
            'id_actividad',
            'avance_objetivos_sede',
            'avance_ieo',
            'avance_actividad_sede',
            'avance_actividad_ieo',
            'beneficiarios',
            'sesiones_realizadas_ieo',
            'sesiones_aplazadas_ieo',
            'sesiones_canceladas_ieo',
        ],
    ]) ?>

</div>
