<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/articles/add',function (){
    return view('articles.add');
});
Route::post('/articles/add','ArticleController@addArticle');
Route::get('/articles','ArticleController@show');
Route::get('article/{id}','ArticleController@readArticle');
Route::post('article/addComment/{id}','ArticleController@addComment');
Route::get('article/addComment/{id}','ArticleController@addComment');
Route::get('articles/edit/{id}','ArticleController@editArticle');
Route::post('articles/edit','ArticleController@editArticle');
