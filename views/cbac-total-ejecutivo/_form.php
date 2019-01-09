<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CbacTotalEjecutivo */
/* @var $form yii\widgets\ActiveForm */
//$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

$this->registerJsFile("https://unpkg.com/sweetalert/dist/sweetalert.min.js");
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/documentos.js',['depends' => [\yii\web\JqueryAsset::className()]]);

if( isset($guardado) && $guardado == 1 ){
	echo Html::hiddenInput( 'guardadoFormulario', '1' );
}

?>
<style>
    
    table {
		width:90%;
		border-top:1px solid #e5eff8;
		border-right:1px solid #e5eff8;
		margin:1em auto;
		border-collapse:collapse;
    }
	
    td {
		color:#678197;
		border: 1px solid #000;
		padding:.3em 1em;
		text-align:left;
    }
	
	thead > tr > th {
		text-align: center;
		background-color: #ccc;
		border: 1px solid #ddd;
	}
	
	tfoot > tr > td {
		font-weight: bold;
		text-align: left;
		background-color: #ddd;
		border: 1px solid #ddd;
	}

</style>


<div class="cbac-total-ejecutivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <table style="height: 360px;" width="812" id="tb">
        <thead>
            <tr>
                <th style="width: 74px;">OBJETIVO GENERAL</th>
                <th style="width: 74px;">OBJETIVOS ESPECÍFICOS</th>
                <th style="width: 75px;">ACTIVIDADES</th>
                <th style="width: 75px;">Porcentaje total de avance de los objetivos por sedes</th>
                <th style="width: 75px;">Porcentaje total de avance de los objetivos por IEO</th>
                <th style="width: 75px;">Porcentaje total de avance de las actividades por sedes</th>
                <th style="width: 75px;">Porcentaje de avance de las actividades por IEO</th>
                <th style="width: 75px;">Beneficiarios por Actividad</th>
                <th style="width: 75px;">Cantidad de sesiones realizadas por  actividad en las sedes de las IEO</th>
                <th style="width: 75px;">Cantidad de sesiones aplazadas por  actividad en las sedes de las IEO</th>
                <th style="width: 75px;">Cantidad de sesiones canceladas por actividad en las sedes de las IEO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 74px;" rowspan="11">293 Implementar estrategias artisticas y culturales que fortalezcan las competencias básicas de los estudiantes de grados sexto a once de las Instituciones Educativas Oficiales </td>
                <td style="width: 74px;" rowspan="2">293-1. Desarrollar herramientas en docentes y directivos docentes de las IEO que implementen componentes artísticos y culturales.</td>
                <td style="width: 75px;">Actividad 1: Aplicar en campo la propuesta didáctica en arte y cultura con docentes y directivos docentes</td>
                <td style="width: 75px;" rowspan="2"><?= $form->field($model, '[0]avance_objetivos_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[0]avance_ieo')->textInput([ 'value' => isset($avance_ieo[1]) ? $avance_ieo[1] : '' ]) ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[0]avance_actividad_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[0]avance_actividad_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[0]beneficiarios')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[0]sesiones_realizadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[0]sesiones_aplazadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[0]sesiones_canceladas_ieo')->textInput() ?></td>
            </tr>
            <tr>
                <td style="width: 75px;">Actividad 2. Realizar Seminario sobre arte y cultura para fortalecer competencias básicas en las instituciones educativas.</td>
                <td style="width: 75px;"><?= $form->field($model, '[1]avance_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[1]avance_actividad_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[1]avance_actividad_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[1]beneficiarios')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[1]sesiones_realizadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[1]sesiones_aplazadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[1]sesiones_canceladas_ieo')->textInput() ?></td>
            </tr>
            <tr>
                <td style="width: 74px;" rowspan="5">293-2. Fortalecer la oferta de programas culturales para estudiantes en el proceso formativo de competencias básicas dentro y fuera del aula.</td>
                <td style="width: 75px;">Actividad 3:  Aplicar en campo la propuesta didáctica en arte y cultura con estudiantes.</td>
                <td style="width: 75px;" rowspan="5"><?= $form->field($model, '[1]avance_objetivos_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[2]avance_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[2]avance_actividad_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[2]avance_actividad_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[2]beneficiarios')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[2]sesiones_realizadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[2]sesiones_aplazadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[2]sesiones_canceladas_ieo')->textInput() ?></td>
            </tr>
            <tr>
                <td style="width: 75px;">Actividad 4. Realizar difusión y promoción de las jornadas didácticas de competencias en las instituciones educativas oficiales.</td>
                <td style="width: 75px;"><?= $form->field($model, '[3]avance_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[3]avance_actividad_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[3]avance_actividad_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[3]beneficiarios')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[3]sesiones_realizadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[3]sesiones_aplazadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[3]sesiones_canceladas_ieo')->textInput() ?></td>
            </tr>
            <tr>
                <td style="width: 75px;">Actividad No. 5: Realizar proyectos extra clase mediante clubes de fortalecimiento de competencias.</td>
                <td style="width: 75px;"><?= $form->field($model, '[4]avance_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[4]avance_actividad_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[4]avance_actividad_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[4]beneficiarios')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[4]sesiones_realizadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[4]sesiones_aplazadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[4]sesiones_canceladas_ieo')->textInput() ?></td>
            </tr>
            <tr>
                <td style="width: 75px;">Actividad No. 6: Realizar estrategia de promoción de la consulta sobre arte, cultura, promoción de lectura y escritura para fortalecimiento de competencias básicas</td>
                <td style="width: 75px;"><?= $form->field($model, '[5]avance_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[5]avance_actividad_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[5]avance_actividad_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[5]beneficiarios')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[5]sesiones_realizadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[5]sesiones_aplazadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[5]sesiones_canceladas_ieo')->textInput() ?></td>
            </tr>
            <tr>
                <td style="width: 75px;">Actividad 7. Realizar visitas pedagógicas que favorezcan el desarrollo de competencias básicas  y habilidades para la vida.</td>
                <td style="width: 75px;"><?= $form->field($model, '[6]avance_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[6]avance_actividad_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[6]avance_actividad_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[6]beneficiarios')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[6]sesiones_realizadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[6]sesiones_aplazadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[6]sesiones_canceladas_ieo')->textInput() ?></td>
            </tr>
            <tr>
                <td style="width: 74px;" rowspan="4">293-3. Promover el acompañamiento de padres de familia desde el arte y la cultura en el proceso de fortalecimiento de competencias básicas de estudiantes de las IEO.</td>
                <td style="width: 75px;">Actividad 8. Realizar talleres de promoción de lectura, escritura y oralidad a familias. </td>
                <td style="width: 75px;" rowspan="4"><?= $form->field($model, '[2]avance_objetivos_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[7]avance_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[7]avance_actividad_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[7]avance_actividad_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[7]beneficiarios')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[7]sesiones_realizadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[7]sesiones_aplazadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[7]sesiones_canceladas_ieo')->textInput() ?></td>
            </tr>
            <tr>
                <td style="width: 75px;">Actividad 9. Apoyar el desarrollo de los proyectos institucionales.</td>
                <td style="width: 75px;"><?= $form->field($model, '[8]avance_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[8]avance_actividad_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[8]avance_actividad_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[8]beneficiarios')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[8]sesiones_realizadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[8]sesiones_aplazadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[8]sesiones_canceladas_ieo')->textInput() ?></td>
            </tr>
            <tr>
                <td style="width: 75px;">Actividad 10. Divulgar las experiencias de vínculo de las familias a la escuela. </td>
                <td style="width: 75px;"><?= $form->field($model, '[9]avance_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[9]avance_actividad_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[9]avance_actividad_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[9]beneficiarios')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[9]sesiones_realizadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[9]sesiones_aplazadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[9]sesiones_canceladas_ieo')->textInput() ?></td>
            </tr>
            <tr>
                <td style="width: 75px;">Actividad 11. Realizar seguimiento y evaluación de las acciones desarrolladas con las familias de las instituciones educativas.</td>
                <td style="width: 75px;"><?= $form->field($model, '[10]avance_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[10]avance_actividad_sede')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[10]avance_actividad_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[10]beneficiarios')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[10]sesiones_realizadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[10]sesiones_aplazadas_ieo')->textInput() ?></td>
                <td style="width: 75px;"><?= $form->field($model, '[10]sesiones_canceladas_ieo')->textInput() ?></td>
            </tr>
        </tbody>
    </table>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
