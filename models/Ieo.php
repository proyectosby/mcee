<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.ieo".
 *
 * @property int $id
 * @property int $institucion_id
 * @property int $sede_id
 * @property int $estado
 * @property string $persona_acargo
 * @property string $codigo_dane
 * @property string $zona_educativa
 * @property string $comuna
 * @property string $barrio
 */
class Ieo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.ieo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['institucion_id', 'sede_id', 'estado'], 'default', 'value' => null],
            [['institucion_id', 'sede_id', 'estado'], 'integer'],
            [['persona_acargo', 'codigo_dane', 'zona_educativa', 'comuna', 'barrio'], 'string'],
            [['institucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instituciones::className(), 'targetAttribute' => ['institucion_id' => 'id']],
            [['sede_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sedes::className(), 'targetAttribute' => ['sede_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institucion_id' => 'Institucion ID',
            'sede_id' => 'Sede ID',
            'estado' => 'Estado',
            'persona_acargo' => 'Persona Acargo',
            'codigo_dane' => 'Codigo Dane',
            'zona_educativa' => 'Zona Educativa',
            'comuna' => 'Comuna',
            'barrio' => 'Barrio',
        ];
    }
}
