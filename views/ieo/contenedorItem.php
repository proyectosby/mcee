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


use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\db\Query;



?>


<div class="container-fluid">
   <?php
        if(true){
        ?>    
            
            <div class="ieo-form">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'persona_id')->textInput() ?>

                <?= $form->field($model, 'institucion_id')->textInput() ?>

                <?= $form->field($model, 'sede_id')->textInput() ?>

                <?= $form->field($model, 'proyecto_id')->textInput() ?>

                <?= $form->field($model, 'estado')->textInput() ?>

                <?php ActiveForm::end(); ?>

            </div>
            
        <?php
        }
        ?>
</div>