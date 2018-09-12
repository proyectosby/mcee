<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

// use yii\bootstrap\Collapse;
use nex\chosen\Chosen;

use app\models\AcuerdosInstitucionales;

use app\models\SemillerosDatosIeo;
use app\models\SemillerosDatosIeoBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use app\models\Instituciones;
use app\models\Sedes;
use app\models\Personas;
use app\models\Estados;
use app\models\Fases;
use app\models\Sesiones;
use app\models\EstudiantesOperativoSesion;
use app\models\Escalafones;
use app\models\Docentes;
use app\models\DistribucionesAcademicas;
use app\models\Parametro;
use app\models\Jornadas;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

use yii\db\Query;

$id_sede 		= $_SESSION['sede'][0];
$id_institucion	= $_SESSION['instituciones'][0];
$contenedores = [];
$index = 0;
?>

<?php
    foreach( $items as $keyFase => $item ){ 
        
                $contenedores[] = 	[
					'label' 		=>  $item,
					'content' 		=>  $this->render( 'contenedorItem', 
													[  
                                                        'idPE' 		=> "", 
														'index' 	=> $index,
                                                        'item' 		=> $item,
                                                        'model'     => $model,
													] 
										),
					'contentOptions'=> []
				];

    $index ++;
    }
    
    use yii\bootstrap\Collapse;
    echo Collapse::widget([
        'items' => $contenedores,
    ]);

?>




	

