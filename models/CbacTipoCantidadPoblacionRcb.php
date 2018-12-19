<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cbac.tipo_cantidad_poblacion_rcb".
 *
 * @property int $id
 * @property int $id_actividad_rcb
 * @property int $ciencias_naturales
 * @property int $ciencias_sociales
 * @property int $educacion_artistica
 * @property int $educacion_etica
 * @property int $educacion_fisica
 * @property int $educacion_religiosa
 * @property int $estadistica
 * @property int $humanidades
 * @property int $idiomas_extranjeros
 * @property int $lengua_castellana
 * @property int $matematicas
 * @property int $tecnologia
 * @property int $otras
 * @property int $estado
 */
class CbacTipoCantidadPoblacionRcb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cbac.tipo_cantidad_poblacion_rcb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_actividad_rcb', 'ciencias_naturales', 'ciencias_sociales', 'educacion_artistica', 'educacion_etica', 'educacion_fisica', 'educacion_religiosa', 'estadistica', 'humanidades', 'idiomas_extranjeros', 'lengua_castellana', 'matematicas', 'tecnologia', 'otras', 'estado'], 'default', 'value' => null],
            [['id_actividad_rcb', 'ciencias_naturales', 'ciencias_sociales', 'educacion_artistica', 'educacion_etica', 'educacion_fisica', 'educacion_religiosa', 'estadistica', 'humanidades', 'idiomas_extranjeros', 'lengua_castellana', 'matematicas', 'tecnologia', 'otras', 'estado'], 'integer'],
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
            'ciencias_naturales' => 'Ciencias Naturales',
            'ciencias_sociales' => 'Ciencias Sociales',
            'educacion_artistica' => 'Educacion Artistica',
            'educacion_etica' => 'Educacion Etica',
            'educacion_fisica' => 'Educacion Fisica',
            'educacion_religiosa' => 'Educacion Religiosa',
            'estadistica' => 'Estadistica',
            'humanidades' => 'Humanidades',
            'idiomas_extranjeros' => 'Idiomas Extranjeros',
            'lengua_castellana' => 'Lengua Castellana',
            'matematicas' => 'Matematicas',
            'tecnologia' => 'Tecnologia',
            'otras' => 'Otras',
            'estado' => 'Estado',
        ];
    }
}
