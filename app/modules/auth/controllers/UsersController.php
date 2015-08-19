<?php
/**
 * User: dirg
 * Date: 06/08/2015
 * Time: 16:28
 */

namespace App\Modules\Auth\Controllers;
use View, Input, Validator, Redirect, Session, Sentry;
use App\Modules\Auth\Services\UsersService as UsersService;

class UsersController extends \Controller{

    public function index()
    {
        $users = \UsersOrm::paginate(10);
        return View::make('auth::users.index', compact('users'));
    }

    public function createForm()
    {
        $this->beforeFilter('force.ssl');
        $group = \GroupsOrm::lists('name', 'id');
        $permission = \PermissionsOrm::lists('value','value');
        $decodegroup = array();
        $decodepermission = array();
        return View::make('auth::users.create',compact('group', 'decodegroup', 'decodepermission', 'permission'));
    }

    public function createData()
    {
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required',
            'last_name' => 'required',
            'first_name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        $service = new UsersService();
        if ($validator->fails()) {
            return Redirect::route('users-create-form')
                ->withErrors($validator)
                ->withInput();
        }else{
            if($service->createUser()){
                Session::flash('message', 'Successfully created User !');
                return Redirect::route('users-index');
            }
        }

    }

    public function editForm($id)
    {
        $users = \UsersOrm::find($id);
        $group = \GroupsOrm::lists('name', 'id');
        $permission = \PermissionsOrm::lists('value','value');
        $selected = json_decode($users->permissions, true);

        $decodepermission = array();
        if($selected != NULL){
            foreach($selected as $key => $value){
                array_push($decodepermission, $key);
            }
        }

        $decodegroup = array();
        $userGroups = \UserGroupsOrm::select('group_id')
            ->where('user_id', '=', $id)->get()->toArray();
        if($userGroups != NULL){
            foreach($userGroups as $groupid){
                array_push($decodegroup, strval($groupid['group_id']));
            }
        }
        return View::make('auth::users.edit',compact('group', 'decodegroup', 'decodepermission', 'permission', 'users'));

    }

    public function editData($id)
    {
        $rules = array(
            'email'    => 'required|email',
            'last_name' => 'required',
            'first_name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        $service = new UsersService();
        if ($validator->fails()) {
            return Redirect::route('users-edit-form', $id)
                ->withErrors($validator)
                ->withInput();
        }else{
            $service->editUser($id);
            Session::flash('message', 'Successfully update user !');
            return Redirect::route('users-index');
        }
    }

    public function delete($id)
    {
        $users = \UsersOrm::find($id);
        $users->delete($id);
    }
}