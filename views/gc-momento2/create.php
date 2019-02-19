<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GcMomento2 */

$this->title = 'Agregar Gc Momento2';
$this->params['breadcrumbs'][] = ['label' => 'Gc Momento2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="gc-momento2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
