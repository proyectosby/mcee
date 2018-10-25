<?php

/**********
Versión: 001
Fecha: 2018-08-23
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE I ESTUDIANTES
---------------------------------------
Modificaciones:
Fecha: 2018-09-19
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se cambia los campo input de cada sección por textarea, y se le agrega el plugin XEditable, para poderlos editar
---------------------------------------
Fecha: 22-10-2018
Desarrollador: Maria Viviana Rodas
Descripción: Se agrega boton de volver a la vista de botones
---------------------------------------
**********/


use yii\helpers\Html;
use yii\widgets\ActiveForm;

if( !$sede ){
	$this->registerJs( "$( cambiarSede ).click()" );
	return;
}


$this->registerJsFile(
    '@web/js/ejecucionFaseIEstudiantes.js',
    [
		'depends' => [
						\yii\web\JqueryAsset::className(),
						\dosamigos\editable\EditableBootstrapAsset::className(),
					]
	]
);

/* @var $this yii\web\View */
/* @var $model app\models\EjecucionFase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-group">
		
		<?= Html::a('Volver', 
									[
										'semilleros/index',
									], 
									['class' => 'btn btn-info']) ?>
				
</div>	

<div class="ejecucion-fase-form">

	<h3 style='background-color:#ccc;padding:5px;'><?= Html::encode( 'DATOS IEO' ) ?></h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_fase')->dropDownList([ $institucion->id => $institucion->descripcion ])->label( 'Institución educativa' )?>

    <?= $form->field($model, 'id_datos_sesiones')->dropDownList([ $sede->id => $sede->descripcion ])->label( 'Sede' ) ?>

    <?= $form->field($model, 'docente')->dropDownList( $docentes, [ 'prompt' => 'Seleccione...' ] )->label('Profesional A.') ?>
	
	<?= $form->field($model, 'docente')->textInput()->label('Curso de los participantes') ?>
	
	<?= $form->field($ciclo, 'id')->hiddenInput()->label( null , [ 'style' => 'display:none' ] ); ?>
    
	<?= $this->render( 'sesiones', [ 
										'idPE' => null,
										'model' => $model,
									]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
