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
	
	<div class="panel panel-info">
		
		<div class="panel-heading">
			<h3 class="panel-title">Docentes</h3>
		</div>
		<div class="panel-body">
			
			<div class="form-group">
		   <?= Html::a('Creación Semilleros Tic docentes', 
									[
										'semilleros-datos-ieo/create',
										// 'idReporte'	=> 1,
									], 
									['class' => 'btn btn-success'
			]) ?>
			
			 <?= Html::a('Ejecución fase I', 
									[
										'ejecucion-fase-i/create',
										// 'idReporte'		=> 2,
									], 
									['class' => 'btn btn-success'
			]) ?> 
			
			<?= Html::a('Ejecución Fase II', 
									[
										
										'ejecucion-fase-ii/create',
										// 'idReporte'		=> 3, 
									], 
									['class' => 'btn btn-success'
			]) ?>
			
			<?= Html::a('Ejecución fase III', 
									[
										'ejecucion-fase-iii/create',
										// 'idReporte'		=> 4,
									], 
									['class' => 'btn btn-success'
			]) ?>
			
			
		</div>

		<div class="form-group">
			<?= Html::a('Diario de campo', 
										[
											'semilleros-tic-diario-de-campo/index',
											// 'idReporte'		=> 5,
										], 
										['class' => 'btn btn-success']) ?>
										
										
			<?= Html::a('Resumen Operativo', 
										[
											'resumen-operativo-fases-docentes/index',
											// 'idReporte'		=> 6,
										], 
										['class' => 'btn btn-success']) ?>
										
			<?= Html::a('Población', 
										[
											'instrumento-poblacion-docentes/create',
											// 'idReporte'		=> 16,
										], 
										['class' => 'btn btn-success']) ?>
										


		</div>
			
		</div>
	
	</div>
	
	<div class="panel panel-info">
		
		<div class="panel-heading">
			<h3 class="panel-title">Estudiantes</h3>
		</div>
		<div class="panel-body">
		
		<div class="form-group">
		
		<?= Html::a('Creación semilleros tic estudiantes', 
									[
										'semilleros-datos-ieo-estudiantes/create',
										// 'idReporte'		=> 7,
									], 
									['class' => 'btn btn-success']) ?>
									
		 <?= Html::a('Ejecución fase I', 
								[
									'ejecucion-fase-i-estudiantes/create',
									// 'idReporte'		=> 8,
								], 
								['class' => 'btn btn-success'
		]) ?> 
		<?= Html::a('Ejecución fase II', 
										[
											'ejecucion-fase-ii-estudiantes/create',
											// 'idReporte'		=> 9,
										], 
										['class' => 'btn btn-success'
				]) ?> 
		<?= Html::a('Ejecución fase III', 
										[
											'ejecucion-fase-iii-estudiantes/create',
											// 'idReporte'		=> 10,
										], 
										['class' => 'btn btn-success'
				]) ?> 

		</div>

		<div class="form-group">
		<?= Html::a('Diario de campo', 
									[
										'semilleros-tic-diario-de-campo-estudiantes/index',
										// 'idReporte'		=> 11,
									], 
									['class' => 'btn btn-success']) ?>
									
									
		<?= Html::a('Resumen Operativo', 
									[
										'resumen-operativo-fases-estudiantes/index',
										// 'idReporte'		=> 12,
									], 
									['class' => 'btn btn-success']) ?>
									
		<?= Html::a('Población', 
									[
										'instrumento-poblacion-estudiantes/create',
										// 'idReporte'		=> 13,
									], 
									['class' => 'btn btn-success']) ?>
									


		</div>

	</div>
	
	</div>


</div>
<?php ActiveForm::end(); ?>