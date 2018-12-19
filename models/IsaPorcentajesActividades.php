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
            [['id', 'total_sesiones', 'avance_sede', 'avance_ieo', 'seguimiento_actividades', 'evaluacion_actividades', 'id_seguimiento_proceso', 'estado'], 'required'],
            [['id', 'id_seguimiento_proceso', 'estado'], 'default', 'value' => null],
            [['id', 'id_seguimiento_proceso', 'estado'], 'integer'],
            [['total_sesiones', 'avance_sede', 'avance_ieo', 'seguimiento_actividades', 'evaluacion_actividades'], 'string'],
            [['id'], 'unique'],
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
            'total_sesiones' => 'Total de sesiones realizadas en el mes',
            'avance_sede' => '% Avance por sede',
            'avance_ieo' => '% Avance por IEO',
            'seguimiento_actividades' => 'Se cuenta con documentos de seguimiento de actividades desarrolladas',
            'evaluacion_actividades' => 'Se cuenta con documentos de evaluación de actividades desarrolladas',
            'id_seguimiento_proceso' => 'Id Seguimiento Proceso',
            'estado' => 'Estado',
        ];
    }
}
