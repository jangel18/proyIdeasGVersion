<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Idea;

class IdeasPorCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ideas = [
            // ---------------------------------------------------------------
            // 1. Tecnología (ID: 1)
            // ---------------------------------------------------------------
            [
                'titulo' => 'Monitor inteligente de consumo móvil',
                'descripcion' => 'Widget nativo en iOS para parsear SMS de recargas y vigencia de paquetes de datos en prepago, mostrando megabytes restantes en la pantalla de inicio.',
                'estado' => 'registrada',
                'autor' => 'Leonardo Lechuga',
                'categoriaId' => 1,
                'observacion' => null,
            ],
            [
                'titulo' => 'Recuperador automatizado de archivos',
                'descripcion' => 'Script en terminal con interfaz gráfica sencilla que automatice tareas de rescate de particiones dañadas usando herramientas como TestDisk y PhotoRec.',
                'estado' => 'en revision',
                'autor' => 'Carlos Mendoza',
                'categoriaId' => 1,
                'observacion' => null,
            ],
            [
                'titulo' => 'Organizador de torneos y alineaciones de fútbol',
                'descripcion' => 'App web ligera para registrar estadísticas, calendarios de partidos tipo Champions League y comparar alineaciones históricas en tiempo real.',
                'estado' => 'aprobada',
                'autor' => 'Jose',
                'categoriaId' => 1,
                'observacion' => null,
            ],

            // ---------------------------------------------------------------
            // 2. Educación (ID: 2)
            // ---------------------------------------------------------------
            [
                'titulo' => 'Generador de cuestionarios SQL interactivos',
                'descripcion' => 'Plataforma web que plantee retos prácticos de bases de datos relacionales (llaves foráneas, borrado en cascada, normalización) con corrección automática de consultas.',
                'estado' => 'registrada',
                'autor' => 'Pedro',
                'categoriaId' => 2,
                'observacion' => null,
            ],
            [
                'titulo' => 'Taller universitario de desarrollo iOS',
                'descripcion' => 'Currículum modular de 8 a 10 sesiones para guiar a estudiantes universitarios desde los fundamentos de Swift hasta su primera interfaz reactiva en SwiftUI.',
                'estado' => 'en revision',
                'autor' => 'Valeria Ruiz',
                'categoriaId' => 2,
                'observacion' => null,
            ],
            [
                'titulo' => 'Plataforma colaborativa para hackathones',
                'descripcion' => 'Sistema para vincular a estudiantes de informática con áreas de negocios y administración para formar equipos multidisciplinarios en eventos universitarios.',
                'estado' => 'aprobada',
                'autor' => 'Andrés Silva',
                'categoriaId' => 2,
                'observacion' => null,
            ],

            // ---------------------------------------------------------------
            // 3. Salud (ID: 3)
            // ---------------------------------------------------------------
            [
                'titulo' => 'Monitor de cadena de frío para almacenamiento médico',
                'descripcion' => 'Prototipo en SwiftUI conectado a sensores de temperatura y alertas en segundo plano para evitar pérdidas en suministros sensibles.',
                'estado' => 'registrada',
                'autor' => 'Dra. María Elena Cruz',
                'categoriaId' => 3,
                'observacion' => null,
            ],
            [
                'titulo' => 'Rastreador de hidratación y tiempos de descanso',
                'descripcion' => 'Aplicación enfocada en programadores que calcule pausas activas, postura ergonómica y metas de agua durante jornadas de estudio o desarrollo.',
                'estado' => 'en revision',
                'autor' => 'Ignacio Gómez',
                'categoriaId' => 3,
                'observacion' => null,
            ],
            [
                'titulo' => 'Calculadora de menús y macros balanceados',
                'descripcion' => 'Base de datos que sugiera recetas y planes de alimentación semanales estructurados según tablas nutricionales y restricciones calóricas.',
                'estado' => 'aprobada',
                'autor' => 'Sara Morales',
                'categoriaId' => 3,
                'observacion' => null,
            ],

            // ---------------------------------------------------------------
            // 4. Medio ambiente (ID: 4)
            // ---------------------------------------------------------------
            [
                'titulo' => 'Optimizador de consumo de luz por tarifas CFE',
                'descripcion' => 'Herramienta web para registrar lecturas de medidor y proyectar ahorros en la factura eléctrica según franjas horarias y hábitos domésticos.',
                'estado' => 'registrada',
                'autor' => 'Camila Torres',
                'categoriaId' => 4,
                'observacion' => null,
            ],
            [
                'titulo' => 'Rutas eficientes para movilidad diaria',
                'descripcion' => 'Calculadora de huella de carbono y gasto de combustible comparando trayectos en transporte público frente a coche en rutas hacia Ciudad Universitaria.',
                'estado' => 'en revision',
                'autor' => 'Roberto Paz',
                'categoriaId' => 4,
                'observacion' => null,
            ],
            [
                'titulo' => 'Red de reciclaje y donación de hardware antiguo',
                'descripcion' => 'Directorio estudiantil para reutilizar componentes electrónicos, cables y computadoras viejas en desuso dentro de la facultad.',
                'estado' => 'aprobada',
                'autor' => 'Daniela Vega',
                'categoriaId' => 4,
                'observacion' => null,
            ],

            // ---------------------------------------------------------------
            // 5. Idea loca (ID: 5)
            // ---------------------------------------------------------------
            [
                'titulo' => 'Contratos de relación inspirados en series de TV',
                'descripcion' => 'Generador web humorístico de cláusulas de convivencia ("Acuerdo de Relación" estilo sitcom), con penalizaciones en salidas al cine y firma digital interactiva.',
                'estado' => 'registrada',
                'autor' => 'Santi',
                'categoriaId' => 5,
                'observacion' => null,
            ],
            [
                'titulo' => 'Detector facial para el álbum de estampas',
                'descripcion' => 'Escáner con cámara web que identifique la cara de un futbolista en una estampa física y te diga al instante si ya la tienes repetida en tu colección del Mundial.',
                'estado' => 'en revision',
                'autor' => 'Mateo Beltrán',
                'categoriaId' => 5,
                'observacion' => null,
            ],
            [
                'titulo' => 'Simulador de decisiones de vida en terminal',
                'descripcion' => 'Videojuego en consola de texto donde balanceas horas de sueño, entregas de proyectos en la carrera y salidas de fin de semana sin que colapse tu barra de energía.',
                'estado' => 'rechazada',
                'autor' => 'Rodrigo Blanco',
                'categoriaId' => 5,
                'observacion' => 'El alcance actual es demasiado amplio y requiere priorizar primero los proyectos académicos obligatorios.',
            ],

            // ---------------------------------------------------------------
            // 6. Matemáticas (ID: 7)
            // ---------------------------------------------------------------
            [
                'titulo' => 'Calculadora de probabilidades de cromos y sobres',
                'descripcion' => 'Herramienta estadística que determine cuántos paquetes necesitas comprar para completar un álbum coleccionable según la probabilidad de repetidas.',
                'estado' => 'registrada',
                'autor' => 'Prof. Gabriel Castro',
                'categoriaId' => 7,
                'observacion' => null,
            ],
            [
                'titulo' => 'Visualizador de esquemas de bases de datos relacionales',
                'descripcion' => 'Generador visual interactivo que muestre la integridad referencial y las relaciones entidad-relación mediante teoría de conjuntos.',
                'estado' => 'en revision',
                'autor' => 'Esteban Ríos',
                'categoriaId' => 7,
                'observacion' => null,
            ],
            [
                'titulo' => 'Simulador de convocatorias y puntajes de corte',
                'descripcion' => 'Calculadora que evalúe probabilidades de ingreso y asignación de becas de alto rendimiento según promedio acumulado y curvas de distribución.',
                'estado' => 'aprobada',
                'autor' => 'Sofía Méndez',
                'categoriaId' => 7,
                'observacion' => null,
            ],

            // ---------------------------------------------------------------
            // 7. Español (ID: 8)
            // ---------------------------------------------------------------
            [
                'titulo' => 'Analizador de guiones y diálogos cinematográficos',
                'descripcion' => 'Comparativa entre guiones de dramas célebres (como Dead Poets Society o Good Will Hunting) para evaluar el ritmo de los monólogos y figuras retóricas.',
                'estado' => 'registrada',
                'autor' => 'Elena Navarro',
                'categoriaId' => 8,
                'observacion' => null,
            ],
            [
                'titulo' => 'Generador de tarjetas de trivia en español',
                'descripcion' => 'Plataforma web con preguntas y respuestas de cultura popular, cine clásico y curiosidades pensada para partidas familiares o entre amigos.',
                'estado' => 'en revision',
                'autor' => 'Marcos Quintana',
                'categoriaId' => 8,
                'observacion' => null,
            ],
            [
                'titulo' => 'Guía de estilo para documentación técnica',
                'descripcion' => 'Manual de redacción clara en español neutro para redactar manuales de software, APIs y especificaciones de base de datos sin caer en anglicismos innecesarios.',
                'estado' => 'aprobada',
                'autor' => 'Clara Salazar',
                'categoriaId' => 8,
                'observacion' => null,
            ],

            // ---------------------------------------------------------------
            // 8. Baile (ID: 9)
            // ---------------------------------------------------------------
            [
                'titulo' => 'Metrónomo visual por compases',
                'descripcion' => 'Aplicación móvil con pulsos de luz o vibración háptica que ayude a marcar tiempos y cambios de ritmo durante ensayos de coreografías.',
                'estado' => 'registrada',
                'autor' => 'Javier Cordero',
                'categoriaId' => 9,
                'observacion' => null,
            ],
            [
                'titulo' => 'Gestor de listas de música por BPM',
                'descripcion' => 'Organizador de canciones clasificadas según el tempo exacto para armar secuencias de baile progresivas en clases y presentaciones.',
                'estado' => 'en revision',
                'autor' => 'Diana Pacheco',
                'categoriaId' => 9,
                'observacion' => null,
            ],
            [
                'titulo' => 'Directorio de academias y eventos recreativos',
                'descripcion' => 'Mapa interactivo para ubicar talleres de baile, espacios abiertos para practicar y eventos en parques locales.',
                'estado' => 'aprobada',
                'autor' => 'Fernando Soto',
                'categoriaId' => 9,
                'observacion' => null,
            ],
        ];

        foreach ($ideas as $idea) {
            Idea::create($idea);
        }
    }
}
