<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GcBitacora */

$this->title = "Detalles";
$this->params['breadcrumbs'][] = ['label' => 'Gc Bitacoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("@web/css/modal.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>
<div class="gc-bitacora-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="panel-title">Información del docente tutor</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-profile">
                                    <thead>
                                    <tr>
                                        <th class="ancho-30-pct"></th>
                                        <th></th>
                                        <th th="" class="ancho-30-pct"></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="field">Docente:</td>
                                        <td>GRAPHIC MEDELLIN</td>
                                        <td class="field">Jornada:</td>
                                        <td>Mañana</td>
                                    </tr>
                                    <tr>
                                        <td class="field" style="width: 250px">Profesional de acompañamiento a cargo del docente:</td>
                                        <td>ACOMPAÑAMIENTO BY ALL GRAPHIC</td>
                                        <td class="field">Sede de la bitacora:</td>
                                        <td>IEO AGUSTIN NIETO CABALLERO -- AGUSTIN NIETO CABALLERO</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="panel-title">Visualización de la bitácora</h4>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="text-center">Avance en los propósitos seleccionados</h4>
                        </div>

                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>Propósito</th>
                                        <th>Nivel de avance</th>
                                        <th>Justificación</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <hr style="border-top-color: #000000">
                        </div>

                        <div class="col-sm-12">
                            <ul class="nav nav-tabs hidden-print">

                                <li class="active "><a href="#tab-semana-1" data-toggle="tab">Semana 1</a></li>

                                <li class=" "><a href="#tab-semana-2" data-toggle="tab">Semana 2</a></li>

                                <li class=" "><a href="#tab-semana-3" data-toggle="tab">Semana 3</a></li>

                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane fade active in" id="tab-semana-1">
                                    <h2 class="text-center">Semana 1</h2>
                                    <br>
                                    <h4 class="text-center">Propósitos seleccionados</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th>Descripción del propósito</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>
                                                            2. Identificar y promover prácticas pedagógicas en términos de experiencias, innovación e investigación pedagógica.
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            3. Identificar y orientar el desarrollo y la divulgación de recursos pedagógicos y didácticos que permitan el mejoramiento de las prácticas escolares.
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            5. Realizar ejercicios de escritura (individuales o colectivos) en relación con las prácticas pedagógicas identificadas en la Institución Educativa.
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            7. Gestionar los espacios, recursos y demás variables requeridas en el acompañamiento de la institución hacia nuevas y mejores prácticas pedagógicas.
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Actividades planeadas</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-50-pct">Nombre de la actividad</th>
                                                        <th>Descripción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>asdfadsf</td>
                                                        <td>asdfasdf</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Robótica</td>
                                                        <td>Robots y más cosas relacionadas con robots</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Resultados esperados</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-50-pct">Nombre del resultado</th>
                                                        <th>Descripción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>sfasdfs</td>
                                                        <td>asdfsadf</td>
                                                    </tr>

                                                    <tr>
                                                        <td>asfbgdsf</td>
                                                        <td>asdfasdfesdfasdf</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Productos esperados</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-50-pct">Nombre del producto</th>
                                                        <th>Descripción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>El hombre del piano</td>
                                                        <td>Esta es la historia de un sábado de no importa que mes y de un hombre sentado al piano de no importa que viejo café</td>
                                                    </tr>

                                                    <tr>
                                                        <td>eeeeeeeee</td>
                                                        <td>eeeeeeeee</td>
                                                    </tr>

                                                    <tr>
                                                        <td>asdfeggrrgg</td>
                                                        <td>asdfeadsagadsfs</td>
                                                    </tr>

                                                    <tr>
                                                        <td>asfasdfas</td>
                                                        <td>asdfasdfas afa</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Evidencias de visitas</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th class="ancho-30-pct">¿Se realizó visita?</th>
                                                        <th>Evidencia / Justificación</th>
                                                        <th>Número de estudiantes</th>
                                                        <th>Número de docentes</th>
                                                        <th>Número de directivos</th>
                                                        <th>Otros</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Actividades ejecutadas</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-25-pct">Nombre de la actividad</th>
                                                        <th class="ancho-25-pct">Descripción</th>
                                                        <th>¿Se ejecutó la actividad?</th>
                                                        <th class="ancho-25-pct">Justificación</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>Robótica</td>
                                                        <td>asadfasdfsaf dsfedafasd</td>
                                                        <td class="text-center">Sí</td>
                                                        <td></td>
                                                    </tr>

                                                    <tr>
                                                        <td>asdfadsf</td>
                                                        <td></td>
                                                        <td class="text-center">No</td>
                                                        <td>ttttttttttttt</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>

                                    <h4 class="text-center">Resultados obtenidos</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-25-pct">Nombre del resultado</th>
                                                        <th class="ancho-25-pct">Descripción</th>
                                                        <th>¿Se logró el resultado?</th>
                                                        <th class="ancho-25-pct">Justificación</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>asfbgdsf</td>
                                                        <td></td>
                                                        <td class="text-center">No</td>
                                                        <td>dfefsdafeasdf</td>
                                                    </tr>

                                                    <tr>
                                                        <td>sfasdfs</td>
                                                        <td>sdasdfasfasdf</td>
                                                        <td class="text-center">Sí</td>
                                                        <td></td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Productos obtenidos</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-25-pct">Nombre del producto</th>
                                                        <th class="ancho-25-pct">Descripción</th>
                                                        <th>¿Se logró el producto?</th>
                                                        <th class="ancho-25-pct">Justificación</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-center">Parcialmente</td>
                                                        <td>dfedfadsfeadsf</td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-center">No</td>
                                                        <td></td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-center">No</td>
                                                        <td></td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="text-center">No</td>
                                                        <td></td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade " id="tab-semana-2">
                                    <h2 class="text-center">Semana 2</h2>
                                    <br>
                                    <h4 class="text-center">Propósitos seleccionados</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th>Descripción del propósito</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Actividades planeadas</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-50-pct">Nombre de la actividad</th>
                                                        <th>Descripción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Resultados esperados</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-50-pct">Nombre del resultado</th>
                                                        <th>Descripción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Productos esperados</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-50-pct">Nombre del producto</th>
                                                        <th>Descripción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Evidencias de visitas</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th class="ancho-30-pct">¿Se realizó visita?</th>
                                                        <th>Evidencia / Justificación</th>
                                                        <th>Número de estudiantes</th>
                                                        <th>Número de docentes</th>
                                                        <th>Número de directivos</th>
                                                        <th>Otros</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Actividades ejecutadas</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-25-pct">Nombre de la actividad</th>
                                                        <th class="ancho-25-pct">Descripción</th>
                                                        <th>¿Se ejecutó la actividad?</th>
                                                        <th class="ancho-25-pct">Justificación</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>

                                    <h4 class="text-center">Resultados obtenidos</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-25-pct">Nombre del resultado</th>
                                                        <th class="ancho-25-pct">Descripción</th>
                                                        <th>¿Se logró el resultado?</th>
                                                        <th class="ancho-25-pct">Justificación</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Productos obtenidos</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-25-pct">Nombre del producto</th>
                                                        <th class="ancho-25-pct">Descripción</th>
                                                        <th>¿Se logró el producto?</th>
                                                        <th class="ancho-25-pct">Justificación</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade " id="tab-semana-3">
                                    <h2 class="text-center">Semana 3</h2>
                                    <br>
                                    <h4 class="text-center">Propósitos seleccionados</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th>Descripción del propósito</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Actividades planeadas</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-50-pct">Nombre de la actividad</th>
                                                        <th>Descripción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Resultados esperados</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-50-pct">Nombre del resultado</th>
                                                        <th>Descripción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Productos esperados</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-50-pct">Nombre del producto</th>
                                                        <th>Descripción</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Evidencias de visitas</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th class="ancho-30-pct">¿Se realizó visita?</th>
                                                        <th>Evidencia / Justificación</th>
                                                        <th>Número de estudiantes</th>
                                                        <th>Número de docentes</th>
                                                        <th>Número de directivos</th>
                                                        <th>Otros</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Actividades ejecutadas</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-25-pct">Nombre de la actividad</th>
                                                        <th class="ancho-25-pct">Descripción</th>
                                                        <th>¿Se ejecutó la actividad?</th>
                                                        <th class="ancho-25-pct">Justificación</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>

                                    <h4 class="text-center">Resultados obtenidos</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-25-pct">Nombre del resultado</th>
                                                        <th class="ancho-25-pct">Descripción</th>
                                                        <th>¿Se logró el resultado?</th>
                                                        <th class="ancho-25-pct">Justificación</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Productos obtenidos</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th class="ancho-25-pct">Nombre del producto</th>
                                                        <th class="ancho-25-pct">Descripción</th>
                                                        <th>¿Se logró el producto?</th>
                                                        <th class="ancho-25-pct">Justificación</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
