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
use app\models\EcAvances;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\db\Query;


$avances = new EcAvances();
?>


<div class="container-fluid">
   <?php
        if(true){
        ?>    
            
            <div class="ieo-form">

                <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($avances, 'estado_actual')->textInput()
                    ->label('Estado Actual') ?>
                    <?= $form->field($avances, 'logros')->textInput()
                    ->label('Logros') ?>
                    <?= $form->field($avances, 'retos')->textInput()
                    ->label('Retos') ?>
                    <?= $form->field($avances, 'argumentos')->textInput()
                    ->label('Argumentos') ?>

                <?php ActiveForm::end(); ?>

            </div>
            
        <?php
        }
        ?>
</div>