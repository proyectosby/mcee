<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="ieo-form">

    

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'persona_acargo')->textInput() ?>
        <?= $form->field($model, 'zona_educativa')->textInput() ?>
        <?= $form->field($model, 'comuna')->textInput() ?>
        <?= $form->field($model, 'barrio')->textInput() ?>  
        
        <!--- Inicio contenedor padre Proyectos Pedagógicos Transversales-->
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">Proyectos Pedagógicos Transversales</a>
                </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                            
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1-1">Requerimientos extras I.E.O</a>
                            </h4>
                            </div>
                            <div id="collapse1-1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class=cell>
                                    <?= $form->field($model, '[0]file_socializacion_ruta')->label('Socialización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[0]file_soporte_necesidad')->label('ANEXO SOPORTE DE NECESIDAD DE HACER SOCIALIZACIÓN SI APLICA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1-2">Reconocimiento previo y documentos a desarrollar por el profesional de apoyo</a>
                            </h4>
                            </div>
                            <div id="collapse1-2" class="panel-collapse collapse">
                            <div class="panel-body">

                                <div class=cell>
                                    <?= $form->field($model, '[0]file_informe_caracterizacion')->label('Informe Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[0]file_matriz_caracterizacion')->label('Matriz Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[0]file_revision_pei')->label('Revisión Pei')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[0]file_revision_autoevaluacion')->label('Revisión Autoevaluación')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[0]file_revision_pmi')->label('Revisión Pmi')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[0]file_resultados_caracterizacion')->label('Resultados Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[0]file_horario_trabajo')->label('Horario Trabajo')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>          

                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
        <!--- Fin contenedor padre Proyectos Pedagógicos Transversales-->

        <!--- Inicio contenedor padre Proyectos de Servicio Social Estudiantil-->
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse2">Proyectos de Servicio Social Estudiantil</a>
                </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                            
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse2-1">Requerimientos extras I.E.O</a>
                            </h4>
                            </div>
                            <div id="collapse2-1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class=cell>
                                    <?= $form->field($model, '[1]file_socializacion_ruta')->label('Socialización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[1]file_soporte_necesidad')->label('ANEXO SOPORTE DE NECESIDAD DE HACER SOCIALIZACIÓN SI APLICA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                            </div>
                            </div>
                        </div>
                    </div>

                     <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse2-2">Reconocimiento previo y documentos a desarrollar por el profesional de apoyo</a>
                            </h4>
                            </div>
                            <div id="collapse2-2" class="panel-collapse collapse">
                            <div class="panel-body">

                                <div class=cell>
                                    <?= $form->field($model, '[1]file_informe_caracterizacion')->label('Informe Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[1]file_matriz_caracterizacion')->label('Matriz Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[1]file_revision_pei')->label('Revisión Pei')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[1]file_revision_autoevaluacion')->label('Revisión Autoevaluación')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[1]file_revision_pmi')->label('Revisión Pmi')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[1]file_resultados_caracterizacion')->label('Resultados Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[1]file_horario_trabajo')->label('Horario Trabajo')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>          

                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
        <!--- Fin contenedor padre  Proyectos de Servicio Social Estudiantil-->

        <!--- Inicio contenedor padre Articulación Familiar-->
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse3">Articulación Familiar</a>
                </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                            
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse3-1">Requerimientos extras I.E.O</a>
                            </h4>
                            </div>
                            <div id="collapse3-1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class=cell>
                                    <?= $form->field($model, '[2]file_socializacion_ruta')->label('Socialización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[2]file_soporte_necesidad')->label('ANEXO SOPORTE DE NECESIDAD DE HACER SOCIALIZACIÓN SI APLICA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                            </div>
                            </div>
                        </div>
                    </div>

                     <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse3-2">Reconocimiento previo y documentos a desarrollar por el profesional de apoyo</a>
                            </h4>
                            </div>
                            <div id="collapse3-2" class="panel-collapse collapse">
                            <div class="panel-body">

                                <div class=cell>
                                    <?= $form->field($model, '[2]file_informe_caracterizacion')->label('Informe Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[2]file_matriz_caracterizacion')->label('Matriz Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[2]file_revision_pei')->label('Revisión Pei')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[2]file_revision_autoevaluacion')->label('Revisión Autoevaluación')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[2]file_revision_pmi')->label('Revisión Pmi')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[2]file_resultados_caracterizacion')->label('Resultados Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>
                                <div class=cell>
                                    <?= $form->field($model, '[2]file_horario_trabajo')->label('Horario Trabajo')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                </div>          

                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
        <!--- Fin contenedor padre Articulación Familiar-->

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>
        <!--- Fin contenedor padre Proyectos Proyectos de Servicio Social Estudiantil-->
 
    <?php ActiveForm::end(); ?>

</div>
