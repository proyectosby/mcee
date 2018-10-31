<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.cantidad_poblacion_imp_ieo".
 *
 * @property int $id
 * @property int $implementacion_ieo_id
 * @property string $tiempo_libre
 * @property string $edu_derechos
 * @property string $sexualidad
 * @property string $ciudadania
 * @property string $medio_ambiente
 * @property string $familia
 * @property string $directivos
 * @property string $fecha_creacion
 * @property int $tipo_actividad
 */
class CantidadPoblacionImpIeo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.cantidad_poblacion_imp_ieo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['implementacion_ieo_id', 'tipo_actividad'], 'default', 'value' => null],
            [['implementacion_ieo_id', 'tipo_actividad'], 'integer'],
            [['tiempo_libre', 'edu_derechos', 'sexualidad', 'ciudadania', 'medio_ambiente', 'familia', 'directivos', 'fecha_creacion'], 'string'],
            [['tipo_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => ActividadesIeo::className(), 'targetAttribute' => ['tipo_actividad' => 'id']],
            [['implementacion_ieo_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImplementacionIeo::className(), 'targetAttribute' => ['implementacion_ieo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'implementacion_ieo_id' => 'Implementacion Ieo ID',
            'tiempo_libre' => 'Tiempo Libre',
            'edu_derechos' => 'Edu Derechos',
            'sexualidad' => 'Sexualidad',
            'ciudadania' => 'Ciudadania',
            'medio_ambiente' => 'Medio Ambiente',
            'familia' => 'Familia',
            'directivos' => 'Directivos',
            'fecha_creacion' => 'Fecha Creacion',
            'tipo_actividad' => 'Tipo Actividad',
        ];
    }
}
