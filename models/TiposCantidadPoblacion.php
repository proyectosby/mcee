<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos_cantidad_poblacion".
 *
 * @property int $id
 * @property int $ieo_id
 * @property int $actividad_id
 * @property string $tiempo_libre
 * @property string $edu_derechos
 * @property string $sexualidad
 * @property string $ciudadania
 * @property string $medio_ambiente
 * @property string $familia
 * @property string $directivos
 * @property string $total
 * @property string $estado
 *
 * @property EstudiantesGrado[] $estudiantesGrados
 * @property ActividadesIeo $actividad
 * @property Ieo $ieo
 */
class TiposCantidadPoblacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipos_cantidad_poblacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ieo_id', 'actividad_id', 'estado'], 'default', 'value' => null],
            [['ieo_id', 'actividad_id', 'estado'], 'integer'],
            [['tiempo_libre', 'edu_derechos', 'sexualidad', 'ciudadania', 'medio_ambiente', 'familia', 'directivos', 'total'], 'string'],
            [['actividad_id'], 'exist', 'skipOnError' => true, 'targetClass' => ActividadesIeo::className(), 'targetAttribute' => ['actividad_id' => 'id']],
            [['ieo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ieo::className(), 'targetAttribute' => ['ieo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ieo_id' => 'Ieo ID',
            'actividad_id' => 'Actividad ID',
            'tiempo_libre' => 'Tiempo Libre',
            'edu_derechos' => 'Edu Derechos',
            'sexualidad' => 'Sexualidad',
            'ciudadania' => 'Ciudadania',
            'medio_ambiente' => 'Medio Ambiente',
            'familia' => 'Familia',
            'directivos' => 'Directivos',
            'total' => 'Total',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantesGrados()
    {
        return $this->hasMany(EstudiantesGrado::className(), ['tipo_cantidad_poblacion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividad()
    {
        return $this->hasOne(ActividadesIeo::className(), ['id' => 'actividad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIeo()
    {
        return $this->hasOne(Ieo::className(), ['id' => 'ieo_id']);
    }
}
