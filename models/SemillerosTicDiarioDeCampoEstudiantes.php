<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semilleros_tic.diario_de_campo_estudiantes".
 *
 * @property string $id
 * @property string $id_fase
 * @property string $descripcion
 * @property string $hallazgos
 * @property string $estado
 */
class SemillerosTicDiarioDeCampoEstudiantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'semilleros_tic.diario_de_campo_estudiantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_fase', 'descripcion', 'hallazgos', 'estado'], 'required'],
            [['id', 'id_fase', 'estado'], 'default', 'value' => null],
            [['id', 'id_fase', 'estado'], 'integer'],
            [['descripcion', 'hallazgos'], 'string', 'max' => 5000],
            [['id'], 'unique'],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['id_fase'], 'exist', 'skipOnError' => true, 'targetClass' => SemillerosTicFases::className(), 'targetAttribute' => ['id_fase' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_fase' => 'Fase',
            'descripcion' => 'Descripción',
            'hallazgos' => 'Hallazgos',
            'estado' => 'Estado',
        ];
    }
}
