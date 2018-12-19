<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "isa.iniciacion_sencibilizacion_artistica".
 *
 * @property int $id
 * @property int $id_insticion
 * @property int $id_sede
 * @property string $caracterizacion_si_no
 * @property string $caracterizacion_nombre
 * @property string $caracterizacion_fecha
 * @property string $caracterizacion_justificacion
 * @property int $estado
 */
class CbacIniciacionSencibilizacionArtistica extends \yii\db\ActiveRecord
{
    public $nombre_institucion;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cbac.iniciacion_sencibilizacion_artistica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_insticion', 'id_sede', 'estado'], 'default', 'value' => null],
            [['id_insticion', 'id_sede', 'estado'], 'integer'],
            [['caracterizacion_si_no', 'caracterizacion_nombre', 'caracterizacion_justificacion'], 'string'],
            [['caracterizacion_fecha'], 'safe'],
            [['id_insticion'], 'exist', 'skipOnError' => true, 'targetClass' => Instituciones::className(), 'targetAttribute' => ['id_insticion' => 'id']],
            [['id_sede'], 'exist', 'skipOnError' => true, 'targetClass' => Sedes::className(), 'targetAttribute' => ['id_sede' => 'id']],
            //[['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Sedes::className(), 'targetAttribute' => ['estado' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_insticion' => 'Instición',
            'id_sede' => 'Sede',
            'caracterizacion_si_no' => 'Caracterizacion Si No',
            'caracterizacion_nombre' => 'Caracterizacion Nombre',
            'caracterizacion_fecha' => 'Caracterizacion Fecha',
            'caracterizacion_justificacion' => 'Caracterizacion Justificacion',
            'estado' => 'Estado',
        ];
    }
}
