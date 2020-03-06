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
        Route::get('privacypolicy', 'HomeController@policy')->name('policy');
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
        Route::post('/schedule/edit/part/{id}', 'ScheduleController@editparted')->name('schedule.edit.part');
        Route::resource('schedule',
            'ScheduleController',
            [
                'names' => [
                    'index' => 'schedule.index',
                    'create' => 'schedule.create',
                    'store' => 'schedule.store',
                    'update' => 'schedule.update',
                    'show' => 'schedule.show',
                    'edit' => 'schedule.edit',
                    'destroy' => 'schedule.destroy'
                ],
            ]
        );
        Route::get('/ads/new', 'AdvertisementController@New')->name('ads.new');
        Route::post('/ads/submit', 'AdvertisementController@Submit')->name('ads.submit');
        Route::get('/pay/error', 'OrderController@payError')->name('error_pay');
        Route::get('/pay/cancel', 'OrderController@payCancel')->name('cancel_pay');
        Route::get('/pay/accept', 'OrderController@payAccept')->name('accept_pay');
        Route::get('/pay/callback', 'OrderController@payCallback')->name('callback_pay');
        Route::get('/pay/{type}/{id}', 'OrderController@pay')->name('orders.pay');
        Route::resource('orders',
            'OrderController',
            [
                'names' => [
                    'index' => 'orders.index',
                    'create' => 'orders.create',
                    'store' => 'orders.store',
                    'update' => 'orders.update',
                    'show' => 'orders.show',
                    'edit' => 'orders.edit',
                    'destroy' => 'orders.destroy'
                ],
            ]
        );
    });
Route::get('/', function () {
    return redirect()->route('index', app()->getLocale());
});
//Administravimas
Route::get('/admin', 'AdminController@index');
//Naujienos
Route::get('/admin/news', 'NewsController@index')->name('admin.news');
Route::get('/admin/news/submit/{id}', 'NewsController@submit');
Route::get('/admin/news/remove/{id}', 'NewsController@destroy');
Route::post('/admin/news/submit', 'NewsController@write')->name('admin.news.submit');
Route::get('/admin/news/edit/{id}', 'NewsController@edit');
Route::post('/admin/news/edit/{id}', 'NewsController@update')->name('admin.news.edit');
//Kategorijos
Route::post('/admin/categories/add', 'CategoriesController@store')->name('admin.categories.add');
Route::get('/admin/categories/remove/{id}', 'CategoriesController@destroy')->name('admin.categories.remove');
Route::get('admin/categories/edit/{id}', 'CategoriesController@edit')->name('admin.categories.edit');
Route::post('/admin/categories/edit/{id}', 'CategoriesController@update')->name('admin.categories.update');
//Vartotojai
Route::get('/admin/users', 'AdminController@users')->name('admin.users');
Route::post('/admin/user/add', 'AdminController@storeUser')->name('admin.users.add');
Route::get('/admin/user/edit/{id}', 'AdminController@editUser')->name('admin.user.edit');
Route::post('/admin/user/edit/{id}', 'AdminController@updateUser')->name('admin.user.update');
Route::get('/admin/user/remove/{id}', 'AdminController@removeUser')->name('admin.user.remove');
//Sistema
Route::get('/admin/system', 'SystemController@index')->name('admin.system');
Route::post('/admin/system/update', 'SystemController@update')->name('admin.system.update');
