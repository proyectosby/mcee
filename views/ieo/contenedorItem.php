<?php
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
?>


<div class="container-fluid">
   <?php
        if($index == 0){
        ?>    
            
            <div class="ieo-form">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($documentosReconocimiento, 'informe_caracterizacion')->textInput() ?>
                <?= $form->field($documentosReconocimiento, 'matriz_caracterizacion')->textInput() ?>
                <?= $form->field($documentosReconocimiento, 'revision_pei')->textInput() ?>
                <?= $form->field($documentosReconocimiento, 'revision_autoevaluacion')->textInput() ?>
                <?= $form->field($documentosReconocimiento, 'revision_pmi')->textInput() ?>
                <?= $form->field($documentosReconocimiento, 'resultados_caracterizacion')->textInput() ?>
                <?= $form->field($documentosReconocimiento, 'horario_trabajo')->textInput() ?>
                <?= $form->field($documentosReconocimiento, 'tipo_actiividad')->textInput() ?>
                <?= $form->field($documentosReconocimiento, 'fecha_creacion')->widget(
                DatePicker::className(), [
                    // modify template for custom rendering
                    'template' => '{addon}{input}',
                    'language' => 'es',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' 	=> 'yyyy-mm-dd',
                    ],
                ]);  ?>

                
                <?php ActiveForm::end(); ?>

            </div>
            
        <?php
        }
        if($index == 1 || $index == 2 || $index == 3){
        ?>        
            <div class="ieo-form">

                <?php $form = ActiveForm::begin(); ?>
                <h3 style='background-color: #ccc;padding:5px;'>Tipo y cantidad de población</h3>
                <?= $form->field($tiposCantidadPoblacion, 'tiempo_libre')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'edu_derechos')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'sexualidad')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'ciudadania')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'medio_ambiente')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'familia')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'directivos')->textInput() ?>
                
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
                    <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                    <div class="col-sm-1" style='padding:0px;'>
                        <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                    <div class="col-sm-1" style='padding:0px;'>
                        <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                    <div class="col-sm-1" style='padding:0px;'>
                        <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                    <div class="col-sm-1" style='padding:0px;'>
                        <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                    <div class="col-sm-1" style='padding:0px;'>
                        <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                    <div class="col-sm-1" style='padding:0px;'>
                        <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                    <div class="col-sm-1" style='padding:0px;'>
                        <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                    <div class="col-sm-1" style='padding:0px;'>
                        <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                    <div class="col-sm-1" style='padding:0px;'>
                        <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                    <div class="col-sm-1" style='padding:0px;'>
                        <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                    <div class="col-sm-1" style='padding:0px;'>
                        <?=  Html::activeTextInput($tiposCantidadPoblacion, '[$index]tiempo_libre', [ 'class' => 'form-control'] ) ?>
                    </div>
                </div>
                <h3 style='background-color: #ccc;padding:5px;'>Evidencias</h3>
                <div class=cell>
                    <?= $form->field($evidencias, '[0]tipo_documento_id')->label('Producto: mapa puntos de partida y llegada')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                </div>
                <div class=cell>
                    <?= $form->field($evidencias, '[0]tipo_documento_id')->label('Resultados de la actividad')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                </div>
                <div class=cell>
                    <?= $form->field($evidencias, '[0]tipo_documento_id')->label('ACTA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                </div>
                <div class=cell>
                    <?= $form->field($evidencias, '[0]tipo_documento_id')->label('LISTADO')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                </div>
                <div class=cell>
                    <?= $form->field($evidencias, '[0]tipo_documento_id')->label('FOTOGRAFÍAS')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                </div>
                <?= $form->field($evidencias, 'observaciones')->textInput() ?>


                <?php ActiveForm::end(); ?>

            </div>

        <?php
        }if($index == 4){
            ?>    
                
                <div class="ieo-form">
    
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($producto, 'informe_ruta_cualificacion')->textInput() ?>
                    <?= $form->field($producto, 'presentacion_plan_accion_ieo')->textInput() ?>
                    
                    <?php ActiveForm::end(); ?>
    
                </div>
                
            <?php
            }
        ?>
</div>