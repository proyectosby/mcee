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

<h1></h1>
	
<div id="modal" class="fade modal" role="dialog" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3>NombreCrud</h3>
</div>
<div class="modal-body">
<div id='modalContent'></div>
</div>

</div>
</div>
</div>
<div class="gc-bitacora-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=  Html::button('Agregar',['value'=>Url::to(['create']),'class'=>'btn btn-success','id'=>'modalButton']) ?>
		
    </p>

    <?php try { ?>
    <?php
        $gridColumns = [
            'id_ciclo',
            'id_jefe',
            'id_sede',
            'observaciones',
        ];

        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'class' => 'hide'
        ]);
    } catch (Exception $e) {
        var_dump($e);
        die();
    }
    ?>
    <button id="w0-html" class="btn btn-light export-full-html" href="#" data-format="Html" tabindex="-1"><i class="text-info glyphicon glyphicon-save"></i> HTML</button>
    <button id="w0-csv"  class="btn btn-light export-full-csv" href="#" data-format="Csv" tabindex="-1"><i class="text-primary glyphicon glyphicon-floppy-open"></i> CSV</button>
    <button id="w0-pdf"  class="btn btn-light export-full-pdf" href="#" data-format="Pdf" tabindex="-1"><i class="text-danger glyphicon glyphicon-floppy-disk"></i> PDF</button>
    <button id="w0-xlsx" class="btn btn-light export-full-xlsx" href="#" data-format="Xlsx" tabindex="-1"><i class="text-success glyphicon glyphicon-floppy-remove"></i>Excel</button>
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
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span name="detalle" class="glyphicon glyphicon-eye-open" value ="' . $url . '" ></span>', $url, [
                                'title' => Yii::t('app', 'lead-view'),
                            ]);
                        },

                        'update' => function ($url, $model) {
                            return Html::a('<span name="actualizar" class="glyphicon glyphicon-pencil" value ="' . $url . '"></span>', $url, [
                                'title' => Yii::t('app', 'lead-update'),
                            ]);
                        }

                    ],

                ],

            ],
        ]);
    ?>
    <?php } catch (Exception $e) {
    } ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('.btn-group').addClass('hide')
</script>