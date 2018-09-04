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

$this->title = 'RESUMEN OPERATIVO FASES ESTUDIANTES';
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
					],
	]
);

$this->registerJsFile(
	"/yii/mcee/web/assets/da3a8eca/js/dataTables.tableTools.js", 
	[
		'depends' => [
						\yii\web\JqueryAsset::className(),
						\fedemotta\datatables\DataTablesAsset::className(),
					],
	]
);


$this->registerCssFile(
	"/yii/mcee/web/assets/da3a8eca/css/dataTables.tableTools.css", 
	[
		'depends' => [
						\yii\web\JqueryAsset::className(),
						\fedemotta\datatables\DataTablesAsset::className(),
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
			<th colspan='4'>Datos IEO</th>
			<th colspan='1' rowspan='3'>Profesional A.</th>
			<th colspan='1' rowspan='3'>Fecha de inicio del Semillero</th>
			<th colspan='30'>Fase I Creaci&oacute;n y prueba</th>
			<th colspan='26'>Fase II Desarrollo e implementaci&oacute;n</th>
			<th colspan='26'>Fase III  (Uso - Aplicaci&oacute;n)</th>
			<th colspan='1' rowspan='3'>TOTAL PARTICIPANTES FASES I A III (PROMEDIO)</th>
			<th colspan='1' rowspan='3'>TOTAL NUMERO DE SESIONES FASES I A III</th>
		</tr>
		<tr style='background-color:#ccc'>
			<th colspan='1' rowspan='2'>CODIGO DANE IEO</th>
			<th colspan='1' rowspan='2'>Instituci&oacute;n educativa</th>
			<th colspan='1' rowspan='2'>CODIGO DANE SEDE</th>
			<th colspan='1' rowspan='2'>Sede</th>
			<th colspan='1' rowspan='2'>Frecuencia sesiones mensual</th>
			<th colspan='1' rowspan='2'>Duraci&oacute;n promedio sesiones (horas reloj)</th>
			<th colspan='1' rowspan='2'>Curso de los Participantes</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 1</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 2</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 3</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 4</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 5</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 6</th>
			<th colspan='1' rowspan='2'>Total Sesiones</th>
			<th colspan='1' rowspan='2'>N&uacute;mero de estudiantes participantes (Promedio)</th>
			<th colspan='1' rowspan='2'>N&uacute;mero de Apps 0.0 creadas y probadas</th>
			<th colspan='1' rowspan='2'>Frecuencia sesiones mensual</th>
			<th colspan='1' rowspan='2'>Duraci&oacute;n por cada sesi&oacute;n (horas reloj)</th>
			<th colspan='1' rowspan='2'>Curso de los Participantes</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 1</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 2</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 3</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 4</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 5</th>
			<th colspan='1' rowspan='2'>Total Sesiones</th>
			<th colspan='1' rowspan='2'>N&uacute;mero de estudiantes participantes (Promedio)</th>
			<th colspan='1' rowspan='2'>N&uacute;mero de Apps 0.0 desarrolladas e implementadas</th>
			<th colspan='1' rowspan='2'>Frecuencia sesiones mensual</th>
			<th colspan='1' rowspan='2'>Duraci&oacute;n por cada sesi&oacute;n (horas reloj)</th>
			<th colspan='1' rowspan='2'>Curso de los Participantes</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 1</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 2</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 3</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 4</th>
			<th colspan='4' rowspan='1'>Sesi&oacute;n 5</th>
			<th colspan='1' rowspan='2'>Total Sesiones</th>
			<th colspan='1' rowspan='2'>N&uacute;mero de estudiantes participantes (Promedio)</th>
			<th colspan='1' rowspan='2'>N&uacute;mero de Apps 0.0 usadas</th>
		</tr>
		<tr style='background-color:#ccc'>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			<th colspan='1' rowspan='1'></th>
			<th colspan='1' rowspan='1'>Fecha</th>
			<th colspan='1' rowspan='1'>N° Asistentes</th>
			<th colspan='1' rowspan='1'>Duraci&oacute;n</th>
			
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
			<td>6</td>
			<td>7</td>
			<td>8</td>
			<td>9</td>
			<td>10</td>
			<td>11</td>
			<td>12</td>
			<td>13</td>
			<td>14</td>
			<td>15</td>
			<td>16</td>
			<td>17</td>
			<td>18</td>
			<td>19</td>
			<td>20</td>
			<td>21</td>
			<td>22</td>
			<td>23</td>
			<td>24</td>
			<td>25</td>
			<td>26</td>
			<td>27</td>
			<td>28</td>
			<td>29</td>
			<td>30</td>
			<td>31</td>
			<td>32</td>
			<td>33</td>
			<td>34</td>
			<td>35</td>
			<td>36</td>
			<td>37</td>
			<td>38</td>
			<td>39</td>
			<td>40</td>
			<td>41</td>
			<td>42</td>
			<td>43</td>
			<td>44</td>
			<td>45</td>
			<td>46</td>
			<td>47</td>
			<td>48</td>
			<td>49</td>
			<td>50</td>
			<td>51</td>
			<td>52</td>
			<td>53</td>
			<td>54</td>
			<td>55</td>
			<td>56</td>
			<td>57</td>
			<td>58</td>
			<td>59</td>
			<td>60</td>
			<td>61</td>
			<td>62</td>
			<td>63</td>
			<td>64</td>
			<td>65</td>
			<td>66</td>
			<td>67</td>
			<td>68</td>
			<td>69</td>
			<td>70</td>
			<td>71</td>
			<td>72</td>
			<td>73</td>
			<td>74</td>
			<td>75</td>
			<td>76</td>
			<td>77</td>
			<td>78</td>
			<td>79</td>
			<td>80</td>
			<td>81</td>
			<td>82</td>
			<td>83</td>
			<td>84</td>
			<td>85</td>
			<td>86</td>
			<td>87</td>
			<td>88</td>
			<td>89</td>
			<td>90</td>
			
		</tr>
	</tbody>
</table>
