<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\ImplementacionIeo */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="implementacion-ieo-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'zona_educativa')->textInput() ?>
        <?= $form->field($model, 'comuna')->textInput() ?>
        <?= $form->field($model, 'barrio')->textInput() ?>
        <?= $form->field($model, 'profesional_cargo')->textInput() ?>
        <?= $form->field($model, 'horario_trabajo')->textInput() ?>


        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">Acompañamiento a la ejecución de la ruta diseñada en el plan de acción</a>
                </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                        
                        <!--- Inicio actividad 1-->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-1">Actividad 1. Socialización de plan de acción</a>
                                </h4>
                                </div>
                                <div id="collapse1-1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <h3 style='background-color: #ccc;padding:5px;'>Tipo y cantidad de población</h3>
                                    <?= $form->field($tiposCantidadPoblacion, '[0]tiempo_libre')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[0]edu_derechos')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[0]sexualidad')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[0]ciudadania')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[0]medio_ambiente')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[0]familia')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[0]directivos')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[0]fecha_creacion')->widget(
                                    DatePicker::className(), [
                                        // modify template for custom rendering
                                        'template' => '{addon}{input}',
                                        'language' => 'es',
                                        'clientOptions' => [
                                            'autoclose' => true,
                                            'format' 	=> 'yyyy-mm-dd',
                                        ],
                                    ]);  ?>
                                    <div class=cell style='display:none'>
                                        <?= $form->field($tiposCantidadPoblacion, '[0]tipo_actividad')->hiddenInput( [ 'value' => '4' ] )->label( '' ) ?>
                                    </div>
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
                                        <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_0', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_1', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_2', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_3', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_4', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_5', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_6', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_7', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_8', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_9', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_10', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[0]grado_11', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                    </div>

                                    <h3 style='background-color: #ccc;padding:5px;'>Evidencias</h3>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]producto_acuerdo')->label('Producto: acta de acuerdos y compromisos')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>    
                                        <?= $form->field($model, '[0]resultado_actividad')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]acta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]listado')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]fotografias')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>  
                                      
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina actividad 1-->
                        

                        <!--- Inicio Actividad general. MCEE Encuentro-->  
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-2">Actividad general. MCEE Encuentro</a>
                                </h4>
                                </div>
                                <div id="collapse1-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <h3 style='background-color: #ccc;padding:5px;'>Tipo y cantidad de población</h3>
                                    <?= $form->field($tiposCantidadPoblacion, '[1]tiempo_libre')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[1]edu_derechos')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[1]sexualidad')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[1]ciudadania')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[1]medio_ambiente')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[1]familia')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[1]directivos')->textInput() ?>
                                    <?= $form->field($tiposCantidadPoblacion, '[1]fecha_creacion')->widget(
                                    DatePicker::className(), [
                                        // modify template for custom rendering
                                        'template' => '{addon}{input}',
                                        'language' => 'es',
                                        'clientOptions' => [
                                            'autoclose' => true,
                                            'format'    => 'yyyy-mm-dd',
                                        ],
                                    ]);  ?>
                                    <div class=cell style='display:none'>
                                        <?= $form->field($tiposCantidadPoblacion, '[1]tipo_actividad')->hiddenInput( [ 'value' => '5' ] )->label( '' ) ?>
                                    </div>
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
                                        <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_0', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_1', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_2', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_3', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_4', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_5', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_6', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_7', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_8', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_9', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_10', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                        <div class="col-sm-1" style='padding:0px;'>
                                            <?=  Html::activeTextInput($estudiantesGrado, '[1]grado_11', [ 'class' => 'form-control'] ) ?>
                                        </div>
                                    </div>

                                    <h3 style='background-color: #ccc;padding:5px;'>Evidencias</h3>
                                    <div class=cell>
                                        <?= $form->field($model, '[1]producto_acuerdo')->label('Producto: acta de acuerdos y compromisos')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>    
                                        <?= $form->field($model, '[1]resultado_actividad')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[1]acta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[1]listado')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[1]fotografias')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>  
                                      
                                </div>
                                </div>
                            </div>
                        </div>                
                        <!--- Fina Actividad general. MCEE Encuentro-->

                        

                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
