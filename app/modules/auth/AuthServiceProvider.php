<?php
/**
 * Created by Nuswantara Solusindo.
 * User: dirg
 * Date: 06/06/2015
 * Time: 23:27
 */

namespace App\Modules\Auth;

use App\Modules\ModuleProvider;

class AuthServiceProvider extends ModuleProvider{

    public function register()
    {
        parent::register('auth');
    }

    public function boot()
    {
        parent::boot('auth');
    }
}