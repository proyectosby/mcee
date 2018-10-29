<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.evidencias".
 *
 * @property int $id
 * @property string $observaciones
 * @property string $producto_ruta
 * @property string $resultados_actividad_ruta
 * @property string $acta_ruta
 * @property string $listado_ruta
 * @property string $fotografias_ruta
 * @property int $tipo_actividad_id
 * @property int $ieo_id
 */
class Evidencias extends \yii\db\ActiveRecord
{
    public $tipo_documento_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.evidencias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['observaciones', 'producto_ruta', 'resultados_actividad_ruta', 'acta_ruta', 'listado_ruta', 'fotografias_ruta'], 'string'],
            [['tipo_actividad_id', 'ieo_id'], 'default', 'value' => null],
            [['tipo_actividad_id', 'ieo_id'], 'integer'],
            [['tipo_actividad_id'], 'exist', 'skipOnError' => true, 'targetClass' => ActividadesIeo::className(), 'targetAttribute' => ['tipo_actividad_id' => 'id']],
            [['ieo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ieo::className(), 'targetAttribute' => ['ieo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'observaciones' => 'Observaciones',
            'producto_ruta' => 'Producto Ruta',
            'resultados_actividad_ruta' => 'Resultados Actividad Ruta',
            'acta_ruta' => 'Acta Ruta',
            'listado_ruta' => 'Listado Ruta',
            'fotografias_ruta' => 'Fotografias Ruta',
            'tipo_actividad_id' => 'Tipo Actividad ID',
            'ieo_id' => 'Ieo ID',
        ];
    }
}
