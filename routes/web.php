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

Auth::routes();

Route::get('comments/showlink/{comment}','deepCOntroller@show');
Route::get('comments/hidelink/{comment}','deepCOntroller@hide');
Route::get('comments/deletelink/{comment}','deepCOntroller@delete');

Route::get('replies/showlink/{reply}','deepCOntroller2@show');
Route::get('replies/hidelink/{reply}','deepCOntroller2@hide');
Route::get('replies/deletelink/{reply}','deepCOntroller2@delete');


Route::get('comments','CommentController@index');
Route::post('posts/all/preview','PostController@all');
Route::get('posts/edit/{post}','PostController@edit');
Route::resource('posts','PostController');
Route::post('drafts/{draft}/all','DraftController@all');
Route::resource('drafts','DraftController');
Route::get('editor','EditorController@show');
Route::get('/','HomeController@index');
Route::get('search','SearchController@search');
Route::get('{category}','CategoryController@show');
Route::get('{category}/{post}','PostController@showExtra');





