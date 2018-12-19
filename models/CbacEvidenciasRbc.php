<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cbac.evidencias_rbc".
 *
 * @property int $id
 * @property int $id_actividad_rcb
 * @property string $actas
 * @property string $reportes
 * @property string $listados
 * @property string $plan_trabajo
 * @property string $formato_seguimiento
 * @property string $formato_evaluacion
 * @property string $fotografias
 * @property string $vidoes
 * @property string $otros_productos
 * @property int $cantidad
 * @property string $archivos_enviados_entregados
 * @property string $fecha_entrega_envio
 * @property int $estado
 */
class CbacEvidenciasRbc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cbac.evidencias_rbc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_actividad_rcb', 'cantidad', 'estado'], 'default', 'value' => null],
            [['id_actividad_rcb', 'cantidad', 'estado'], 'integer'],
            [['actas', 'reportes', 'listados', 'plan_trabajo', 'formato_seguimiento', 'formato_evaluacion', 'fotografias', 'vidoes', 'otros_productos', 'archivos_enviados_entregados'], 'string'],
            [['fecha_entrega_envio'], 'safe'],
            [['id_actividad_rcb'], 'exist', 'skipOnError' => true, 'targetClass' => CbacActividadesRcb::className(), 'targetAttribute' => ['id_actividad_rcb' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_actividad_rcb' => 'Id Actividad Rcb',
            'actas' => 'Actas',
            'reportes' => 'Reportes',
            'listados' => 'Listados',
            'plan_trabajo' => 'Plan Trabajo',
            'formato_seguimiento' => 'Formato Seguimiento',
            'formato_evaluacion' => 'Formato Evaluacion',
            'fotografias' => 'Fotografias',
            'vidoes' => 'Vidoes',
            'otros_productos' => 'Otros Productos',
            'cantidad' => 'Cantidad',
            'archivos_enviados_entregados' => 'Archivos Enviados Entregados',
            'fecha_entrega_envio' => 'Fecha Entrega Envio',
            'estado' => 'Estado',
        ];
    }
}
