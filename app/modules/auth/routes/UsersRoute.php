<?php
/**
 * User: dirg
 * Date: 07/08/2015
 * Time: 20:58
 */

$UsersController = 'App\Modules\Auth\Controllers\UsersController';


Route::get('manage/users', array(
    'before' => 'hasAuth:users-index',
    'uses' => $UsersController . '@index',
    'as' => 'users-index'
));

Route::get('manage/users/create', array(
    'before' => 'hasAuth:users-create-form',
    'uses' => $UsersController . '@createForm',
    'as' => 'users-create-form',
    'https' => true,
    array('before' => 'force.ssl', function(){
        return 'url is http need https';
    })
));

Route::put('manage/users/create', array(
    'before' => 'hasAuth:users-create-data',
    'uses' => $UsersController . '@createData',
    'as' => 'users-create-data'
));

Route::get('manage/users/edit/{id}', array(
    'before' => 'hasAuth:users-edit-form',
    'uses' => $UsersController . '@editForm',
    'as' => 'users-edit-form'
))->where('id', '^[0-9]*$');

Route::put('manage/users/edit/{id}', array(
    'before' => 'hasAuth:users-edit-data',
    'uses' => $UsersController . '@editData',
    'as' => 'users-edit-data'
))->where('id', '^[0-9]*$');

Route::delete('manage/users/delete/{id}', array(
    'before' => 'hasAuth:users-delete',
    'uses' => $UsersController . '@delete',
    'as' => 'users-delete'
))->where('id', '^[0-9]*$');