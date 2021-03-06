<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "isa.actividades_artisticas".
 *
 * @property string $id
 * @property string $descripcion
 * @property string $estado
 * @property int $orden
 */
class IsaActividadesArtisticas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'isa.actividades_artisticas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['estado'], 'required'],
            [['estado', 'orden'], 'default', 'value' => null],
            [['estado', 'orden'], 'integer'],
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
            'estado' => 'Estado',
            'orden' => 'Orden',
        ];
    }
}
