<?php
/**
 * User: dirg
 * Date: 03/08/2015
 * Time: 21:13
 */

$PermissionsController = 'App\Modules\Auth\Controllers\PermissionController';

Route::get('manage/permission', array(
    'before' => 'hasAuth:permission-index',
    'uses' => $PermissionsController . '@index',
    'as' => 'permission-index'
));

Route::get('manage/permission/create', array(
    'before' => 'hasAuth:permission-create-form',
    'uses' => $PermissionsController . '@createForm',
    'as' => 'permission-create-form'
));

Route::put('manage/permission/create', array(
    'before' => 'hasAuth:permission-create-data',
    'uses' => $PermissionsController . '@createData',
    'as' => 'permission-create-data'
));

Route::get('manage/permission/edit/{id}', array(
    'before' => 'hasAuth:permission-edit-form',
    'uses' => $PermissionsController . '@editForm',
    'as' => 'permission-edit-form'
))->where('id', '^[0-9]*$');

Route::put('manage/permission/edit/{id}', array(
    'before' => 'hasAuth:permission-edit-data',
    'uses' => $PermissionsController . '@editData',
    'as' => 'permission-edit-data'
))->where('id', '^[0-9]*$');

Route::delete('manage/permission/delete/{id}', array(
    'before' => 'hasAuth:permission-delete',
    'uses' => $PermissionsController . '@delete',
    'as' => 'permission-delete'
))->where('id', '^[0-9]*$');