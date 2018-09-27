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
use app\models\EcAcciones;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

use yii\db\Query;

$id_sede 		= $_SESSION['sede'][0];
$id_institucion	= $_SESSION['instituciones'][0];
$contenedores = [];
$index = 0;
$i = 1;
?>

<?php


    foreach( $items as $keyFase => $item ){ 
        
        $accionesall = EcAcciones::find()->where( 'estado=1' )->andWhere( 'id_proceso='.$i )->all();
        $acciones = array();

        foreach ($accionesall as $r)
        {
            $acciones[$r['id']]= $r['descripcion'];
        }
        
                $contenedores[] = 	[
					'label' 		=>  $item,
					'content' 		=>  $this->render( 'fases3', 
													[  
                                                        'idPE' 		=> "", 
														'index' 	=> $index,
                                                        'item' 		=> $item,
                                                        'model'     => $model,
                                                        'acciones'  => $acciones,
													] 
										),
					'contentOptions'=> []
				];

    $index ++;
    $i ++;
    }


    
    use yii\bootstrap\Collapse;
    echo Collapse::widget([
        'items' => $contenedores,
    ]);

?>




	

