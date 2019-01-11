<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gc.semanas".
 *
 * @property string $id
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_finalizacion
 * @property string $fecha_cierre
 * @property string $estado
 */
class GcSemanas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gc.semanas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['fecha_inicio', 'fecha_finalizacion', 'fecha_cierre'], 'safe'],
            [['estado'], 'required'],
            [['estado'], 'default', 'value' => null],
            [['estado'], 'integer'],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_finalizacion' => 'Fecha Finalizacion',
            'fecha_cierre' => 'Fecha Cierre',
            'estado' => 'Estado',
        ];
    }
}
