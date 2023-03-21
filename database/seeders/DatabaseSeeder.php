<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\RedTematica;
use App\Models\Redbasura;
use App\Models\AreaTematica;
use App\Models\Areabasura;
use App\Models\Instructor;
use App\Models\Instructorbasura;
use App\Models\Administracion;
use App\Models\AdministracionBasura;
use App\Models\CentroFormacion;
use App\Models\centroformacionbasura;
use App\Models\Subsede;
use App\Models\Subsedebasura;
use App\Models\Programa;
use App\Models\Programabasura;
use App\Models\Descarga;
use App\Models\Descargabasura;
use App\Models\TipoFormacion;
use App\Models\TipoFormacionBasura;
use App\Models\Ficha;
use App\Models\Fichabasura;
use App\Models\AmbienteFormacion;
use App\Models\Ambienteformacionbasura;
use App\Models\Competencia;
use App\Models\Competenciabasura;
use App\Models\Resultado;
use App\Models\Resultadobasura;
use App\Models\Semaforo;
use App\Models\Semaforobasura;
use App\Models\Horario;
use App\Models\Horariobasura;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {   
        //RED TEMATICA
        RedTematica::insert([
            [
            'codigo_red'=>'1',
            'nombre'=>'Informática, Diseño y Desarrollo de Software.'
            ]
        ]);
                
        //AREA TEMATICA           
        AreaTematica::insert([
            [
            'codigo_area'=>'1',
            'nombre'=>'Software',
            'codigo_red'=>'1'
            ]
        ]);

        //INSTRUCTOR      
        Instructor::insert([
            [
            'dni'=>'11111',
            'nombre'=>'Arlenys Carolina',
            'apellido'=>'Nieves Vasquez',
            'telefono'=>'11111',
            'correo'=>'acnv@misena.edu.co',
            'estado'=>'1',
            'tipo_contrato'=>'Planta',
            'codigo_red'=>'1',
            'codigo_area'=>'1'
            ],
            [
            'dni'=>'22222',
            'nombre'=>'Neidy Adriana',
            'apellido'=>'Espitia Suarez',
            'telefono'=>'22222',
            'correo'=>'naespitia@sena.edu.co',
            'estado'=>'1',
            'tipo_contrato'=>'Planta',
            'codigo_red'=>'1',
            'codigo_area'=>'1'
            ],
            [
            'dni'=>'33333',
            'nombre'=>'Samuel Ricardo',
            'apellido'=>'Padilla Narvaez',
            'telefono'=>'3333333333',
            'correo'=>'spadilla@sena.edu.co',
            'estado'=>'1',
            'tipo_contrato'=>'Planta',
            'codigo_red'=>'1',
            'codigo_area'=>'1'
            ]
        ]);

        //ADMINISTRACION     
        Administracion::insert([
            [
            'id_usuario'=>'1',
            'rol'=>'coordinador',
            'nombre'=>'Cristian',
            'apellido'=>'fernando',
            'contraseña'=>'taka123'
            ],
            [
            'id_usuario'=>'2',
            'rol'=>'coordinador',
            'nombre'=>'Cristiana',
            'apellido'=>'fernanda',
            'contraseña'=>'taka1234'
            ]
        ]);
        
        //CENTRO FORMACION         
        CentroFormacion::insert([
            [
            'codigo_centro'=>'23471927',
            'nombre_centro'=>'CIDE',
            'nr_ambientes'=>'20',
            'id_usuario'=>'1'
            ],
            [
            'codigo_centro'=>'1',
            'nombre_centro'=>'Tecnoparque',
            'nr_ambientes'=>'20',
            'id_usuario'=>'1',
            ]
        ]);
 
        //SUBSEDES           
        Subsede::insert([
            [
            'codigo_sub'=>'1',
            'nombre'=>'Uniminuto',
            'codigo_centro'=>'23471927'
            ],
            [
            'codigo_sub'=>'2',
            'nombre'=>'Sibate',
            'codigo_centro'=>'23471927'
            ]
        ]);

        //PROGRAMAS           
        Programa::insert([
            [
            'codigo_prog'=>'228106',
            'nombre'=>'ADSI',
            'estado'=>'1',
            'nivel_formacion'=>'tecnologo',
             'duracion'=>'24 meses',
             'version'=>'102',
             'codigo_centro'=>'23471927',
             'codigo_area'=>'1'       
            ],
            [
            'codigo_prog'=>'228118',
            'nombre'=>'ADSO',
            'estado'=>'1',
            'nivel_formacion'=>'tecnologo',
            'duracion'=>'3984 horas',
            'version'=>'1',
            'codigo_centro'=>'23471927',
            'codigo_area'=>'1'
            ],
            [
            'codigo_prog'=>'233104',
            'nombre'=>'Programacion de Software',
            'estado'=>'1',
            'nivel_formacion'=>'tecnico',
            'duracion'=>'2208 horas',
            'version'=>'1',
            'codigo_centro'=>'23471927',
            'codigo_area'=>'1'
            ]
        ]);

        //DESCARGAS           
        Descarga::insert([
            [
            'codigo_desc'=>'1',
            'nombre'=>'Trimestre1',
            'codigo_prog'=>'228106'
            ]
        ]);

        //TIPO DE FORMACIÓN 
        TipoFormacion::insert([
            [
            'codigo_for'=>'1',
            'nombre'=>'Cadena de formacion'
            ],
            [
            'codigo_for'=>'2',
            'nombre'=>'Oferta regular'
            ]
        ]);

        //FICHAS
        Ficha::insert([
            [
            'nr_ficha'=>'2515397',
            'jornada'=>'Tarde', 
            'modalidad'=>'Presencial',
            'nr_aprendices'=>'25',
            'codigo_prog'=>'228106',
            'codigo_for'=>'1'
            ]
        ]);

        //AMBIENTE FORMACION
        AmbienteFormacion::insert([
            [
            'codigo_ambiente'=>'102',
            'nombre'=>'contac center',
            'recursos'=>'tecnologicos',
            'especialidad'=>'informatico',
            'codigo_centro'=>'1',
            'nr_ficha'=>'2515397'
            ]
        ]);

        //COMPETENCIA
        Competencia::insert([
        //////////////////////////////
        /////////ESPECIFICAR//////////
        //////////////////////////////
            [
            'codigo_comp'=>'220501006',
            'nombre'=>'ESPECIFICAR',
            'descripcion'=>'ESPECIFICAR LOS REQUISITOS NECESARIOS PARA DESARROLLAR EL SISTEMA DE
            INFORMACION DE ACUERDO CON LAS NECESIDADES DEL CLIENTE.',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            /////////CONSTRUIR////////////
            //////////////////////////////
            [
            'codigo_comp'=>'220501007',
            'nombre'=>'CONSTRUIR',
            'descripcion'=>'CONSTRUIR EL SISTEMA QUE CUMPLA CON LOS REQUISITOS DE LA SOLUCIÓN INFORMÁTICA.',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            /////////PARTICIPAR///////////
            //////////////////////////////
            [
            'codigo_comp'=>'220501009',
            'nombre'=>'PARTICIPAR',
            'descripcion'=>'PARTICIPAR EN EL PROCESO DE NEGOCIACIÓN DE TECNOLOGÍA INFORMÁTICA PARA
            PERMITIR LA IMPLEMENTACIÓN DEL SISTEMA DE INFORMACIÓN.',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            ////////////ANALIZAR//////////
            //////////////////////////////
            [
            'codigo_comp'=>'220501032',
            'nombre'=>'ANALIZAR',
            'descripcion'=>'ANALIZAR LOS REQUISITOS DEL CLIENTE PARA CONSTRUIR EL SISTEMA DE INFORMACION.',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            //////////DISEÑAR/////////////
            //////////////////////////////
            [
            'codigo_comp'=>'220501033',
            'nombre'=>'DISEÑAR',
            'descripcion'=>'DISEÑAR EL SISTEMA DE ACUERDO CON LOS REQUISITOS DEL CLIENTE.',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            /////////IMPLANTAR////////////
            //////////////////////////////
            [
            'codigo_comp'=>'220501034',
            'nombre'=>'IMPLANTAR',
            'descripcion'=>'IMPLANTAR LA SOLUCION QUE CUMPLA CON LOS REQUISISTOS PARA SU OPERACIÓN.',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            /////////APLICAR//////////////
            //////////////////////////////
            [
            'codigo_comp'=>'220501035',
            'nombre'=>'APLICAR',
            'descripcion'=>'APLICAR BUENAS PRÁCTICAS DE CALIDAD EN EL PROCESO DE DESARROLLO DE SOFTWARE, DE ACUERDO CON EL REFERENTE ADOPTADO EN LA EMPRESA.',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            //////////PROMOVER////////////
            //////////////////////////////
            [
            'codigo_comp'=>'240201500',
            'nombre'=>'PROMOVER',
            'descripcion'=>'PROMOVER LA INTERACCIÓN IDÓNEA CONSIGO MISMO, CON LOS DEMÁS Y CON LA
            NATURALEZA EN LOS CONTEXTOS LABORAL Y SOCIAL.',
            'codigo_prog'=>'228106'
            ]
        ]);

        //RESULTADO        
        Resultado::insert([
            //////////////////////////////
            //////---1_TRIMESTRE---///////
            //////////////////////////////
            //////////////////////////////
            /////////ESPECIFICAR//////////
            //////////////////////////////
            [
            'id_resultado'=>'1',
            'resultado'=>'ELABORAR MAPAS DE PROCESOS QUE PERMITAN IDENTIFICAR LAS ÁREASINVOLUCRADAS EN UN SISTEMA DE INFORMACIÓN, UTILIZANDO HERRAMIENTASINFORMÁTICAS Y LAS TICS, PARA GENERAR INFORMES SEGÚN LAS NECESIDADES DELA EMPRESA.',
            'estado'=>'1',
            'codigo_comp'=>'220501006'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'2',
            'resultado'=>'PLANTEAR DIFERENTES ALTERNATIVAS, DE MODELOS TECNOLÓGICOS DE INFORMACIÓNEMPRESARIAL, TENIENDO EN CUENTA LA PLATAFORMA TECNOLÓGICA DE LA EMPRESAY LAS TENDENCIAS DEL MERCADO, PARA DAR SOLUCIÓN A LAS SITUACIONESRELACIONADAS CON EL MANEJO DE LA INFORMACIÓN DE LA ORGANIZACIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501006'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'3',
            'resultado'=>'APLICAR LAS TÉCNICAS DE RECOLECCIÓN DE DATOS , DISEÑANDO LOSINSTRUMENTOS NECESARIOS PARA EL PROCESAMIENTO DE INFORMACIÓN, DEACUERDO CON LA SITUACIÓN PLANTEADA POR LA EMPRESA.',
            'estado'=>'1',
            'codigo_comp'=>'220501006'
            ],
            //////////////////////////////
            //////////ANALIZAR////////////
            //////////////////////////////
            [
            'id_resultado'=>'4',
            'resultado'=>'INTERPRETAR EL INFORME DE REQUERIMIENTOS, PARA DETERMINAR LAS NECESIDADES TECNOLÓGICAS EN EL MANEJO DE LA INFORMACIÓN, DE ACUERDO CON LAS NORMAS Y PROTOCOLOS ESTABLECIDOS EN LA EMPRESA.',
            'estado'=>'1',
            'codigo_comp'=>'220501032'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'5',
            'resultado'=>'ELABORAR EL INFORME DE LOS RESULTADOS DEL ANÁLISIS DEL SISTEMA DEINFORMACIÓN, DE ACUERDO CON LOS REQUERIMIENTOS DEL CLIENTE SEGÚNNORMAS Y PROTOCOLOS ESTABLECIDOS.',
            'estado'=>'1',
            'codigo_comp'=>'220501032'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'6',
            'resultado'=>'REPRESENTA EL BOSQUEJO DE LA SOLUCIÓN AL PROBLEMA PRESENTADO POR EL CLIENTE, MEDIANTE LA ELABORACIÓN DE DIAGRAMAS DE CASOS DE USO, APOYADO EN EL ANÁLISIS DEL INFORME DE REQUERIMIENTOS, AL CONFRONTAR LA SITUACIÓN PROBLEMICA CON EL USUARIO SEGÚN NORMAS Y PROTOCOLOS DE LA ORGANIZACION.',
            'estado'=>'1',
            'codigo_comp'=>'220501032'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'7',
            'resultado'=>'VALORAR LA INCIDENCIA DE LOS DATOS EN LOS PROCESOS DEL MACROSISTEMA, TOMANDO COMO REFERENTE EL DICCIONARIO DE DATOS Y LAS MINIESPECIFICACIONES, PARA LA CONSOLIDACIÓN DE LOS DATOS QUE INTERVIENEN, DE ACUERDO CON PARÁMETROS ESTABLECIDOS.',
            'estado'=>'1',
            'codigo_comp'=>'220501032'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'8',
            'resultado'=>'CONSTRUIR EL MODELO CONCEPTUAL DEL MACROSISTEMA FRENTE A LOS REQUERIMIENTOS DEL CLIENTE, MEDIANTE EL USO E INTERPRETACIÓN DE LA INFORMACIÓN LEVANTADA, REPRESENTADO EN DIAGRAMAS DE CLASE, DE INTERACCIÓN, COLABORACIÓN Y CONTRATOS DE OPERACIÓN, DE ACUERDO CON LAS DIFERENTES SECUENCIAS, FASES Y PROCEDIMIENTOS DEL SISTEMA.',
            'estado'=>'1',
            'codigo_comp'=>'220501032'
            ],
            //////////////////////////////
            ///////////DISEÑAR////////////
            //////////////////////////////
            [
            'id_resultado'=>'9',
            'resultado'=>'DISEÑAR LA ARQUITECTURA DEL SOFTWARE, MEDIANTE LA INTERPRETACIÓN DE LAS CLASES, OBJETOS Y MECANISMOS DE COLABORACIÓN, UTILIZANDO HERRAMIENTAS TECNOLÓGICAS DE DISEÑO, DE ACUERDO CON LAS TENDENCIAS DE LAS TECNOLOGÍAS DE LA INFORMACIÓN Y LA COMUNICACIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501033'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'10',
            'resultado'=>'DISEÑAR LA ESTRUCTURA DE DATOS, A PARTIR DEL MODELO CONCEPTUAL DETERMINADO EN EL ANÁLISIS DEL SISTEMA, UTILIZANDO HERRAMIENTAS TECNOLÓGICAS DE BASES DE DATOS, SEGÚN LAS NORMAS Y ESTÁNDARES ESTABLECIDOS.',
            'estado'=>'1',
            'codigo_comp'=>'220501033'
            ],
            //////////////////////////////
            //////---2_TRIMESTRE---///////
            //////////////////////////////
            //////////////////////////////
            ///////////DISEÑAR////////////
            //////////////////////////////
            [
            'id_resultado'=>'11',
            'resultado'=>'APLICAR POLÍTICAS Y MECANISMOS DE CONTROL EN EL DISEÑO DEL SISTEMA DEINFORMACIÓN, MEDIANTE EL ANÁLISIS DE LA VULNERABILIDAD DE LA INFORMACIÓN,SIGUIENDO LOS PARÁMETROS ESTABLECIDOS POR LA ORGANIZACIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501033'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'12',
            'resultado'=>'DISEÑAR LA ARQUITECTURA TECNOLÓGICA DEL SISTEMA DE INFORMACIÓN, MEDIANTEEL RECONOCIMIENTO DE HARDWARE Y SOFTWARE, DE ACUERDO CON LA TECNOLOGÍADISPONIBLE EN EL MERCADO, EL INFORME DE ANÁLISIS LEVANTADO Y EL DIAGRAMADE DISTRIBUCIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501033'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'13',
            'resultado'=>'CONSTRUIR EL PROTOTIPO DEL SISTEMA DE INFORMACIÓN, A PARTIR DEL ANÁLISIS DE LAS CARACTERÍSTICAS FUNCIONALES DEL SISTEMA EN RELACIÓN CON FACILIDAD DE MANEJO, FUNCIONALIDAD Y EXPERIENCIA DEL USUARIO, APOYADO EN SOFTWARE APLICADO SEGÚN PROTOCOLOS DE DISEÑO.',
            'estado'=>'1',
            'codigo_comp'=>'220501033'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'14',
            'resultado'=>'ELABORAR EL INFORME DE DISEÑO DEL SISTEMA DE INFORMACIÓN, DE ACUERDOCON LA SELECCIÓN DE LAS HERRAMIENTAS, TANTO DE SOFTWARE COMO DEHARDWARE, REQUERIDAS PARA LA SOLUCIÓN INFORMÁTICA.',
            'estado'=>'1',
            'codigo_comp'=>'220501033'
            ],
            //////////////////////////////
            /////////PARTICIPAR///////////
            //////////////////////////////
            [
            'id_resultado'=>'15',
            'resultado'=>'INTERPRETAR EL DIAGNÓSTICO DE NECESIDADES INFORMÁTICAS, PARA DETERMINAR LAS TECNOLÓGICAS REQUERIDAS EN EL MANEJO DE LA INFORMACIÓN, DE ACUERDO CON LAS NORMAS Y PROTOCOLOS  ESTABLECIDOS POR LA EMPRESA',
            'estado'=>'1',
            'codigo_comp'=>'220501009'
            ],
            //////////////////////////////
            //////////CONSTRUIR///////////
            //////////////////////////////
            [
            'id_resultado'=>'16',
            'resultado'=>'INTERPRETAR EL INFORME TECNICO DE DISEÑO,  PARA DETERMINAR EL PLAN DE TRABAJO DURANTE LA FASE DE CONSTRUCCION DEL SOFTWARE, DE ACUERDO CON LAS NORMAS Y PROTOCOLOS.',
            'estado'=>'1',
            'codigo_comp'=>'220501007'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'17',
            'resultado'=>'CONSTRUIR LA BASE DE DATOS, A PARTIR DEL MODELO DE DATOS DETERMINADO EN EL DISEÑO DEL SISTEMA, UTILIZANDO SISTEMAS DE GESTIÓN DE BASE DE DATOS, SEGÚN LOS PROTOCOLOS ESTABLECIDOS EN LA ORGANIZACIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501007'
            ],
            //////////////////////////////
            //////---3_TRIMESTRE---///////
            //////////////////////////////
            //////////////////////////////
            //////////CONSTRUIR///////////
            //////////////////////////////
            [
            'id_resultado'=>'18',
            'resultado'=>'CONSTRUIR LA INTERFAZ DE USUARIO, APOYADO EN LA EVALUACIÓN DEL PROTOTIPO, DETERMINANDO LAS ENTRADAS Y SALIDAS REQUERIDAS EN EL DISEÑO Y DEFINIENDO LOS LINEAMIENTOS PARA LA NAVEGACIÓN, DE ACUERDO CON LAS NECESIDADES DEL USUARIO.',
            'estado'=>'1',
            'codigo_comp'=>'220501007'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'19',
            'resultado'=>'REALIZAR LA CODIFICACIÓN DE LOS MÓDULOS DEL SISTEMA Y EL PROGRAMA PRINCIPAL, A PARTIR DE LA UTILIZACIÓN DEL LENGUAJE DE PROGRAMACIÓN SELECCIONADO, DE ACUERDO CON LAS ESPECIFICACIONES DEL DISEÑO.',
            'estado'=>'1',
            'codigo_comp'=>'220501007'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'20',
            'resultado'=>'CONSTRUIR EL PROGRAMA DE INSTALACIÓN DEL APLICATIVO, UTILIZANDO LAS HERRAMIENTAS DE DESARROLLO DISPONIBLES EN EL MERCADO, SEGÚN LAS CARACTERÍSTICAS DE LA ARQUITECTURA DE LA SOLUCIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501007'
            ],
            //////////////////////////////
            ///////////APLICAR////////////
            //////////////////////////////
            [
            'id_resultado'=>'21',
            'resultado'=>'IDENTIFICAR LAS CARACTERISTICAS DE LOS PROCESOS DE DESARROLLO DE SOFTWARE, FRENTE AL REFERENTE DE CALIDAD ADOPTADO  POR LA EMPRESA, AJUSTANDOLOS A LOS RESULTADOS DE LAS EDICIONES,  EDICIONES Y RECOMENDACIONES REALIZADAS.',
            'estado'=>'1',
            'codigo_comp'=>'220501035'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'22',
            'resultado'=>'EVALUAR PROCESOS Y PRODUCTOS DE DESARROLLO DE SOFTWARE, DOCUMENTAR Y CONCERTAR ACCIONES A SEGUIR, PARA GARANTIZAR EL CUMPLIMIENTO DE LAS NORMAS ESTABLECIDAS, DE ACUERDO CON EL PLAN DEFINIDO Y CON LOS CRITERIOS DE MEDICIÓN, MÉTRICO Y POLÍTICO DETERMINADOS POR LA EMPRESA.',
            'estado'=>'1',
            'codigo_comp'=>'220501035'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'23',
            'resultado'=>'APLICAR LOS ESTÁNDARES DE CALIDAD INVOLUCRADOS EN LOS PROCESOS DE DESARROLLO DE SOFTWARE, SIGUIENDO EL PLAN ESTABLECIDO PARA MANTENER LA INTEGRIDAD DE LOS PRODUCTOS DE TRABAJO  DEFINIDOS, SEGÚN LAS PRÁCTICAS DE CONFIGURACIÓN ESTABLECIDAS POR LA EMPRESA.',
            'estado'=>'1',
            'codigo_comp'=>'220501035'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'24',
            'resultado'=>'ELABORAR EL INFORME FINAL DEL PROCESO DE GESTIÓN DE CALIDAD EN EL DESARROLLO DE SOFTWARE, QUE CONSOLIDE LA INFORMACIÓN DE LAS EVIDENCIAS, HALLAZGOS Y NOVEDADES FRENTE AL SEGUIMIENTO Y CONTROL DE LOS PRODUCTOS, SEGÚN NORMAS INTERNACIONALES Y PROTOCOLOS DE LA ORGANIZACIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501035'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'25',
            'resultado'=>'ELABORAR INSTRUMENTOS E INSTRUCTIVOS, REQUERIDOS POR EL ASEGURAMIENTO DE LA CALIDAD, PARA DOCUMENTAR Y EVALUAR LOS PROCESOS DE DESARROLLO DE SOFTWARE, DE ACUERDO CON LAS NORMAS Y PROCEDIMIENTOS ESTABLECIDAS POR LA EMPRESA.',
            'estado'=>'1',
            'codigo_comp'=>'220501035'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'26',
            'resultado'=>'IDENTIFICAR LOS PUNTOS CRÍTICOS DE CONTROL EN LOS PROCESOS DE DESARROLLO DE SOFTWARE, PARA ESTABLECER LAS ACCIONES A SEGUIR, GARANTIZANDO EL CUMPLIMIENTO DE LOS ESTÁNDARES DE CALIDAD, SIGUIENDO LOS LINEAMIENTOS ESTABLECIDOS POR LA ORGANIZACIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501035'
            ],
            //////////////////////////////
            //////---4_TRIMESTRE---///////
            //////////////////////////////
            //////////////////////////////
            //////////CONSTRUIR///////////
            //////////////////////////////
            [
            'id_resultado'=>'27',
            'resultado'=>'EJECUTAR Y DOCUMENTAR LAS PRUEBAS DEL SOFTWARE, APLICANDO TÉCNICAS DE ENSAYO-ERROR, DE ACUERDO CON EL PLAN DISEÑADO Y LOS PROCEDIMIENTOS ESTABLECIDOS POR LA EMPRESA.',
            'estado'=>'1',
            'codigo_comp'=>'220501007'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'28',
            'resultado'=>'ELABORAR EL MANUAL TÉCNICO DE LA APLICACIÓN, DE ACUERDO CON LA COMPLEJIDAD DEL APLICATIVO Y SEGÚN NORMAS Y PROCEDIMIENTOS ESTABLECIDOS POR LA EMPRESA.',
            'estado'=>'1',
            'codigo_comp'=>'220501007'
            ],
            //////////////////////////////
            //////////IMPLANTAR///////////
            //////////////////////////////
            [
            'id_resultado'=>'29',
            'resultado'=>'CONFIGURAR EL SOFTWARE DE LA APLICACIÓN PARA CLIENTE Y SERVIDOR, MEDIANTE LA UTILIZACIÓN DEL HARDWARE DISPONIBLE, EJECUTÁNDOLA EN LA PLATAFORMA TECNOLÓGICA, SEGÚN NORMAS Y PROTOCOLOS ESTABLECIDOS POR LA EMPRESA.',
            'estado'=>'1',
            'codigo_comp'=>'220501034'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'30',
            'resultado'=>'ELABORAR EL INFORME ADMINISTRATIVO, SIGUIENDO LOS PROTOCOLOS DE LA ORGANIZACIÓN, BASADO EN LOS PLANES DE INSTALACIÓN, RESPALDO Y MIGRACIÓN DEL SISTEMA DE INFORMACIÓN, FACILITANDO LA OPERATIVIDAD Y MANTENIMIENTO DE LA SOLUCIÓN INFORMÁTICA.',
            'estado'=>'1',
            'codigo_comp'=>'220501034'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'31',
            'resultado'=>'ELABORAR INFORMES TÉCNICOS RELACIONADOS CON LA SOLUCIÓN INFORMÁTICA IMPLANTADA, DE ACUERDO CON LAS PROPUESTAS DE ALTERNATIVAS APLICADAS, TENIENDO EN CUENTA LAS TÉCNICAS DE COMUNICACIÓN Y SEGÚN NORMAS Y PROTOCOLOS ESTABLECIDOS.',
            'estado'=>'1',
            'codigo_comp'=>'220501034'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'32',
            'resultado'=>'DEFINIR ESTRATEGIAS PARA LA VALIDACIÓN DE MANUALES DE USUARIO Y DE OPERACIÓN, RESPONDIENDO A LAS NECESIDADES Y SATISFACCIÓN DEL CLIENTE, FRENTE A LA SOLUCIÓN INFORMÁTICA PROPUESTA, SEGÚN POLÍTICAS DE LA ORGANIZACIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501034'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'33',
            'resultado'=>'CAPACITAR A LOS USUARIOS DEL SISTEMA, SOBRE LA ESTRUCTURACIÓN Y EL MANEJO DEL APLICATIVO, DE ACUERDO CON EL PLAN ESTABLECIDO, EL PERFIL DE LOS USUARIOS, SEGÚN POLÍTICAS DE LA ORGANIZACIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501034'
            ],
            //////////////////////////////
            /////////PARTICIPAR///////////
            //////////////////////////////
            [
            'id_resultado'=>'34',
            'resultado'=>'PARTICIPAR EN LOS PERFECCIONAMIENTOS DE CONTRATOS INFORMÁTICOS, ESTABLECIENDO CLÁUSULAS TÉCNICAS, QUE RESPONDAN A LAS NECESIDADES DE LOS ACTORES DE LA NEGOCIACIÓN, DE ACUERDO CON LA LEY DE CONTRATACIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501009'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'35',
            'resultado'=>'DEFINIR ESTRATEGIAS PARA LA ELABORACIÓN DE TÉRMINOS DE REFERENCIA Y PROCESOS DE EVALUACIÓN DE PROVEEDORES, EN LA ADQUISICIÓN DE TECNOLOGÍA, SEGÚN PROTOCOLOS ESTABLECIDOS.',
            'estado'=>'1',
            'codigo_comp'=>'220501009'
            ],
            //////////////////////////////
            [
            'id_resultado'=>'36',
            'resultado'=>'ELABORAR EL INFORME SOBRE EL CUMPLIMIENTO DE LOS TÉRMINOS DE REFERENCIA PREVISTOS EN LA NEGOCIACIÓN, DE ACUERDO CON LA PARTICIPACIÓN DE CADA UNO DE LOS ACTORES EN RELACIÓN CON LA SATISFACCIÓN DE LOS BIENES INFORMÁTICOS CONTRATADOS Y RECIBIDOS, SEGÚN NORMAS Y PROTOCOLOS DE LA ORGANIZACIÓN.',
            'estado'=>'1',
            'codigo_comp'=>'220501009'
            ]
        ]);

        //SEMAFORO
        Semaforo::insert([
            //////////////////////////////
            //////---1_TRIMESTRE---///////
            //////////////////////////////
            //////////////////////////////
            /////////ESPECIFICAR//////////
            //////////////////////////////
            [
            'id_semaforo'=>'1',
            'dia_semana'=>'1',
            'trimestre'=>'1',
            'codigo_comp'=>'220501006',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            //////////ANALIZAR////////////
            //////////////////////////////
            [
            'id_semaforo'=>'2',
            'dia_semana'=>'2',
            'trimestre'=>'1',
            'codigo_comp'=>'220501032',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            //////////DISEÑAR/////////////
            //////////////////////////////
            [
            'id_semaforo'=>'3',
            'dia_semana'=>'2',
            'trimestre'=>'1',
            'codigo_comp'=>'220501033',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            //////---2_TRIMESTRE---///////
            //////////////////////////////
            //////////////////////////////
            ///////////DISEÑAR////////////
            //////////////////////////////
            [
            'id_semaforo'=>'4',
            'dia_semana'=>'2',
            'trimestre'=>'2',
            'codigo_comp'=>'220501033',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            //////////PARTICIPAR//////////
            //////////////////////////////
            [
            'id_semaforo'=>'5',
            'dia_semana'=>'1',
            'trimestre'=>'2',
            'codigo_comp'=>'220501009',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            //////////CONSTRUIR///////////
            //////////////////////////////
            [
            'id_semaforo'=>'6',
            'dia_semana'=>'2',
            'trimestre'=>'2',
            'codigo_comp'=>'220501007',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            //////---3_TRIMESTRE---///////
            //////////////////////////////
            //////////////////////////////
            ///////////CONSTRUIR//////////
            //////////////////////////////
            [
            'id_semaforo'=>'7',
            'dia_semana'=>'3',
            'trimestre'=>'3',
            'codigo_comp'=>'220501007',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            ///////////APLICAR////////////
            //////////////////////////////
            [
            'id_semaforo'=>'8',
            'dia_semana'=>'2',
            'trimestre'=>'3',
            'codigo_comp'=>'220501035',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            //////---4_TRIMESTRE---///////
            //////////////////////////////
            //////////////////////////////
            ///////////CONSTRUIR//////////
            //////////////////////////////
            [
            'id_semaforo'=>'9',
            'dia_semana'=>'1',
            'trimestre'=>'4',
            'codigo_comp'=>'220501007',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            ///////////IMPLANTAR////////////
            //////////////////////////////
            [
            'id_semaforo'=>'10',
            'dia_semana'=>'2',
            'trimestre'=>'4',
            'codigo_comp'=>'220501034',
            'codigo_prog'=>'228106'
            ],
            //////////////////////////////
            ///////////PARTICIPAR/////////
            //////////////////////////////
            [
            'id_semaforo'=>'11',
            'dia_semana'=>'2',
            'trimestre'=>'4',
            'codigo_comp'=>'220501009',
            'codigo_prog'=>'228106'
            ]
        ]);

        //HORARIO
        Horario::insert([
            [
            'codigo_h'=>'1',
            'codigo_prog'=>'228106',
            'nr_ficha'=>'2515397',
            'codigo_ambiente'=>'102',
            'dni'=>'11111',
            'id_semaforo'=>'1',
            'codigo_comp'=>'220501006',
            'codigo_desc'=>'1'
            ]
        ]);

    }
}
