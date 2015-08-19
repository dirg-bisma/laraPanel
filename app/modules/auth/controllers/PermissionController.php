<?php
/**
 * User: dirg
 * Date: 03/08/2015
 * Time: 21:12
 */

namespace App\Modules\Auth\Controllers;

use View, Session, Redirect, Validator, Input;

use App\Modules\Auth\Services\PermisionService as PermisionService,
    App\Modules\Auth\Models\PermissionsModel as PermissionsModel;

class PermissionController extends \Controller{

    public function index()
    {
        $permission = \PermissionsOrm::paginate(10);
        return View::make('auth::permissions.index', compact('permission'));
    }

    public function createForm()
    {
        return View::make('auth::permissions.create');
    }

    public function createData()
    {
        $rules = array(
            'value'    => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process input
        if ($validator->fails()) {
            return Redirect::route('permission-create-form')
                ->withErrors($validator)
                ->withInput();
        } else {
            // redirect
            PermissionsModel::create(PermisionService::colectData());
            Session::flash('message', 'Successfully created permission !');
            return Redirect::route('permission-index');
        }
    }

    public function editForm($id)
    {
        $permission = \PermissionsOrm::find($id);
        return View::make('auth::permissions.edit', compact('permission'));
    }

    public function editData($id)
    {
        $rules = array(
            'value'    => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process input
        if ($validator->fails()) {
            return Redirect::route('permission-create-form')
                ->withErrors($validator)
                ->withInput();
        } else {
            // redirect
            PermissionsModel::update($id,PermisionService::colectData());
            Session::flash('message', 'Successfully edit permission !');
            return Redirect::route('permission-index');
        }
    }

    public function delete($id)
    {
        $permission = \PermissionsOrm::find($id);
        $permission->delete($id);

    }
}