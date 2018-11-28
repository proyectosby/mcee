<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ec.planeacion".
 *
 * @property string $id
 * @property string $id_datos_basicos
 * @property string $tipo_actividad
 * @property string $fecha
 * @property string $tipo_actor
 * @property string $cantidad_asistentes
 * @property string $objetivo
 * @property string $responsable
 * @property string $rol
 * @property string $descripcion_actividad
 * @property string $estado
 */
class EcPlaneacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ec.planeacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_datos_basicos', 'tipo_actividad', 'fecha'], 'required'],
            [['id_datos_basicos', 'cantidad_asistentes', 'estado'], 'default', 'value' => null],
            [['id_datos_basicos', 'cantidad_asistentes', 'estado'], 'integer'],
            [['tipo_actividad', 'tipo_actor', 'objetivo', 'responsable', 'rol', 'descripcion_actividad'], 'string'],
            [['fecha'], 'safe'],
            [['id_datos_basicos'], 'exist', 'skipOnError' => true, 'targetClass' => EcDatosBasicos::className(), 'targetAttribute' => ['id_datos_basicos' => 'id']],
            //[['id'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' 					=> 'ID',
            'id_datos_basicos' 		=> 'Id Datos Basicos',
            'tipo_actividad' 		=> 'Tipo Actividad',
            'fecha' 				=> 'Fecha',
            'tipo_actor' 			=> 'Tipo Actor',
            'cantidad_asistentes' 	=> 'Cantidad Asistentes',
            'objetivo' 				=> 'Objetivo',
            'responsable' 			=> 'Responsable',
            'rol' 					=> 'Rol',
            'descripcion_actividad' => 'Descripcion Actividad',
            'estado' 				=> 'Estado',
        ];
    }
}
