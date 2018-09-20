<?php

/**********
Versión: 001
Fecha: 2018-08-28
Desarrollador: Edwin Molina Grisales
Descripción: Formulario SEMILLEROS DATOS IEO
---------------------------------------
Modificaciones:
Fecha: 2018-09-19
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se cambia los campo input de cada sección por textarea, y se le agrega el plugin XEditable, para poderlos editar
---------------------------------------
**********/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->registerJsFile(
    '@web/js/semillerosDatosIEO.js',
    [
		'depends' => [
						\yii\web\JqueryAsset::className(),
						\dosamigos\editable\EditableBootstrapAsset::className(),
					]
	]
);

/* @var $this yii\web\View */
/* @var $model app\models\SemillerosDatosIeo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="semilleros-datos-ieo-form">

	<h3 style='background-color: #ccc;padding:5px;'>DATOS IEO</h3>
	
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_institucion')->dropDownList([ $institucion->codigo_dane => $institucion->codigo_dane ])->label( 'Código DANE' ) ?>
    
	<?= $form->field($model, 'id_institucion')->dropDownList([ $institucion->id => $institucion->descripcion ]) ?>

    <?= $form->field($model, 'sede')->textInput(['maxlength' => true])->label( 'CÓDIGO DANE SEDE' ) ?>
	
    <?= $form->field($model, 'sede')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'personal_a')->textInput() ?>

    <?= $form->field($model, 'docente_aliado')->textInput(['maxlength' => true]) ?>

    <!-- <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div> -->
	
	<h3 style='background-color: #ccc;padding:5px;'>ACUERDOS INSTITUCIONES (CONFORMACIÓN)</h3>
	<?= $controller->actionViewFases(); ?>

    <?php ActiveForm::end(); ?>

</div>
