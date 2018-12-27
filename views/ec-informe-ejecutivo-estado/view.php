<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EcInformeEjecutivoEstado */

$this->title = "Detalles";
$this->params['breadcrumbs'][] = ['label' => 'Ec Informe Ejecutivo Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>
<div class="ec-informe-ejecutivo-estado-view">

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
            'id_eje',
            'id_persona',
            'id_coordinador',
            'id_secretaria',
            'mision',
            'descripcion',
            'avance_producto',
            'hallazgos',
            'logros',
            'fecha_creacion',
            'estado',
        ],
    ]) ?>

</div>
