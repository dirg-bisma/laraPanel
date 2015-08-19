<?php
/**
 * User: dirg
 * Date: 07/08/2015
 * Time: 23:23
 */

namespace App\Modules\Auth\Services;

use Input;
use Sentry;

class UsersService {

    public function createUser()
    {
        try
        {
            // Create the user
            $permissions = array();
            $errors = $this->_validateGroup(Input::get('permission'), $permissions);
            $user = Sentry::createUser(array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password'),
                'first_name' => Input::get('first_name'),
                'last_name' => Input::get('last_name'),
                'permissions' => $permissions,
                'activated' => true,
            ));


            $groups = Input::get('group');
            if(isset($groups) && is_array($groups)) {
                foreach($groups as $groupId) {
                    $group = Sentry::getGroupProvider()->findById($groupId);
                    $user->addGroup($group);
                }
            }

            return true;
        }
        catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Login field is required.';
        }
        catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
        }
        catch (\Cartalyst\Sentry\Users\UserExistsException $e)
        {
            echo 'User with this login already exists.';
        }
        catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            echo 'Group was not found.';
        }
    }

    public function editUser($id)
    {
        try
        {
            // Create the user
            $permissions = array();
            $errors = $this->_validateGroup(Input::get('permission'), $permissions);
            $user = Sentry::findUserById($id);
            $user->email     = Input::get('email');
            $pass = Input::get('password');
            if(!empty($pass)) {
                $user->password = $pass;
            }
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->permissions = $permissions;

            if ($user->save()){
                // User information was updated
                $groups = (Input::get('group') === null) ? array() : Input::get('group');
                $userGroups = $user->getGroups()->toArray();

                foreach($userGroups as $group) {
                    if(!in_array($group['id'], $groups)) {
                        $group = Sentry::getGroupProvider()->findById($group['id']);
                        $user->removeGroup($group);
                    }
                }

                if(isset($groups) && is_array($groups)) {
                    foreach($groups as $groupId) {
                        $group = Sentry::getGroupProvider()->findById($groupId);
                        $user->addGroup($group);
                    }
                }
                return true;
            }else{
                return false;
            }


        }
        catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Login field is required.';
        }
        catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
        }
        catch (\Cartalyst\Sentry\Users\UserExistsException $e)
        {
            echo 'User with this login already exists.';
        }
        catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            echo 'Group was not found.';
        }
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