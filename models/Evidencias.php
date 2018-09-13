<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evidencias".
 *
 * @property int $id
 * @property int $ieo_id
 * @property string $tipo_actividad_id
 * @property int $tipo_documento_id
 * @property string $ruta
 * @property string $observaciones
 * @property string $estado
 *
 * @property Ieo $ieo
 * @property TiposDocumentos $tipoDocumento
 */
class Evidencias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evidencias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ieo_id', 'tipo_documento_id', 'estado'], 'default', 'value' => null],
            [['ieo_id', 'tipo_documento_id', 'estado'], 'integer'],
            [['tipo_actividad_id', 'ruta', 'observaciones'], 'string'],
            [['ieo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ieo::className(), 'targetAttribute' => ['ieo_id' => 'id']],
            [['tipo_documento_id'], 'exist', 'skipOnError' => true, 'targetClass' => TiposDocumentos::className(), 'targetAttribute' => ['tipo_documento_id' => 'id']],
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
            'tipo_actividad_id' => 'Tipo Actividad ID',
            'tipo_documento_id' => 'Tipo Documento ID',
            'ruta' => 'Ruta',
            'observaciones' => 'Observaciones',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIeo()
    {
        return $this->hasOne(Ieo::className(), ['id' => 'ieo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDocumento()
    {
        return $this->hasOne(TiposDocumentos::className(), ['id' => 'tipo_documento_id']);
    }
}
