<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use fedemotta\datatables\DataTables;
use app\models\CbacInformeSemanalCac;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $model app\models\EcInformeSemanalTotalEjecutivo */
/* @var $form yii\widgets\ActiveForm */



if( isset($_GET['guardado']) && $_GET['guardado'] == 1 ){    
    echo Html::hiddenInput( 'guardado', '1' );
}

$this->registerJsFile(
	"@web/js/jQuery-TableToExcel-master/jquery.tableToExcel.js", 
	['depends' => [\yii\web\JqueryAsset::className()]]
);


$this->registerJsFile(Yii::$app->request->baseUrl.'/js/informe-semanal-total-ejecutivo.js',['depends' => [\yii\web\JqueryAsset::className()]]);


	 $dataProvider = new ActiveDataProvider([
            'query' => CbacInformeSemanalCac::find(),
        ]);

?>

  <!--<?= DataTables::widget(['dataProvider' => $dataProvider,     ]); ?> -->


<style>
    
    table {
		width:90%;
		border-top:1px solid #e5eff8;
		border-right:1px solid #e5eff8;
		margin:1em auto;
		border-collapse:collapse;
    }
	
    td {
		color:#678197;
		border: 1px solid #000;
		padding:.3em 1em;
		text-align:left;
    }
	
	thead > tr > th {
		text-align: center;
		background-color: #ccc;
		border: 1px solid #ddd;
	}
	
	tfoot > tr > td {
		font-weight: bold;
		text-align: left;
		background-color: #ddd;
		border: 1px solid #ddd;
	}

tr.group, tr.group:hover 
{
    background-color: #ddd !important;
}
</style>


<div class="ec-informe-semanal-total-ejecutivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <table id='tb'>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<p>
        <?php //echo Html::button('Excel', ['class' => 'btn btn-success', 'onclick' => 'exportar()' ]) ?>
    </p>

    <thead>
            <tr>
                <th rowspan='3' colspan='1'>EJE</th>
                <th rowspan='3' colspan='1'>Cnt. I.E.O sobre avance esperado</th>
                <th rowspan='3' colspan='1'>Cnt. De sedes sobre avance esperado</th>
                <th rowspan='3' colspan='1'>Porcentaje de I.E.O</th>
                <th rowspan='1' colspan='1'>Porcentaje sobre sedes</th>
                <th rowspan='1' colspan='1'>Porcentaje sobre actividad 1</th>
                <th rowspan='1' colspan='1'>Porcentaje sobre actividad 2</th>
                <th rowspan='1' colspan='1'>Porcentaje sobre actividad 3</th>
                <th rowspan='1' colspan='1'>Población Beneficiada Directamente</th>
                <th rowspan='1' colspan='1'>Población beneficiada de manera indirecta</th>
                <th rowspan='1' colspan='1'>Alarmas generales</th>
            </tr>
        </thead>
      

    </table>

    <div class="form-group" style="display:none">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
	
	
</div>


<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger</td>
                <td>Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett</td>
                <td>Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton</td>
                <td>Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric</td>
                <td>Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi</td>
                <td>Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td>Brielle</td>
                <td>Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>$372,000</td>
            </tr>
            <tr>
                <td>Herrod</td>
                <td>Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td>Rhona</td>
                <td>Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>$327,900</td>
            </tr>
            <tr>
                <td>Colleen</td>
                <td>Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>$205,500</td>
            </tr>
            <tr>
                <td>Sonya</td>
                <td>Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>$103,600</td>
            </tr>
            <tr>
                <td>Jena</td>
                <td>Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>$90,560</td>
            </tr>
            <tr>
                <td>Quinn</td>
                <td>Flynn</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>$342,000</td>
            </tr>
            <tr>
                <td>Charde</td>
                <td>Marshall</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>$470,600</td>
            </tr>
            <tr>
                <td>Haley</td>
                <td>Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>$313,500</td>
            </tr>
            <tr>
                <td>Tatyana</td>
                <td>Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>$385,750</td>
            </tr>
            <tr>
                <td>Michael</td>
                <td>Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>$198,500</td>
            </tr>
            <tr>
                <td>Paul</td>
                <td>Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>$725,000</td>
            </tr>
            <tr>
                <td>Gloria</td>
                <td>Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>$237,500</td>
            </tr>
            <tr>
                <td>Bradley</td>
                <td>Greer</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>$132,000</td>
            </tr>
            <tr>
                <td>Dai</td>
                <td>Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>$217,500</td>
            </tr>
            <tr>
                <td>Jenette</td>
                <td>Caldwell</td>
                <td>Development Lead</td>
                <td>New York</td>
                <td>$345,000</td>
            </tr>
            <tr>
                <td>Yuri</td>
                <td>Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
                <td>New York</td>
                <td>$675,000</td>

        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" style="text-align:right">Total:</th>
                <th></th>
            </tr>
        </tfoot>
    </table>