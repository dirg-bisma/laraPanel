<?php
/**
 * User: dirg
 * Date: 14/07/2015
 * Time: 12:00
 */
$GroupsController = 'App\Modules\Auth\Controllers\GroupsController';

Route::get('manage/groups', array(
    'before' => 'hasAuth:groups-index',
    'uses' => $GroupsController . '@index',
    'as' => 'groups-index'
));

Route::get('manage/groups/create', array(
    'before' => 'hasAuth:groups-create-form',
    'uses' => $GroupsController . '@createForm',
    'as' => 'groups-create-form'
));

Route::put('manage/groups/create', array(
    'before' => 'hasAuth:groups-create-data',
    'uses' => $GroupsController . '@createData',
    'as' => 'groups-create-data'
));

Route::get('manage/groups/edit/{id}', array(
    'before' => 'hasAuth:groups-edit-form',
    'uses' => $GroupsController . '@editForm',
    'as' => 'groups-edit-form'
))->where('id', '^[0-9]*$');

Route::put('manage/groups/edit/{id}', array(
    'before' => 'hasAuth:groups-edit-data',
    'uses' => $GroupsController . '@editData',
    'as' => 'groups-edit-data'
))->where('id', '^[0-9]*$');

Route::delete('manage/groups/delete/{id}', array(
    'before' => 'hasAuth:groups-delete',
    'uses' => $GroupsController . '@delete',
    'as' => 'groups-delete'
))->where('id', '^[0-9]*$');