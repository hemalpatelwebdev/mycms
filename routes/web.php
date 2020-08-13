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

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', ['as' => 'home.post' ,'uses'=>'AdminPostsController@post']);

Route::group(['middleware'=>'admin'], function(){
    
    Route::get('/admin', 'AdminController@index')->name('admin.index');

    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/medias', 'AdminMediasController');

    Route::resource('admin/comments','PostCommentsController');
    Route::resource('admin/comment/replies','CommentsRepliesController');
    Route::delete('delete/bulkmedia', 'AdminMediasController@bulkDelete')->name('bulkdelete');
});

Route::group(['middleware'=>'auth'], function(){

    Route::post('comment/reply','CommentsRepliesController@createReply');

});