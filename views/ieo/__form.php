<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
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

                     <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse2-3">Actividad 1.Mesa de trabajo para la presentación de resultados de la caracterización y mapeo (puntos de partida y llegada)</a>
                            </h4>
                            </div>
                            <div id="collapse2-3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <h3 style='background-color: #ccc;padding:5px;'>Tipo y cantidad de población</h3>
                                <?= $form->field($tiposCantidadPoblacion, '[0]tiempo_libre')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[0]edu_derechos')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[0]sexualidad')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[0]ciudadania')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[0]medio_ambiente')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[0]familia')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[0]directivos')->textInput() ?>
                                <?= $form->field($documentosReconocimiento, '[0]fecha_creacion')->widget(
                                DatePicker::className(), [
                                    // modify template for custom rendering
                                    'template' => '{addon}{input}',
                                    'language' => 'es',
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' 	=> 'yyyy-mm-dd',
                                    ],
                                ]);  ?>
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

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse2-3">Actividad 1.Mesa de trabajo para la presentación de resultados de la caracterización y mapeo (puntos de partida y llegada)</a>
                            </h4>
                            </div>
                            <div id="collapse2-3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <h3 style='background-color: #ccc;padding:5px;'>Tipo y cantidad de población</h3>
                                <?= $form->field($tiposCantidadPoblacion, '[1]tiempo_libre')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[1]edu_derechos')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[1]sexualidad')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[1]ciudadania')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[1]medio_ambiente')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[1]familia')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[1]directivos')->textInput() ?>
                                <?= $form->field($documentosReconocimiento, '[1]fecha_creacion')->widget(
                                DatePicker::className(), [
                                    // modify template for custom rendering
                                    'template' => '{addon}{input}',
                                    'language' => 'es',
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' 	=> 'yyyy-mm-dd',
                                    ],
                                ]);  ?>
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


                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse2-3">Actividad 1.Mesa de trabajo para la presentación de resultados de la caracterización y mapeo (puntos de partida y llegada)</a>
                            </h4>
                            </div>
                            <div id="collapse2-3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <h3 style='background-color: #ccc;padding:5px;'>Tipo y cantidad de población</h3>
                                <?= $form->field($tiposCantidadPoblacion, '[2]tiempo_libre')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[2]edu_derechos')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[2]sexualidad')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[2]ciudadania')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[2]medio_ambiente')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[2]familia')->textInput() ?>
                                <?= $form->field($tiposCantidadPoblacion, '[2]directivos')->textInput() ?>
                                <?= $form->field($documentosReconocimiento, '[2]fecha_creacion')->widget(
                                DatePicker::className(), [
                                    // modify template for custom rendering
                                    'template' => '{addon}{input}',
                                    'language' => 'es',
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' 	=> 'yyyy-mm-dd',
                                    ],
                                ]);  ?>
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
