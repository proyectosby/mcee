<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cobertura */
/* @var $form yii\widgets\ActiveForm */
//$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
$this->registerJsFile("https://unpkg.com/sweetalert/dist/sweetalert.min.js");
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/documentos.js',['depends' => [\yii\web\JqueryAsset::className()]]);

//var_dump($dataProvider);



if( isset($_GET['guardado']) && $_GET['guardado'] == 1 ){    
    echo Html::hiddenInput( 'guardado', '1' );
}

?>

<div class="cobertura-form">
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


    <?php $form = ActiveForm::begin(); ?>

    <table>
	
        <thead>
            
            <tr>
                <th rowspan='3' colspan='1'>Categorías</th>
                <th rowspan='3' colspan='1'>Sub-Categoría</th>
                <th rowspan='3' colspan='1'>Temas</th>
                <th rowspan='1' colspan='6'>CANTIDAD</th>
            </tr>
            
            <tr>
                <th rowspan='1' colspan='2'>INSTITUCIÓN EDUCATIVA LA PAZ-SAAVEDRA GALINDO</th>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <th rowspan='1' colspan='2'><?= $sede ?></th>
                        <?php
                    }
                ?>
            </tr>
            
            <tr>
                <th>Niños</th>
                <th>Niñas</th>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <th>Niños</th>
                            <th>Niñas</th>
                        <?php
                    }
                ?>
            </tr>
            
        </thead>
        
        <tbody>
        

            <!-- 1 -->
            <tr>
                <td rowspan='35' colspan='1'>Cobertura Matriculo(Acceso)</td>
                <td rowspan='24' colspan='1'>1.Matricula: # de Estudiantes</td>
                <td rowspan='1' colspan='1'>0</td>
                <td rowspan='1' colspan='1'><?= $form->field($model, '[0]cantidad_niños_institucion')->textInput([ 'value' => $niñosInstitucion[1] ]) ?></td>
                <td rowspan='1' colspan='1'><?= $form->field($model, '[0]cantidad_niñas_institucion')->textInput([ 'value' => $niñasInstitucion[1] ]) ?></td>
                <?php
                    $i = 0;
                    foreach($sedes as $key => $sede){
                       
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[0]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[1]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[0]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[1]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[0]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                               
                            </div>
                        <?php
                        $i++;
                    }
                ?>
            </tr>
             
            <!-- 2 -->	
            <tr>				
                <td rowspan='1' colspan='1'>1</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[1]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[2]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[1]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[2]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[1]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[2]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[1]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[2]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[1]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                               
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 3 -->	
            <tr>				
                <td rowspan='1' colspan='1'>2</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[2]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[3]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[2]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[3]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[2]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[3]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[2]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[3]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[2]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 4 -->	
            <tr>				
                <td rowspan='1' colspan='1'>3</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[3]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[4]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[3]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[4]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[3]cantidad_niños_sede', [ 'class' => 'form-control','value' => $niñosSede[4]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[3]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[4]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[3]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 5 -->	
            <tr>				
                <td rowspan='1' colspan='1'>4</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[4]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[5]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[4]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[5]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[4]cantidad_niños_sede', [ 'class' => 'form-control','value' => $niñosSede[5]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[4]cantidad_niñas_sede', [ 'class' => 'form-control','value' => $niñasSede[5]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[4]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 6 -->	
            <tr>				
                <td rowspan='1' colspan='1'>5</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[5]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[6]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[5]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[6]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[5]cantidad_niños_sede', [ 'class' => 'form-control','value' => $niñasSede[6]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[5]cantidad_niñas_sede', [ 'class' => 'form-control','value' => $niñasSede[6]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[5]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 7 -->	
            <tr>				
                <td rowspan='1' colspan='1'>6</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[6]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[7]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[6]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[7]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[6]cantidad_niños_sede', [ 'class' => 'form-control','value' => $niñosSede[7]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[6]cantidad_niñas_sede', [ 'class' => 'form-control','value' => $niñasSede[7]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[6]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 8 -->	
            <tr>				
                <td rowspan='1' colspan='1'>7</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[7]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[8]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[7]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[8]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[7]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[8]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[7]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[8]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[7]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 9 -->	
            <tr>				
                <td rowspan='1' colspan='1'>8</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[8]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[9]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[8]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[9]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[8]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[9]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[8]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[9]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[8]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                               
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 10 -->	
            <tr>				
                <td rowspan='1' colspan='1'>9</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[9]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[10]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[9]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[10]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[9]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[10]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[9]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[10]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[9]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 11 -->	
            <tr>				
                <td rowspan='1' colspan='1'>10</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[10]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[11]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[10]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[11]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[10]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[11]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[10]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[11]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[10]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                               
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 12 -->	
            <tr>				
                <td rowspan='1' colspan='1'>11</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[12]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[12]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[12]cantidad_niñas_institucion', [ 'class' => 'form-control','value' => $niñasInstitucion[12]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[12]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[12]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[12]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[12]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[12]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                               
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 13 -->	
            <tr>				
                <td rowspan='1' colspan='1'>12</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[13]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[13]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[13]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[13]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[13]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[13]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[13]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[13]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[13]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 14 -->	
            <tr>				
                <td rowspan='1' colspan='1'>13</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[14]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[14]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[14]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[14]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[14]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[14]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[14]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[14]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[14]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                               
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 15 -->	
            <tr>				
                <td rowspan='1' colspan='1'>Programas de foramci&oacute;n</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[15]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[15]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[15]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[15]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[15]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[15]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[15]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[15]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[15]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 16 -->	
            <tr>				
                <td rowspan='1' colspan='1'>Modelos flexibles</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[16]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[16]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[16]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[16]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[16]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[16]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[16]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñosSede[16]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[16]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 17 -->	
            <tr>				
                <td rowspan='1' colspan='1'>Escuela nueva</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[17]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[17]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[17]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[17]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[17]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[17]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[17]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[17]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[17]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 18 -->	
            <tr>				
                <td rowspan='1' colspan='1'>Aceleraci&oacute;n del aprendizaje</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[18]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[18]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[18]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[18]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[18]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[18]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[18]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[18]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[18]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 19 -->	
            <tr>				
                <td rowspan='1' colspan='1'>Posprimaria</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[19]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[19]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[19]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[19]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[19]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[19]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[19]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[19]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[19]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 20 -->	
            <tr>				
                <td rowspan='1' colspan='1'>Telesecundaria</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[20]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[20]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[20]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[20]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[20]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[20]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[20]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[20]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[20]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 21 -->	
            <tr>				
                <td rowspan='1' colspan='1'>Cafam</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[21]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[21]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[21]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[21]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[21]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[21]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[21]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[21]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[21]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 22 -->	
            <tr>				
                <td rowspan='1' colspan='1'>MEMA</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[22]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[22]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[22]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[22]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[22]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[22]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[22]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[22]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[22]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 23 -->	
            <tr>				
                <td rowspan='1' colspan='1'>SER</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[23]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[23]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[23]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[23]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[23]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[23]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[23]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[23]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[23]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                               
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 24 -->	
            <tr>				
                <td rowspan='1' colspan='1'>SAT</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[24]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[24]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[24]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[24]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[24]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[24]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[24]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[24]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[24]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 25 -->	
            <tr>				
                <td rowspan='7' colspan='1'>1.1 Poblaciones: # de Estudiantes</td>
                <td rowspan='1' colspan='1'>Desmovilizados</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[25]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[25]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[25]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[25]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[25]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[25]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[25]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[25]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[25]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 26 -->	
            <tr>
                <td rowspan='1' colspan='1'>Desvinculados</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[26]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[26]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[26]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[26]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[26]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[26]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[26]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[26]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[26]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                               
                            </div>
                        <?php
                    }
                ?>
            </tr>
                
            <!-- 27 -->	
            <tr>
                <td rowspan='1' colspan='1'>Hijos de desmovilizados</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[27]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[27]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[27]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[27]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[27]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[27]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[27]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[27]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[27]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
                
            <!-- 28 -->	
            <tr>
                <td rowspan='1' colspan='1'>Hijos de desplazados</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[28]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[28]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[28]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[28]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[28]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[28]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[28]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[28]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[27]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
                
            <!-- 29 -->	
            <tr>
                <td rowspan='1' colspan='1'>Afrodescendientes</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[29]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[29]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[29]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[29]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[29]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[29]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[29]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[29]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[29]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
                
            <!-- 30 -->	
            <tr>
                <td rowspan='1' colspan='1'>Etnias</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[30]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[30]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[30]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[30]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[30]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[30]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[30]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[30]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[30]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
                
            <!-- 31 -->	
            <tr>
                <td rowspan='1' colspan='1'>NEE</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[30]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[31]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[30]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[31]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[30]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[31]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[30]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[31]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[30]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                            </div>
                        <?php
                    }
                ?>
            </tr>
                
            <!-- 32 -->	
            <tr>
                <td rowspan='4' colspan='1'>2. Eficiencia interna: tasas</td>
                <td rowspan='1' colspan='1'>Aprobaci&oacute;n</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[31]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[32]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[31]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[32]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[31]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[32]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[31]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[32]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[31]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 33 -->	
            <tr>
                <td rowspan='1' colspan='1'>Deserci&oacute;n</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[32]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[33]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[32]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[33]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[32]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[33]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[32]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[33]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[32]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                            
                            </div>
                        <?php
                    }
                ?>
            </tr>
                
            <!-- 34 -->	
            <tr>
                <td rowspan='1' colspan='1'>Promoci&oacute;n</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[33]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[34]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[33]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[34]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[33]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[34]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[33]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[34]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[33]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
                
            <!-- 35 -->	
            <tr>
                <td rowspan='1' colspan='1'>Reprobaci&oacute;n</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[34]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[35]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[34]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[35]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[34]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[35]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[34]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[35]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[34]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
            
            <!-- 36 -->	
            <tr>
                <td rowspan='4' colspan='1'>Permanencia</td>
                <td rowspan='4' colspan='1'>3. Servicios Complementarios: Porcentaje de estudiantes beneficiados</td>
                <td rowspan='1' colspan='1'>Transporte</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[35]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[36]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[35]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[36]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[35]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[36]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[35]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[36]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[35]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
                
            <!-- 37 -->	
            <tr>
                <td rowspan='1' colspan='1'>Alimentaci&oacute;n</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[36]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[37]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[36]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[37]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[36]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[37]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[36]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[37]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[36]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
                
            <!-- 38 -->	
            <tr>
                <td rowspan='1' colspan='1'>Uniformes</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[37]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[38]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[37]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[38]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[37]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[38]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[37]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[38]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[37]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
            </tr>
                
            <!-- 39 -->	
            <tr>
                <td rowspan='1' colspan='1'>Otros</td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[38]cantidad_niños_institucion', [ 'class' => 'form-control', 'value' => $niñosInstitucion[38]] ) ?></td>
                <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[38]cantidad_niñas_institucion', [ 'class' => 'form-control', 'value' => $niñasInstitucion[38]] ) ?></td>
                <?php
                    foreach($sedes as $key => $sede){
                        ?>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[38]cantidad_niños_sede', [ 'class' => 'form-control', 'value' => $niñosSede[38]] ) ?></td>
                            <td rowspan='1' colspan='1'><?=  Html::activeTextInput($model, '[38]cantidad_niñas_sede', [ 'class' => 'form-control', 'value' => $niñasSede[38]] ) ?></td>
                            <div class=cell style='display:none'>
                                <?= $form->field($model, '[38]sede_id')->hiddenInput( [ 'value' => $key ] )->label( '' ) ?>
                                
                            </div>
                        <?php
                    }
                ?>
                 
            </tr>
            <tr>				
                 <td rowspan='1' colspan='9'><?=  Html::activeTextInput($model, '[0]observaciones', [ 'class' => 'form-control', 'value' => $observaciones[1]] ) ?></td>
            </tr>    
            
            <tfoot>
               
            </tfoot>
            
        </tbody>
    </table>
   

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

