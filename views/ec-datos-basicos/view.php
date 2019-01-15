<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Personas;
use app\models\Instituciones;
use app\models\Sedes;
use app\models\Estados;

/* @var $this yii\web\View */
/* @var $model app\models\EcDatosBasicos */

$this->title = "Detalles";
$this->params['breadcrumbs'][] = ['label' => 'Datos Básicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::a('Volver', 
									[
										$urlVolver,
									], 
									['class' => 'btn btn-info']) ?>

<div class="ec-datos-basicos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p style='display:none'>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
			[
				'attribute' => 'estado',
				'value' 	=> function( $model ){
					$estado = Estados::findOne( $model->estado );
					return $estado ? $estado->descripcion : '';
				},
			],
        ],
    ]) ?>

</div>
