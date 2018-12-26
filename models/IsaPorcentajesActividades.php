<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "isa.porcentajes_actividades".
 *
 * @property string $id
 * @property string $total_sesiones
 * @property string $avance_sede
 * @property string $avance_ieo
 * @property string $seguimiento_actividades
 * @property string $evaluacion_actividades
 * @property string $id_seguimiento_proceso
 * @property string $id_actividades_seguimiento
 * @property string $estado
 */
class IsaPorcentajesActividades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'isa.porcentajes_actividades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_sesiones', 'avance_sede', 'avance_ieo', 'seguimiento_actividades', 'evaluacion_actividades', 'id_seguimiento_proceso', 'id_actividades_seguimiento', 'estado'], 'required'],
            [['total_sesiones', 'avance_sede', 'avance_ieo', 'seguimiento_actividades', 'evaluacion_actividades'], 'string'],
            [['id_seguimiento_proceso', 'id_actividades_seguimiento', 'estado'], 'default', 'value' => null],
            [['id_seguimiento_proceso', 'id_actividades_seguimiento', 'estado'], 'integer'],
            [['id_actividades_seguimiento'], 'exist', 'skipOnError' => true, 'targetClass' => IsaActividadesSeguimiento::className(), 'targetAttribute' => ['id_actividades_seguimiento' => 'id']],
            [['id_seguimiento_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => IsaSeguimientoProceso::className(), 'targetAttribute' => ['id_seguimiento_proceso' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total_sesiones' => 'Total Sesiones',
            'avance_sede' => 'Avance Sede',
            'avance_ieo' => 'Avance Ieo',
            'seguimiento_actividades' => 'Seguimiento Actividades',
            'evaluacion_actividades' => 'Evaluacion Actividades',
            'id_seguimiento_proceso' => 'Id Seguimiento Proceso',
            'id_actividades_seguimiento' => 'Id Actividades Seguimiento',
            'estado' => 'Estado',
        ];
    }
}
