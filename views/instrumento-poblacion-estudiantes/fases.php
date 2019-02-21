<style>
    
    table {
		width:80%;
		border-top:1px solid #fff;
		border-right:1px solid #e5eff8;
		margin:1em auto;
		border-collapse:collapse;
    }
    td {
		border-bottom:1px solid #e5eff8;
		border-left:1px solid #e5eff8;
		padding:.3em 1em;
		text-align:center;
		border: 1px solid white;
		background-color: #eee;
    }
	
	thead > tr > th {
		text-align: center;
		background-color: #ccc;
		border: 1px solid #ddd;
	}

</style>


<table id='tbInfo'>

	<thead>
	
		<tr>
			<th rowspan=2>Docente</th>
			<th rowspan=2>Identificación</th>
			<th colspan=3> Creación Semilleros TIC </th>
			<?php foreach( $fases as $key => $fase ) : ?>	
				<th rowspan=2><?= $fase['descripcion'] ?></th>
			<?php endforeach; ?>
		</tr>
		
		<tr>
			<?php foreach( $fases as $key => $fase ) : ?>	
				<th><?= $fase['descripcion'] ?></th>
			<?php endforeach; ?>
		</tr>
	</thead>
	
	<tbody>
	
		<?php foreach( $datos as $key => $docenteDatos ) : ?>
			
			<tr rowspan=2>
			
				<?php foreach( $docenteDatos as $key => $docente ) : ?>
			
						<td><?= $docente['info']['nombre'] ?></td>
						
						<td><?= "CC ".$docente['info']['numeroIdentificacion'] ?></td>
						
						<?php foreach( $fases as $key => $fase ) : ?>	
							<td><?= !empty( $docente['Creación'][ $fase->id ] ) ? implode( " - ", $docente['Creación'][ $fase->id ] ) : '' ?></td>
						<?php endforeach; ?>
					

						<?php foreach( $fases as $key => $fase ) : ?>	
							<td><?= !empty( $docente['Fases'][ $fase->id ] ) ? implode( " - ", $docente['Fases'][ $fase->id ] ): '' ?></td>
						<?php endforeach; ?>
			
				<?php endforeach; ?>
				
			</tr>
			
		<?php endforeach; ?>
	
	</tbody>

</table>



<?php

// use app\models\PoblacionEstudiantesSesion;
// use app\models\Sesiones;

// $items = [];
// $index = 0;

// foreach( $fases as $keyFase => $fase ){
	
	// $sesiones = Sesiones::find()
					// ->andWhere( 'id_fase='.$fase->id )
					// ->all();
	
	// $items[] = 	[
					// 'label' 		=>  $fase->descripcion,
					// 'content' 		=>  $this->render( 'faseItem', 
													// [ 
														// 'idPE' 		=> $idPE, 
														// 'index' 	=> $index,
														// 'sesiones' 	=> $sesiones,
														// 'fase' 		=> $fase,
													// ] 
										// ),
					// 'contentOptions'=> []
				// ];
				
	// $index += count($sesiones);
// }

// use yii\bootstrap\Collapse;

// echo Collapse::widget([
    // 'items' => $items,
// ]);