<?php
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\models\IsaActividadesRom;
use app\models\RomEvidenciasRom;
use app\models\IsaTipoCantidadPoblacionRom;

// echo "<pre>"; print_r($datos); echo "</pre>"; 
// die;
$actividades_rom = new IsaActividadesRom();
$evidencias_rom = new RomEvidenciasRom();
$tipo_poblacion_rom = new IsaTipoCantidadPoblacionRom();
 
?>


  <h2 style='background-color: #ccc;padding:5px;'>Tipo y cantidad de población</h2>
     <h3 style='background-color: #ccc;padding:5px;'>Número de participantes por actividad comunitaria por sede educativa (Se deben revisar los nombres y datos de  la lista de asistencia para no repetir personas): </h3>
     <?= $form->field($tipo_poblacion_rom, "[$idActividad]vecinos")->textInput(['value' => $datos['tipoCantidadPoblacion'][$idActividad]['vecinos'] ]) ?>
     <?= $form->field($tipo_poblacion_rom, "[$idActividad]lideres_comunitarios")->textInput(['value' => $datos['tipoCantidadPoblacion'][$idActividad]['lideres_comunitarios']]) ?>
     <?= $form->field($tipo_poblacion_rom, "[$idActividad]empresarios_comerciantes")->textInput(['value' => $datos['tipoCantidadPoblacion'][$idActividad]['empresarios_comerciantes']]) ?>
     <?= $form->field($tipo_poblacion_rom, "[$idActividad]organizaciones_locales")->textInput(['value' => $datos['tipoCantidadPoblacion'][$idActividad]['organizaciones_locales']]) ?>
     <?= $form->field($tipo_poblacion_rom, "[$idActividad]grupos_comunitarios")->textInput(['value' => $datos['tipoCantidadPoblacion'][$idActividad]['grupos_comunitarios']]) ?>
     <?= $form->field($tipo_poblacion_rom, "[$idActividad]otos_actores")->textInput(['value' => $datos['tipoCantidadPoblacion'][$idActividad]['otos_actores']]) ?>
     <?= $form->field($tipo_poblacion_rom, "[$idActividad]total_participantes")->textInput(['value' => $datos['tipoCantidadPoblacion'][$idActividad]['total_participantes']]) ?>
	 <?= $form->field($tipo_poblacion_rom, "[$idActividad]id_rom_actividades")->hiddenInput(['value' => $idActividad])->label(false) ?>