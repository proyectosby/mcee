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
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**********
Versión: 001
Fecha: 10-04-2018
Edwin Molina Grisales
COBERTURA
---------------------------------------
**********/

?>

<form action="<?= Yii::$app()->createUrl("cobertura/create"); ?>" method="POST">
	<input type="text" id="name" value="dsada">
</form>



