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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad general. MCEE Encuentro-->
                        
                        <!--- Inicio Actividad 2. Mesa de trabajo-->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-3">Actividad 2. Mesa de trabajo</a>
                                </h4>
                                </div>
                                <div id="collapse1-3" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad 2. Mesa de trabajo-->

                        <!--- Inicio Actividad 3. Acompañamiento a la práctica-->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-4">Actividad 3. Acompañamiento a la práctica</a>
                                </h4>
                                </div>
                                <div id="collapse1-4" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad 3. Acompañamiento a la práctica-->

                        <!--- Inicio Actividad 4. Mesa de trabajo-->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-5">Actividad 4. Mesa de trabajo</a>
                                </h4>
                                </div>
                                <div id="collapse1-5" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad 4. Mesa de trabajo-->

                        <!--- Inicio Actividad 5. Acompañamiento a la práctica-->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-6">Actividad 5. Acompañamiento a la práctica</a>
                                </h4>
                                </div>
                                <div id="collapse1-6" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- FinaActividad 5. Acompañamiento a la práctica-->  

                        <!--- Inicio Actividad Especial. Taller-->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-7">Actividad Especial. Taller</a>
                                </h4>
                                </div>
                                <div id="collapse1-7" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad Especial. Taller-->                   
                        
                        <!--- Inicio Actividad Especial.  Salida pedagógica -->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-8">Actividad Especial.  Salida pedagógica </a>
                                </h4>
                                </div>
                                <div id="collapse1-8" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad Especial.  Salida pedagógica -->

                        <!--- Inicio Actividad 6. Mesa de Trabajo -->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-9">Actividad 6. Mesa de Trabajo </a>
                                </h4>
                                </div>
                                <div id="collapse1-9" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad 6. Mesa de Trabajo -->   
                        
                        <!--- Inicio Actividad 7. Acompañamiento a la Práctica -->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-10">Actividad 7. Acompañamiento a la Práctica </a>
                                </h4>
                                </div>
                                <div id="collapse1-10" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad 7. Acompañamiento a la Práctica -->

                        <!--- Inicio Actividad 8. Mesa de Trabajo -->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-11">Actividad 8. Mesa de Trabajo </a>
                                </h4>
                                </div>
                                <div id="collapse1-11" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad 8. Mesa de Trabajo -->

                        <!--- Inicio Actividad 9.  Acompañamiento a la Práctica -->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-12">Actividad 9.  Acompañamiento a la Práctica </a>
                                </h4>
                                </div>
                                <div id="collapse1-12" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad 9.  Acompañamiento a la Práctica -->

                        <!--- Inicio Actividad Especial. Taller -->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-13">Actividad Especial. Taller </a>
                                </h4>
                                </div>
                                <div id="collapse1-13" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad Especial. Taller -->

                        <!--- Inicio Actividad Especial.  Salida pedagógica -->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-14">Actividad Especial.  Salida pedagógica </a>
                                </h4>
                                </div>
                                <div id="collapse1-14" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad Especial.  Salida pedagógica -->

                        <!--- Inicio Actividad 10. Mesa de trabajo -->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-15">Actividad 10. Mesa de trabajo </a>
                                </h4>
                                </div>
                                <div id="collapse1-15" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad 10. Mesa de trabajo -->

                        <!--- Inicio Actividad general. MCEE Encuentro -->
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-15">Actividad general. MCEE Encuentro </a>
                                </h4>
                                </div>
                                <div id="collapse1-15" class="panel-collapse collapse">
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
                                        <?= $form->field($model, '[0]file_producto_ruta')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_resultados_actividad_ruta')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_acta_ruta')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_listado_ruta')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($model, '[0]file_fotografias_ruta')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <?= $form->field($model, '[0]observaciones')->textInput() ?> 
                                    
                                    <div class=cell style='display:none'>
                                        <?= $form->field($model, '[0]tipo_actividad')->hiddenInput( [ 'value' => 'asdsadasdsa' ] ) ?>
                                    </div> 
                                        
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--- Fina Actividad general. MCEE Encuentro -->

                        <!--- Inicio Producto-->
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1-16">Productos</a>
                                </h4>
                                </div>
                                <div id="collapse1-16" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class=cell>
                                        <?= $form->field($producto, '[0]informe_acompanamiento')->label('Informe de acompañamiento')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($producto, '[0]trazabilidad_plan_accion')->label('Trazabilidad al plan de acción')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($producto, '[0]formulacion')->label('Formulación y sistematización de la iniciativa')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($producto, '[0]ruta_gestion')->label('Ruta de gestión')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                        <?= $form->field($producto, '[0]resultados_procesos')->label('Presentación de los resultados del proceso')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                                    </div>
                                    <div class=cell>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!--- Fin Producto--> 

                    </div>
                </div>
                </div>
            </div>
        </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
