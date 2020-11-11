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
Route::view('/terminos', 'terminos');

Auth::routes();

//ruta perfil
Route::resource('profile','ProfileController')->middleware('auth');
Route::post('userUpdate','ProfileUpdateController@userUpdate')->name('userUpdate')->middleware('auth');

Route::post('contact','ContactController@store')->name('contact');

//AIzaSyDPk_OYKeT5aN1cuglTcy3B1bdywKfe8JA
//publicar servicios

Route::group(['middleware' => 'admin'], function () {
    Route::get('/adminHome', function (){
        return view('admin.adminHome');
    })->name('adminHome');
    Route::resource('users','Backend\Admin\UserController');
    Route::resource('roles','Backend\Admin\AdminRolesController');
    //ruta services
    Route::resource('posts', 'Backend\Admin\PostController');
    Route::resource('adminService', 'Backend\Admin\AdminServiceController');
    Route::get('detaillService','Backend\Admin\DetaillServiceController@detaillService')->name('detaillService');
    Route::get('detailEmployer','Backend\Admin\DetailEmployerController@index')->name('detailEmployer');
    Route::get('ticket','Backend\Admin\ticketController@index')->name('ticket');

    
});
Route::group(['middleware' => 'student'], function () {
    Route::resource('services', 'Backend\Student\ServiceController'); 
    //historial 
    Route::get('/historyStudent','Backend\Student\HistoryStudentController@history')->name('historyStudent');
    Route::get('/historyDetaill','Backend\Student\HistoryStudentController@historyDetaill')->name('historyDetaill'); 
    //servicios en ejecucion estudiante
    Route::get('runningServicesStudent','Backend\Student\RunningServicesStudentController@runningServices')->name('runningServicesStudent');
    Route::post('runningDetaill','Backend\Student\RunningServicesStudentController@runningDetaill')->name('runningDetaill');
    
    Route::get('completeStudent','Backend\Student\CompleteStudentController@complete')->name('completeStudent');
    Route::post('completeDetaill','Backend\Student\CompleteStudentController@completeDetaill')->name('completeDetaill');

    //cancelar estudiantes
    Route::post('cancelServiceStudent','Backend\Student\CancelServicesStudentController@cancelServiceStudent')->name('cancelServiceStudent');
    //vistas comentarios y valoracion 
    Route::get('viewCommentsStudent','Backend\Student\ViewCommentsStudentController@viewCommnets')->name('viewCommentsStudent');
    //valoracion usuario
    Route::resource('userValoration','Backend\Student\UserValorationController');
    //finish
    Route::post('finish','Backend\Student\FinishServicesController@finish')->name('finish');     
    Route::resource('skills','Backend\Student\SkillsController');
    Route::get('viewMessage','Backend\Student\MessageController@viewMessage')->name('viewMessage');
    Route::resource('supportStudent','Backend\Student\SupportController');
    Route::get('offerStudent','Backend\Student\OfferController@index')->name('offerStudent');
    Route::post('applyOffer','Backend\Student\OfferController@apply')->name('applyOffer');
    Route::get('myAply','Backend\Student\OfferController@myAply')->name('myAply');
    Route::post('destroyApply','Backend\Student\OfferController@destroyApply')->name('destroyApply');
});

Route::group(['middleware' => 'employer'], function () {
    Route::get('/employerHome', function (){
        return view('employer.employerHome');
    })->name('employerHome');

    Route::get('/historyEmployer','Backend\employer\HistoryEmployerController@history')->name('historyEmployer');    //servicios employer
    Route::get('/historyEmployerDetaill','Backend\employer\HistoryEmployerController@historyDetaill')->name('historyEmployerDetaill');    //servicios employer
    Route::post('/findServices', 'Backend\employer\ServiceController@findServices');
    
    Route::resource('employer','Backend\employer\EmployerServiceController');    //ruta para seleccionar servicio
    Route::post('selectService','Backend\employer\SelectServiceController@selectService')->name('selectService');    //adquirir servicio
    Route::post('buyService','Backend\employer\buyServiceController@buyService')->name('buyService');    //mostrar adquirido
    Route::get('acquired','Backend\employer\acquiredServiceController@acquired')->name('acquired');    
    Route::post('acquiredDetaill','Backend\employer\acquiredServiceController@acquiredDetaill')->name('acquiredDetaill');    
    Route::post('cancelServiceEmployer','Backend\employer\CancelServiceEmployerController@cancelServiceEmployer')->name('cancelServiceEmployer');    //valorar servicios
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
    Route::resource('supportEmployer','Backend\employer\SupportController');
    Route::get('offer','Backend\employer\OfferController@index')->name('offer');
    Route::get('offerView','Backend\employer\OfferController@create')->name('offerView');
    Route::post('createOffer','Backend\employer\OfferController@store')->name('createOffer');
    Route::post('editOffer','Backend\employer\OfferController@edit')->name('editOffer');
    Route::post('updateOffer','Backend\employer\OfferController@update')->name('updateOffer');
    Route::post('destroyOffer','Backend\employer\OfferController@destroy')->name('destroyOffer');
    Route::post('showApply','Backend\employer\OfferController@showApply')->name('showApply');
    Route::post('finishOffer','Backend\employer\OfferController@finishOffer')->name('finishOffer');
    Route::get('offerHistory','Backend\employer\OfferController@offerHistory')->name('offerHistory');

});

//Tu contraseña de aplicación para el dispositivo
//rtgpapqforfbrrog
/* 
Cómo utilizarla
Accede a la sección de configuración de tu cuenta de Google
en la aplicación o el dispositivo que estés intentando configurar. 
Sustituye tu contraseña por la contraseña de 16 caracteres
 que se muestra arriba.

Al igual que la contraseña normal, 
esta contraseña de aplicación ofrece acceso completo a tu c
uenta de Google. No tendrás que recordarla, 
así que no la escribas ni la compartas con nadie.
 */
/* 
env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=5b3b70680fae3c
MAIL_PASSWORD=ff45bb70d08e14
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=sipuedeshazloya@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

721fd0de-af36-4b91-a271-f6a806e84468.clouding.host
 */

/*
ssh root@185.254.204.43
mNiuix4NFyAooNAb 
mNiuix4NFyAooNAb
 */