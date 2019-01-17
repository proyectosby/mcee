<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.documentos_reconocimiento".
 *
 * @property int $id
 * @property int $ieo_id
 * @property string $informe_caracterizacion
 * @property string $matriz_caracterizacion
 * @property string $revision_pei
 * @property string $revision_autoevaluacion
 * @property string $revision_pmi
 * @property string $resultados_caracterizacion
 * @property string $horario_trabajo
 * @property int $proyecto_ieo_id
 */
class DocumentosReconocimiento extends \yii\db\ActiveRecord
{
    public $tipo_actiividad;
    public $fecha_creacion;
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
            [['ieo_id', 'proyecto_ieo_id'], 'default', 'value' => null],
            [['ieo_id', 'proyecto_ieo_id'], 'integer'],
            [['informe_caracterizacion', 'matriz_caracterizacion', 'revision_pei', 'revision_autoevaluacion', 'revision_pmi', 'resultados_caracterizacion', 'horario_trabajo'], 'string'],
            [['proyecto_ieo_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProyectoIeo::className(), 'targetAttribute' => ['proyecto_ieo_id' => 'id']],
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
            'informe_caracterizacion' => 'Informe de caracterización e informe ejecutivo',
            'matriz_caracterizacion' => 'Matriz de Caracterización- Trazabilidad ',
            'revision_pei' => 'Revisión PEI',
            'revision_autoevaluacion' => 'Revisión Autoevaluación',
            'revision_pmi' => 'Revisión PMI',
            'resultados_caracterizacion' => 'Presentación resultados de Caracterización ',
            'horario_trabajo' => 'Horario fijo de trabajo con los actores de la IEO',
            'proyecto_ieo_id' => 'Proyecto Ieo ID',
        ];
    }
}
