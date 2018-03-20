<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrgUsers extends Model
{
    protected $table = "org_users";

    public static function AddUserToOrg($idorg, $iduser, $idrole) {
        $nMember = new OrgUsers();
        $nMember->org_id = $idorg;
        $nMember->user_id = $iduser;
        $nMember->role_id = $idrole;
        $nMember->save();
        return redirect('/');
    }
}
