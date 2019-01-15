<?php

use yii\helpers\Html;

use fedemotta\datatables\DataTables;
use yii\grid\GridView;

use app\models\Personas;
use app\models\Instituciones;
use app\models\Sedes;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EcDatosBasicosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos Básicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ec-datos-basicos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
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

            [
				'attribute' => 'profesional_campo',
				'value' 	=> function( $model ){
					$persona = Personas::findOne( $model->profesional_campo );
					return $persona ? $persona->nombres." ".$persona->apellidos : '';
				},
			],
			[
				'attribute' => 'id_institucion',
				'value' 	=> function( $model ){
					$institucion = Instituciones::findOne( $model->id_institucion );
					return $institucion ? $institucion->descripcion : '';
				},
			],
			[
				'attribute' => 'id_sede',
				'value' 	=> function( $model ){
					$sedes = Sedes::findOne( $model->id_institucion );
					return $sedes ? $sedes->descripcion : '';
				},
			],
            'fecha_diligenciamiento',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
