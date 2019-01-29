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
<h3>Bitacoras</h3>
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

            [
                'attribute'=>'id_ciclo',
                'value'=>'ciclo.descripcion',
            ],

            [
                'attribute'=>'id_jefe',
                'value'=>'jefe.nombres',
            ],

            [
                'attribute'=>'id_sede',
                'value'=>'sede.descripcion',
            ],
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
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',

                [
                    'attribute'=>'id_ciclo',
                    'value'=>'ciclo.descripcion',
                ],

                [
                    'attribute'=>'id_jefe',
                    'value'=>'jefe.nombres',
                ],

                [
                    'attribute'=>'id_sede',
                    'value'=>'sede.descripcion',
                ],
                'observaciones',
                //'estado',
                //'jornada',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span name="detalle" class="btn btn-xs btn-primary m-t-5" value ="' . $url . '" >Visualizar bitácora</span>', $url, [
                                'title' => Yii::t('app', 'lead-view'),
                            ]);
                        },
                        'view2' => function ($url, $model) {
                            return Html::a('<span name="detalle" class="btn btn-xs btn-primary m-t-5" value ="' . $url . '" >Ingresar a la bitácora</span>', $url, [
                                'title' => Yii::t('app', 'lead-view'),
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('.btn-group').addClass('hide')
</script>