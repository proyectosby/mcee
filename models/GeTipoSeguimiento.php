<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ge.tipo_seguimiento".
 *
 * @property string $id
 * @property string $descripcion
 * @property string $estado
 */
class GeTipoSeguimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ge.tipo_seguimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
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
            'estado' => 'Estado',
        ];
    }
}
