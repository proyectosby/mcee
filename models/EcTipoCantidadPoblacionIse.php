<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.tipo_cantidad_poblacion_ise".
 *
 * @property int $id
 * @property int $actividades_ise
 * @property string $nombre
 * @property int $estado
 */
class EcTipoCantidadPoblacionIse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.tipo_cantidad_poblacion_ise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actividades_ise', 'estado'], 'default', 'value' => null],
            [['actividades_ise', 'estado'], 'integer'],
            [['nombre'], 'string'],
            [['actividades_ise'], 'exist', 'skipOnError' => true, 'targetClass' => EcActividadesIse::className(), 'targetAttribute' => ['actividades_ise' => 'id']],
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
            'actividades_ise' => 'Actividades Ise',
            'nombre' => 'Nombre',
            'estado' => 'Estado',
        ];
    }
}
