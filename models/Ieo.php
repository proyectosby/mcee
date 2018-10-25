<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.ieo".
 *
 * @property int $id
 * @property int $institucion_id
 * @property int $sede_id
 * @property int $estado
 * @property string $persona_acargo
 * @property string $codigo_dane
 * @property string $zona_educativa
 * @property string $comuna
 * @property string $barrio
 */
class Ieo extends \yii\db\ActiveRecord
{
    public $file_socializacion_ruta;
    public $file_soporte_necesidad;
    public $file_informe_caracterizacion;
    public $file_matriz_caracterizacion;
    public $file_revision_pei;
    public $file_revision_autoevaluacion;
    public $file_revision_pmi;
    public $file_resultados_caracterizacion;
    public $file_horario_trabajo;
    public $file_producto_ruta;
    public $file_resultados_actividad_ruta;
    public $file_acta_ruta;
    public $file_listado_ruta;
    public $file_fotografias_ruta;
    public $file_producto_imforme_ruta;
    public $file_plan_accion;

    public $observaciones;
    public $tipo_actividad;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.ieo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['institucion_id', 'sede_id', 'estado'], 'default', 'value' => null],
            [['institucion_id', 'sede_id', 'estado'], 'integer'],
            [['persona_acargo', 'codigo_dane', 'zona_educativa', 'comuna', 'barrio', 'file_socializacion_ruta', 'file_soporte_necesidad', 'file_soporte_necesidad', 
                'file_informe_caracterizacion', 'file_matriz_caracterizacion', 'file_revision_pei', 'file_revision_autoevaluacion', 'file_revision_pmi', 'file_resultados_caracterizacion', 'file_horario_trabajo',
            'file_producto_ruta', 'file_resultados_actividad_ruta', 'file_acta_ruta', 'file_listado_ruta', 'file_fotografias_ruta', 'file_producto_imforme_ruta', 'file_plan_accion'], 'required'],
            [['institucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instituciones::className(), 'targetAttribute' => ['institucion_id' => 'id']],
            [['sede_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sedes::className(), 'targetAttribute' => ['sede_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institucion_id' => 'Institucion ID',
            'sede_id' => 'Sede ID',
            'estado' => 'Estado',
            'persona_acargo' => 'Persona Acargo',
            'codigo_dane' => 'Codigo Dane',
            'zona_educativa' => 'Zona Educativa',
            'comuna' => 'Comuna',
            'barrio' => 'Barrio',
        ];
    }
}
