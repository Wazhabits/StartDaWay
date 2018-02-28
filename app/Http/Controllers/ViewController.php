<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organizations;
use App\Users;

class ViewController extends Controller
{





//
//
// INDEX FUNCTION RETURNING VIEW
//
//
    public function IndexView() {
        return view("site.index");
    }





//
//
// ORGANIZATION FUNCTION RETURNING VIEW
//
//
// Catch :
//      _ Organization does not exist in DataBase
//
    public function OrganizationView(Request $request, $orgname) {
        $realname = urldecode($orgname);
        $nbr = Organizations::where('name', $realname)->count();
        if ($nbr != 0) {
            $organization = Organizations::where('name', $realname)->get()[0];
            return view('site.organization', [ "organization" => $organization]);
        }
        else
            return view('site.index', [ "error" => "Désolé, mais aucune organisation nommé : " . $realname . "
            n'a été trouvée"]);
    }
}
