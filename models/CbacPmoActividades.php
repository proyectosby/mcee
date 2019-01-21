<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cbac.pmo_actividades".
 *
 * @property int $id
 * @property int $id_pmo
 * @property int $id_componentes
 * @property int $id_actividad
 * @property string $desde
 * @property string $hasta
 * @property int $num_equipos
 * @property string $perfiles
 * @property string $docentes
 * @property string $fases
 * @property int $num_encuentro
 * @property string $nombre_actividad
 * @property string $actividades_desarrolladas
 * @property string $tematicas
 * @property string $objetivos_especificos
 * @property string $tiempo_previsto
 * @property string $productos
 * @property string $contenido_si_no
 * @property string $contenido_nombre
 * @property string $contenido_fecha
 * @property string $contenido_vigencia
 * @property string $contenido_justificacion
 * @property string $acticulacion
 * @property int $cantidad_participantes
 * @property string $requerimientos_tecnicos
 * @property string $requerimientos_logoisticos
 * @property string $destinatarios
 * @property string $fehca_entrega
 * @property string $observaciones_generales
 * @property string $nombre_dilegencia
 * @property string $rol
 * @property string $fehca
 * @property string $lugares_visitados
 * @property string $penalistas_invitados
 * @property string $programacion
 * @property string $tematicas_abordadas
 * @property string $resultado_producto_esperado
 */
class CbacPmoActividades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cbac.pmo_actividades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pmo', 'id_componentes', 'id_actividad', 'num_equipos', 'num_encuentro', 'cantidad_participantes'], 'default', 'value' => null],
            [['id_pmo', 'id_componentes', 'id_actividad', 'num_equipos', 'num_encuentro', 'cantidad_participantes'], 'integer'],
            [['desde', 'hasta', 'contenido_fecha', 'fehca_entrega', 'fehca'], 'safe'],
            [['perfiles', 'docentes', 'fases', 'nombre_actividad', 'contenido_vigencia', 'actividades_desarrolladas', 'tematicas', 'objetivos_especificos', 'tiempo_previsto', 'productos', 'contenido_si_no', 'contenido_nombre', 'contenido_justificacion', 'acticulacion', 'requerimientos_tecnicos', 'requerimientos_logoisticos', 'destinatarios', 'observaciones_generales', 'nombre_dilegencia', 'rol', 'lugares_visitados', 'penalistas_invitados', 'programacion', 'tematicas_abordadas', 'resultado_producto_esperado'], 'string'],
            [['id_pmo'], 'exist', 'skipOnError' => true, 'targetClass' => CbacPlanMisionalOperativo::className(), 'targetAttribute' => ['id_pmo' => 'id']],
            [['id_componentes'], 'exist', 'skipOnError' => true, 'targetClass' => IsaComponentes::className(), 'targetAttribute' => ['id_componentes' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pmo' => 'Id Pmo',
            'id_componentes' => 'Id Componentes',
            'id_actividad' => 'Id Actividad',
            'desde' => 'Desde',
            'hasta' => 'Hasta',
            'num_equipos' => 'Num Equipos',
            'perfiles' => 'Perfiles',
            'docentes' => 'Docente orientador(a)  (Nombre del o la profesional)',
            'fases' => 'Fases (Indique la fase del Proyecto MCEE desde las Artes y las Culturas  en el que se encuentra la actividad) ',
            'num_encuentro' => 'No. de Encuentro (Indique el número del encuentro según la propuesta metodológica)',
            'nombre_actividad' => 'Nombre o título de la actividad o encuentro ',
            'actividades_desarrolladas' => 'Actividades a desarrollar (Didácticas que estructuran el encuentro )',
            'tematicas' => 'Temáticas que se abordan',
            'objetivos_especificos' => 'Objetivos específicos: (Especifique cómo se espera lograr, con cada una de las actividades propuestas, desarrollar herramientas en docentes y directivos docentes que implementen componentes artísticos y culturales para fortalecer de competencias básicas de los estudiantes..)',
            'tiempo_previsto' => 'Tiempo previsto para realizar la actividad (Indique el tiempo previsto en horas y minutos)',
            'productos' => 'Productos Describa los resultados o productos esperados.',
            'contenido_si_no' => 'Contenido Si No',
            'contenido_nombre' => 'Contenido Nombre',
            'contenido_fecha' => 'Contenido Fecha',
            'contenido_vigencia' => 'Contenido Vigencia',
            'contenido_justificacion' => 'Contenido Justificacion',
            'acticulacion' => 'Articulación  (Si es el caso, describa cómo la actividad o actividades planeadas se articulan con las actividades de otros proyectos de la iniciativa MCEE)',
            'cantidad_participantes' => 'Cantidad prevista de participantes (Indique el número de personas que espera que participen de  la actividad, considerando la convocatoria realizada por su equipo)',
            'requerimientos_tecnicos' => '(Indique los requerimientos  técnicos,  materiales y de espacio)',
            'requerimientos_logoisticos' => '(Indique los requerimientos  logísticos, No. de refrigerios, No. de vehículos y capacidad de transporte, etc. )',
            'destinatarios' => 'Destinatarios',
            'fehca_entrega' => 'Fecha Entrega',
            'observaciones_generales' => 'Observaciones Generales',
            'nombre_dilegencia' => 'Nombre completo de quien diligenció',
            'rol' => 'Rol',
            'fehca' => 'Fehca',
            
            'lugares_visitados' => 'Lugares a recorrer o visitar: Mencione los espacios a ser recorridos o visitados.',
            'penalistas_invitados' => 'Panelistas invitados (expertos a exponer sus posiciones teóricas y experiencias en el marco de la actividad)',
            'programacion' => 'Programacion',
            
            'tematicas_abordadas' => 'Tematicas Abordadas',
            'resultado_producto_esperado' => 'Resultado Producto Esperado',
        ];
    }
}
