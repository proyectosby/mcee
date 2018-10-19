<?php
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */


use app\models\EcAvances;
use yii\widgets\ActiveForm;


$avances = new EcAvances();
?>


<div class="container-fluid">
   <?php
        if(true){
        ?>    
            
            <div class="ieo-form">

                <?php $form = ActiveForm::begin(); ?>
                     
                    <div class=cell>
                        <?= $form->field($model, 'descripcion')->dropDownList(      $instituciones    = ArrayHelper::map( $productos, 'id', 'descripcion' ), [ 'prompt' => 'Seleccione el Producto'] ) ?>
                    </div>

                    <div class=cell>
                        <label for="exampleFormControlSelect1">Seleccione el año</label>
                            <select class="form-control">
                              <option>2018</option>
                              <option>2019</option>
                            </select>
                    </div>
                    <div class=cell>
                    <?= $form->field($respuestas, 'respuesta')->label('Archivo')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
                    </div>
                    <?= $form->field($model, 'descripcion')->textarea(['rows' => '6', 'placeholder' => 'Ingrese la descripcion del archivo']) ?>

                <?php ActiveForm::end(); ?>

            </div>
            
        <?php
        }
        ?>
</div>