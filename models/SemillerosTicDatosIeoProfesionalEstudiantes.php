<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semilleros_tic.datos_ieo_profesional_estudiantes".
 *
 * @property string $id
 * @property string $estado
 * @property string $id_institucion
 * @property string $id_sede
 * @property string $id_profesional_a
 * @property string $curso_participantes
 */
class SemillerosTicDatosIeoProfesionalEstudiantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'semilleros_tic.datos_ieo_profesional_estudiantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado', 'id_institucion', 'id_sede', 'id_profesional_a', 'curso_participantes'], 'required'],
            [['estado', 'id_institucion', 'id_sede', 'id_profesional_a', 'curso_participantes'], 'default', 'value' => null],
            [['estado', 'id_institucion', 'id_sede', 'id_profesional_a', 'curso_participantes'], 'integer'],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['id_institucion'], 'exist', 'skipOnError' => true, 'targetClass' => Instituciones::className(), 'targetAttribute' => ['id_institucion' => 'id']],
            [['curso_participantes'], 'exist', 'skipOnError' => true, 'targetClass' => Niveles::className(), 'targetAttribute' => ['curso_participantes' => 'id']],
            [['id_profesional_a'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['id_profesional_a' => 'id']],
            [['id_sede'], 'exist', 'skipOnError' => true, 'targetClass' => Sedes::className(), 'targetAttribute' => ['id_sede' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado' => 'Estado',
            'id_institucion' => 'Id Institucion',
            'id_sede' => 'Id Sede',
            'id_profesional_a' => 'Id Profesional A',
            'curso_participantes' => 'Curso Participantes',
        ];
    }
}