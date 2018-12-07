<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GeSeguimientoGestion */

$this->title = 'Agregar Ge Seguimiento Gestion';
$this->params['breadcrumbs'][] = ['label' => 'Ge Seguimiento Gestions', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="ge-seguimiento-gestion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 			=> $model,
        'cargos' 			=> $cargos,
        'institucion' 		=> $institucion,
        'listBoleano' 		=> $listBoleano,
        'consideracones' 	=> $consideracones,
        'respuestas' 		=> $respuestas,
        'calificaciones'	=> $calificaciones,
        'guardado' 			=> $guardado,
        'personas' 			=> $personas,
    ]) ?>

</div>
