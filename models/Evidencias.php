<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.evidencias".
 *
 * @property int $id
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
            [['producto_ruta', 'resultados_actividad_ruta', 'acta_ruta', 'listado_ruta', 'fotografias_ruta'], 'string'],
            [['tipo_actividad_id', 'ieo_id'], 'default', 'value' => null],
            [['tipo_actividad_id', 'ieo_id'], 'integer'],
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
            'producto_ruta' => 'Producto: mapa puntos de partida y llegada',
            'resultados_actividad_ruta' => 'Resultados de la actividad',
            'acta_ruta' => 'ACTA',
            'listado_ruta' => 'LISTADO',
            'fotografias_ruta' => 'FOTOGRAFÍAS',
            'tipo_actividad_id' => 'Observaciones sobre las evidencias',
            'ieo_id' => 'Ieo ID',
        ];
    }
}
