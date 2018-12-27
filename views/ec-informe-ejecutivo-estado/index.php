<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;


use fedemotta\datatables\DataTables;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EcInformeEjecutivoEstadoBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '4. Informe ejecutivo del estado del eje en la IEO';
$this->params['breadcrumbs'][] = $this->title;




// $phpWord = new \PhpOffice\PhpWord\PhpWord();

// $document = $phpWord->loadTemplate('plantillas\4.InformePlantilla.docx');

// $document->setValue('ieo', $institucion);

// $document->saveAs('temp.docx'); // Save to temp file

// \PhpOffice\PhpWord\Settings::setPdfRendererPath('tcpdf');
// \PhpOffice\PhpWord\Settings::setPdfRendererName('TCPDF');

// $phpWord = \PhpOffice\PhpWord\IOFactory::load('temp.docx'); 
// $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
// $xmlWriter->save("temp.PDF");

?> 

<h1></h1>
	
<div id="modal" class="fade modal" role="dialog" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3>4. Informe ejecutivo del estado del eje en la IEO</h3>
</div>
<div class="modal-body">
<div id='modalContent'></div>
</div>

</div>
</div>
</div>
<div class="ec-informe-ejecutivo-estado-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=  Html::button('Agregar',['value'=>Url::to(['create']),'class'=>'btn btn-success','id'=>'modalButton']) ?>
		
    </p>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
		'clientOptions' => [
		'language'=>[
                'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
            ],
		"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
		"info"=>false,
		"responsive"=>true,
		 "dom"=> 'lfTrtip',
		 "tableTools"=>[
			 "aButtons"=> [  
					// [
					// "sExtends"=> "copy",
					// "sButtonText"=> Yii::t('app',"Copiar")
					// ],
					// [
					// "sExtends"=> "csv",
					// "sButtonText"=> Yii::t('app',"CSV")
					// ],
					[
					"sExtends"=> "xls",
					"oSelectorOpts"=> ["page"=> 'current']
					],
					[
					"sExtends"=> "pdf",
					"oSelectorOpts"=> ["page"=> 'current']
					],
					// [
					// "sExtends"=> "print",
					// "sButtonText"=> Yii::t('app',"Imprimir")
					// ],
				],
			],
	],
           'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

   
            'id_eje',
            // 'id_persona',
            // 'id_coordinador',
            // 'id_secretaria',
            //'mision',
            //'descripcion',
            //'avance_producto',
            //'hallazgos',
            //'logros',
            'fecha_creacion',
            //'estado',

            [
			'class' => 'yii\grid\ActionColumn',
			'template'=>'{view}{update}{delete}{informe}',
				'buttons' => [
				'view' => function ($url, $model) {
					return Html::a('<span name="detalle" class="glyphicon glyphicon-eye-open" value ="'.$url.'" ></span>', $url, [
								'title' => Yii::t('app', 'lead-view'),
					]);
				},

				'update' => function ($url, $model) {
					return Html::a('<span name="actualizar" class="glyphicon glyphicon-pencil" value ="'.$url.'"></span>', $url, [
								'title' => Yii::t('app', 'lead-update'),
					]);
				},
				
				'informe' => function ($url, $model) {
					return Html::a('<span name="actualizar" class="glyphicon glyphicon-download-alt" value ="'.$url.'"></span>', $url, [
								'title' => Yii::t('app', 'Informe'),
					]);
				},
			  ],
			
			],

        ],
    ]); ?>
</div>
