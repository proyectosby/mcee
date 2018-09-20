<?php

/**********
Versión: 001
Fecha: 2018-09-03
Desarrollador: Edwin Molina Grisales
Descripción: RESUMEN OPERATIVO FASES ESTUDIANTES
---------------------------------------
**********/

use yii\helpers\Html;

use fedemotta\datatables\DataTables;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EcDatosBasicosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'INFORME SEMANAL EJECUCIÓN';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(
	"@web/js/jQuery-TableToExcel-master/jquery.tableToExcel.js", 
	['depends' => [\yii\web\JqueryAsset::className()]]
);


$this->registerJsFile(
	"@web/js/ecresumenoperativofasesestudiantes.js", 
	[
		'depends' => [
						\yii\web\JqueryAsset::className(),
						\fedemotta\datatables\DataTablesAsset::className(),
						\fedemotta\datatables\DataTablesTableToolsAsset::className(),
					],
	]
);

?>
<style>

table > thead >tr > th {
	text-align:center;
}

table, th, td {
   border: 1px solid black;
}

table.dataTable {
    border-collapse: collapse;
}

section.content {
	overflow: auto;
}

</style>

<div class="ec-datos-basicos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<p>
        <?php //echo Html::button('Excel', ['class' => 'btn btn-success', 'onclick' => 'exportar()' ]) ?>
    </p>
</div>


<table id='tb'>
	<thead>
		<tr style='background-color:#ccc;text-align:center;'>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Eje</th>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Cnt. I.E.O sobre avance esperado</th>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Cnt. De sedes sobre avance esperado</th>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Porcentaje de I.E.O</th>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Porcentaje sobre sedes</th>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Porcentaje sobre actividad 1</th>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Porcentaje sobre actividad 2</th>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Porcentaje sobre actividad 3</th>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Población Beneficiada Directamente</th>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Población beneficiada de manera indirecta</th>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Observaciones sobre el estado general de las evidencias</th>
			<th colspan='1' rowspan='3' style='border: 1px solid black;'>Alarmas generales</th>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td style='border: 1px solid black;'>PPT</td>
			<td style='border: 1px solid black;'>0</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'></td>
			<td style='border: 1px solid black;'></td>
		</tr>
		<tr>
			<td style='border: 1px solid black;'>PSSE</td>
			<td style='border: 1px solid black;'>0</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'></td>
			<td style='border: 1px solid black;'></td>
		</tr>
		<tr>
			<td style='border: 1px solid black;'>PAF</td>
			<td style='border: 1px solid black;'>0</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'></td>
			<td style='border: 1px solid black;'></td>
		</tr>
		<tr>
			<td style='border: 1px solid black;'>Total</td>
			<td style='border: 1px solid black;'>0</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'>0%</td>
			<td style='border: 1px solid black;'></td>
			<td style='border: 1px solid black;'></td>
		</tr>
	<tbody>
</table>
