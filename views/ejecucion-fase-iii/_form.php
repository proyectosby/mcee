<?php

/**********
Versión: 001
Fecha: 2018-08-21
Desarrollador: Edwin Molina Grisales
Descripción: Formulario EJECUCION FASE III
---------------------------------------
**********/


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile(
    '@web/js/ejecucionFaseIII.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
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
