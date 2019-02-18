<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gc.momento1".
 *
 * @property string $id
 * @property string $id_semana
 * @property string $descripcion_proposito
 * @property string $estado
 */
class GcMomento1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gc.momento1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_semana', 'descripcion_proposito', 'estado'], 'required'],
            [['id_semana', 'estado'], 'default', 'value' => null],
            [['id_semana', 'estado'], 'integer'],
            [['descripcion_proposito'], 'string', 'max' => 600],
            [['id_semana'], 'exist', 'skipOnError' => true, 'targetClass' => GcSemanas::className(), 'targetAttribute' => ['id_semana' => 'id']],
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
            'id_semana' => 'Id Semana',
            'descripcion_proposito' => 'Descripcion Proposito',
            'estado' => 'Estado',
        ];
    }
}