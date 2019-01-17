<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.tipo_cantidad_poblacion_ise".
 *
 * @property int $id
 * @property int $id_informe_semanal_ejecucion_ise
 * @property string $edu_derechos
 * @property string $sexualidad_ciudadania
 * @property string $medio_ambiente
 * @property string $familia
 * @property string $directivos
 * @property string $tiempo_libre
 * @property int $id_proyecto
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
            [['id_informe_semanal_ejecucion_ise', 'id_proyecto', 'estado'], 'default', 'value' => null],
            [['id_informe_semanal_ejecucion_ise', 'id_proyecto', 'estado'], 'integer'],
            [['edu_derechos', 'sexualidad_ciudadania', 'medio_ambiente', 'familia', 'directivos', 'tiempo_libre'], 'string'],
            [['id_informe_semanal_ejecucion_ise'], 'exist', 'skipOnError' => true, 'targetClass' => InformeSemanalEjecucionIse::className(), 'targetAttribute' => ['id_informe_semanal_ejecucion_ise' => 'id']],
            [['id_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => EcProyectos::className(), 'targetAttribute' => ['id_proyecto' => 'id']],
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
            'id_informe_semanal_ejecucion_ise' => 'Id Informe Semanal Ejecucion Ise',
            'edu_derechos' => 'Edu Derechos',
            'sexualidad_ciudadania' => 'Sexualidad y Ciudadanía',
            'medio_ambiente' => 'Medio Ambiente',
            'familia' => 'Familia',
            'directivos' => 'Directivos',
            'tiempo_libre' => 'Tiempo Libre',
            'id_proyecto' => 'Id Proyecto',
            'estado' => 'Estado',
        ];
    }
}
