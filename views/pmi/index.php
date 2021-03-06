<?php

/**********
Versión: 001
Fecha: 12-07-2018
Desarrollador: Edwin Molina Grisales
Descripción: CRUD PMI
---------------------------------------
**********/

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\models\SubProcesoEvaluacion;
use app\models\ProcesoEspecifico;
use app\models\AreaGestion;
use app\models\Estados;
use app\models\Instituciones;
use app\models\Zonificaciones;
use app\models\ComunasCorregimientos;

use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PmiBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PMI';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
		Modal::Begin([
			'header'=>'<h3>'.$this->title.'</h3>',
			'id'=>'modal',
			'size'=>'modal-lg',
		
		]);
		echo "<div id='modalContent'></div>";
		
		Modal::end();
		
		?>

<div class="pmi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?= Html::button('Agregar',['value'=>Url::to(['create']),'class'=>'btn btn-success','id'=>'modalButton'])?>
    </p>

    <?= DataTables::widget([
			'dataProvider' => $dataProvider,
			'filterModel'  => $searchModel,
			'clientOptions' => [
			'language'=>[
							'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
						],
			"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
			"info"		=>false,
			"responsive"=>true,
			"dom"		=> 'lfTrtip',
			"tableTools"=>[
				 "aButtons"=> [
					[
					"sExtends"=> "xls",
					"oSelectorOpts"=> ["page"=> 'current']
					],
					[
					"sExtends"=> "pdf",
					"oSelectorOpts"=> ["page"=> 'current']
					],
				],
			 ],
		],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			[
				'attribute' => 'id_institucion',
				'value' 	=> function( $model ){
					$institucion = Instituciones::findOne( $model->id_institucion );
					return $institucion ? $institucion->descripcion : '';
				},
			],
            'codigo_dane',
            'anio',
            [
				'attribute' => 'comuna',
				'value' 	=> function( $model ){
					$comuna = ComunasCorregimientos::findOne( $model->comuna );
					return $comuna ? $comuna->descripcion : '';
				},
			],
			[
				'attribute' => 'zona',
				'value' 	=> function( $model ){
					$zona = Zonificaciones::findOne( $model->zona );
					return $zona ? $zona->descripcion : '';
				},
			],
			[
				'attribute' => 'id_proceso_especifico',
				'value' 	=> function( $model ){
					$proceso = ProcesoEspecifico::findOne( $model->id_proceso_especifico );
					return $proceso ? $proceso->descripcion : '';
				},
			],
            //'id_proceso_especifico',
            //'valor',
            //'id_institucion',
            //'estado',

           [
			'class' => 'yii\grid\ActionColumn',
			'template'=>'{view}{update}{delete}',
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
				}

			  ],
			
			],

        ],
    ]); ?>
</div>
