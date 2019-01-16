<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.implementacion_ieo".
 *
 * @property int $id
 * @property int $institucion_id
 * @property int $sede_id
 * @property int $zona_educativa
 * @property string $comuna
 * @property string $barrio
 * @property string $profesional_cargo
 * @property string $horario_trabajo
 * @property int $estado
 * @property int $id_tipo_informe
 */
class ImplementacionIeo extends \yii\db\ActiveRecord
{
    public $producto_acuerdo;
    public $resultado_actividad;
    public $acta;
    public $listado;
    public $fotografias;
    public $avance_formula;
    public $avance_ruta_gestion;
    public $producto_informe_acompañamiento;
    public $producto_trazabilidad;
    public $producto_formnulacion_sistemactizacion;
    public $producto_ruta_gestion;
    public $producto_presentacion_resultados;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.implementacion_ieo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['institucion_id', 'sede_id', 'zona_educativa', 'estado', 'id_tipo_informe'], 'default', 'value' => null],
            [['institucion_id', 'sede_id', 'zona_educativa', 'estado', 'id_tipo_informe'], 'integer'],
            [['comuna', 'barrio', 'profesional_cargo', 'horario_trabajo'], 'string'],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['institucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instituciones::className(), 'targetAttribute' => ['institucion_id' => 'id']],
            [['sede_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sedes::className(), 'targetAttribute' => ['sede_id' => 'id']],
            [['zona_educativa'], 'exist', 'skipOnError' => true, 'targetClass' => ZonasEducativas::className(), 'targetAttribute' => ['zona_educativa' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'institucion_id' => 'Institución',
            'sede_id' => 'Sede',
            'zona_educativa' => 'Zona Educativa',
            'comuna' => 'Comuna',
            'barrio' => 'Barrio',
            'profesional_cargo' => 'Profesional Cargo',
            'horario_trabajo' => 'Horario Trabajo',
            'estado' => 'Estado',
            'id_tipo_informe' => 'Id Tipo Informe',
        ];
    }
}
