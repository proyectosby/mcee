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
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>


    
   <?php
         $form = ActiveForm::begin();
        if($index == 0){
        ?> 

            <div class=cell>
                <?= $form->field($requerimientoExtra, '[0]socializacion')->label('Socialización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
            </div>
            <div class=cell>
                <?= $form->field($requerimientoExtra, '[0]soporte_socializacion')->label('ANEXO SOPORTE DE NECESIDAD DE HACER SOCIALIZACIÓN SI APLICA')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
            </div>
            <div class=cell>

        <?php
        }
        
        if($index == 1){
        ?>    
            
                    <div class=cell>
                        <?= $form->field($documentosReconocimiento, '[0]informe_caracterizacion')->label('Informe Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                    </div>
                    <div class=cell>
                        <?= $form->field($documentosReconocimiento, '[0]matriz_caracterizacion')->label('Matriz Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                    </div>
                    <div class=cell>
                        <?= $form->field($documentosReconocimiento, '[0]revision_pei')->label('Revisión Pei')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                    </div>
                    <div class=cell>
                        <?= $form->field($documentosReconocimiento, '[0]revision_autoevaluacion')->label('Revisión Autoevaluación')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                    </div>
                    <div class=cell>
                        <?= $form->field($documentosReconocimiento, '[0]revision_pmi')->label('Revisión Pmi')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                    </div>
                    <div class=cell>
                        <?= $form->field($documentosReconocimiento, '[0]resultados_caracterizacion')->label('Resultados Caracterización')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                    </div>
                    <div class=cell>
                        <?= $form->field($documentosReconocimiento, '[0]horario_trabajo')->label('Horario Trabajo')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                    </div>               
                
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
            
        <?php
        }
        if($index == 2 || $index == 3 || $index == 4){
        ?>        
           
                <h3 style='background-color: #ccc;padding:5px;'>Tipo y cantidad de población</h3>
                <?= $form->field($tiposCantidadPoblacion, 'tiempo_libre')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'edu_derechos')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'sexualidad')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'ciudadania')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'medio_ambiente')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'familia')->textInput() ?>
                <?= $form->field($tiposCantidadPoblacion, 'directivos')->textInput() ?>
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

        <?php
        }if($index == 5){
            ?>    

                    <div class=cell>
                        <?= $form->field($evidencias, '[0]tipo_documento_id')->label('Informe Ruta Cualificación')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                    </div>
                    <div class=cell>
                        <?= $form->field($evidencias, '[0]tipo_documento_id')->label('Presentacion Plan Accion Ieo')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                    </div>                    
            <?php
            }
            ActiveForm::end();            
        ?>
    
