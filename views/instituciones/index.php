<?php
if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion se redirecciona al login
else
{
	echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
	die;
}

/**********
Versión: 001
Fecha: 09-03-2018
Desarrollador: Edwin Molina Grisales
Descripción: CRUD de instituciones
---------------------------------------
Modificaciones:
Fecha: 09-03-2018
Persona encargada: Edwin Molina Grisales
Cambios Se agrega buscador
---------------------------------------
Fecha: 05-04-2018
Persona encargada: Viviana Rodas
Cambios realizados: Se agregan los datatabes
---------------------------------------
**********/
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

use app\models\Estados;
use app\models\Sectores;
use app\models\TiposInstituciones;
use yii\helpers\ArrayHelper;
use fedemotta\datatables\DataTables;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instituciones';
$this->params['breadcrumbs'][] = $this->title;


//$this->registerJsFile(Yii::$app->request->baseUrl.'/js/instituciones.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>
<div class="instituciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Agregar',['value'=>Url::to(['instituciones/create','#'=>'formname']),'class'=>'btn btn-success','id'=>'modalButton'])?>
									
    </p>

	<?php 
	
		Modal::Begin([
			'header'=>'',
			'id'=>'modal',
			'size'=>'modal-lg',
		
		]);
		echo "<div id='modalContent'></div>";
		
		Modal::end();
		
		?>
		
		
    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
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
        'columns' 	   => [
            ['class' => 'yii\grid\SerialColumn'],
            'descripcion',
            [
				'attribute' => 'id_tipos_instituciones',
				'value' => function( $model ){
					$tiposInstituciones = TiposInstituciones::findOne($model->id_tipos_instituciones);
					return $tiposInstituciones ? $tiposInstituciones->descripcion : '';
				},
				'filter' => ArrayHelper::map(TiposInstituciones::find()->all(), 'id', 'descripcion' ),
			],
            [
				'attribute' => 'id_sectores',
				'value' => function( $model ){
					$sectores = Sectores::findOne($model->id_sectores);
					return $sectores ? $sectores->descripcion : '';
				},
				'filter' => ArrayHelper::map(Sectores::find()->all(), 'id', 'descripcion' ),
			],
            'nit',
            //'estado',
            //'caracter',
            //'especialidad',
            //'rector',
            //'contacto_rector',
            //'correo_electronico_institucional',
            //'pagina_web',
            //'codigo_dane',

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
				},
				// 'delete' => function ($url, $model) {
					// return Html::a('<span class="glyphicon glyphicon-trash value = "'.$url.'" "></span>', $url, [
								// 'title' => Yii::t('app', 'lead-delete'),
					// ]);
				// }

			  ],
			
			],
        ],
    ]); ?>
</div>
