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

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'],
    function () {
        Route::pattern('id', '[0-9]+'); // Reikalaujam kad visi id butu tik numeriai
        //Basic
        Route::get('/', function () {
            return redirect()->route('index', app()->getLocale());
        });

        Auth::routes();

        Route::get('/index', 'HomeController@index')->name('index');

        //Trainers
        Route::get('/trainers', 'TrainersController@index')->name('trainers');
        Route::post('/trainers/search', 'TrainersController@search')->name('trainers.search');
        Route::get('/trainers/search', function () {
            return redirect(route('trainers', app()->getLocale()));
        });
        Route::get('/trainers/select', function () {
            return redirect(route('trainers', app()->getLocale()));
        });
        Route::get('/trainers/select/{id}', 'TrainersController@select')->name('trainers.select');
        //Users
        Route::get('/user/edit', 'UserController@edit')->name('user.edit');
        Route::post('/user/edit', 'UserController@submit')->name('user.submit');
        Route::get('/user/tsearch', 'UserController@trainersSearch')->name('user.tsearch');
        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/user/{id}', 'UserController@profile')->name('user.profile');
        Route::get('/user/write', 'UserController@write')->name('user.write');
        Route::get('/news/submit', 'NewsController@store')->name('news.submit');
        //Chats
        Route::resource('chats', 'ChatHeadController');
        Route::resource('chat',
            'ChatController',
            [
                'names' => [
                    'index' => 'chat.index',
                    'create' => 'chat.create',
                    'store' => 'chat.store',
                    'update' => 'chat.update',
                    'show' => 'chat.show',
                    'edit' => 'chat.edit',
                    'destroy' => 'chat.destroy',
                ],
            ]
        );
    });
Route::get('/', function () {
    return redirect()->route('index', app()->getLocale());
});
