<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "isa.actividades_isa".
 *
 * @property int $id
 * @property int $id_actividad
 * @property string $fecha_prevista_desde
 * @property string $fecha_prevista_hasta
 * @property int $num_equipo_campo
 * @property string $perfiles
 * @property string $docente_orientador
 * @property string $fases
 * @property int $num_encuentro
 * @property string $nombre_actividad
 * @property string $actividad_desarrollar
 * @property string $lugares_recorrer
 * @property string $tematicas_abordadas
 * @property string $objetivos_especificos
 * @property string $tiempo_previsto
 * @property string $productos
 * @property string $contenido_si_no
 * @property string $cotenido_nombre
 * @property string $cotenido_fecha
 * @property string $cotenido_vigencia
 * @property string $contenido_justificacion
 * @property string $acticulacion
 * @property int $cantidad_participantes
 * @property string $requerimientos_tecnicos
 * @property string $requerimientos_logisticos
 * @property string $destinatarios
 * @property string $fecha_entega_envio
 * @property string $observaciones_generales
 * @property string $nombre_diligencia
 * @property string $rol
 * @property string $fecha
 * @property int $estado
 * @property int $id_iniciacion_sencibilizacion_artistica
 * @property int $id_componente
 */
class IsaActividadesIsa extends \yii\db\ActiveRecord
{
    public $id_sede;
    public $caracterizacion_si_no;
    public $caracterizacion_nombre;
    public $caracterizacion_fecha;
    public $caracterizacion_justificacion;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'isa.actividades_isa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_actividad', 'num_equipo_campo', 'num_encuentro', 'cantidad_participantes', 'estado', 'id_iniciacion_sencibilizacion_artistica', 'id_componente'], 'default', 'value' => null],
            [['id_actividad', 'num_equipo_campo', 'num_encuentro', 'cantidad_participantes', 'estado', 'id_iniciacion_sencibilizacion_artistica', 'id_componente'], 'integer'],
            [['fecha_prevista_desde', 'fecha_prevista_hasta', 'cotenido_fecha', 'fecha'], 'safe'],
            [['perfiles', 'docente_orientador', 'fases', 'nombre_actividad', 'actividad_desarrollar', 'lugares_recorrer', 'tematicas_abordadas', 'objetivos_especificos', 'tiempo_previsto', 'productos', 'contenido_si_no', 'cotenido_nombre', 'cotenido_vigencia', 'contenido_justificacion', 'acticulacion', 'requerimientos_tecnicos', 'requerimientos_logisticos', 'destinatarios', 'fecha_entega_envio', 'observaciones_generales', 'nombre_diligencia', 'rol'], 'string'],
            [['id_componente'], 'exist', 'skipOnError' => true, 'targetClass' => IsaComponentes::className(), 'targetAttribute' => ['id_componente' => 'id']],
            [['id_iniciacion_sencibilizacion_artistica'], 'exist', 'skipOnError' => true, 'targetClass' => IsaIniciacionSencibilizacionArtistica::className(), 'targetAttribute' => ['id_iniciacion_sencibilizacion_artistica' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_actividad' => 'Id Actividad',
            'fecha_prevista_desde' => 'Fecha Prevista Desde',
            'fecha_prevista_hasta' => 'Fecha Prevista Hasta',
            'num_equipo_campo' => 'Num Equipo Campo',
            'perfiles' => 'Perfiles',
            'docente_orientador' => 'Docente Orientador',
            'fases' => 'Fases',
            'num_encuentro' => 'Num Encuentro',
            'nombre_actividad' => 'Nombre Actividad',
            'actividad_desarrollar' => 'Actividad Desarrollar',
            'lugares_recorrer' => 'Lugares Recorrer',
            'tematicas_abordadas' => 'Tematicas Abordadas',
            'objetivos_especificos' => 'Objetivos Especificos',
            'tiempo_previsto' => 'Tiempo Previsto',
            'productos' => 'Productos',
            'contenido_si_no' => 'Contenido Si No',
            'cotenido_nombre' => 'Cotenido Nombre',
            'cotenido_fecha' => 'Cotenido Fecha',
            'cotenido_vigencia' => 'Cotenido Vigencia',
            'contenido_justificacion' => 'Contenido Justificacion',
            'acticulacion' => 'Acticulacion',
            'cantidad_participantes' => 'Cantidad Participantes',
            'requerimientos_tecnicos' => 'Requerimientos Tecnicos',
            'requerimientos_logisticos' => 'Requerimientos Logisticos',
            'destinatarios' => 'Destinatarios',
            'fecha_entega_envio' => 'Fecha Entega Envio',
            'observaciones_generales' => 'Observaciones Generales',
            'nombre_diligencia' => 'Nombre Diligencia',
            'rol' => 'Rol',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
            'id_iniciacion_sencibilizacion_artistica' => 'Id Iniciacion Sencibilizacion Artistica',
            'id_componente' => 'Id Componente',
        ];
    }
}
