<?php
/**********
Versión: 001
Fecha: 2018-08-23
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE I ESTUDIANTES
---------------------------------------
Modificaciones:
Fecha: 2018-09-19
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se cambia los campo input de cada sección por textarea, y se le agrega el plugin XEditable, para poderlos editar
---------------------------------------
**********/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use dosamigos\datepicker\DatePicker;

use app\models\PoblacionDocentesSesion;
use app\models\Sesiones;
use app\models\CondicionesInstitucionales;

use yii\bootstrap\Collapse;

$items = [];
$index = 0;

$sesiones = Sesiones::find()
				->where( 'id_fase=1' )
				->andWhere( 'estado=1' )
				->all();

// $condiciones = CondicionesInstitucionales::find()
				// ->andWhere( 'estado=1' )
				// ->all();
				
$condiciones = new CondicionesInstitucionales();

foreach( $sesiones as $keySesion => $sesion ){
	
	$items[] = 	[
					'label' 		=>  $sesion->descripcion,
					'content' 		=>  $this->render( 'sesionItem', 
													[ 
														'idPE' 			=> $idPE, 
														'index' 		=> $index,
														'sesion' 		=> $sesion,
														'model' 		=> $model,
														'condiciones'	=> $condiciones,
													] 
										),
					'contentOptions'=> []
				];
				
	$index += count($sesiones);
}



?>

<?= Collapse::widget([
	'items' 	=> $items,
    'options' 	=> [ "id" => "collapseOne" ],
]); ?>

<div class='container-fluid' style='margin:10px 0;'>
	
		<div class='row text-center' style='width:100%;'>
			
			<div class='col-sm-12'>
				<span total class='form-control' style='background-color:#ccc;'>CONDICIONES INSTITUCIONALES</span>
			</div>
		
		</div>
		
		<div class='row text-center title' style='width:100%;'>
			<div class='col-sm-2'>
				<span total class='form-control' style='background-color:#ccc;'>Por parte de la IEO</span>
			</div>
			<div class='col-sm-2'>
				<span total class='form-control' style='background-color:#ccc;'>Por parte de UNIVALLE</span>
			</div>
			<div class='col-sm-2'>
				<span total class='form-control' style='background-color:#ccc;'>Por parte de la SEM</span>
			</div>
			<div class='col-sm-2'>
				<span total class='form-control' style='background-color:#ccc;'>OTRO</span>
			</div>
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Número de Sesiones participantes por curso</span>
			</div>
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Número de estudiantes participantes por curso (Promedio)</span>
			</div>
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Total sesiones por IEO</span>
			</div>
			<div class='col-sm-1'>
				<span total class='form-control' style='background-color:#ccc;'>Total estudiantes IEO (Promedio)</span>
			</div>
			
		</div>
		
		<div class='row text-center' id='condiciones-institucionales' style='width:100%;'>
			
			<div class='col-sm-2'>
				<?= Html::activeTextarea($condiciones, "[$index]parte_ieo", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-2'>
				<?= Html::activeTextarea($condiciones, "[$index]parte_univalle", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-2'>
				<?= Html::activeTextarea($condiciones, "[$index]parte_sem", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-2'>
				<?= Html::activeTextarea($condiciones, "[$index]otro", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($condiciones, "[$index]otro", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($condiciones, "[$index]otro", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($condiciones, "[$index]total_sesiones_ieo", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>
			
			<div class='col-sm-1'>
				<?= Html::activeTextarea($condiciones, "[$index]total_docentes_ieo", [ 'class' => 'form-control', 'maxlength' => true, 'data-type' => 'textarea']) ?>
			</div>

		</div>
		
	</div>