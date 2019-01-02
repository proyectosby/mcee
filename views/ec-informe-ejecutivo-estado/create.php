<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EcInformeEjecutivoEstado */

$this->title = 'Agregar 4. Informe ejecutivo del estado del eje en la IEO';
$this->params['breadcrumbs'][] = ['label' => 'Ec Informe Ejecutivo Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="ec-informe-ejecutivo-estado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'persona' =>$persona,
		'coordinador' =>$coordinador,
		'secretario' =>$secretario,
		'instituciones'=> $instituciones,
		'ejes'=> $ejes,
    ]) ?>

</div>
