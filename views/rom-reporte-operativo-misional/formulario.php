<?php
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\models\RomActividadesRom;

// echo "<pre>"; print_r($datos); echo "</pre>"; 
// die;
$actividades_rom = new RomActividadesRom();


?>
 <?php 
	// $actividades_rom->fecha_hasta = $datos['actividades'][$idActividad]['fecha_hasta'] ;
	echo $form->field($actividades_rom, "[$]fecha_hasta")->widget(
        DatePicker::className(), [
            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format'    => 'yyyy-mm-dd',
        ],
    ]);  ?> 

    <h3 style='background-color: #ccc;padding:5px;'>Estado de la actividad</h3>
    <?= $form->field($actividades_rom, "[$idActividad]estado")->dropDownList($estados,[ 'prompt' => 'Seleccione...','value' => $datos['actividades'][$idActividad]['estado']] ) ?>
    
    <h3 style='background-color: #ccc;padding:5px;'>Equipo o equipos que hicieron la intervención</h3>
    <?= $form->field($actividades_rom, "[$idActividad]num_equipos")->textInput(['value' => $datos['actividades'][$idActividad]['num_equipos']]) ?>
    <?= $form->field($actividades_rom, "[$idActividad]perfiles")->textInput(['value' => $datos['actividades'][$idActividad]['perfiles']]) ?>

    <?= $form->field($actividades_rom, "[$idActividad]docente_orientador")->textInput(['value' => $datos['actividades'][$idActividad]['docente_orientador']]) ?>
    <?= $form->field($actividades_rom, "[$idActividad]nombre_actividad")->textInput(['value' => $datos['actividades'][$idActividad]['nombre_actividad']]) ?>
