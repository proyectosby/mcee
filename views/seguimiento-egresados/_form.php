<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SeguimientoEgresados */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>

<div class="seguimiento-egresados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estrategia_seguimiento')->dropDownList( ["Seleccione...","Encuestas", "Reuniones anuales", "Consulta telefónica", "Redes sociales", "Participación de los egresados en actividades de la IEO"] ) ?>

    <?= $form->field($model, 'cantidad_promociones')->textInput() ?>

    <?= $form->field($model, 'cantidad_alumnos_egresados')->textInput() ?>

    <?= $form->field($model, 'cantidad_egresados_estudiso')->dropDownList($parametros) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
