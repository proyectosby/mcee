<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Instituciones;
use app\models\Sedes;

/* @var $this yii\web\View */
/* @var $model app\models\CbacReporteCompetenciasBasicasAc */

$this->title = "Detalles";
$this->params['breadcrumbs'][] = ['label' => 'Cbac Reporte Competencias Basicas Acs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>
<div class="cbac-reporte-competencias-basicas-ac-view">

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
            //'id',
            [
            'attribute'=>'id_institucion',
            'value' => function( $model )
                {
                    $nombreInstituciones = Instituciones::findOne($model->id_institucion);
                    return $nombreInstituciones ? $nombreInstituciones->descripcion : '';  
                }, //para buscar por el nombre
            ],
            [
            'attribute'=>'id_sedes',
            'value' => function( $model )
                {
                    $nombreSedes = Sedes::findOne($model->id_sedes);
                    return $nombreSedes ? $nombreSedes->descripcion : '';  
                }, //para buscar por el nombre
            ],
            //'estado',
        ],
    ]) ?>

</div>
