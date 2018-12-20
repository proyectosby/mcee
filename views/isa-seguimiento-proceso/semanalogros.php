<?php
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */


use app\models\EcAvances;
use yii\widgets\ActiveForm;
use app\models\IsaSemanaLogros;
use app\models\IsaOrientacionMetodologicaActividades;


$semanLogros = new IsaSemanaLogros();

$orientacion = new IsaOrientacionMetodologicaActividades();

// echo "<pre>"; print_r($datos); echo "</pre>"; 

// die;

?>

<div class="container-fluid">
            <div class="ieo-form">

                    <?= $form->field($semanLogros, "[$idLogros]semana1")->textInput([ 'value' => $datos['SemanaLogros'][$idLogros]['semana1'] ])?>
                    <?= $form->field($semanLogros, "[$idLogros]semana2")->textInput([ 'value' => $datos['SemanaLogros'][$idLogros]['semana2'] ])?>
                    <?= $form->field($semanLogros, "[$idLogros]semana3")->textInput([ 'value' => $datos['SemanaLogros'][$idLogros]['semana3'] ])?> 
                    <?= $form->field($semanLogros, "[$idLogros]semana4")->textInput([ 'value' => $datos['SemanaLogros'][$idLogros]['semana4'] ])?>
                    <?= $form->field($semanLogros, "[$idLogros]id_logros_actividades")->hiddenInput( [ 'value' => $idLogros ] )->label(false ) ?>
                    <?= $form->field($semanLogros, "[$idLogros]estado")->hiddenInput( [ 'value' => '1' ] )->label(false ) ?>
                    
					<?= $form->field($orientacion, "[$idLogros]descripcion")->textInput([ 'value' => $datos['OrientacionMetodologicaActividades'][$idActividad]['descripcion'] ])->label("ORIENTACION METODOLÓGICA")?>
					<?= $form->field($orientacion, "[$idLogros]id_actividades")->hiddenInput( [ 'value' => $idActividad ] )->label(false ) ?>
					
			</div>
</div>