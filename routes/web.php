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

Route::get('/','pages@index');

Route::get('/about','pages@about');
Route::get('/contact','pages@contact');
Route::get('/addcatagorie','pages@addcatagorie');
Route::post('/store','pages@storeCatagorie')->name('store.catagorie');
Route::get('/allcatagorie','pages@allcatagorie')->name('allcatagorie');
Route::get('/viewcatagorie/{id}','pages@viewcatagorie');
Route::get('/deletecatagorie/{id}','pages@deletecatagorie');
Route::get('/editecatagorie/{id}','pages@editecatagorie');
Route::post('/updatecatagorie/{id}','pages@updatecatagorie');

//post section
Route::get('/writepost','pages@writepost');
Route::post('/store/post','postcontroller@storePost')->name('store.post');
Route::get('/allpost','postcontroller@allPost')->name('allpost');
Route::get('/viewpost/{id}','postcontroller@viewPost');
Route::get('/editepost/{id}','postcontroller@editePost');
Route::post('/updatepost/{id}','postcontroller@updatepost');
Route::get('/deletepost/{id}','postcontroller@deletepost');

//Students----

Route::get('/student','StudentController@student')->name('student');
Route::post('/store/student','StudentController@storestudent')->name('store.student');
Route::get('/allstudent','StudentController@allstudent')->name('all.student');
Route::get('/viewstudent/{id}','StudentController@show');
Route::get('/deletestudent/{id}','StudentController@destroy');
Route::get('/editstudent/{id}','StudentController@edit');
Route::post('/updatestudent/{id}','StudentController@updatestudent');