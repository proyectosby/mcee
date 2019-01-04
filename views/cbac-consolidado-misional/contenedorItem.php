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

?>

 <?= $form->field($actividadMisional, "[$index]estado")->textInput() ?>
 <?= $form->field($actividadMisional, "[$index]logros")->textInput() ?>
 <?= $form->field($actividadMisional, "[$index]fortalezas")->textInput() ?>
 <?= $form->field($actividadMisional, "[$index]debilidades")->textInput() ?>
 <?= $form->field($actividadMisional, "[$index]retos")->textInput() ?>
 <?= $form->field($actividadMisional, "[$index]alarmas")->textInput() ?>
