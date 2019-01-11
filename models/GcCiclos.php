<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gc.ciclos".
 *
 * @property string $id
 * @property string $fecha
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_finalizacion
 * @property string $fecha_cierre
 * @property string $fecha_maxima_acceso
 * @property string $id_creador
 * @property string $estado
 * @property string $id_semana
 */
class GcCiclos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gc.ciclos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'fecha_inicio', 'fecha_finalizacion', 'fecha_cierre', 'fecha_maxima_acceso'], 'safe'],
            [['descripcion'], 'string'],
            [['id_creador', 'estado', 'id_semana'], 'required'],
            [['id_creador', 'estado', 'id_semana'], 'default', 'value' => null],
            [['id_creador', 'estado', 'id_semana'], 'integer'],
            [['id_semana'], 'exist', 'skipOnError' => true, 'targetClass' => GcSemanas::className(), 'targetAttribute' => ['id_semana' => 'id']],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['id_creador'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['id_creador' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' 					=> 'ID',
            'fecha' 				=> 'Fecha',
            'descripcion' 			=> 'Descripción',
            'fecha_inicio' 			=> 'Fecha de inicio',
            'fecha_finalizacion' 	=> 'Fecha de finalizacion',
            'fecha_cierre' 			=> 'Fecha de cierre',
            'fecha_maxima_acceso'	=> 'Fecha máxima  de acceso',
            'id_creador' 			=> 'Creador',
            'estado' 				=> 'Estado',
            'id_semana' 			=> 'Semana',
        ];
    }
}
