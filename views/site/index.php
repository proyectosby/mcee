<?php
if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion se redirecciona al login
else
{
	echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
	die;
}	

use app\models\Instituciones;

//con que id institucion y que id sede se debe trabajar 
if (@$_GET['instituciones'])
{
	$idInstitucion = $_GET['instituciones'];
	$_SESSION['institucionSeleccionada'][0]=$idInstitucion;
	$_SESSION['instituciones'][0]=$idInstitucion;
	?>
	<script>  document.cookie = 'institucionJs=" <?php echo $idInstitucion; ?>"'; </script>
	
	<?php
	
	$nombreInstitucion = Instituciones::find()->where(['id' => @$_SESSION['institucionSeleccionada']])->one();
	$nombreInstitucion = @$nombreInstitucion->descripcion;
	$_SESSION['sede'][0]=-1;
    die("$nombreInstitucion - <label id='nameSede'>SEDE NO ASIGNADA</label>");
}
if (@$_GET['sede'])
{
	$_SESSION['sede'][0]=$_GET['sede'];
}


 $this->registerJsFile(Yii::$app->request->baseUrl.'/js/sweetalert2.js',['depends' => [\yii\web\JqueryAsset::className()]]);
 $this->registerJsFile(Yii::$app->request->baseUrl.'/js/index.js',['depends' => [\yii\web\JqueryAsset::className()]]);
 	
	//solo los id de institucion a los que la persona con ese perfil pertenece
 foreach($_SESSION['instituciones'] as $i)
		{
			$idInstituciones[]=$i;
		}
		
		$idInstituciones= implode(",",$idInstituciones);

	
	
$connection = Yii::$app->getDb();
//saber el id de la sede para redicionar al index correctamente
$command = $connection->createCommand("
SELECT id, descripcion
FROM instituciones 
WHERE estado = 1
AND id in($idInstituciones)
");
$result = $command->queryAll();

$datos="";
foreach($result as $r)
{
	$id=$r['id'];
	$descripcion = $r['descripcion'];
	$datos.= "'$id':'$descripcion',";
}

if (!isset($_SESSION['institucionSeleccionada']) || (isset($_GET['institucion']) && $_GET['institucion'])){

    $this->registerJs( <<< EOT_JS_CODE
        
        //que institucion selecciono
    const {value: institucion} = swal({
    
        closeOnConfirm: false, 
        closeOnCancel: false,
        allowOutsideClick: false,
        title: 'Seleccione una Institución',
        input: 'select',
        inputOptions: { $datos
      },
      inputPlaceholder: 'Seleccione...',
      inputValidator: (value) => {
        return new Promise((resolve) => {
          if (value !== '') 
          {  
       
              //crear variable de session que tenga la institucion que seleciono
             var Institucion = $.get( "index.php?instituciones="+value, function(data) 
                {
                    $("#InstitucionSede").html(" ");
                
                    $("#InstitucionSede").append(data.replace('"', ' ').replace('"', ' '));
                    console.log(data.charAt(0));
                })
                  
             return fetch('index.php?r=sedes/sedes&idInstitucion='+value)
            .then(response => {
                if (!response.ok) {
                    throw new Error(response.statusText)
                }
				else{
					location.href = location.pathname
				}
            })           
                resolve();
    
          }
          else 
          {
            resolve('Debe seleccionar una institucion')
          }
        })
      }
    })
    
    
    

EOT_JS_CODE
    );

}

if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion se redirecciona al login
else
{
	echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
	die;
}

/* @var $this yii\web\View */

$this->title = 'Sistema de Información MCEE';
?>

<div class="site-index">

    <div class="jumbotron">
        <h2>Bienvenido al sistema de información MI COMUNIDAD ES ESCUELA</h2>
        <img src="../views/site/logo_mcee.png" style="width: 100%; margin: 15px auto;">
	</div>
</div>
