<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.actividades_ise".
 *
 * @property int $id
 * @property int $informe_semanal_ejecucion_id
 * @property string $nombre
 * @property int $estado
 */
class EcActividadesIse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.actividades_ise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['informe_semanal_ejecucion_id', 'estado'], 'default', 'value' => null],
            [['informe_semanal_ejecucion_id', 'estado'], 'integer'],
            [['nombre'], 'string'],
            //[['informe_semanal_ejecucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => EcInformeSemanalEjecucionIse::className(), 'targetAttribute' => ['informe_semanal_ejecucion_id' => 'id']],
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
            'informe_semanal_ejecucion_id' => 'Informe Semanal Ejecucion ID',
            'nombre' => 'Nombre',
            'estado' => 'Estado',
            'actividad_1_porcentaje' => "Actividad 1 %",
            'actividad_2_porcentaje' => "Actividad 2 %",
            'actividad_3_porcentaje' => "Actividad 3 %",
            'avance_sede' => "Avance Sede %",
            'avance_ieo' => 'Avance IEO %',
            
        ];
    }
}
