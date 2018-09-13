<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id
 * @property int $ieo_id
 * @property int $plan_accion_id
 * @property string $informe_ruta_cualificacion
 * @property string $presentacion_plan_accion_ieo
 * @property string $estado
 *
 * @property Ieo $ieo
 * @property PlanAccion $planAccion
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ieo_id', 'plan_accion_id', 'estado'], 'default', 'value' => null],
            [['ieo_id', 'plan_accion_id', 'estado'], 'integer'],
            [['informe_ruta_cualificacion', 'presentacion_plan_accion_ieo'], 'string'],
            [['ieo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ieo::className(), 'targetAttribute' => ['ieo_id' => 'id']],
            [['plan_accion_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlanAccion::className(), 'targetAttribute' => ['plan_accion_id' => 'id']],
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
            'plan_accion_id' => 'Plan Accion ID',
            'informe_ruta_cualificacion' => 'Informe Ruta Cualificacion',
            'presentacion_plan_accion_ieo' => 'Presentacion Plan Accion Ieo',
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
    public function getPlanAccion()
    {
        return $this->hasOne(PlanAccion::className(), ['id' => 'plan_accion_id']);
    }
}
