<?php
/**
 * User: dirg
 * Date: 06/08/2015
 * Time: 1:32
 */

namespace App\Modules\Auth\Models;


class GroupsModel {

    static function create($data)
    {
        $Groups = new \GroupsOrm();
        $Groups->name = $data['name'];
        $Groups->permissions = $data['permissions'];
        $Groups->save();
    }

    static function update($id, $data)
    {
        $Groups = \GroupsOrm::find($id);
        $Groups->name = $data['name'];
        $Groups->permissions = $data['permissions'];
        $Groups->save();
    }

}