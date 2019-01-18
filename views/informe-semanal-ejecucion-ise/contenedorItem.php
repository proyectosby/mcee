<?php
if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion se redirecciona al login
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
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

?>
    <h3 style='background-color: #ccc;padding:5px;'>Docentes</h3>
    <?= $form->field($tipo_poblacion, "[$index]tiempo_libre")->textInput([ 'value' => isset($datos[$index]['tiempo_libre']) ? $datos[$index]['tiempo_libre'] : '' ]) ?>  
    <?= $form->field($tipo_poblacion, "[$index]edu_derechos")->textInput([ 'value' => isset($datos[$index]['edu_derechos']) ? $datos[$index]['edu_derechos'] : '' ]) ?>  
    <?= $form->field($tipo_poblacion, "[$index]sexualidad_ciudadania")->textInput([ 'value' => isset($datos[$index]['sexualidad_ciudadania']) ? $datos[$index]['sexualidad_ciudadania'] : '' ]) ?>  
    <?= $form->field($tipo_poblacion, "[$index]medio_ambiente")->textInput([ 'value' => isset($datos[$index]['medio_ambiente']) ? $datos[$index]['medio_ambiente'] : '' ]) ?>  
    <?= $form->field($tipo_poblacion, "[$index]familia")->textInput([ 'value' => isset($datos[$index]['familia']) ? $datos[$index]['familia'] : '' ]) ?> 
    <?= $form->field($tipo_poblacion, "[$index]directivos")->textInput([ 'value' => isset($datos[$index]['directivos']) ? $datos[$index]['directivos'] : '' ]) ?> 
    <?= $form->field($tipo_poblacion, "[$index]id_tip")->hiddenInput( [ 'value' => isset($datos[$index]['id_tip']) ? $datos[$index]['id_tip'] : ''  ] )->label(false ) ?>
    
    <h3 style='background-color: #ccc;padding:5px;'>Estudiantes</h3>
    <div class=row style='text-align:center;'>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px;'>Est.Gra.0</span>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px'>Est.Gra.1</span>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px'>Est.Gra.2</span>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px'>Est.Gra.3</span>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px'>Est.Gra.4</span>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px'>Est.Gra.5</span>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px'>Est.Gra.6</span>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px'>Est.Gra.7</span>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px'>Est.Gra.8</span>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px'>Est.Gra.9</span>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px'>Est.Gra.10</span>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <span total class='form-control' style='background-color:#ccc;height:70px'>Est.Gra.11</span>
        </div>
    </div>
    <div class=row>
        <div class="col-sm-1" style='padding:0px;'>
        <?=  Html::activeTextInput($estudiasntes, "[$index]grado_0", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_0']) ? $datos[$index]['grado_0'] : '' ] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_1", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_1']) ? $datos[$index]['grado_1'] : ''] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_2", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_2']) ? $datos[$index]['grado_2'] : ''] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_3", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_3']) ? $datos[$index]['grado_3'] : ''] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_4", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_4']) ? $datos[$index]['grado_4'] : ''] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_5", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_5']) ? $datos[$index]['grado_5'] : ''] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_6", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_6']) ? $datos[$index]['grado_6'] : ''] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_7", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_7']) ? $datos[$index]['grado_7'] : ''] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_8", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_8']) ? $datos[$index]['grado_8'] : ''] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_9", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_9']) ? $datos[$index]['grado_9'] : ''] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_10", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_10']) ? $datos[$index]['grado_10'] : ''] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, "[$index]grado_11", [ 'class' => 'form-control','value' => isset($datos[$index]['grado_11']) ? $datos[$index]['grado_11'] : ''] ) ?>
        </div>
        <?= $form->field($estudiasntes, "[$index]est_id")->hiddenInput( [ 'value' => isset($datos[$index]['est_id']) ? $datos[$index]['est_id'] : ''  ] )->label(false ) ?>
        <?= $form->field($estudiasntes, "[$index]total")->textInput(['value' => isset($datos[$index]['total']) ? $datos[$index]['total'] : '']) ?>  
        <div class=cell style='display:none'>
            <?= $form->field($estudiasntes, "[$index]id_proyecto")->textInput(["value" => $index+1]) ?>
        </div> 
    </div>
