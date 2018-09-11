<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.levantamiento_orientacion".
 *
 * @property string $id
 * @property string $id_institucion
 * @property string $id_sede
 * @property string $visita_realizada
 * @property string $actividad_seguimiento
 * @property string $profesional_encargado
 * @property string $fortalezas_identificadas
 * @property string $necesidades_orientacion
 * @property string $observacion_general
 * @property string $uso_insumo
 * @property string $id_tipo_levantamiento
 * @property string $estado
 */
class EcLevantamientoOrientacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.levantamiento_orientacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_institucion', 'id_sede', 'visita_realizada', 'actividad_seguimiento', 'profesional_encargado', 'id_tipo_levantamiento', 'estado'], 'required'],
            [['id_institucion', 'id_sede', 'id_tipo_levantamiento', 'estado'], 'default', 'value' => null],
            [['id_institucion', 'id_sede', 'id_tipo_levantamiento', 'estado'], 'integer'],
            [['visita_realizada'], 'safe'],
            [['actividad_seguimiento', 'profesional_encargado'], 'string'],
            [['fortalezas_identificadas', 'necesidades_orientacion', 'observacion_general', 'uso_insumo'], 'string', 'max' => 2000],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['id_institucion'], 'exist', 'skipOnError' => true, 'targetClass' => Instituciones::className(), 'targetAttribute' => ['id_institucion' => 'id']],
            [['id_tipo_levantamiento'], 'exist', 'skipOnError' => true, 'targetClass' => Parametro::className(), 'targetAttribute' => ['id_tipo_levantamiento' => 'id']],
            [['id_sede'], 'exist', 'skipOnError' => true, 'targetClass' => Sedes::className(), 'targetAttribute' => ['id_sede' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           'id' => 'ID',
            'id_institucion' => 'Institución',
            'id_sede' => 'Sede',
            'visita_realizada' => 'Visita Realizada',
            'actividad_seguimiento' => 'Actividad Seguimiento',
            'profesional_encargado' => 'Profesional Encargado',
            'fortalezas_identificadas' => 'Fortalezas Identificadas',
            'necesidades_orientacion' => 'Necesidades Orientación',
            'observacion_general' => 'Observación General',
            'uso_insumo' => 'Uso Insumo',
            'id_tipo_levantamiento' => 'Tipo Levantamiento',
            'estado' => 'Estado',

        ];
    }
}
