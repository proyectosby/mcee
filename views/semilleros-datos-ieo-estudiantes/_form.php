<?php
/**********
Versión: 001
Fecha: 2018-08-16
Desarrollador: Edwin Molina Grisales
Descripción: Formulario CONFORMACION SEMILLEROS TIC ESTUDIANTES
---------------------------------------
Modificaciones:
Fecha: 2018-10-31
Persona encargada: Edwin Molina Grisales
Descripción: Se permite guardar o modificar los registros por parte del usuario
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
use yii\bootstrap\ActiveForm;


$this->registerJsFile(
    '@web/js/semillerosDatosIEOEstudiantes.js',
    [
		'depends' => [
						\yii\web\JqueryAsset::className(),
						\dosamigos\editable\EditableBootstrapAsset::className(),
					]
	]
);

if( $guardado ){
	
	$this->registerJsFile("https://unpkg.com/sweetalert/dist/sweetalert.min.js");
	
	$this->registerJs( "
	  swal({
			text: 'Registro guardado',
			icon: 'success',
			button: 'Salir',
		});" 
	);
}

/* @var $this yii\web\View */
/* @var $model app\models\SemillerosDatosIeoEstudiantes */
/* @var $form yii\widgets\ActiveForm */
?>

<datalist id='list_persona_a'>
	<?php foreach( $profesionales as $data ) :?>
		<option value='<?=$data?>'>
	<?php endforeach; ?>
</datalist>

<datalist id='list_docente_aliado'>
	<?php foreach( $docentes_aliados as $key => $data ) :?>
		<option value='<?=$data?>' <?=$key?> >
	<?php endforeach; ?>
</datalist>

<div class="form-group">
		
		<?= Html::a('Volver', 
									[
										'semilleros/index',
									], 
									['class' => 'btn btn-info']) ?>
				
</div>	

<div class="semilleros-datos-ieo-estudiantes-form">

	<h3 style='background-color: #ccc;padding:5px;'>DATOS IEO</h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($institucion, 'codigo_dane')->dropDownList([ $institucion->codigo_dane => $institucion->codigo_dane ])->label( 'CÓDIGO DANE IEO' ) ?>
    
	<?= $form->field($datosIEO, 'id_institucion')->dropDownList([ $institucion->id => $institucion->descripcion ]) ?>

    <?= $form->field($sede, 'codigo_dane')->dropDownList([ $sede->codigo_dane => $sede->codigo_dane ], ['maxlength' => true])->label( 'CÓDIGO DANE SEDE' ) ?>
	
    <?= $form->field($datosIEO, 'id_sede')->dropDownList([ $sede->id => $sede->descripcion ], ['maxlength' => true]) ?>
	
	 <?= $form->field($datosIEO, 'profecional_a')->dropDownList( $docentes,[ 
									'list' => 'list_persona_a',
									'autocomplete' => 'off',
									'prompt' => 'Seleccione...',
								]) ?>

    <?= $form->field($datosIEO, 'docente_aliado')->textInput([ 
									'maxlength' => true, 
									'list' => 'list_docente_aliado',
									'autocomplete' => 'off',
								]) ?>
								
	<?= $form->field($datosIEO, 'id')->hiddenInput()->label( null,[ 'style' => 'display:none' ] ) ?>
	
	<?= Html::hiddenInput( 'guardar', 1, [ 'id' => 'guardar', 'value' => 1 ]) ?>
	
	<?= $form->field($ciclo, 'id')->hiddenInput()->label( null , [ 'style' => 'display:none' ] ); ?>
	
	<?php
		if( !empty( $datosIEO->profecional_a ) && !empty( $datosIEO->docente_aliado ) )
		{
			?><h3 style='background-color: #ccc;padding:5px;'>ACUERDOS INSTITUCIONES (CONFORMACIÓN)</h3><?php
			
			echo $this->render( 'fases',[
				'fases' 		=> $fases,
				'docentes' 		=> $docentes,
				'jornadas' 		=> $jornadas,
				'recursos' 		=> $recursos,
				'parametros' 	=> $parametros,
				'modelos' 		=> $modelos,
				'form' 			=> $form,
			]); 
			
			?>
			<div class="form-group">
				<?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
			</div>
			<?php
			
		}
	?>
    
	<!-- <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div> -->

    <?php ActiveForm::end(); ?>

</div>
