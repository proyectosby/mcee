<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.estudiantes_ise".
 *
 * @property int $id
 * @property int $tipo_cantidad_poblacion_ise_id
 * @property int $grado
 * @property int $cantidad
 * @property int $estado
 */
class EcEstudiantesIse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.estudiantes_ise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_cantidad_poblacion_ise_id', 'grado', 'cantidad', 'estado'], 'default', 'value' => null],
            [['tipo_cantidad_poblacion_ise_id', 'grado', 'cantidad', 'estado'], 'integer'],
            [['tipo_cantidad_poblacion_ise_id'], 'exist', 'skipOnError' => true, 'targetClass' => EcTipoCantidadPoblacionIse::className(), 'targetAttribute' => ['tipo_cantidad_poblacion_ise_id' => 'id']],
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
            'tipo_cantidad_poblacion_ise_id' => 'Tipo Cantidad Poblacion Ise ID',
            'grado' => 'Grado',
            'cantidad' => 'Cantidad',
            'estado' => 'Estado',
        ];
    }
}
