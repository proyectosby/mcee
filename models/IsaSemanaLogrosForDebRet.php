<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "isa.semana_logros_for_deb_ret".
 *
 * @property string $id
 * @property string $semana1
 * @property string $semana2
 * @property string $semana3
 * @property string $semana4
 * @property string $id_for_deb_ret
 * @property string $estado
 */
class IsaSemanaLogrosForDebRet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'isa.semana_logros_for_deb_ret';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semana1', 'semana2', 'semana3', 'semana4', 'id_for_deb_ret', 'estado'], 'required'],
            [['semana1', 'semana2', 'semana3', 'semana4'], 'string'],
            [['id_for_deb_ret', 'estado'], 'default', 'value' => null],
            [['id_for_deb_ret', 'estado'], 'integer'],
            [['id_for_deb_ret'], 'exist', 'skipOnError' => true, 'targetClass' => IsaForDebRet::className(), 'targetAttribute' => ['id_for_deb_ret' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'semana1' => 'Semana1',
            'semana2' => 'Semana2',
            'semana3' => 'Semana3',
            'semana4' => 'Semana4',
            'id_for_deb_ret' => 'Id For Deb Ret',
            'estado' => 'Estado',
        ];
    }
}
