<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.informe_semanal_ejecucion_ise".
 *
 * @property int $id
 * @property int $institucion_id
 * @property int $sede_id
 * @property int $proyecto_id
 * @property int $estado
 * @property int $id_tipo_informe
 */
class InformeSemanalEjecucionIse extends \yii\db\ActiveRecord
{
    public $nombre_institucion;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.informe_semanal_ejecucion_ise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['institucion_id', 'sede_id', 'proyecto_id', 'estado', 'id_tipo_informe'], 'default', 'value' => null],
            [['institucion_id', 'sede_id', 'proyecto_id', 'estado', 'id_tipo_informe'], 'integer'],
            [['nombre_institucion', 'sede_id'], 'required'],
            [['id_tipo_informe'], 'exist', 'skipOnError' => true, 'targetClass' => TipoInforme::className(), 'targetAttribute' => ['id_tipo_informe' => 'id']],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            //[['institucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instituciones::className(), 'targetAttribute' => ['institucion_id' => 'id']],
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
            'institucion_id' => 'Institución',
            'nombre_institucion' => 'Institución',
            'sede_id' => 'Sede',
            'proyecto_id' => 'Proyecto',
            'estado' => 'Estado',
            'id_tipo_informe' => 'Id Tipo Informe',
        ];
    }
}
