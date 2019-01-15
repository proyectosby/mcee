<?php
/**********
Modificación: 
Fecha: 23-10-2018
Desarrollador: Maria Viviana Rodas
Descripción: Se agrega boton de volver al index donde estan los botones de competencias basicas - proyecto
---------------------------------------

**********/
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EcDatosBasicos */

$this->title = 'Datos Básicos';
$this->params['breadcrumbs'][] = ['label' => 'Datos Básicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>

<div class="form-group">
		
		<?= Html::a('Volver', 
									[
										$urlVolver,
									], 
									['class' => 'btn btn-info']) ?>
				
</div>

<div class="ec-datos-basicos-create">

    <h1 style='background-color:#ccc;'><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelDatosBasico' 	=> $modelDatosBasico,
		'modelPlaneacion' 	=> $modelPlaneacion,
		'modelVerificacion' => $modelVerificacion,
		'modelReportes' 	=> $modelReportes,
		'tiposVerificacion'	=> $tiposVerificacion,
		'profesional'		=> $profesional,
		'sede'				=> $sede,
		'institucion'		=> $institucion,
    ]) ?>

</div>
