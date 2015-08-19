<?php
/**
 * User: dirg
 * Date: 04/08/2015
 * Time: 14:32
 */

namespace App\Modules\Auth\Services;

use Input;

class PermisionService {

    static function colectData()
    {
        $data = array(
            'name' => Input::get('name'),
            'value' => Input::get('value'),
            'description' => Input::get('description')
        );
        return $data;
    }
}