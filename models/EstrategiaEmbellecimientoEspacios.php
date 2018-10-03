<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estrategia_embellecimiento_espacios".
 *
 * @property int $id
 * @property int $seguimiento_uso_espacios
 * @property string $plan_enlucimiento
 * @property int $estrateguia_enbellecimiento
 *
 * @property TipoParametro $seguimientoUsoEspacios
 * @property TipoParametro $estrateguiaEnbellecimiento
 */
class EstrategiaEmbellecimientoEspacios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estrategia_embellecimiento_espacios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seguimiento_uso_espacios', 'estrateguia_enbellecimiento'], 'default', 'value' => null],
            [['seguimiento_uso_espacios', 'estrateguia_enbellecimiento'], 'integer'],
            [['plan_enlucimiento'], 'string'],
            [['seguimiento_uso_espacios'], 'exist', 'skipOnError' => true, 'targetClass' => TipoParametro::className(), 'targetAttribute' => ['seguimiento_uso_espacios' => 'id']],
            [['estrateguia_enbellecimiento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoParametro::className(), 'targetAttribute' => ['estrateguia_enbellecimiento' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seguimiento_uso_espacios' => 'Seguimiento Uso Espacios',
            'plan_enlucimiento' => 'Plan Enlucimiento',
            'estrateguia_enbellecimiento' => 'Estrateguia Enbellecimiento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeguimientoUsoEspacios()
    {
        return $this->hasOne(TipoParametro::className(), ['id' => 'seguimiento_uso_espacios']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstrateguiaEnbellecimiento()
    {
        return $this->hasOne(TipoParametro::className(), ['id' => 'estrateguia_enbellecimiento']);
    }
}
