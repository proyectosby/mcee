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
    <?php $form = ActiveForm::begin(); ?>
    <h3 style='background-color: #ccc;padding:5px;'>Docentes</h3>
    <?= $form->field($docentes, 'tiempo_libre')->textInput() ?>  
    <?= $form->field($docentes, 'edu_derechos')->textInput() ?>  
    <?= $form->field($docentes, 'sexualidad_ciudadania')->textInput() ?>  
    <?= $form->field($docentes, 'medio_ambiente')->textInput() ?>  
    <?= $form->field($docentes, 'familia')->textInput() ?> 
    <?= $form->field($docentes, 'directivos')->textInput() ?>  
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
        <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
        <div class="col-sm-1" style='padding:0px;'>
            <?=  Html::activeTextInput($estudiasntes, '[$index]cantidad', [ 'class' => 'form-control'] ) ?>
        </div>
    </div>
   
    <?php ActiveForm::end(); ?>