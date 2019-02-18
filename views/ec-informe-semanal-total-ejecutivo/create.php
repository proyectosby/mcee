<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EcInformeSemanalTotalEjecutivo */

$this->title = '5 y 6. InformeSemanalEjecución - Informe de cierre de fase - total ejecutivo';
$this->params['breadcrumbs'][] = ['label' => '5 y 6. InformeSemanalEjecución - Informe de cierre de fase - total ejecutivo', 'url' => ['index']];
$this->params['breadcrumbs'][] = "";

?>
<div class="ec-informe-semanal-total-ejecutivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'guardado' => 0,
        'cantidaEjecutadaSedePPT' => 0,
		'cantidaEjecutadaSedePSSE' => 0,
		'cantidaEjecutadaSedePAF' => 0,
		'cantidaTotalSedesXIEOPPT'  => 0,
		'cantidaTotalSedesXIEOPSSE' => 0,
		'cantidaTotalSedesXIEOPAF'  => 0,
		'porcentajesIEOPPT' => 0,
		'porcentajesIEOPSSE'=> 0,
		'porcentajesIEOPAF' => 0,
		'PorcentajeSedesPPT' => 0,
		'PorcentajeSedesPSSE' =>0,
		'PorcentajeSedesPAF' =>	0,
        
    ]) ?>

</div>
