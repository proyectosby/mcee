<?php
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */


use app\models\EcAvances;
use yii\widgets\ActiveForm;
use app\models\IsaSemanaLogrosForDebRet;


$semanLogros = new IsaSemanaLogrosForDebRet();
 

?>

<div class="container-fluid">
            <div class="ieo-form">

                    <?= $form->field($semanLogros, "[$idProyecto]semana1")->textInput([ 'value' => $datos[$idProyecto]['semana1'] ])?>
                    <?= $form->field($semanLogros, "[$idProyecto]semana2")->textInput([ 'value' => $datos[$idProyecto]['semana2'] ])?>
                    <?= $form->field($semanLogros, "[$idProyecto]semana3")->textInput([ 'value' => $datos[$idProyecto]['semana3'] ])?> 
                    <?= $form->field($semanLogros, "[$idProyecto]semana4")->textInput([ 'value' => $datos[$idProyecto]['semana4'] ])?>
                    <?= $form->field($semanLogros, "[$idProyecto]estado")->hiddenInput( [ 'value' => '1' ] )->label(false ) ?>
            </div>
</div>