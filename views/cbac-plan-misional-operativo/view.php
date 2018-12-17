<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CbacPlanMisionalOperativo */

$this->title = "Detalles";
$this->params['breadcrumbs'][] = ['label' => 'Cbac Plan Misional Operativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>
<div class="cbac-plan-misional-operativo-view">

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
            'id_institucion',
            'id_sede',
            'caracterizacion_diagnostico',
            'fecha_caracterizacion_',
            'nombre_caracterizacion',
            'caracterizacion_no_justificacion',
            'estado',
        ],
    ]) ?>

</div>
