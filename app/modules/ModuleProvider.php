<?php
/**
 * User: dirg
 * Date: 02/06/2015
 * Time: 18:40
 */

namespace App\Modules;

use Illuminate\Support\ServiceProvider;
use View;

abstract class ModuleProvider extends ServiceProvider
{
    private $module_path;

    public function boot()
    {
        if ($module = $this->getModule(func_get_args())) {
            $this->module_path = app_path() . '/modules/' . $module;
            $this->package('app/' . $module, $module, $this->module_path);
        }
    }

    public function register()
    {
        if ($module = $this->getModule(func_get_args())) {
            $this->app['config']->package('app/' . $module, app_path() . '/modules/' . $module . '/config');

            // Menambahkan Routes
            $routes = app_path() . '/modules/' . $module . '/routes.php';
            if (file_exists($routes)) {
                require $routes;
            }

            // Menambahkan View
            View::addNamespace($module, $this->module_path.'/views');
        }
    }

    public function getModule($args)
    {
        $module = (isset($args[0]) and is_string($args[0])) ? $args[0] : null;

        return $module;
    }
}