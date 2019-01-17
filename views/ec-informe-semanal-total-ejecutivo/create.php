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
        'cantidad_ieo' => $cantidad_ieo,
        'cantidad_sedes_ieo' => $cantidad_sedes_ieo,
        'porcentaje_ieo' => $porcentaje_ieo,
        'porcentaje_sedes' => $porcentaje_sedes,
        'porcentaje_actividad_uno' => $porcentaje_actividad_uno,
        'porcentaje_actividad_dos' => $porcentaje_actividad_dos,
        'porcentaje_actividad_tres' => $porcentaje_actividad_tres,
        'poblacion_beneficiada_directa' => $poblacion_beneficiada_directa,
        'poblacion_beneficiada_indirecta' => $poblacion_beneficiada_indirecta,
        'alarmas_generales' => $alarmas_generales,        
    ]) ?>

</div>
