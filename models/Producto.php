<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.producto".
 *
 * @property int $id
 * @property int $ieo_id
 * @property string $imforme_ruta
 * @property string $plan_accion_ruta
 * @property int $actividades_ieo_id
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ieo_id', 'actividades_ieo_id'], 'default', 'value' => null],
            [['ieo_id', 'actividades_ieo_id'], 'integer'],
            [['imforme_ruta', 'plan_accion_ruta'], 'string'],
            [['actividades_ieo_id'], 'exist', 'skipOnError' => true, 'targetClass' => ActividadesIeo::className(), 'targetAttribute' => ['actividades_ieo_id' => 'id']],
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
            'imforme_ruta' => 'Informe de rutas de cualificación ',
            'plan_accion_ruta' => 'Plan de acción',
            'actividades_ieo_id' => 'Actividades Ieo ID',
        ];
    }
}
