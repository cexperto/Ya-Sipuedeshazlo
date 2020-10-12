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
Route::view('/adminHome', 'adminHome');
Route::view('/studentCreate', 'student/adminHome');
Route::view('/succes', 'succes');
Route::view('/test', 'geo');
Route::view('/columnas', 'bootstrap');
//Route::view('/profile', 'profile/profile');

Auth::routes();
Route::get('/adminHome', function (){
    return view('admin.adminHome');
})->name('adminHome');

//ruta para crear servicios
Route::get('/studentHome', function (){
    return view('Student.create');
            })->name('studentCreate');
Route::resource('services', 'Backend\student\ServiceController');


//rupa perfil
Route::resource('profile','ProfileController');
Route::get('/profile', function (){
    return view('profile.profile');
})->name('profile');

Route::get('/employerHome', function (){
    return view('employer.employerHome');
})->name('employerHome');
//https://laraveldaily.com/laravel-find-addresses-with-coordinates-via-google-maps-api/

//AIzaSyDPk_OYKeT5aN1cuglTcy3B1bdywKfe8JA
//publicar servicios
Route::post('publicServices','Backend/ServiceController@store')
            ->name('service.store');
Route::get('readServices','Backend/ServiceControler@index');