<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subcategoria_cobertura".
 *
 * @property int $id
 * @property int $categoria_cobertura_id
 * @property string $subcategoria
 * @property int $tema_id
 * @property int $institucion_id
 * @property int $cantidad_niños_institucion
 * @property int $cantidad_niñas_institucion
 * @property int $sede_id
 * @property int $cantidad_niños_sede
 * @property int $cantidad_niñas_sede
 *
 * @property CategoriaCobertura $categoriaCobertura
 * @property Instituciones $institucion
 * @property Sedes $sede
 * @property TemaCobertura $tema
 */
class SubcategoriaCobertura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subcategoria_cobertura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria_cobertura_id', 'tema_id', 'institucion_id', 'cantidad_niños_institucion', 'cantidad_niñas_institucion', 'sede_id', 'cantidad_niños_sede', 'cantidad_niñas_sede'], 'default', 'value' => null],
            [['categoria_cobertura_id', 'tema_id', 'institucion_id', 'cantidad_niños_institucion', 'cantidad_niñas_institucion', 'sede_id', 'cantidad_niños_sede', 'cantidad_niñas_sede'], 'integer'],
            [['subcategoria'], 'string'],
            [['categoria_cobertura_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoriaCobertura::className(), 'targetAttribute' => ['categoria_cobertura_id' => 'id']],
            [['institucion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instituciones::className(), 'targetAttribute' => ['institucion_id' => 'id']],
            [['sede_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sedes::className(), 'targetAttribute' => ['sede_id' => 'id']],
            [['tema_id'], 'exist', 'skipOnError' => true, 'targetClass' => TemaCobertura::className(), 'targetAttribute' => ['tema_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria_cobertura_id' => 'Categoria Cobertura ID',
            'subcategoria' => 'Subcategoria',
            'tema_id' => 'Tema ID',
            'institucion_id' => 'Institucion ID',
            'cantidad_niños_institucion' => 'Cantidad Niños Institucion',
            'cantidad_niñas_institucion' => 'Cantidad Niñas Institucion',
            'sede_id' => 'Sede ID',
            'cantidad_niños_sede' => 'Cantidad Niños Sede',
            'cantidad_niñas_sede' => 'Cantidad Niñas Sede',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaCobertura()
    {
        return $this->hasOne(CategoriaCobertura::className(), ['id' => 'categoria_cobertura_id']);
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
    public function getSede()
    {
        return $this->hasOne(Sedes::className(), ['id' => 'sede_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTema()
    {
        return $this->hasOne(TemaCobertura::className(), ['id' => 'tema_id']);
    }
}
