<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ppp.seguimiento_operador".
 *
 * @property string $id
 * @property string $id_tipo_seguimiento
 * @property string $email
 * @property string $cual_operador
 * @property string $proyecto_reportar
 * @property string $id_ie
 * @property string $mes_reporte
 * @property string $semana_reporte
 * @property string $id_persona_responsable
 * @property string $descripcion_actividad
 * @property string $poblacion_beneficiaria
 * @property string $quienes
 * @property int $numero_participantes
 * @property string $duracion_actividad
 * @property string $logros_alcanzados
 * @property string $dificultadades
 * @property string $avances_cumplimiento_cuantitativos
 * @property string $avances_cumplimiento_cualitativos
 * @property string $dificultades
 * @property string $propuesta_dificultades
 * @property string $estado
 * @property string $id_indicador
 * @property string $id_operador
 * @property string $id_objetivo
 * @property string $id_actividad
 */
class PppSeguimientoOperador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ppp.seguimiento_operador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_seguimiento', 'id_ie', 'id_persona_responsable', 'estado', 'id_indicador', 'id_operador', 'id_objetivo', 'id_actividad'], 'required'],
            [['id_tipo_seguimiento', 'id_ie', 'id_persona_responsable', 'numero_participantes', 'estado', 'id_indicador', 'id_operador', 'id_objetivo', 'id_actividad'], 'default', 'value' => null],
            [['id_tipo_seguimiento', 'id_ie', 'id_persona_responsable', 'numero_participantes', 'estado', 'id_indicador', 'id_operador', 'id_objetivo', 'id_actividad'], 'integer'],
            [['email', 'cual_operador', 'proyecto_reportar', 'mes_reporte', 'semana_reporte', 'descripcion_actividad', 'poblacion_beneficiaria', 'quienes', 'duracion_actividad', 'logros_alcanzados', 'dificultadades', 'avances_cumplimiento_cuantitativos', 'avances_cumplimiento_cualitativos', 'dificultades', 'propuesta_dificultades'], 'string'],
            [['id_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => PppActividades::className(), 'targetAttribute' => ['id_actividad' => 'id']],
            [['id_indicador'], 'exist', 'skipOnError' => true, 'targetClass' => PppIndicadores::className(), 'targetAttribute' => ['id_indicador' => 'id']],
            [['id_objetivo'], 'exist', 'skipOnError' => true, 'targetClass' => PppObjetivos::className(), 'targetAttribute' => ['id_objetivo' => 'id']],
            [['id_tipo_seguimiento'], 'exist', 'skipOnError' => true, 'targetClass' => PppTipoSeguimiento::className(), 'targetAttribute' => ['id_tipo_seguimiento' => 'id']],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['id_ie'], 'exist', 'skipOnError' => true, 'targetClass' => Instituciones::className(), 'targetAttribute' => ['id_ie' => 'id']],
            [['id_operador'], 'exist', 'skipOnError' => true, 'targetClass' => Parametro::className(), 'targetAttribute' => ['id_operador' => 'id']],
            [['id_persona_responsable'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['id_persona_responsable' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tipo_seguimiento' => 'Tipo Seguimiento',
            'email' => 'Email',
            'cual_operador' => 'Cual Operador',
            'proyecto_reportar' => 'Proyecto Reportar',
            'id_ie' => 'Institución educativa',
            'mes_reporte' => 'Mes Reporte',
            'semana_reporte' => 'Semana Reporte',
            'id_persona_responsable' => 'Persona Responsable',
            'descripcion_actividad' => 'Descripción Actividad',
            'poblacion_beneficiaria' => 'Población Beneficiaria',
            'quienes' => 'Quienes',
            'numero_participantes' => 'Numero Participantes',
            'duracion_actividad' => 'Duración Actividad',
            'logros_alcanzados' => 'Logros Alcanzados',
            'dificultadades' => 'Dificultades',
            'avances_cumplimiento_cuantitativos' => 'Avances Cumplimiento Cuantitativos',
            'avances_cumplimiento_cualitativos' => 'Avances Cumplimiento Cualitativos',
            'dificultades' => 'Dificultades',
            'propuesta_dificultades' => 'Propuesta Dificultades',
            'estado' => 'Estado',
            'id_indicador' => 'Indicador',
            'id_operador' => 'Operador',
            'id_objetivo' => 'Objetivo',
            'id_actividad' => 'Actividad',
        ];

    }
}
