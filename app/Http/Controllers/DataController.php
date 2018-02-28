<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Organizations;

class DataController extends Controller
{






//
//
// || MEMBERS ACTION METHOD CALLER
//
//
// REGISTER
//
    public function MemberRegister (Request $request) {
        return Users::Register($request);
    }
//
// CONNECTION
//
    public function MemberConnect (Request $request) {
        return Users::Connect($request);
    }
//
// ACTIVATION
//
    public function MemberActivation (Request $request, $unicode) {
        return Users::Activate($unicode);
    }
//
// UPDATE PROFILE
//
    public function MemberUpdate (Request $request) {
        return Users::Updator($request);
    }
//
// DISCONNECTION
//
    public function MemberDisconnect (Request $request) {
        return Users::Disconnect($request);
    }
//
//
//






//
//
// || ORGANIZATION METHOD CALLER
//
//
// CREATE ORGANIZATION
//
    public function OrganizationCreate (Request $request) {
        return Organizations::NewOrg($request);
    }
//
//
//



}
