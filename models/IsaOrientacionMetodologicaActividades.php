<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "isa.orientacion_metodologica_actividades".
 *
 * @property string $id
 * @property string $descripcion
 * @property string $id_actividades
 * @property string $estado
 */
class IsaOrientacionMetodologicaActividades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'isa.orientacion_metodologica_actividades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'descripcion', 'id_actividades', 'estado'], 'required'],
            [['id', 'id_actividades', 'estado'], 'default', 'value' => null],
            [['id', 'id_actividades', 'estado'], 'integer'],
            [['descripcion'], 'string'],
            [['id'], 'unique'],
            [['id_actividades'], 'exist', 'skipOnError' => true, 'targetClass' => IsaActividadesSeguimiento::className(), 'targetAttribute' => ['id_actividades' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'id_actividades' => 'Id Actividades',
            'estado' => 'Estado',
        ];
    }
}
