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
            <?= $form->field($actividade_cbac, "[$index]id_actividad")->textInput(["value" => $index]) ?>
        </div>
    <?php
    }else if($index >= 3 && $index <= 7){ ?>
        <div style ="display : none">
            
            <?= $form->field($actividade_cbac, "[$index]id_actividad")->textInput(["value" => $index]) ?>
        </div>
    <?php
    }
    else if($index > 7){ ?>
        <div style ="display : none">
            <?= $form->field($actividade_cbac, "[$index]id_actividad")->textInput(["value" => $index]) ?>
        </div>
    <?php
    }

    if($index == 1){ ?>
        <h3 style='background-color: #ccc;padding:5px;'>Actividad 1. Aplicar en campo la propuesta didáctica en arte y cultura con docentes y directivos docentes </h3>
        <?= $form->field($actividade_cbac, "[$index]nombre")->hiddenInput(['value'=> "Actividad 1. Aplicar en campo la propuesta didáctica en arte y cultura con docentes y directivos docentes "])->label(false); ?>
    <?php
    }
    if($index == 2){ ?>
        <h3 style='background-color: #ccc;padding:5px;'>Actividad 2. Realizar Seminario sobre arte y cultura para fortalecer competencias básicas en las instituciones educativas.</h3>
        <?= $form->field($actividade_cbac, "[$index]nombre")->hiddenInput(['value'=> "Actividad 2. Realizar Seminario sobre arte y cultura para fortalecer competencias básicas en las instituciones educativas."])->label(false); ?>
    <?php
    }
    if($index == 3){ ?>
        <h3 style='background-color: #ccc;padding:5px;'>Actividad 3:  Aplicar en campo la propuesta didáctica en arte y cultura con estudiantes.</h3>
        <?= $form->field($actividade_cbac, "[$index]nombre")->hiddenInput(['value'=> "Actividad 3:  Aplicar en campo la propuesta didáctica en arte y cultura con estudiantes."])->label(false); ?>
    <?php
    }
    if($index == 4){ ?>
        <h3 style='background-color: #ccc;padding:5px;'>Actividad 4. Realizar difusión y promoción de las jornadas didácticas de competencias en las instituciones educativas oficiales.</h3>
        <?= $form->field($actividade_cbac, "[$index]nombre")->hiddenInput(['value'=> "Actividad 4. Realizar difusión y promoción de las jornadas didácticas de competencias en las instituciones educativas oficiales."])->label(false); ?>
    <?php
    }
    if($index == 5){ ?>
        <h3 style='background-color: #ccc;padding:5px;'>Actividad No. 5: Realizar proyectos extra clase mediante clubes de fortalecimiento de competencias.</h3>
        <?= $form->field($actividade_cbac, "[$index]nombre")->hiddenInput(['value'=> "Actividad No. 5: Realizar proyectos extra clase mediante clubes de fortalecimiento de competencias."])->label(false); ?>
    <?php
    }
    if($index == 6){ ?>
        <h3 style='background-color: #ccc;padding:5px;'>Actividad No. 6: Realizar estrategia de promoción de la consulta sobre arte, cultura, promoción de lectura y escritura para fortalecimiento de competencias básicas.</h3>
        <?= $form->field($actividade_cbac, "[$index]nombre")->hiddenInput(['value'=> "Actividad No. 6: Realizar estrategia de promoción de la consulta sobre arte, cultura, promoción de lectura y escritura para fortalecimiento de competencias básicas."])->label(false); ?>
    <?php
    }
    if($index == 7){ ?>
        <h3 style='background-color: #ccc;padding:5px;'>Actividad 7. Realizar visitas pedagógicas que favorezcan el desarrollo de competencias básicas  y habilidades para la vida.</h3>
        <?= $form->field($actividade_cbac, "[$index]nombre")->hiddenInput(['value'=> "Actividad 7. Realizar visitas pedagógicas que favorezcan el desarrollo de competencias básicas  y habilidades para la vida."])->label(false); ?>
    <?php
    }
    if($index == 8){ ?>
        <h3 style='background-color: #ccc;padding:5px;'>Actividad 8. Realizar talleres de promoción de lectura, escritura y oralidad a familias. </h3>
        <?= $form->field($actividade_cbac, "[$index]nombre")->hiddenInput(['value'=> "Actividad 8. Realizar talleres de promoción de lectura, escritura y oralidad a familias."])->label(false); ?>
    <?php
    }
    if($index == 9){ ?>
        <h3 style='background-color: #ccc;padding:5px;'>Actividad 9. Apoyar el desarrollo de los proyectos institucionales.</h3>
        <?= $form->field($actividade_cbac, "[$index]nombre")->hiddenInput(['value'=> "Actividad 9. Apoyar el desarrollo de los proyectos institucionales."])->label(false); ?>
    <?php
    }
    if($index == 10){ ?>
        <h3 style='background-color: #ccc;padding:5px;'>Actividad 10. Divulgar las experiencias de vínculo de las familias a la escuela. </h3>
        <?= $form->field($actividade_cbac, "[$index]nombre")->hiddenInput(['value'=> "Actividad 10. Divulgar las experiencias de vínculo de las familias a la escuela."])->label(false); ?>
    <?php
    }
    if($index == 11){ ?>
        <h3 style='background-color: #ccc;padding:5px;'>Actividad 11. Realizar seguimiento y evaluación de las acciones desarrolladas con las familias de las instituciones educativas.</h3>
        <?= $form->field($actividade_cbac, "[$index]nombre")->hiddenInput(['value'=> "Actividad 11. Realizar seguimiento y evaluación de las acciones desarrolladas con las familias de las instituciones educativas."])->label(false); ?>
    <?php
    }
?>
    <?= $form->field($actividade_cbac, "[$index]avance_sede")->textInput() ?>
    <?= $form->field($actividade_cbac, "[$index]avance_ieo")->textInput() ?>
    <?= $form->field($actividade_cbac, "[$index]sesiones_realizadas")->textInput() ?>
    <?= $form->field($actividade_cbac, "[$index]sesiones_canceladas")->textInput() ?>
    

    <h2 style='background-color: #ccc;padding:5px;'>Tipo y cantidad de población</h2>
    <h3 style='background-color: #ccc;padding:5px;'>Número de participantes por filiación por sede educativa en la actividad</h3>
    
    <?php
        if($index <= 2){
    ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]ciencias_naturales")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]ciencias_sociales")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]educacion_artisticas")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]educacion_etica")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]educacion_fisica")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]educacion_religiosa")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]estadistica")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]humanidasdes")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]idiomas_extranjeros")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]lengua_castellana")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]matematicas")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]tecnologia")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]otras")->textInput() ?>

    <?= $form->field($tipo_poblacion_cbac, "[$index]numero_participantes")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]rectora")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]coordinadora")->textInput() ?>
    <?= $form->field($tipo_poblacion_cbac, "[$index]directivos")->textInput() ?>
    <?php
        }else if($index > 2 && $index <= 7)
            { ?>
                <table>
                  <tr>
                    <th>grado_6</th>
                    <th>grado_7</th>
                    <th>grado_8</th>
                    <th>grado_9</th>
                    <th>grado_10</th>
                    <th>grado_11</th>

                  </tr>
                  <tr>
                    <td><?= $form->field($tipo_poblacion_cbac, "[$index]grado_6")->textInput() ?></td>
                    <td><?= $form->field($tipo_poblacion_cbac, "[$index]grado_7")->textInput() ?></td>
                    <td><?= $form->field($tipo_poblacion_cbac, "[$index]grado_8")->textInput() ?></td>
                    <td><?= $form->field($tipo_poblacion_cbac, "[$index]grado_9")->textInput() ?></td>
                    <td><?= $form->field($tipo_poblacion_cbac, "[$index]grado_10")->textInput() ?></td>
                    <td><?= $form->field($tipo_poblacion_cbac, "[$index]grado_11")->textInput() ?></td>
                  </tr>
                </table>
                <?= $form->field($tipo_poblacion_cbac, "[$index]numero_participantes")->textInput() ?>
            <?php
        }else if($index > 7){
            ?>
                <?= $form->field($tipo_poblacion_cbac, "[$index]cuidadores")->textInput() ?>
                <?= $form->field($tipo_poblacion_cbac, "[$index]madres")->textInput() ?>
                <?= $form->field($tipo_poblacion_cbac, "[$index]padres")->textInput() ?>
                <?= $form->field($tipo_poblacion_cbac, "[$index]hermanos")->textInput() ?>
                <?= $form->field($tipo_poblacion_cbac, "[$index]otros_parientes")->textInput() ?>
                <?= $form->field($tipo_poblacion_cbac, "[$index]numero_participantes")->textInput() ?>
            <?php
        }
    ?>


    <h3 style='background-color: #ccc;padding:5px;'>Evidencias (Cantidad  de evidencias que resultaron de la actividad, tales  como fotografías, videos, actas, trabajos de los participantes, etc )</h3>
    <?= $form->field($evidencias_cbac, "[$index]actas")->label('ACTAS (Cantidad)')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
    <?= $form->field($evidencias_cbac, "[$index]reportes")->label('REPORTES  (Cantidad)')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
    <?= $form->field($evidencias_cbac, "[$index]listados")->label('LISTADOS  (Cantidad)')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
    <?= $form->field($evidencias_cbac, "[$index]plan_trabajo")->label('PLAN DE TRABAJO (Cantidad)')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
    <?= $form->field($evidencias_cbac, "[$index]formato_seguimiento")->label('FORMATOS DE SEGUIMIENTO (Cantidad)')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
    <?= $form->field($evidencias_cbac, "[$index]formato_evaluacion")->label('FORMATOS DE EVALUACIÓN (Cantidad)')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
    <?= $form->field($evidencias_cbac, "[$index]fotografias")->label('FOTOGRAFÍAS (Cantidad)')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
    <?= $form->field($evidencias_cbac, "[$index]vidoes")->label('VIDEOS (Cantidad)')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
    <?= $form->field($evidencias_cbac, "[$index]otros_productos")->label('Otros productos  de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
    


