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

Route::get('/', [
    'uses' => 'Site\SiteController@SiteIndex',
    'as' => 'site.index'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function() {

    /** ***************  Dashboard  ***************** **/

    Route::get('/dashboard', [
        'uses' => 'Admin\DashboardController@DashboardIndex',
        'as' => 'admin.dashboard'
    ]);

    /** ***************  Users  ***************** **/

    Route::get('/user-register', [
        'uses' => 'Admin\UserRegisterController@ShowRegisterForm',
        'as' => 'auth.user-register'
    ]);

    Route::post('/user-register', [
        'uses' => 'Admin\UserRegisterController@Register',
        'as' => 'auth.user-register'
    ]);

    Route::get('/user', [
        'uses' => 'Admin\UserController@UsersIndex',
        'as' => 'admin.user'
    ]);

    Route::get('/user-edit/{id}', [
        'uses' => 'Admin\UserController@UserEdit',
        'as' => 'admin.user-edit'
    ]);

    Route::put('/user-update/{id}', [
        'uses' => 'Admin\UserController@UserUpdate',
        'as' => 'admin.user-update'
    ]);

    Route::get('/user-delete/{id}', [
        'uses' => 'Admin\UserController@UserDelete',
        'as' => 'admin.user-delete'
    ]);

    /** ***************  Category  ***************** **/

    Route::get('/category', [
        'uses' => 'Admin\CategoryController@Index',
        'as' => 'categories'
    ]);

    Route::post('/category', [
        'uses' => 'Admin\CategoryController@Create',
        'as' => 'create_category'
    ]);

    Route::get('/subcategory', [
        'uses' => 'Admin\SubCategoryController@SubCategorysIndex',
        'as' => 'subcategories'
    ]);

    /** ***************  Media Files  ***************** **/

    Route::get('/file', [
        'uses' => 'Admin\FileController@index',
        'as' => 'viewfile'
    ]);

    Route::get('/file/edit-file/{id}', [
        'uses' => 'Admin\FileController@Edit',
        'as' => 'editfile'
    ]);

    Route::post('/file/update-file-info/{id}', [
        'uses' => 'Admin\FileController@UpdateInfo',
        'as' => 'updatefileinfo'
    ]);

    Route::post('/file/update-file/{id}', [
        'uses' => 'Admin\FileController@UpdateFile',
        'as' => 'updatefile'
    ]);

    Route::post('/file/upload', [
        'uses' => 'Admin\FileController@store',
        'as' => 'uploadfile'
    ]);

    Route::delete('/file/{id}', [
        'uses' => 'Admin\FileController@Distroy',
        'as' => 'deletefile'
    ]);

    Route::get('/file/download/{id}', [
        'uses' => 'Admin\FileController@Show',
        'as' => 'downloadfile'
    ]);

    Route::post('/file/dropzone', [
        'uses' => 'Admin\FileController@Dropzone',
        'as' => 'dropzone'
    ]);

    Route::get('/send/email', [
        'uses' => 'Admin\DashboardController@mail',
        'as' => 'email'
    ]);







    // Route::get('/role-register', [
    //     'uses' => 'Admin\DashboardController@registered',
    //     'as' => 'admin.register'
    // ]);

    // Route::get('/role-edit/{id}', [
    //     'uses' => 'Admin\DashboardController@registeredit',
    //     'as' => 'admin.register-edit'
    // ]);

    // Route::put('/role-update/{id}', [
    //     'uses' => 'Admin\DashboardController@registerupdate',
    //     'as' => 'admin.register-update'
    // ]);

    // Route::get('/role-delete/{id}', [
    //     'uses' => 'Admin\DashboardController@registerdelete',
    //     'as' => 'admin.register-delete'
    // ]);

    // Route::get('/aboutus', [
    //     'uses' => 'Admin\AboutsController@index',
    //     'as' => 'admin.aboutus'
    // ]);

    // Route::post('/save-aboutus', [
    //     'uses' => 'Admin\AboutsController@store',
    //     'as' => 'admin.save-aboutus'
    // ]);

    // Route::get('/edit-aboutus/{id}', [
    //     'uses' => 'Admin\AboutsController@edit',
    //     'as' => 'admin.about.edit'
    // ]);

    // Route::put('/update-aboutus/{id}', [
    //     'uses' => 'Admin\AboutsController@update',
    //     'as' => 'admin.update-aboutus'
    // ]);

    // Route::get('/delete-aboutus/{id}', [
    //     'uses' => 'Admin\AboutsController@delete',
    //     'as' => 'admin.delete-aboutus'
    // ]);

});
