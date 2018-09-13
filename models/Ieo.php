<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ieo".
 *
 * @property int $id
 * @property int $persona_id
 * @property int $institucion_id
 * @property int $sede_id
 * @property int $proyecto_id
 * @property string $estado
 * 
 *
 * @property DocumentosReconocimiento[] $documentosReconocimientos
 * @property Evidencias[] $evidencias
 * @property Instituciones $institucion
 * @property Personas $persona
 * @property ProyectoIeo $proyecto
 * @property Sedes $sede
 * @property Producto[] $productos
 * @property TiposCantidadPoblacion[] $tiposCantidadPoblacions
 */
class Ieo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ieo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_id', 'institucion_id', 'sede_id', 'proyecto_id', 'estado'], 'default', 'value' => null],
            [['persona_id', 'institucion_id', 'sede_id', 'proyecto_id', 'estado'], 'integer'],
            [['institucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instituciones::className(), 'targetAttribute' => ['institucion_id' => 'id']],
            [['persona_id'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['persona_id' => 'id']],
            [['proyecto_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProyectoIeo::className(), 'targetAttribute' => ['proyecto_id' => 'id']],
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
            'persona_id' => 'Profesional encargado',
            'institucion_id' => 'Institución',
            'sede_id' => 'Sede',
            'proyecto_id' => 'Proyecto'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentosReconocimientos()
    {
        return $this->hasMany(DocumentosReconocimiento::className(), ['ieo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvidencias()
    {
        return $this->hasMany(Evidencias::className(), ['ieo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitucion()
    {
        return $this->hasOne(Instituciones::className(), ['id' => 'institucion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Personas::className(), ['id' => 'persona_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyecto()
    {
        return $this->hasOne(ProyectoIeo::className(), ['id' => 'proyecto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSede()
    {
        return $this->hasOne(Sedes::className(), ['id' => 'sede_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['ieo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiposCantidadPoblacions()
    {
        return $this->hasMany(TiposCantidadPoblacion::className(), ['ieo_id' => 'id']);
    }
}
