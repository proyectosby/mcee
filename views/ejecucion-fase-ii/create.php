<?php

/**********
Versión: 001
Fecha: 2018-08-21
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE II
---------------------------------------
**********/


use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EjecucionFase */

$this->title = 'EJECUCION DE FASE II';
$this->params['breadcrumbs'][] = ['label' => 'Ejecución Fase II', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="ejecucion-fase-create">

    <h1><?= Html::encode($fase->descripcion) ?></h1>

    <?= $this->render('_form', [
		'fase'  				=> $fase,
		'institucion'			=> $institucion,
		'sede' 		 			=> $sede,
		'docentes' 				=> $docentes,
		'sesiones' 				=> $sesiones,
        'datosModelos'			=> $datosModelos,
        'condiciones'			=> $condiciones,
        'datosIeoProfesional'	=> $datosIeoProfesional,
        'datosModelos'			=> $datosModelos,
		'guardado'				=> $guardado,
		'ciclo'					=> $ciclo,
    ]) ?>

</div>
