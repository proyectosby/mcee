<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.tipos_cantidad_poblacion".
 *
 * @property int $id
 * @property int $actividad_id
 * @property int $ieo_id
 * @property string $tiempo_libre
 * @property string $edu_derechos
 * @property string $sexualidad
 * @property string $ciudadania
 * @property string $medio_ambiente
 * @property string $familia
 * @property string $directivos
 * @property string $fecha_creacion
 * @property int $proyecto_ieo_id
 * @property string $tipo_actividad
 */
class TiposCantidadPoblacion extends \yii\db\ActiveRecord
{
    public $total;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.tipos_cantidad_poblacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actividad_id', 'ieo_id', 'proyecto_ieo_id'], 'default', 'value' => null],
            [['actividad_id', 'ieo_id', 'proyecto_ieo_id', 'tiempo_libre', 'edu_derechos', 'sexualidad', 'ciudadania', 'medio_ambiente', 'familia', 'directivos'], 'integer'],
            [['tiempo_libre', 'edu_derechos', 'sexualidad', 'ciudadania', 'medio_ambiente', 'familia', 'directivos'], 'required'],
            [['fecha_creacion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'actividad_id' => 'Actividad ID',
            'ieo_id' => 'Ieo ID',
            'tiempo_libre' => 'Tiempo Libre',
            'edu_derechos' => 'Edu Derechos',
            'sexualidad' => 'Sexualidad',
            'ciudadania' => 'Ciudadanía',
            'medio_ambiente' => 'Medio Ambiente',
            'familia' => 'Familia',
            'directivos' => 'Directivos',
            'fecha_creacion' => 'Fecha',
            'proyecto_ieo_id' => 'Proyecto Ieo ID',
            'tipo_actividad' => 'Tipo Actividad',
        ];
    }
}
