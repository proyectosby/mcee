<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.porcentaje_avance".
 *
 * @property string $id
 * @property string $id_proceso
 * @property string $id_pregunta_porcentaje_avance
 * @property string $id_informe_planeacion
 * @property string $fecha_avance
 * @property int $estado
 * @property int $porcentaje
 */
class EcPorcentajeAvance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.porcentaje_avance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proceso', 'id_pregunta_porcentaje_avance', 'id_informe_planeacion', 'estado', 'porcentaje'], 'default', 'value' => null],
            [['id_proceso', 'id_pregunta_porcentaje_avance', 'id_informe_planeacion', 'estado', 'porcentaje'], 'integer'],
            [['fecha_avance'], 'safe'],
            [['id_informe_planeacion'], 'exist', 'skipOnError' => true, 'targetClass' => EcInformePlaneacionIeo::className(), 'targetAttribute' => ['id_informe_planeacion' => 'id']],
            [['id_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => EcProcesos::className(), 'targetAttribute' => ['id_proceso' => 'id']],
            [['id_pregunta_porcentaje_avance'], 'exist', 'skipOnError' => true, 'targetClass' => Parametro::className(), 'targetAttribute' => ['id_pregunta_porcentaje_avance' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_proceso' => 'Id Proceso',
            'id_pregunta_porcentaje_avance' => 'Id Pregunta Porcentaje Avance',
            'id_informe_planeacion' => 'Id Informe Planeacion',
            'fecha_avance' => 'Fecha Avance',
            'estado' => 'Estado',
            'porcentaje' => 'Porcentaje',
        ];
    }
}
