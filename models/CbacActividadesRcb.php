<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cbac.actividades_rcb".
 *
 * @property int $id
 * @property int $id_rcb
 * @property string $fehca_desde
 * @property string $fecha_hasta
 * @property string $estado
 * @property string $num_equipos
 * @property string $perfiles
 * @property string $docente_orientador
 * @property string $nombre_actividad
 * @property string $duracion_sesion
 * @property string $logros
 * @property string $fortalezas
 * @property string $debilidades
 * @property string $alternativas
 * @property string $retos
 * @property string $articulacion
 * @property string $evaluacion
 * @property string $observaciones_generales
 * @property string $alarmas
 * @property string $justificacion_activiad_no_realizada
 * @property string $fecha_reprogramacion
 * @property string $diligencia
 * @property string $rol
 * @property string $fecha_diligencia
 * @property int $id_componente
 * @property int $id_actividad
 */
class CbacActividadesRcb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cbac.actividades_rcb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rcb', 'id_componente', 'id_actividad'], 'default', 'value' => null],
            [['id_rcb', 'id_componente', 'id_actividad'], 'integer'],
            [['fehca_desde', 'fecha_hasta', 'fecha_reprogramacion'], 'safe'],
            [['estado', 'num_equipos', 'perfiles', 'docente_orientador', 'nombre_actividad', 'duracion_sesion', 'logros', 'fortalezas', 'debilidades', 'alternativas', 'retos', 'articulacion', 'evaluacion', 'observaciones_generales', 'alarmas', 'justificacion_activiad_no_realizada', 'diligencia', 'rol', 'fecha_diligencia'], 'string'],
            [['id_rcb'], 'exist', 'skipOnError' => true, 'targetClass' => CbacReporteCompetenciasBasicasAc::className(), 'targetAttribute' => ['id_rcb' => 'id']],
            [['id_componente'], 'exist', 'skipOnError' => true, 'targetClass' => IsaComponentes::className(), 'targetAttribute' => ['id_componente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_rcb' => 'Id Rcb',
            'fehca_desde' => 'Fehca Desde',
            'fecha_hasta' => 'Fecha Hasta',
            'estado' => 'Estado',
            'num_equipos' => 'Num Equipos',
            'perfiles' => 'Perfiles',
            'docente_orientador' => 'Docente Orientador',
            'nombre_actividad' => 'Nombre Actividad',
            'duracion_sesion' => 'Duracion Sesion',
            'logros' => 'Logros',
            'fortalezas' => 'Fortalezas',
            'debilidades' => 'Debilidades',
            'alternativas' => 'Alternativas',
            'retos' => 'Retos',
            'articulacion' => 'Articulacion',
            'evaluacion' => 'Evaluacion',
            'observaciones_generales' => 'Observaciones Generales',
            'alarmas' => 'Alarmas',
            'justificacion_activiad_no_realizada' => 'Justificacion Activiad No Realizada',
            'fecha_reprogramacion' => 'Fecha Reprogramacion',
            'diligencia' => 'Diligencia',
            'rol' => 'Rol',
            'fecha_diligencia' => 'Fecha Diligencia',
            'id_componente' => 'Id Componente',
            'id_actividad' => 'Id Actividad',
        ];
    }
}
