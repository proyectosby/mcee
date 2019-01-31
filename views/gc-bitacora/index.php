<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;


use fedemotta\datatables\DataTables;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GcBitacoraBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gc Bitacoras';
$this->params['breadcrumbs'][] = $this->title;
?>
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
                "dom" => 'lfTrtip',
                /*"tableTools" => [
                    "aButtons" => [
                        [
                            "sExtends"=> "copy",
                            "sButtonText"=> Yii::t('app',"Copiar")
                        ],

                        [
                            "sExtends"=> "csv",
                            "sButtonText"=> Yii::t('app',"CSV")

                        ],
                        [
                            "sExtends" => "xls",
                            "oSelectorOpts" => ["page" => 'current']
                        ],
                        [
                            "sExtends" => "pdf",
                            "oSelectorOpts" => ["page" => 'current']
                        ],
                        [
                            "sExtends"=> "print",
                            "sButtonText"=> Yii::t('app',"Imprimir")
                        ],
                    ],
                ],*/
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                'id_ciclo',
                'id_jefe',
                'id_sede',
                'observaciones',
                //'estado',
                //'jornada',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}{view2}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a( '<span class="btn btn-xs btn-primary m-t-5">Visualizar Bitacora</span>', $url, [
                            ]);
                        },
                        'view2' => function ($url, $model) {
                            return Html::a( '<span class="btn btn-xs btn-success m-t-5">Ingresar Bitacora</span>', $url, [
                            ]);
                        },

                    ],

                ],

            ],
        ]);
        ?>
    <?php } catch (Exception $e) {
} ?>