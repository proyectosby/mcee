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
Fecha: 27-12-2018
Desarrollador: Maria Viviana Rodas
Descripción: Index donde van los botones se arte y cultura
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




$this->title = "Competencias de Arte y Cultura";
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
			<h3 class="panel-title">Competencias básicas de arte y cultura</h3>
		</div>
		<div class="panel-body">
			
			<div class="form-group">
		   <?= Html::a('Planeación', 
									[
										'cbac-plan-misional-operativo/index',
										// 'idReporte'	=> 1,
									], 
									['class' => 'btn btn-success'
			]) ?>
			
			 <?= Html::a('Reporte', 
									[
										'cbac-reporte-competencias-basicas-ac/index',
										// 'idReporte'		=> 2,
									], 
									['class' => 'btn btn-success'
			]) ?> 
			
			<?= Html::a('Informe de ejecución semanal', 
									[
										
										'cbac-informe-semanal-cac/index',
										// 'idReporte'		=> 3, 
									], 
									['class' => 'btn btn-success'
			]) ?>
			
			<?= Html::a('Orientación del proceso - Seguimiento', 
									[
										'cbac-orientacion-proceso-cbac/index',
										// 'idReporte'		=> 4,
									], 
									['class' => 'btn btn-success'
			]) ?>
			
			
		</div>

		<div class="form-group">
			
			<?= Html::a('Orientación del proceso - Orientación', 
									[
										'isa-orientacion-proceso/index',
										// 'idReporte'		=> 4,
									], 
									['class' => 'btn btn-success'
			]) ?>
			
			<?= Html::a('Consolidado por mes - Operativo', 
										[
											'cbac-consolidado-mes-cbac/index',
											// 'idReporte'		=> 5,
										], 
										['class' => 'btn btn-success']) ?>
										
			<?= Html::a('Consolidado por mes - Misional', 
										[
											'isa-enc-artistica-misional/create',
											// 'idReporte'		=> 5,
										], 
										['class' => 'btn btn-info']) ?>
										
										
			
										


		</div>
			
		</div>
	
	</div>
	
	


</div>
<?php ActiveForm::end(); ?>