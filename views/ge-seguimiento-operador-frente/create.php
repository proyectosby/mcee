<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GeSeguimientoOperadorFrente */

$this->title = 'Agregar Ge Seguimiento Operador Frente';
$this->params['breadcrumbs'][] = ['label' => 'Ge Seguimiento Operador Frentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="ge-seguimiento-operador-frente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'guardado' 			=> $guardado,
		'personas' 			=> $personas,
		'mesReporte' 			=> $mesReporte,
		'sino' 			=> $sino,
		'seleccion' 			=> $seleccion,
    ]) ?>

</div>
