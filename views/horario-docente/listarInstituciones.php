<?php

/**********
Versión: 001
Fecha: 06-03-2018
Desarrollador: Edwin Molina Grisales
Descripción: CRUD de sedes-jornadas
---------------------------------------
Modificaciones:
Fecha: 06-03-2018
Persona encargada: Edwin Molina Grisales
Cambios realizados: - Se lista las instituciones y las sedes y luego de seleccionar ambas se llama a la vista index por el controlador
---------------------------------------
Modificaciones:
Fecha: 06-03-2018
Persona encargada: Edwin Molina Grisales
Cambios realizados: - Se lista las instituciones y las sedes y luego de seleccionar ambas se llama a la vista index por el controlador
---------------------------------------
**********/

if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion se redirecciona al login
else
{
	
	echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
}

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use app\models\Instituciones;
use app\models\Sedes;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'horario Docente';
$this->params['breadcrumbs'][] = $this->title;

//los id de la instituciones a la pertenece esa persona para mostrar solo esas instituciones
$idInstituciones = implode(",",$_SESSION['instituciones']);

// si pertenece a una sola institucion



if (count($_SESSION['instituciones'])==1 and @$_GET['idInstitucion']=="")
{
	$id = $_SESSION['instituciones'][0];
	echo "<script> window.location=\"index.php?r=horario-docente%2Findex&idInstitucion=$id&idSedes=\";</script>";
}

//Obterniendo los datos necesarios para las instituciones
	$institucionesTable	 = new Instituciones();
	
	$queryInstituciones  = $institucionesTable
							->find()
							->orderby('descripcion')
							->where('estado=1')
							->andWhere("id in ($idInstituciones)");
	$dataInstituciones	 = $queryInstituciones->all();
	$instituciones		 = ArrayHelper::map( $dataInstituciones, 'id', 'descripcion' );	

//Opciones para el select instituciones
$optionsInstituciones = array( 
							'prompt' 	=> 'Seleccione...', 
							'id'	 	=> 'idInstitucion', 
							'name'	 	=> 'idInstitucion',
							'value'	 	=> $idInstitucion == 0 ? '' : $idInstitucion,
							'onChange'	=> '$( "#idSedes" ).val(\'\'); this.form.submit(); ',
						);




$sedes = [];

//Si se ha seleccionado una institucion se buscan todas las sedes correspondientes a ese id
if( $idInstitucion > 0 ){
	
	//Obterniendo los datos necesarios para Sedes						
	$sedesTable	 		= new Sedes();
	$querySedes	 		= $sedesTable->find()->orderby('descripcion')->where('estado=1');
	$querySedes->andWhere( 'id_instituciones='.$idInstitucion );
	$dataSedes	 		= $querySedes->all();
	$sedes		 		= ArrayHelper::map( $dataSedes, 'id', 'descripcion' );
}

//opciones para el select sedes
$optionsSedes = array( 
					'prompt' 	=> 'Seleccione...', 
					'id'	 	=> 'idSedes', 
					'name'	 	=> 'idSedes',
					'value'	 	=> $idSedes == 0 ? '' : $idSedes,
					'onchange'	=> 'this.form.submit();'
				);

?>
<div class="sedes-index">

    <h1><?= Html::encode($this->title) ?></h1>
	
	<?php $form = ActiveForm::begin([
		'action' => 'index.php?r=horario-docente/index', 
		'method' => 'get',
	]); ?>
	
	<?= $form->field($institucionesTable, 'id')->dropDownList( $instituciones, $optionsInstituciones )->label('Instituciones') ?>
	
	<?= $form->field($institucionesTable, 'id')->dropDownList( $sedes, $optionsSedes )->label('Sedes') ?>
	
	<?php $form = ActiveForm::end(); ?>
	
</div>