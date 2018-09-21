<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.requerimiento_extra_ieo".
 *
 * @property int $id
 * @property string $socializacion
 * @property string $soporte_socializacion
 * @property int $tipo_documento_id
 * @property int $estado_id
 * @property string $ruta
 */
class RequerimientoExtraIeo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.requerimiento_extra_ieo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['socializacion', 'soporte_socializacion', 'ruta'], 'string'],
            [['tipo_documento_id', 'estado_id'], 'default', 'value' => null],
            [['tipo_documento_id', 'estado_id'], 'integer'],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado_id' => 'id']],
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
            'socializacion' => 'Socializacion',
            'soporte_socializacion' => 'Soporte Socializacion',
            'tipo_documento_id' => 'Tipo Documento ID',
            'estado_id' => 'Estado ID',
            'ruta' => 'Ruta',
        ];
    }
}
