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
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\RedTematicaController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\SemaforoController;
use App\Http\Controllers\SubsedeController;
use App\Http\Controllers\TipoFormacionController;

// /*-----------------LOGIN-----------------*/
 Route::get('/', function () {return view('login');});

// /*-----------------PAGINA PRINCIPAL-----------------*/

// /*-----------------CRUDS-----------------*/

// /*RED*/
    Route::controller(RedTematicaController::class)->group(function(){
    //Principal
    Route::get('/red/formulario','index')->name('redindex');
    //Eliminar
    Route::delete('/red/delete/{redtematica}','destroy')->name('reddestroy');    
    //Crear
    Route::get('/red/crear','create')->name('redcreate');                                  
    Route::post('/red/createred','store')->name('redstore');                              
    //Editar                                                                              
    Route::get('/red/edit/{redtematica}','edit')->name('rededit');
    Route::put('/red/update','update')->name('redupdate');
});

// /*AREA*/
    Route::controller(AreaTematicaController::class)->group(function(){
    //Principal
    Route::get('/area/formulario','index')->name('areaindex');
    //Eliminar
    Route::delete('/area/delete/{areatematica}','destroy')->name('areadestroy');    
    //Crear
    Route::get('/area/crear','create')->name('areacreate');
    Route::post('/area/creararea','store')->name('areastore');        
    //Editar
    Route::get('/area/edit/{areatematica}','edit')->name('areaedit');
    Route::put('/area/update/{areatematica}','update')->name('areaupdate');
});

// /*INSTRUCTOR*/
    Route::controller(InstructorController::class)->group(function(){
    //Principal
    Route::get('/instructor/formulario','index')->name('instructorindex');
    //Eliminar
    Route::delete('/instructor/delete/{instructor}','destroy')->name('instructordestroy');    
    //Crear
    Route::get('/instructor/crear','create')->name('instructorcreate');
    Route::post('/instructor/crearinstructor','store')->name('instructorstore');        
    //Editar
    Route::get('/instructor/edit/{instructor}','edit')->name('instructoredit');
    Route::put('/instructor/update/{instructor}','update')->name('instructorupdate');
});

// /*ADMINISTRACION*/
    Route::controller(AdministracionController::class)->group(function(){
    //Principal
    Route::get('/administracion/formulario','index')->name('administracionindex');
    //Eliminar
    Route::delete('/administracion/delete/{administracion}','destroy')->name('administraciondestroy');    
    //Crear
    Route::get('/administracion/crear','create')->name('administracioncreate');
    Route::post('/administracion/crearadministracion','store')->name('administracionstore');        
    //Editar
    Route::get('/administracion/edit/{administracion}','edit')->name('administracionedit');
    Route::put('/administracion/update/{administracion}','update')->name('administracionupdate');
});

// /*CENTRO*/
    Route::controller(CentroFormacionController::class)->group(function(){
    //Principal
    Route::get('/centroformacion/formulario','index')->name('centroindex');
    //Eliminar
    Route::delete('/centroformacion/delete/{centroformacion}','destroy')->name('centrodestroy');    
    //Crear
    Route::get('/centroformacion/crear','create')->name('centrocreate');
    Route::post('/centroformacion/crearcentro','store')->name('centrostore');        
    //Editar
    Route::get('/centroformacion/edit/{centroformacion}','edit')->name('centroedit');
    Route::put('/centroformacion/update/{centroformacion}','update')->name('centroupdate');
});

// /*SUBSEDE*/
    Route::controller(SubsedeController::class)->group(function(){
    //Principal
    Route::get('/subsede/formulario','index')->name('subsedeindex');
    //Eliminar
    Route::delete('/subsede/delete/{subsede}','destroy')->name('subsededestroy');    
    //Crear
    Route::get('/subsede/crear','create')->name('subsedecreate');
    Route::post('/subsede/crearsubsede','store')->name('subsedestore');        
    //Editar
    Route::get('/subsede/edit/{subsede}','edit')->name('subsedeedit');
    Route::put('/subsede/update/{subsede}','update')->name('subsedeupdate');
});

// /*PROGRAMA*/
    Route::controller(ProgramaController::class)->group(function(){
    //Principal
    Route::get('/programa/formulario','index')->name('programaindex');
    //Eliminar
    Route::delete('/programa/delete/{programa}','destroy')->name('programadestroy');    
    //Crear
    Route::get('/programa/crear','create')->name('programacreate');
    Route::post('/programa/crearprograma','store')->name('programastore');        
    //Editar
    Route::get('/programa/edit/{programa}','edit')->name('programaedit');
    Route::put('/programa/update/{programa}','update')->name('programaupdate');
});

// /*DESCARGA*/
    Route::controller(DescargaController::class)->group(function(){
    //Principal
    Route::get('/descarga/formulario','index')->name('descargaindex');
    //Eliminar
    Route::delete('/descarga/delete/{descarga}','destroy')->name('descargadestroy');    
    //Crear
    Route::get('/descarga/crear','create')->name('descargacreate');
    Route::post('/descarga/creardescarga','store')->name('descargastore');        
    //Editar
    Route::get('/descarga/edit/{descarga}','edit')->name('descargaedit');
    Route::put('/descarga/update/{descarga}','update')->name('descargaupdate');
});

    //TIPOFORMACION
    Route::controller(TipoFormacionController::class)->group(function(){
    //Principal
    Route::get('/tipoformacion/formulario','index')->name('formacionindex');
    //Eliminar
    Route::delete('/tipoformacion/delete/{tipoformacion}','destroy')->name('formaciondestroy');    
    //Crear
    Route::get('/tipoformacion/crear','create')->name('formacioncreate');
    Route::post('/tipoformacion/crearformacion','store')->name('formacionstore');        
    //Editar
    Route::get('/tipoformacion/edit/{tipoformacion}','edit')->name('formacionedit');
    Route::put('/tipoformacion/update/{tipoformacion}','update')->name('formacionupdate');
});

    //FICHAS
    Route::controller(FichaController::class)->group(function(){
    //Principal
    Route::get('/ficha/formulario','index')->name('fichaindex');
    //Eliminar
    Route::delete('/ficha/delete/{ficha}','destroy')->name('fichadestroy');    
    //Crear
    Route::get('/ficha/crear','create')->name('fichacreate');
    Route::post('/ficha/crearficha','store')->name('fichastore');        
    //Editar
    Route::get('/ficha/edit/{ficha}','edit')->name('fichaedit');
    Route::put('/ficha/update/{ficha}','update')->name('fichaupdate');
});

    //AMBIENTES
    Route::controller(AmbienteFormacionController::class)->group(function(){
    //Principal
    Route::get('/ambiente/formulario','index')->name('ambienteindex');
    //Eliminar
    Route::delete('/ambiente/delete/{ambiente}','destroy')->name('ambientedestroy');    
    //Crear
    Route::get('/ambiente/crear','create')->name('ambientecreate');
    Route::post('/ambiente/crearambiente','store')->name('ambientestore');        
    //Editar
    Route::get('/ambiente/edit/{ambiente}','edit')->name('ambienteedit');
    Route::put('/ambiente/update/{ambiente}','update')->name('ambienteupdate');
});

    //COMPETENCIA
    Route::controller(CompetenciaController::class)->group(function(){
    //Principal
    Route::get('/competencia/formulario','index')->name('competenciaindex');
    //Eliminar
    Route::delete('/competencia/delete/{competencia}','destroy')->name('competenciadestroy');    
    //Crear
    Route::get('/competencia/crear','create')->name('competenciacreate');
    Route::post('/competencia/crearcompetencia','store')->name('competenciastore');        
    //Editar
    Route::get('/competencia/edit/{competencia}','edit')->name('competenciaedit');
    Route::put('/competencia/update/{competencia}','update')->name('competenciaupdate');
});

    //RESULTADO
    Route::controller(ResultadoController::class)->group(function(){
    //Principal
    Route::get('/resultado/formulario','index')->name('resultadoindex');
    //Eliminar
    Route::delete('/resultado/delete/{resultado}','destroy')->name('resultadodestroy');    
    //Crear
    Route::get('/resultado/crear','create')->name('resultadocreate');
    Route::post('/resultado/crearresultado','store')->name('resultadostore');        
    //Editar
    Route::get('/resultado/edit/{resultado}','edit')->name('resultadoedit');
    Route::put('/resultado/update/{resultado}','update')->name('resultadoupdate');
});

    //SEMAFORO
    Route::controller(SemaforoController::class)->group(function(){
    //Principal
    Route::get('/semaforo/formulario','index')->name('semaforoindex');
    //Eliminar
    Route::delete('/semaforo/delete/{semaforo}','destroy')->name('semaforodestroy');    
    //Crear
    Route::get('/semaforo/crear','create')->name('semaforocreate');
    Route::post('/semaforo/crearsemaforo','store')->name('semaforostore');        
    //Editar
    Route::get('/semaforo/edit/{semaforo}','edit')->name('semaforoedit');
    Route::put('/semaforo/update/{semaforo}','update')->name('semaforoupdate');
});

    //HORARIO
    Route::controller(HorarioController::class)->group(function(){
    //Principal
    Route::get('/horario/formulario','index')->name('horarioindex');
    //Eliminar
    Route::delete('/horario/delete/{horario}','destroy')->name('horariodestroy');    
    //Crear
    Route::get('/horario/crear','create')->name('horariocreate');
    Route::post('/horario/crearhorario','store')->name('horariostore');        
    //Editar
    Route::get('/horario/edit/{horario}','edit')->name('horarioedit');
    Route::put('/horario/update/{horario}','update')->name('horarioupdate');
});