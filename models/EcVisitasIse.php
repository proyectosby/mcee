<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.visitas_ise".
 *
 * @property int $id
 * @property int $informe_semanal_ejecucion_id
 * @property int $cantidad_visitas_realizadas
 * @property int $canceladas
 * @property int $visitas_fallidas
 * @property string $observaciones_evidencias
 * @property string $alarmas
 */
class EcVisitasIse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.visitas_ise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['informe_semanal_ejecucion_id', 'cantidad_visitas_realizadas', 'canceladas', 'visitas_fallidas'], 'default', 'value' => null],
            [['informe_semanal_ejecucion_id', 'cantidad_visitas_realizadas', 'canceladas', 'visitas_fallidas'], 'integer'],
            [['observaciones_evidencias', 'alarmas'], 'string'],
            //[['informe_semanal_ejecucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => EcInformeSemanalEjecucionIse::className(), 'targetAttribute' => ['informe_semanal_ejecucion_id' => 'id']],
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
            'cantidad_visitas_realizadas' => 'Cantidad Visitas Realizadas',
            'canceladas' => 'Canceladas',
            'visitas_fallidas' => 'Visitas Fallidas',
            'observaciones_evidencias' => 'Observaciones Evidencias',
            'alarmas' => 'Alarmas',
        ];
    }
}
