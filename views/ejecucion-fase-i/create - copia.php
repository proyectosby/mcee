<?php

/**********
Versión: 001
Fecha: 2018-08-21
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE I
---------------------------------------
Modificación: 
Fecha: 22-10-2018
Desarrollador: Maria Viviana Rodas
Descripción: Se agrega boton de volver a la vista de botones
**********/


use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EjecucionFase */

$this->title = 'EJECUCION DE FASE I';
$this->params['breadcrumbs'][] = ['label' => 'Ejecucion Fases', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>

<div class="form-group">
		
		<?= Html::a('Volver', 
									[
										'semilleros/index',
									], 
									['class' => 'btn btn-info']) ?>
				
</div>

<div class="ejecucion-fase-create">

    <h1><?= Html::encode($fase->descripcion) ?></h1>

    <?= $this->render('_form', [
        'model' 				=> $model,
		'fase'  				=> $fase,
		'institucion'			=> $institucion,
		'sede' 		 			=> $sede,
		'docentes' 				=> $docentes,
		'sesiones' 				=> $sesiones,
		// 'personas'	 			=> $personas,
		'datosIeoProfesional'	=> $datosIeoProfesional,
		'condiciones'			=> $condiciones,
		'datosModelos'			=> $datosModelos,
    ]) ?>

</div>
