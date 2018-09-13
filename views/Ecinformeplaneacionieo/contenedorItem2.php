<?php
/* @var $this yii\web\View */
/* @var $model app\models\Ieo */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

// use yii\bootstrap\Collapse;
use nex\chosen\Chosen;

use app\models\Personas;
use app\models\EcEstrategias;
use app\models\EcProductos;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\db\Query;


$estrategias = new EcEstrategias();

if($index == 3){
$index2 = $index -2;
$productos = EcProductos::find()->where( 'estado=true' )->andWhere('id_proyecto='.$index2)->all();
}
else
{
    $productos = EcProductos::find()->where( 'estado=true' )->andWhere('id_proyecto='.($index+1))->all();
}
?>


<div class="container-fluid">
   <?php
        if(true){
        ?>    
            
            <div class="ieo-form">

                <?php $form = ActiveForm::begin(); ?>
                <?php 
                    foreach( $productos as $keyProducto => $producto ){?>
                    <?= "Año ".$producto->anio ?>
                    <?= $form->field($estrategias, 'descripcion')->textInput()
                    ->label($producto->descripcion)?>
                <?php }?>
                    
                <?php ActiveForm::end(); ?>

            </div>
            
        <?php
        }
        ?>
</div>