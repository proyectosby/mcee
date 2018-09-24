<?php

/**********
Versión: 001
Fecha: 2018-08-21
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE III
---------------------------------------
Modificaciones:
Fecha: 2018-09-18
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se cambia los campo input de cada sección por textarea, y se le agrega el plugin Textarea, para poderlos editar
---------------------------------------
**********/


use yii\helpers\Html;
use yii\widgets\ActiveForm;

if( !$sede ){
	$this->registerJs( "$( cambiarSede ).click()" );
	return;
}

$this->registerJsFile(
    '@web/js/ejecucionFaseIII.js',
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

<div class="ejecucion-fase-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="form-group">
		<?= Html::button('Agregar' , ['class' => 'btn btn-success', 'id' => 'btnAddFila1' ]) ?>
		<?= Html::button('Eliminar', ['class' => 'btn btn-success', 'id' => 'btnRemoveFila1', "style" => "display:none" ]) ?>
	</div>
    
	<?= $this->render( 'sesiones', [ 
										'idPE' 			=> null,
										'model' 		=> $model,
										'institucion' 	=> $institucion,
										'sede' 			=> $sede,
										'docentes' 		=> $docentes,
										'fase' 		=> $fase,
									]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
