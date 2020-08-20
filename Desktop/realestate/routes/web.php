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

Route::get('/', 'HomeController@index');
Route::get('/pagecontent', 'HomeController@pagecontent');
Route::get('/alldata', 'HomeController@alldata');//all sub data
Route::post('/propertycategories', 'HomeController@propertycategories');//cats in a prop
Route::post('/categoryproperties', 'HomeController@categoryproperties');//props in a cat
Route::get('/getcounts', 'HomeController@getcounts');//props in a cat

// for the blog
Route::get('/blog', 'PostController@index');

// PROPERTY PAGE
Route::get('/property/{url_string}','PropertyController@index');

// Search PAGE
Route::get('/search/properties/{price?}','SearchController@index');
Route::get('/search/?','PropertyController@index');

//CATEGORY SETTINGS
Route::get('/categories','CategoryController@index');
Route::get('/categories/{categoryname}/{id}/{order?}','CategoryController@category');

//LEASES SETTINGS
Route::get('/leases','LeaseController@index');
Route::get('/leases/{leasename}/{order?}','LeaseController@lease');

//Type SETTINGS
Route::get('/types','TypeController@index');
Route::get('/types/{typename}/{order?}','TypeController@type');

Auth::routes(['register'=>false]);

//ABOUT
Route::get('/about', 'AboutController@index');

Route::get('/home/{var}', 'HomeController@index')->name('home.show');
