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
Fecha: 18-10-2018
Desarrollador: Maria Viviana Rodas
Descripción: Index donde van los botones se semilleros tic
---------------------------------------

**********/


use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

use app\models\Sedes;
use app\models\Instituciones;

use yii\widgets\ActiveForm;

use yii\bootstrap\Button;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsginaturasBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */




$this->title = "Semilleros tic";
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="asignaturas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
                
    </p>

    <div class="semilleros-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
       <?= Html::a('Creación Semilleros Tic docentes', 
								[
									'semilleros',
									'idReporte'	=> 1,
								], 
								['class' => 'btn btn-success'
		]) ?>
		
		 <?= Html::a('Ejecución fase I', 
								[
									'semilleros',
									'idReporte'		=> 2,
								], 
								['class' => 'btn btn-success'
		]) ?> 
		
		<?= Html::a('Ejecución Fase II', 
								[
									
									'semilleros',
									'idReporte'		=> 3, 
								], 
								['class' => 'btn btn-success'
		]) ?>
		
		<?= Html::a('Ejecución fase III', 
								[
									'semilleros',
									'idReporte'		=> 4,
								], 
								['class' => 'btn btn-success'
		]) ?>
		
		
    </div>

    <div class="form-group">
		<?= Html::a('Diario de campo', 
									[
										'semilleros',
										'idReporte'		=> 5,
									], 
									['class' => 'btn btn-success']) ?>
									
									
		<?= Html::a('Resumen Operativo', 
									[
										'semilleros',
										'idReporte'		=> 6,
									], 
									['class' => 'btn btn-success']) ?>
									
		<?= Html::a('Población', 
									[
										'semilleros',
										'idReporte'		=> 16,
									], 
									['class' => 'btn btn-success']) ?>
									


</div>
<div class="form-group">
		
		<?= Html::a('Creación semilleros tic estudiantes', 
									[
										'semilleros',
										'idReporte'		=> 7,
									], 
									['class' => 'btn btn-success']) ?>
									
		 <?= Html::a('Ejecución fase I', 
								[
									'semilleros',
									'idReporte'		=> 8,
								], 
								['class' => 'btn btn-success'
		]) ?> 
		<?= Html::a('Ejecución fase II', 
										[
											'semilleros',
											'idReporte'		=> 9,
										], 
										['class' => 'btn btn-success'
				]) ?> 
		<?= Html::a('Ejecución fase III', 
										[
											'semilleros',
											'idReporte'		=> 10,
										], 
										['class' => 'btn btn-success'
				]) ?> 

</div>

 <div class="form-group">
		<?= Html::a('Diario de campo', 
									[
										'semilleros',
										'idReporte'		=> 11,
									], 
									['class' => 'btn btn-success']) ?>
									
									
		<?= Html::a('Resumen Operativo', 
									[
										'semilleros',
										'idReporte'		=> 12,
									], 
									['class' => 'btn btn-success']) ?>
									


</div>

 <div class="form-group">
		<?= Html::a('Población', 
									[
										'semilleros',
										'idReporte'		=> 13,
									], 
									['class' => 'btn btn-success']) ?>
									
									
		
									


</div>

<div class="form-group">
		<?= Html::a('Volver', 
									[
										'semilleros',
										'idReporte'		=> 14,
									], 
									['class' => 'btn btn-success']) ?>
									
									
		
									


</div>
</div>
<?php ActiveForm::end(); ?>