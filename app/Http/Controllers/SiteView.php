<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//
//
// MAIN SITE CONTROLLER
//
//
class SiteView extends ViewController
{





//
//
// INDEX PAGE CONTROLLER '/'
//
//
    public function Index() {
        return $this->IndexView();
    }






//
//
// ORGANIZATION PAGE CONTROLLER '/org/{name}'
//
//
    public function Organization(Request $request, $orgname) {
        return $this->OrganizationView($request, $orgname);
    }





}
