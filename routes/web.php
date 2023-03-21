<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\AmbienteFormacionController;
use App\Http\Controllers\AreaTematicaController;
use App\Http\Controllers\CentroFormacionController;
use App\Http\Controllers\CompetenciaController;
use App\Http\Controllers\DescargaController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\MainhorarioController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\RedTematicaController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\SemaforoController;
use App\Http\Controllers\SubsedeController;
use App\Http\Controllers\TipoFormacionController;

// /*-----------------LOGIN-----------------*/
 Route::get('/', function () {return view('login');});

// /*-----------------PAGINA PRINCIPAL-----------------*/
Route::get('/paginaprincipal', function () {return view('mainindex');})->name('mainindex');

// /*-----------------PAGINA CONTRARO-----------------*/
Route::get('/paginacontrato', function () {return view('contrato.contrato');})->name('contratoindex');

// /*-----------------PAGINA OPCIONES-----------------*/
Route::get('/paginaopciones', function () {return view('opciones.opciones');})->name('opcionesindex');

// /*-----------------PAGINA OPCIONES-----------------*/
Route::get('/paginaperfil', function () {return view('perfil.perfil');})->name('perfilindex');

// /*-----------------HORARIO PRINCIPAL-----------------*/

        Route::controller(MainhorarioController::class)->group(function(){
        //DOWNLAND
        Route::match(['get', 'post'], '/horario/principal/pdf','pdf')->name('hopdf');        
        //INDEX
        Route::get('/horario/principal','index')->name('mainhindex');        
        //CREATE
        Route::post('/horario/principal/crear','create')->name('mainhcreate');        
        //EDIT
        Route::match(['get', 'post'], '/horario/principal/editar', 'edit' )->name('mainhedit');
        //DELETE 
        Route::delete('/horario/principal/delete/{horario}','destroy')->name('mainhdestroy');   
        });
// /*-----------------ELEGIR CRUD-----------------*/
    Route::get('/elegir_crud', function () {return view('choosecrud');})->name('choosecrud');
// /*-----------------CRUDS-----------------*/

// /*RED*/
    Route::controller(RedTematicaController::class)->group(function(){
    //Principal
    Route::get('/red/formulario','index')->name('redindex');
    // CREAR
    Route::post('/red/crear','create')->name('redcreate');  
    // ELIMINAR
    Route::delete('/red/delete/{red}','destroy')->name('reddestroy');       
    //Archive
    Route::post('red/archive/{red}','archive')->name('redarchive');                                     
    //Restore
    Route::post('red/restore/{red}','restore')->name('redrestore'); 
    //EDIT      
    Route::match(['get', 'post'], '/red/edit/', 'edit' )->name('rededit');                              
    });


// /*AREA*/
    Route::controller(AreaTematicaController::class)->group(function(){
    //Principal
    Route::get('/area/formulario','index')->name('areaindex');
    // CREAR
    Route::post('/area/crear','create')->name('areacreate');  
    // ELIMINAR
    Route::delete('/area/delete/{area}','destroy')->name('areadestroy');       
    //Archive
    Route::post('area/archive/{area}','archive')->name('areaarchive');                                     
    //Restore
    Route::post('area/restore/{area}','restore')->name('arearestore'); 
    //EDIT      
    Route::match(['get', 'post'], '/area/edit/', 'edit' )->name('areaedit'); 
    });


// /*INSTRUCTOR*/
    Route::controller(InstructorController::class)->group(function(){
    //Principal
    Route::get('/instructor/formulario','index')->name('instructorindex');
    // CREAR
    Route::post('/instructor/crear','create')->name('instructorcreate');  
    // ELIMINAR
    Route::delete('/instructor/delete/{instructor}','destroy')->name('instructordestroy');       
    //Archive
    Route::post('instructor/archive/{instructor}','archive')->name('instructorarchive');                                     
    //Restore
    Route::post('/instructor/restore/{instructor}','restore')->name('instructorstore'); 
    //EDIT      
    Route::match(['get', 'post'], '/instructor/edit/', 'edit' )->name('instructoredit');
    });


// /*ADMINISTRACION*/
    Route::controller(AdministracionController::class)->group(function(){
    //Principal
    Route::get('/administracion/formulario','index')->name('administracionindex');
    // CREAR
    Route::post('/administracion/crear','create')->name('administracioncreate');  
    // ELIMINAR
    Route::delete('/administracion/delete/{administracion}','destroy')->name('administraciondestroy');       
    //Archive
    Route::post('administracion/archive/{administracion}','archive')->name('administracionarchive');                                     
    //Restore
    Route::post('administracion/restore/{administracion}','restore')->name('administracionrestore'); 
    //EDIT      
    Route::match(['get', 'post'], '/administracion/edit/', 'edit' )->name('administracionedit');    
    });


    // /*CENTRO*/
    Route::controller(CentroFormacionController::class)->group(function(){
    //Principal
    Route::get('/centroformacion/formulario','index')->name('centroindex');
    // CREAR
    Route::post('/centroformacion/crear','create')->name('centrocreate');  
    // ELIMINAR
    Route::delete('/centroformacion/delete/{centroformacion}','destroy')->name('centrodestroy');       
    //Archive
    Route::post('centroformacion/archive/{centroformacion}','archive')->name('centroarchive');                                     
    //Restore
    Route::post('/centroformacion/crearcentro/{centroformacion}','restore')->name('centrorestore'); 
    //EDIT      
    Route::match(['get', 'post'], '/centroformacion/edit/', 'edit' )->name('centroedit');                              
    });


// /*SUBSEDE*/
    Route::controller(SubsedeController::class)->group(function(){
    //Principal
    Route::get('/subsede/formulario','index')->name('subsedeindex');
    // CREAR
    Route::post('/subsede/crear','create')->name('subsedecreate');  
    // ELIMINAR
    Route::delete('/subsede/delete/{subsede}','destroy')->name('subsededestroy');       
    //Archive
    Route::post('subsede/archive/{subsede}','archive')->name('subsedearchive');                                     
    //Restore
    Route::post('/subsede/crearsubsede/{subsede}','restore')->name('subsederestore'); 
    //EDIT      
    Route::match(['get', 'post'], '/subsede/edit/', 'edit' )->name('subsedeedit');                              
    });


// /*PROGRAMA*/
    Route::controller(ProgramaController::class)->group(function(){
    //Principal
    Route::get('/programa/formulario','index')->name('programaindex');
    // CREAR
    Route::post('/programa/crear','create')->name('programacreate');  
    // ELIMINAR
    Route::delete('/programa/delete/{programa}','destroy')->name('programadestroy');       
    //Archive
    Route::post('programa/archive/{programa}','archive')->name('programaarchive');                                     
    //Restore
    Route::post('/programa/crearprograma/{programa}','restore')->name('programarestore'); 
    //EDIT      
    Route::match(['get', 'post'], '/programa/edit/', 'edit' )->name('programaedit');
    });


// /*DESCARGA*/
    Route::controller(DescargaController::class)->group(function(){
    //Principal
    Route::get('/descarga/formulario','index')->name('descargaindex');
    // CREAR
    Route::post('/descarga/crear','create')->name('descargacreate');  
    // ELIMINAR
    Route::delete('/descarga/delete/{descarga}','destroy')->name('descargadestroy');       
    //Archive
    Route::post('descarga/archive/{descarga}','archive')->name('descargaarchive');                                     
    //Restore
    Route::post('/descarga/creardescarga/{descarga}','restore')->name('descargastore'); 
    //EDIT      
    Route::match(['get', 'post'], '/descarga/edit/', 'edit' )->name('descargaedit');
    });


    // /*TIPO FORMACION*/
    Route::controller(TipoFormacionController::class)->group(function(){
     //Principal
    Route::get('/tipoformacion/formulario','index')->name('formacionindex');
    // CREAR
    Route::post('/tipoformacion/crear','create')->name('formacioncreate');  
    // ELIMINAR
    Route::delete('/tipoformacion/delete/{tipoformacion}','destroy')->name('formaciondestroy');       
    //Archive
    Route::post('tipoformacion/archive/{tipoformacion}','archive')->name('formacionarchive');                                     
    //Restore
    Route::post('tipoformacion/restore/{tipoformacion}','restore')->name('formacionrestore'); 
    //EDIT      
    Route::match(['get', 'post'], '/tipoformacion/edit/', 'edit' )->name('formacionedit');  
    });


    //FICHAS
    Route::controller(FichaController::class)->group(function(){
    //Princiapl
    Route::get('/ficha/formulario','index')->name('fichaindex');
    // CREAR
    Route::post('/ficha/crear','create')->name('fichacreate');  
    // ELIMINAR
    Route::delete('/ficha/delete/{ficha}','destroy')->name('fichadestroy');       
    //Archive
    Route::post('ficha/archive/{ficha}','archive')->name('fichaarchive');                                     
    //Restore
    Route::post('/ficha/crearficha/{ficha}','restore')->name('fichastore'); 
    //EDIT      
    Route::match(['get', 'post'], '/ficha/edit/', 'edit' )->name('fichaedit');
    });


    //AMBIENTES
    Route::controller(AmbienteFormacionController::class)->group(function(){
    //Princiapl
    Route::get('/ambiente/formulario','index')->name('ambienteindex');
    // CREAR
    Route::post('/ambiente/crear','create')->name('ambientecreate');  
    // ELIMINAR
    Route::delete('/ambiente/delete/{ambiente}','destroy')->name('ambientedestroy');       
    //Archive
    Route::post('ambiente/archive/{ambiente}','archive')->name('ambientearchive');                                     
    //Restore
    Route::post('ambiente/restore/{ambiente}','restore')->name('ambienterestore'); 
    //EDIT      
    Route::match(['get', 'post'], '/ambiente/edit/', 'edit' )->name('ambienteedit');
    });


    //COMPETENCIA
    Route::controller(CompetenciaController::class)->group(function(){
    //Princiapl
    Route::get('/competencia/formulario','index')->name('competenciaindex');
    // CREAR
    Route::post('/competencia/crear','create')->name('competenciacreate');
    // ELIMINAR
    Route::delete('/competencia/delete/{competencia}','destroy')->name('competenciadestroy');
    //Archive
    Route::post('competencia/archive/{competencia}','archive')->name('competenciaarchive');
    //Restore
    Route::post('/competencia/crearcompetencia/{competencia}','restore')->name('competenciastore');
    //EDIT      
    Route::match(['get', 'post'], '/competencia/edit/', 'edit' )->name('competenciaedit');
    });


    //RESULTADO
    Route::controller(ResultadoController::class)->group(function(){
    //Principal
    Route::get('/resultado/formulario','index')->name('resultadoindex');
    // CREAR
    Route::post('/resultado/crear','create')->name('resultadocreate');
    // ELIMINAR
    Route::delete('/resultado/delete/{resultado}','destroy')->name('resultadodestroy');
    //Archive
    Route::post('resultado/archive/{resultado}','archive')->name('resultadoarchive');
    //Restore
    Route::post('/resultado/crearresultado/{resultado}','restore')->name('resultadostore');
    //EDIT      
    Route::match(['get', 'post'], '/resultado/edit/', 'edit' )->name('resultadoedit');
    });


    //SEMAFORO
    Route::controller(SemaforoController::class)->group(function(){
    //Principal
    Route::get('/semaforo/formulario','index')->name('semaforoindex');
    // CREAR
    Route::post('/semaforo/crear','create')->name('semaforocreate');
    // ELIMINAR
    Route::delete('/semaforo/delete/{semaforo}','destroy')->name('semaforodestroy');
    //Archive
    Route::post('semaforo/archive/{semaforo}','archive')->name('semaforoarchive');
    //Restore
    Route::post('/semaforo/crearsemaforo/{semaforo}','restore')->name('semaforostore');
    //EDIT      
    Route::match(['get', 'post'], '/semaforo/edit/', 'edit' )->name('semaforoedit');
    });


    //HORARIO
    Route::controller(HorarioController::class)->group(function(){
    //Principal
    Route::get('/horario/formulario','index')->name('horarioindex');
    // CREAR
    Route::post('/horario/crear','create')->name('horariocreate');
    // ELIMINAR
    Route::delete('/horario/delete/{horario}','destroy')->name('horariodestroy');
    //Archive
    Route::post('horario/archive/{horario}','archive')->name('horarioarchive');
    //Restore
    Route::post('/horario/crearhorario/{horario}','restore')->name('horariostore');
    //EDIT      
    Route::match(['get', 'post'], '/horario/edit/', 'edit' )->name('horarioedit');
    });

    