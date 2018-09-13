<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.informe_planeacion_ieo".
 *
 * @property string $id
 * @property string $id_institucion
 * @property string $id_sede
 * @property string $codigo_dane
 * @property string $zona_educativa
 * @property string $id_comuna
 * @property string $id_barrio
 * @property string $fase
 * @property string $fecha_reporte
 */
class EcInformePlaneacionIeo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.informe_planeacion_ieo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_institucion', 'id_sede', 'codigo_dane', 'id_comuna', 'id_barrio'], 'default', 'value' => null],
            [['id_institucion', 'id_sede', 'codigo_dane', 'id_comuna', 'id_barrio'], 'integer'],
            [['zona_educativa', 'fase'], 'string'],
            [['fecha_reporte'], 'safe'],
            [['id_barrio'], 'exist', 'skipOnError' => true, 'targetClass' => BarriosVeredas::className(), 'targetAttribute' => ['id_barrio' => 'id']],
            [['id_comuna'], 'exist', 'skipOnError' => true, 'targetClass' => ComunasCorregimientos::className(), 'targetAttribute' => ['id_comuna' => 'id']],
            [['id_institucion'], 'exist', 'skipOnError' => true, 'targetClass' => Instituciones::className(), 'targetAttribute' => ['id_institucion' => 'id']],
            [['id_sede'], 'exist', 'skipOnError' => true, 'targetClass' => Sedes::className(), 'targetAttribute' => ['id_sede' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_institucion' => 'Id Institucion',
            'id_sede' => 'Id Sede',
            'codigo_dane' => 'Codigo Dane',
            'zona_educativa' => 'Zona Educativa',
            'id_comuna' => 'Comuna',
            'id_barrio' => 'Barrio',
            'fase' => 'Fase',
            'fecha_reporte' => 'Fecha Reporte',
        ];
    }
}
