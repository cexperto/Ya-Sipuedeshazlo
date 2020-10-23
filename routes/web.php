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
//Route::view('/adminHome', 'adminHome');
//Route::view('/studentCreate', 'student/adminHome');
Route::view('/succes', 'succes');
//Route::view('/mis', 'mis');
//Route::view('/columnas', 'student/bootstrap');
//Route::view('/profile', 'profile/profile');

Auth::routes();

//rupa perfil
Route::resource('profile','ProfileController');
Route::post('/userUpdate','ProfileController@userUpdate');
//Route::put('profile','ProfileController@update')->name('update');
/* Route::get('/profile', function (){
    return view('profile.profile');
})->name('profile'); */

Route::get('/employerHome', function (){
    return view('employer.employerHome');
})->name('employerHome');
//https://laraveldaily.com/laravel-find-addresses-with-coordinates-via-google-maps-api/

//AIzaSyDPk_OYKeT5aN1cuglTcy3B1bdywKfe8JA
//publicar servicios

Route::resource('services', 'Backend\student\ServiceController');
//historial 
Route::get('/historyStudent','Backend\HistoryStudentController@history')->name('historyStudent');
Route::get('/historyEmployer','Backend\HistoryEmployerController@history')->name('historyEmployer');

//servicios employer
Route::post('/findServices', 'Backend\employer\ServiceController@findServices');
// Route::get('/servicesEmployer', 'Backend\employer\ServiceController@create')->name('servicesEmployer');
// Route::get('/editServicesEmployer', 'Backend\employer\ServiceController@edit')->name('editServicesEmployer');

//Route::get('employerServices/{service:slug}', 'Backend\employer\ServiceController@service')->name('service');
Route::resource('employer','Backend\employer\EmployerServiceController');
//ruta para seleccionar servicio
Route::post('selectService','Backend\SelectServiceController@selectService')->name('selectService');
//adquirir servicio
Route::post('buyService','Backend\buyServiceController@buyService')->name('buyService');
//mostrar adquirido
Route::get('acquired','Backend\acquiredServiceController@acquired')->name('acquired');
//finish
Route::post('finish','Backend\FinishServicesController@finish')->name('finish');

//Route::post('ServiceIndex','Backend\BuyServiceController@index')->name('ServiceIndex');
//Route::post('/selectService','Backend\employer\updateService@selectService');
/* Route::resource('Eservices', 'Backend\ServiceController')
->middleware('auth'); */

//rutas admin
Route::get('/adminHome', function (){
    return view('admin.adminHome');
})->name('adminHome')->middleware('auth');
//ruta usuarios
Route::resource('users','Backend\Admin\UserController')->middleware('auth');
//servicios en ejecucion estudiante
Route::get('runningServicesStudent','Backend\RunningServicesStudentController@runningServices')->name('runningServicesStudent')->middleware('auth');
//servicios en ejecucion empleador
//Route::get('runningServicesEmployer','Backend\RunningServicesEmployerController@runningServices')->name('runningServicesEmployer');

//ruta services
Route::resource('posts', 'Backend\PostController')->middleware('auth');
Route::get('detailService','Backend\DetailServiceController@detailService')->name('detailService')->middleware('auth');
Route::get('detailEmployer','Backend\DetailEmployerController@index')->name('detailEmployer')->middleware('auth');
//rutas roles
Route::resource('roles','Backend\AdminRolesController')->middleware('auth');

//cancelar servicios
Route::post('cancelService','Backend\CancelServiceController@cancelService')->name('cancelService')->middleware('auth');
//cancelar estudiantes
Route::post('cancelServiceStudent','Backend\CancelServiceStudentController@cancelServiceStudent')->name('cancelServiceStudent')->middleware('auth');

//cancelar empleador
Route::post('cancelServiceEmployer','Backend\CancelServiceEmployerController@cancelServiceEmployer')->name('cancelServiceEmployer')->middleware('auth');

//valorar servicios
Route::resource('serviceRating','Backend\ServiceRatingController')->middleware('auth');
//servicios terminados
Route::get('complete','Backend\CompleteServicesController@complete')->name('complete')->middleware('auth');
Route::get('completeStudent','Backend\completeStudentController@complete')->name('completeStudent')->middleware('auth');
//valoracion
Route::resource('valoration','Backend\ValorationServiceController')->middleware('auth');
//valoracion usuario
Route::resource('userValoration','Backend\UserValorationController')->middleware('auth');
//vistas comentarios y valoracion 
Route::get('viewCommentsStudent','Backend\ViewCommentsStudentController@viewCommnets')->name('viewCommentsStudent')->middleware('auth');
Route::get('viewCommentsEmployer','Backend\ViewCommentsEmployerController@viewCommnets')->name('viewCommentsEmployer')->middleware('auth');
