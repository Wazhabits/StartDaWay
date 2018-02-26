<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class DataController extends Controller
{
    /*
            MEMBER ACTION CONTROLLER
    */
    public function MemberRegister (Request $request) {
        return Users::Register($request);
    }
    public function MemberConnect (Request $request) {
        return Users::Connect($request);
    }
    public function MemberActivation (Request $request, $unicode) {
        return Users::Activate($unicode);
    }
    public function MemberUpdate (Request $request) {
        return Users::Updator($request);
    }
    public function MemberDisconnect (Request $request) {
        return Users::Disconnect($request);
    }
}
