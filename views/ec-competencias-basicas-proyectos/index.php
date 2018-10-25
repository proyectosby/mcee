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
Fecha: 23-10-2018
Desarrollador: Maria Viviana Rodas
Descripción: Index donde van los botones competencias basicas proyectos pedagogicos transversales
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




$this->title = "Competencias básicas";
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
			<h3 class="panel-title">Proyectos pedagógicos transversales</h3>
		</div>
		<div class="panel-body">
			
			<div class="form-group">
			   <?= Html::a('2. Planeación y reporte de actividad', 
										[
											'ec-datos-basicos/create',
											// 'idReporte'	=> 1,
										], 
										['class' => 'btn btn-success'
				]) ?>
				
				
				<?= Html::a('3.A Informe de avance Mensual I.E.O Fase Plan de acción - Ejecución', 
										[
											
											'ieo/index',
											// 'idReporte'		=> 3, 
										], 
										['class' => 'btn btn-success'
				]) ?>
				
			</div>
			<div class="form-group">
				<?= Html::a('3.A Informe de avance Mensual I.E.O Fase Plan de acción - Misional', 
										[
											'ecinformeplaneacionieo/index',
											// 'idReporte'		=> 4,
										], 
										['class' => 'btn btn-success'
				]) ?>
				
				<?= Html::a('3. B Informe de avance Mensual I.E.O Fase Implementación Plan de acción', 
										[
											'',
											// 'idReporte'		=> 2,
										], 
										['class' => 'btn btn-info'
				]) ?> 
			</div>
			
		

		<div class="form-group">
			<?= Html::a('4. Informe ejecutivo del estado del eje en la IEO', 
										[
											'',
											// 'idReporte'		=> 5,
										], 
										['class' => 'btn btn-info']) ?>
										
										
			<?= Html::a('5 y 6. Informe Semanal Ejecución - Informe de cierre de fase', 
										[
											'informe-semanal-ejecucion-ise/index',
											// 'idReporte'		=> 6,
										], 
										['class' => 'btn btn-success']) ?>
		</div>
		<div class="form-group">								
			<?= Html::a('5 y 6. Informe Semanal Ejecución - Informe de cierre de fase - Total ejecutivo', 
										[
											'ec-informe-semanal-total-ejecutivo/index',
											// 'idReporte'		=> 16,
										], 
										['class' => 'btn btn-success']) ?>
										
			<?= Html::a('7. Levantamiento de orientación misional y método', 
										[
											'ec-levantamiento-orientacion/index',
											// 'idReporte'		=> 16,
										], 
										['class' => 'btn btn-success']) ?>
		</div>
        <div class="form-group">			
			<?= Html::a('8.Informe Avance Misional Ejes - TP IEO', 
										[
											'',
											// 'idReporte'		=> 16,
										], 
										['class' => 'btn btn-info']) ?>
										
			<?= Html::a('8.Informe Avance Misional Ejes - TP misional', 
										[
											'',
											// 'idReporte'		=> 16,
										], 
										['class' => 'btn btn-info']) ?>
		</div>	
        <div class="form-group">		
			<?= Html::a('9. Informe de avance ejecución y misional del proyecto', 
										[
											'',
											// 'idReporte'		=> 16,
										], 
										['class' => 'btn btn-info']) ?>

		</div>
			
		</div>
	
	</div>
	
	
	
	</div>


</div>
<?php ActiveForm::end(); ?>