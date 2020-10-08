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
Route::view('/studentHome', 'student/adminHome');
Route::view('/succes', 'succes');

Auth::routes();
Route::get('/adminHome', function (){
    return view('admin.adminHome');
})->name('adminHome');

Route::get('/studentHome', function (){
    return view('Student.studentHome');
})->name('studentHome');

Route::get('/employerHome', function (){
    return view('employer.employerHome');
})->name('employerHome');