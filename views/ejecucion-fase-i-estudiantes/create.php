<?php

/**********
Versión: 001
Fecha: 2018-08-23
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE I ESTUDIANTES
---------------------------------------
**********/


use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EjecucionFase */

$this->title = 'EJECUCION FASE I ESTUDIANTES';
$this->params['breadcrumbs'][] = ['label' => 'Ejecucion Fase I Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="ejecucion-fase-create">

    <h1><?= Html::encode($fase->descripcion) ?></h1>

    <?= $this->render('_form', [
        'model' 		=> $model,
		'fase'  		=> $fase,
		'institucion'	=> $institucion,
		'sede' 		 	=> $sede,
		'docentes' 		=> $docentes,
    ]) ?>

</div>
