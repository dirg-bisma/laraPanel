<?php
/**
 * User: dirg
 * Date: 04/08/2015
 * Time: 14:24
 */

namespace App\Modules\Auth\Models;


class PermissionsModel {

    static function create($data)
    {
        $Permission = new \PermissionsOrm();
        $Permission->value = $data['value'];
        $Permission->description = $data['description'];
        $Permission->save();
    }

    static function update($id, $data)
    {
        $Permission = \PermissionsOrm::find($id);
        $Permission->value = $data['value'];
        $Permission->description = $data['description'];
        $Permission->save();
    }

}