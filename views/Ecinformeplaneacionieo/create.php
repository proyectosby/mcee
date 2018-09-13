<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EcInformePlaneacionIeo */

$this->title = 'Agregar Ec Informe Planeacion Ieo';
$this->params['breadcrumbs'][] = ['label' => 'Ec Informe Planeacion Ieos', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="ec-informe-planeacion-ieo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
		'comunas' => $comunas,
		'modelComunas' => $modelComunas,
		'barrios' => $barrios,
		'modelBarrios' => $modelBarrios, 
        'model' => $model,
    ]) ?>

</div>
