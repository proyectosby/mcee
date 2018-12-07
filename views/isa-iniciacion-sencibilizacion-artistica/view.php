<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IsaIniciacionSencibilizacionArtistica */

$this->title = "Detalles";
$this->params['breadcrumbs'][] = ['label' => 'Isa Iniciacion Sencibilizacion Artisticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>
<div class="isa-iniciacion-sencibilizacion-artistica-view">

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
            'id_insticion',
            'id_sede',
            'caracterizacion_si_no',
            'caracterizacion_nombre',
            'caracterizacion_fecha',
            'caracterizacion_justificacion',
            'estado',
        ],
    ]) ?>

</div>
