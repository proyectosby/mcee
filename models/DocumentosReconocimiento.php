<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documentos_reconocimiento".
 *
 * @property int $id
 * @property int $ieo_id
 * @property int $plan_accion_id
 * @property string $informe_caracterizacion
 * @property string $matriz_caracterizacion
 * @property string $revision_pei
 * @property string $revision_autoevaluacion
 * @property string $revision_pmi
 * @property string $resultados_caracterizacion
 * @property string $horario_trabajo
 * @property string $tipo_actiividad
 * @property string $fecha_creacion
 * @property string $estado
 *
 * @property Ieo $ieo
 * @property PlanAccion $planAccion
 */
class DocumentosReconocimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.documentos_reconocimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ieo_id', 'plan_accion_id', 'estado'], 'default', 'value' => null],
            [['ieo_id', 'plan_accion_id', 'estado'], 'integer'],
            [['informe_caracterizacion', 'matriz_caracterizacion', 'revision_pei', 'revision_autoevaluacion', 'revision_pmi', 'resultados_caracterizacion', 'horario_trabajo', 'tipo_actiividad', 'fecha_creacion'], 'string'],
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
            'informe_caracterizacion' => 'Informe Caracterizacion',
            'matriz_caracterizacion' => 'Matriz Caracterizacion',
            'revision_pei' => 'Revision Pei',
            'revision_autoevaluacion' => 'Revision Autoevaluacion',
            'revision_pmi' => 'Revision Pmi',
            'resultados_caracterizacion' => 'Resultados Caracterizacion',
            'horario_trabajo' => 'Horario Trabajo',
            'tipo_actiividad' => 'Tipo Actiividad',
            'fecha_creacion' => 'Fecha',
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
