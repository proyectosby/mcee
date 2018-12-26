<?php
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */


use app\models\EcAvances;
use yii\widgets\ActiveForm;
use app\models\IsaSemanaLogrosForDebRet;
use app\models\IsaOrientacionMetodologicaVariaciones;


$semanLogros = new IsaSemanaLogrosForDebRet();
$orientacion = new IsaOrientacionMetodologicaVariaciones();
// echo $idVariaciones;
// echo "<pre>"; print_r($datos); echo "</pre>"; 

// die;
?>

<div class="container-fluid">
            <div class="ieo-form">

                    <?= $form->field($semanLogros, "[$idIsaForDebRet]semana1")->textInput([ 'value' => $datos['semanaLogrosfdr'][$idIsaForDebRet]['semana1'] ])?>
                    <?= $form->field($semanLogros, "[$idIsaForDebRet]semana2")->textInput([ 'value' => $datos['semanaLogrosfdr'][$idIsaForDebRet]['semana2'] ])?>
                    <?= $form->field($semanLogros, "[$idIsaForDebRet]semana3")->textInput([ 'value' => $datos['semanaLogrosfdr'][$idIsaForDebRet]['semana3'] ])?> 
                    <?= $form->field($semanLogros, "[$idIsaForDebRet]semana4")->textInput([ 'value' => $datos['semanaLogrosfdr'][$idIsaForDebRet]['semana4'] ])?>
                    <?= $form->field($semanLogros, "[$idIsaForDebRet]id_for_deb_ret")->hiddenInput( [ 'value' => $idIsaForDebRet ] )->label(false ) ?>
                    <?= $form->field($semanLogros, "[$idIsaForDebRet]estado")->hiddenInput( [ 'value' => '1' ] )->label(false ) ?>
					
					<?= $form->field($orientacion, "[$idIsaForDebRet]descripcion")->textInput([ 'value' => $datos['OrientacionMetodologicaVariaciones'][$idVariaciones]['descripcion'] ])->label("ORIENTACION METODOLÓGICA")?>
					<?= $form->field($orientacion, "[$idIsaForDebRet]id_variaciones_actividades")->hiddenInput( [ 'value' => $idVariaciones ] )->label(false ) ?>
            </div>
</div>