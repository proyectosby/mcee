<?php

/**********
Modificación: 
Fecha: 22-10-2018
Desarrollador: Maria Viviana Rodas
Descripción: Se agrega boton de volver a la vista de botones
---------------------------------------

**********/

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SemillerosDatosIeo */

$this->title = 'CONFORMACIÓN SEMILLEROS TIC';
$this->params['breadcrumbs'][] = ['label' => 'Semilleros Datos Ieos', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";

?>

<div class="form-group">
		
		<?= Html::a('Volver', 
									[
										'semilleros/index',
									], 
									['class' => 'btn btn-info']) ?>
				
</div>				
				
<div class="semilleros-datos-ieo-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
		'institucion' 	=> $institucion,
		'sede' 			=> $sede,
		'docentes' 		=> $docentes,
		'controller' 	=> $controller,
    ]) ?>

</div>
