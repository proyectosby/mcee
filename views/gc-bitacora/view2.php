<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $model app\models\GcBitacora */

$this->title = "Detalles";
$this->params['breadcrumbs'][] = ['label' => 'Gc Bitacoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>
<div class="gc-bitacora-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php try { ?>
        <?=
        DataTables::widget([
            'dataProvider' => $dataProvider,
            'clientOptions' => [
                'language' => [
                    'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
                ],
                "lengthMenu" => [[20, -1], [20, Yii::t('app', "All")]],
                "info" => true,
                "responsive" => true,
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',

                'descripcion',
                'fecha_inicio',
                'fecha_finalizacion',
                'fecha_cierre',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view},{view2},{view3}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a( '<span class="btn btn-xs btn-primary m-t-5">Momento 1</span>', $url, [
                            ]);
                        },
                        'view2' => function ($url, $model) {
                            return Html::a( '<span class="btn btn-xs btn-primary m-t-5">Momento 2</span>', $url, [
                            ]);
                        },
                        'view3' => function ($url, $model) {
                            return Html::a( '<span class="btn btn-xs btn-primary m-t-5">Momento 3</span>', $url, [
                            ]);
                        },
                    ],

                ],
            ],
        ]);
        ?>
    <?php } catch (Exception $e) {
        var_dump($e);
    } ?>
</div>
