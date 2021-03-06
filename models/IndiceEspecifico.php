<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indice_especifico".
 *
 * @property string $id
 * @property string $descripcion
 * @property string $estado
 *
 * @property Estados $estado0
 * @property IndiceSinteticoCalidad[] $indiceSinteticoCalidads
 */
class IndiceEspecifico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indice_especifico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'estado'], 'required'],
            [['estado'], 'default', 'value' => null],
            [['estado'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado0()
    {
        return $this->hasOne(Estados::className(), ['id' => 'estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndiceSinteticoCalidads()
    {
        return $this->hasMany(IndiceSinteticoCalidad::className(), ['id_indice_especifico' => 'id']);
    }
}
