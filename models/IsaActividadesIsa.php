<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "isa.actividades_isa".
 *
 * @property int $id
 * @property int $id_imp_isa
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
 * @property string $cotenido_si_no
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
 */
class IsaActividadesIsa extends \yii\db\ActiveRecord
{
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
            [['id_imp_isa', 'id_actividad', 'num_equipo_campo', 'num_encuentro', 'cantidad_participantes'], 'default', 'value' => null],
            [['id_imp_isa', 'id_actividad', 'num_equipo_campo', 'num_encuentro', 'cantidad_participantes'], 'integer'],
            [['fecha_prevista_desde', 'fecha_prevista_hasta', 'cotenido_fecha', 'fecha'], 'safe'],
            [['perfiles', 'docente_orientador', 'fases', 'nombre_actividad', 'actividad_desarrollar', 'lugares_recorrer', 'tematicas_abordadas', 'objetivos_especificos', 'tiempo_previsto', 'productos', 'cotenido_si_no', 'cotenido_nombre', 'cotenido_vigencia', 'contenido_justificacion', 'acticulacion', 'requerimientos_tecnicos', 'requerimientos_logisticos', 'destinatarios', 'fecha_entega_envio', 'observaciones_generales', 'nombre_diligencia', 'rol'], 'string'],
            //[['id_imp_isa'], 'exist', 'skipOnError' => true, 'targetClass' => IsaImpIsa::className(), 'targetAttribute' => ['id_imp_isa' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_imp_isa' => 'Id Imp Isa',
            'id_actividad' => 'Id Actividad',
            'fecha_prevista_desde' => 'Fecha Prevista Desde',
            'fecha_prevista_hasta' => 'Fecha Prevista Hasta',
            'num_equipo_campo' => 'No. del Equipo o equipos en campo',
            'perfiles' => 'Perfiles (Seleccione el perfil y cantidad por perfiles de profesionales en campo)',
            'docente_orientador' => 'Docente orientador(a)  (Nombre del o la profesional)',
            'fases' => 'Fases (Indique la fase del Proyecto MCEE desde las Artes y las Culturas  en el que se encuentra la actividad) ',
            'num_encuentro' => 'No. de Encuentro (Indique el número del encuentro según la propuesta metodológica)',
            'nombre_actividad' => 'Nombre o título de la actividad o encuentro ',
            'actividad_desarrollar' => 'Actividades a desarrollar (Didácticas que estructuran el encuentro )',
            'lugares_recorrer' => 'Lugares a recorrer o visitar: Mencione los espacios a ser recorridos o visitados.',
            'tematicas_abordadas' => 'Temáticas que se abordan',
            'objetivos_especificos' => 'Objetivos específicos: (Especifique cómo se espera lograr, con cada una de las actividades, sensibilizar a la comunidad sobre la importancia del arte...)',
            'tiempo_previsto' => 'Tiempo previsto para realizar la actividad (Indique el tiempo previsto en horas y minutos)',
            'productos' => 'Productos Describa los resultados o productos esperados.',
            'cotenido_si_no' => 'Cotenido Si No',
            'cotenido_nombre' => 'Cotenido Nombre',
            'cotenido_fecha' => 'Cotenido Fecha',
            'cotenido_vigencia' => 'Cotenido Vigencia',
            'contenido_justificacion' => 'Contenido Justificacion',
            'acticulacion' => 'Articulación  (Si es el caso, describa cómo la actividad o actividades planeadas se articulan con las actividades de otros proyectos de la iniciativa MCEE)',
            'cantidad_participantes' => 'Cantidad prevista de participantes (Indique el número de personas que espera que participen de  la actividad, considerando la convocatoria realizada por su equipo)',
            'requerimientos_tecnicos' => '(Indique los requerimientos  técnicos,  materiales y de espacio)',
            'requerimientos_logisticos' => 'Indique los requerimientos  logísticos, No. de refrigerios, No. de vehículos y capacidad de transporte, etc. )',
            'destinatarios' => 'Destinatario (s)',
            'fecha_entega_envio' => 'Fecha de entrega o envío',
            'observaciones_generales' => 'Observaciones generales (Mencione aspectos adicionales que deban considerarse en la planeación de la actividad)',
            'nombre_diligencia' => 'Nombre completo de quien diligenció',
            'rol' => 'Rol',
            'fecha' => 'Fecha',
        ];
    }
}
