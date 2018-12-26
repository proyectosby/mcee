<?php
if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion | redirecciona al login
else
{
	echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
	die;
}
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;


    if($index < 3){?>
        <div style ="display : none">
            <?= $form->field($actividades_isa, "[$index]id_componente")->textInput(["value" => 6]) ?>
            <?= $form->field($actividades_isa, "[$index]id_actividad_c")->textInput(["value" => $index]) ?>
        </div>
    <?php
    }else if($index >= 3 && $index <= 7){ ?>
        <div style ="display : none">
            <?= $form->field($actividades_isa, "[$index]id_componente")->textInput(["value" => 4]) ?>
            <?= $form->field($actividades_isa, "[$index]id_actividad_c")->textInput(["value" => $index]) ?>
        </div>
    <?php
    }
    else if($index > 7){ ?>
        <div style ="display : none">
            <?= $form->field($actividades_isa, "[$index]id_componente")->textInput(["value" => 5]) ?>
            <?= $form->field($actividades_isa, "[$index]id_actividad_c")->textInput(["value" => $index]) ?>
        </div>
    <?php
    }
    ?>
    <?= $form->field($actividades_isa, "[$index]logors")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]fortalezas")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]debilidades")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]alternativas")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]retos")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]observaciones")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]alarmas")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]necesidades")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]estrategias_aprovechar")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]estrategias_enfrentar")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]ajustes")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]temas")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]articulacion")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]necesidades_articulacion")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]cumplimiento_objetivos")->textInput() ?>
    <?= $form->field($actividades_isa, "[$index]estado")->hiddenInput(['value'=> 1])->label(false); ?>