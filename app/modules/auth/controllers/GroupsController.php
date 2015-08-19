<?php
/**
 * User: dirg
 * Date: 14/07/2015
 * Time: 11:59
 */

namespace App\Modules\Auth\Controllers;
 use View, Input, Validator, Redirect, Session;
 use App\Modules\Auth\Models\GroupsModel as GroupsModel;

class GroupsController extends \Controller{

    public function index()
    {
        $groups = \GroupsOrm::paginate(10);
        return View::make('auth::groups.index', compact('groups'));
    }

    public function createForm()
    {
        $permission = \PermissionsOrm::lists('value','value');
        $decode = array();
        return View::make('auth::groups.create', compact('permission', 'decode'));
    }

    public function createData()
    {

        $rules = array(
            'name'    => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process input
        if ($validator->fails()) {
            return Redirect::route('groups-create-form')
                ->withErrors($validator)
                ->withInput();
        } else {
            // redirect
            $permissions = array();
            $errors = $this->_validateGroup(Input::get('permission'), $permissions);
            $data = array(
                'name' => Input::get('name'),
                'permissions' => json_encode($permissions)
            );
            GroupsModel::create($data);
            Session::flash('message', 'Successfully created permission !');
            return Redirect::route('groups-index');
        }
    }

    public function editForm($id)
    {
        $groups = \GroupsOrm::find($id);
        $permission = \PermissionsOrm::lists('value','value');
        $selected = json_decode($groups->permissions, true);
        $decode = array();
        if($selected != NULL){
            foreach($selected as $key => $value){
                array_push($decode, $key);
            }
        }
       return View::make('auth::groups.edit', compact('permission', 'groups', 'decode'));
    }

    public function editData($id)
    {
        $rules = array(
            'name'    => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process input
        if ($validator->fails()) {
            return Redirect::route('groups-create-form', $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // redirect
            $permissions = array();
            $errors = $this->_validateGroup(Input::get('permission'), $permissions);
            $data = array(
                'name' => Input::get('name'),
                'permissions' => json_encode($permissions)
            );
            GroupsModel::update($id, $data);
            Session::flash('message', 'Successfully created Group !');
            return Redirect::route('groups-index');
        }
    }

    public function delete($id)
    {
        $groups = \GroupsOrm::find($id);
        $groups->delete($id);
    }

    protected function _validateGroup($permissionsValues, &$permissions)
    {
        $errors = array();
        // validate permissions
        if(!empty($permissionsValues)) {
            foreach($permissionsValues as $key => $permission) {
                $permissions[$permission] = 1;
            }
        }

        $gnErrors = array();
        return $gnErrors;
    }


}