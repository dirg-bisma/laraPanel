<?php
/**
 * User: dirg
 * Date: 12/08/2015
 * Time: 15:12
 */
Route::get('/', array(
    'as' => 'authController_login',
    'uses' => 'App\Modules\Auth\Controllers\AuthController@login'
));

Route::post('/dologin', array(
    'before' => 'csrf',
    function(){
        Session::flash('message', 'Token tidak ada');
        Redirect::route('authController_login');
    },
    'as' => 'authController_doLogin',
    'uses' => 'App\Modules\Auth\Controllers\AuthController@dologin'
));

Route::get('/logout', array(
    'as' => 'authController_logout',
    'uses' => 'App\Modules\Auth\Controllers\AuthController@logout'
));