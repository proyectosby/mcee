<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EcLevantamientoOrientacion */

$this->title = 'Agregar';
$this->params['breadcrumbs'][] = ['label' => 'Ec Levantamiento Orientacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="ec-levantamiento-orientacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'sedes' => $sedes,
		'instituciones' => $instituciones,
		'estados' =>$estados,
		'parametros' =>$parametros,
    ]) ?>

</div>
