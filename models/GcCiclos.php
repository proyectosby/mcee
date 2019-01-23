<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gc.ciclos".
 *
 * @property string $id
 * @property string $fecha
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_finalizacion
 * @property string $fecha_cierre
 * @property string $fecha_maxima_acceso
 * @property string $id_creador
 * @property string $estado
 */
class GcCiclos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gc.ciclos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'fecha_inicio', 'fecha_finalizacion', 'fecha_cierre', 'fecha_maxima_acceso'], 'safe'],
            [['descripcion'], 'string'],
            [['id_creador', 'estado'], 'required'],
            [['id_creador', 'estado'], 'default', 'value' => null],
            [['id_creador', 'estado'], 'integer'],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['id_creador'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['id_creador' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_finalizacion' => 'Fecha Finalizacion',
            'fecha_cierre' => 'Fecha Cierre',
            'fecha_maxima_acceso' => 'Fecha Maxima Acceso',
            'id_creador' => 'Id Creador',
            'estado' => 'Estado',
        ];
    }
}
