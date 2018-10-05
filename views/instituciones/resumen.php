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

use app\models\Sectores;
use app\models\PerfilesPersonasInstitucion;
use app\models\PerfilesXPersonas;
use app\models\Personas;

/**********
Versión: 001
Fecha: 2018-10-04
Desarrollador: Edwin Molina Grisales
Descripción: Resumen Institucion
---------------------------------------
**********/


/************************************************************************************************
 * Consultando las características
 ************************************************************************************************/
$caracteriticas = '';
if( $institucion->sectores )
	$caracteriticas .= Sectores::findOne( $institucion->id_sectores )->descripcion;

$caracteriticas .= !empty($caracteriticas) && $institucion->caracter ? ' - ' : '';
$caracteriticas .= !empty( $institucion->caracter ) ? 'Modalidad '.$institucion->caracter : '';

$caracteriticas .= !empty($caracteriticas) && $institucion->especialidad ? ' - ' : '';
$caracteriticas .= !empty( $institucion->especialidad ) ? 'Especialidad '.$institucion->especialidad : '';
/************************************************************************************************/

/************************************************************************************************
 * Consultando la información de las sedes
 ************************************************************************************************/
$i = 1;
$info_sedes = '';
foreach( $sedes->all() as $keySede => $sede ){
	
	if( !empty($info_sedes) )
		$info_sedes .= '<br>';
	
	$info_sedes .= "<b>".$i.".</b> ". $sede->descripcion." / ".( !empty( $sede->direccion ) ? $sede->direccion : 'La dirección no está registrada' );
	
	$i++;
}
/************************************************************************************************/


/************************************************************************************************
 * Consultando docentes
 * p.id = 10 es el docente
 ************************************************************************************************/
 
$docentes =	PerfilesPersonasInstitucion::find()
				->innerJoin('perfiles_x_personas pp', 'pp.id=perfiles_x_personas_institucion.id_perfiles_x_persona')
				->innerJoin('perfiles p', 'p.id=pp.id_perfiles')
				->where( 'pp.estado = 1' )
				->andWhere( 'p.estado = 1' )
				->andWhere( 'pp.estado = 1' )
				->andWhere( 'perfiles_x_personas_institucion.estado = 1' )
				->andWhere( 'perfiles_x_personas_institucion.id_institucion = '.$institucion->id )
				->andWhere( 'p.id = 10' );
 
/************************************************************************************************/

/************************************************************************************************
 * Consultando directivos
 * p.id = 6 rector ---- > p.id = 8 Coordinadores
 ************************************************************************************************/
 
$directivos =	PerfilesPersonasInstitucion::find()
					->innerJoin('perfiles_x_personas pp', 'pp.id=perfiles_x_personas_institucion.id_perfiles_x_persona')
					->innerJoin('perfiles p', 'p.id=pp.id_perfiles')
					->where( 'pp.estado = 1' )
					->andWhere( 'p.estado = 1' )
					->andWhere( 'pp.estado = 1' )
					->andWhere( 'perfiles_x_personas_institucion.estado = 1' )
					->andWhere( 'perfiles_x_personas_institucion.id_institucion = '.$institucion->id )
					->andWhere( 'p.id = 6' )
					->orWhere( 'p.id = 8' );
 
/************************************************************************************************/

/************************************************************************************************
 * Consultando directivos
 * p.id = 11 Estudiantes
 ************************************************************************************************/
 
$estudiantes =	PerfilesPersonasInstitucion::find()
					->innerJoin('perfiles_x_personas pp', 'pp.id=perfiles_x_personas_institucion.id_perfiles_x_persona')
					->innerJoin('perfiles p', 'p.id=pp.id_perfiles')
					->where( 'pp.estado = 1' )
					->andWhere( 'p.estado = 1' )
					->andWhere( 'pp.estado = 1' )
					->andWhere( 'perfiles_x_personas_institucion.estado = 1' )
					->andWhere( 'perfiles_x_personas_institucion.id_institucion = '.$institucion->id )
					->andWhere( 'p.id = 11' );
 
/************************************************************************************************/

/************************************************************************************************
 * Consultando directivos
 * p.id = 8 Coordinadores
 ************************************************************************************************/

$coordinadores =	PerfilesXPersonas::find()
						->alias('pp')
						->innerJoin( 'perfiles_x_personas_institucion ppi', 'ppi.id_perfiles_x_persona=pp.id')
						->innerJoin('perfiles p', 'p.id=pp.id_perfiles')
						->where( 'pp.estado = 1' )
						->andWhere( 'p.estado = 1' )
						->andWhere( 'ppi.estado = 1' )
						->andWhere( 'ppi.id_institucion = '.$institucion->id )
						->andWhere( 'p.id = 8' );

$i = 1;
$info_coordinadores = '';
foreach( $coordinadores->all() as $key => $coordinador ){
	
	if( !empty($info_coordinadores) )
		$info_coordinadores .= '<br>';
	
	$persona = Personas::findOne( $coordinador->id_personas );
	
	$info_coordinadores .= "<b>".$i.".</b> ". $persona->nombres." ".$persona->apellidos;
	
	$i++;
}					

/************************************************************************************************/

//Consultando rector

$rector = $institucion->rector;

?>
<style>
.title{
	background-color: #ccc;
}

.subtitle{
	background-color: #ddd;
	font-weight: bold;
	font-size: 14pt;
}

div.title, div.subtitle{
	border: 1px solid black;
}

</style>

<div class='text-center'><h1>IDENTIFICACIÓN DE LA IEO<h1></div>
<div class="container-fluid">
	
	<div class="row">
		<div class="col-sm-6 title text-center"><h2>IDENTIFICACIÓN IEO</h2></div>
		<div class="col-sm-6 title text-center"><h2>EQUIPO DE TRABAJO</h2></div>
	</div>
	
	<div class="row">
	
		<!-- IDENTIFICACION IEO -->
		<div class="col-sm-6">
		
			<div class="row">
				<div class="col-sm-4 subtitle">Nombre</div>
				<div class="col-sm-8 "><?=$institucion->descripcion ?></div>
			</div>
			
			<div class="row">
				<div class="col-sm-4 subtitle">Caractaerísticas</div>
				<div class="col-sm-8 "><?=$caracteriticas ?></div>
			</div>
			
			<div class="row">
				<div class="col-sm-4 subtitle">Sedes</div>
				<div class="col-sm-8 "><?=$info_sedes ?></div>
			</div>
			
			<div class="row">
				<div class="col-sm-4 subtitle text-center">Planta docente</div>
				<div class="col-sm-4 subtitle text-center">Directivos</div>
				<div class="col-sm-4 subtitle text-center">Administrativos</div>
			</div>
			
			<div class="row">
				<div class="col-sm-4  text-center">
					<?= $docentes->count() ?>
				</div>
				<div class="col-sm-4  text-center">
					<?= $directivos->count() ?>
				</div>
				<div class="col-sm-4 ">
					12 nombrados
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 subtitle text-center">ESTUDIANTES</div>
			</div>
			
			<div class="row">
				<div class="col-sm-4 subtitle text-center">Educación Regular</div>
				<div class="col-sm-8  text-center">2.164( 49 % H - 51 % M)</div>
			</div>
			<div class="row">
				<div class="col-sm-4 subtitle text-center">Jovenes Adultos</div>
				<div class="col-sm-8  text-center">193 (30.5 % H - 69.5 M)</div>
			</div>
			<div class="row">
				<div class="col-sm-4 subtitle text-center">Total</div>
				<div class="col-sm-8  text-center"><?= $estudiantes->count() ?></div>
			</div>
			<div class="row">
				<div class="col-sm-4 subtitle text-center">Afro</div>
				<div class="col-sm-8  text-center">El 55_%</div>
			</div>
			
		</div>
		
		<!-- EQUIPO DE TRABAJO -->
		<div class="col-sm-6">
			
			<div class="row">
				<div class="col-sm-4 subtitle text-center">Recotor(a)</div>
				<div class="col-sm-8 text-center"><?= $rector ?></div>
			</div>
			
			<div class="row">
				<div class="col-sm-4 subtitle text-center">Coordinadores</div>
				<div class="col-sm-8 text-center"><?= $info_coordinadores ?></div>
			</div>
			
			<div class="row ">
				<div class="col-sm-4 subtitle text-center clearfix">Instancias activas</div>
				<div class="col-sm-8 text-center">
					Consejo Directivo<br>
					Consejo Académico<br>
					Comité Escolar de Convicencia - CECO<br>
					Consejo de Padres<br>
					Consejo Estudiantil<br>
					Comisión de Evaluación y Promoción<br>
					Comité de Alimentación Escolar - CAE<br>
					Comité de Calidad<br>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-4 subtitle text-center">Personero(a)</div>
				<div class="col-sm-8 text-center">Stephanie Restrepo( Grado 11-1 )</div>
			</div>
			
			<div class="row">
				<div class="col-sm-4 subtitle text-center">Contralor</div>
				<div class="col-sm-8 text-center">Deina Michel Cera Murillo</div>
			</div>
		
		</div>
		
	</div>
	
</div>