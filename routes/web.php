<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Route::get('mision','MisionController@index')->name('mision.index');
Route::get('/', function () {
    return view('bienvenido');
});

Route::view('/home', 'bienvenido');

//Route::post('mision', 'UserController@store')->name('users.store');
Route::view('/nosotros', 'nosotros');
Route::view('/password/nosotros', 'nosotros');
Route::view('/contacto', 'contacto');
Route::view('/password/contacto', 'contacto');
Route::view('/succes', 'succes');

Auth::routes();

//rupa perfil
Route::resource('profile','ProfileController');
Route::post('/userUpdate','ProfileController@userUpdate');

//AIzaSyDPk_OYKeT5aN1cuglTcy3B1bdywKfe8JA
//publicar servicios



//Route::post('ServiceIndex','Backend\BuyServiceController@index')->name('ServiceIndex');
//Route::post('/selectService','Backend\employer\updateService@selectService');
/* Route::resource('Eservices', 'Backend\ServiceController')
->middleware('auth'); */

//rutas admin

//ruta usuarios


//servicios en ejecucion empleador
//Route::get('runningServicesEmployer','Backend\RunningServicesEmployerController@runningServices')->name('runningServicesEmployer');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/adminHome', function (){
        return view('admin.adminHome');
    })->name('adminHome');
    Route::resource('roles','Backend\AdminRolesController');
    Route::resource('users','Backend\Admin\UserController');
    //ruta services
    Route::resource('posts', 'Backend\PostController');
    Route::get('detailService','Backend\DetailServiceController@detailService')->name('detailService');
    Route::get('detailEmployer','Backend\DetailEmployerController@index')->name('detailEmployer');
    
});
Route::group(['middleware' => 'student'], function () {
    Route::resource('services', 'Backend\student\ServiceController'); 
    //historial 
    Route::get('/historyStudent','Backend\student\HistoryStudentController@history')->name('historyStudent');
    Route::get('/historyDetaill','Backend\student\HistoryStudentController@historyDetaill')->name('historyDetaill'); 
    //servicios en ejecucion estudiante
    Route::get('runningServicesStudent','Backend\student\RunningServicesStudentController@runningServices')->name('runningServicesStudent');
    Route::get('completeStudent','Backend\student\CompleteStudentController@complete')->name('completeStudent');
    //cancelar estudiantes
    Route::post('cancelServiceStudent','Backend\student\CancelServicesStudentController@cancelServiceStudent')->name('cancelServiceStudent');
    //vistas comentarios y valoracion 
    Route::get('viewCommentsStudent','Backend\student\ViewCommentsStudentController@viewCommnets')->name('viewCommentsStudent');
    //valoracion usuario
    Route::resource('userValoration','Backend\student\UserValorationController');
    //finish
     Route::post('finish','Backend\student\FinishServicesController@finish')->name('finish');     
     Route::resource('skills','Backend\student\SkillsController');
    Route::get('viewMessage','Backend\student\MessageController@viewMessage')->name('viewMessage');    
});

Route::group(['middleware' => 'employer'], function () {
    Route::get('/employerHome', function (){
        return view('employer.employerHome');
    })->name('employerHome');

    Route::get('/historyEmployer','Backend\employer\HistoryEmployerController@history')->name('historyEmployer');

    //servicios employer
    Route::post('/findServices', 'Backend\employer\ServiceController@findServices');
    // Route::get('/servicesEmployer', 'Backend\employer\ServiceController@create')->name('servicesEmployer');
    // Route::get('/editServicesEmployer', 'Backend\employer\ServiceController@edit')->name('editServicesEmployer');

    //Route::get('employerServices/{service:slug}', 'Backend\employer\ServiceController@service')->name('service');
    Route::resource('employer','Backend\employer\EmployerServiceController');
    //ruta para seleccionar servicio
    Route::post('selectService','Backend\employer\SelectServiceController@selectService')->name('selectService');
    //adquirir servicio
    Route::post('buyService','Backend\employer\buyServiceController@buyService')->name('buyService');
    //mostrar adquirido
    Route::get('acquired','Backend\employer\acquiredServiceController@acquired')->name('acquired');
    //Route::post('cancelService','Backend\CancelServiceController@cancelServiceStudent')->name('cancelService');    
    //cancelar empleador
    Route::post('cancelServiceEmployer','Backend\employer\CancelServiceEmployerController@cancelServiceEmployer')->name('cancelServiceEmployer');
    //valorar servicios
    Route::resource('serviceRating','Backend\ServiceRatingController');
    //servicios terminados  
    Route::get('complete','Backend\employer\CompleteServicesController@complete')->name('complete');
    //detalle servicio terminado
    Route::post('detaillComplete','Backend\employer\CompleteServicesController@detaillComplete')->name('detaillComplete');
    //valoracion
    
    Route::resource('valoration','Backend\ValorationServiceController');
    
    
    
    Route::get('viewCommentsEmployer','Backend\employer\ViewCommentsEmployerController@viewCommnets')->name('viewCommentsEmployer');
    Route::get('findSkills','Backend\employer\FindSkillsController@buscador')->name('findSkills');
    Route::get('viewFindSkills','Backend\employer\FindSkillsController@view')->name('viewFindSkills');
    Route::get('detaillSkill','Backend\employer\FindSkillsController@detaill')->name('detaillSkill');
    Route::post('createMessage','Backend\employer\CreateMessageController@createMessage')->name('createMessage');
    Route::get('viewMessageEmployer','Backend\employer\CreateMessageController@viewMessage')->name('viewMessageEmployer');
});

