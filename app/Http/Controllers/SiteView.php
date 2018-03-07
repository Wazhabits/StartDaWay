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






//
//
// SEARCH PAGE CONTROLLER '/search/'
//
//
    public function Search(Request $request, $search) {
        return $this->SearchView($request, $search);
    }





//
//
// CREATE ORGANIZATION PAGE '/org/create'
//
//
    public function CreateOrganizations(Request $request) {
        return $this->CreateOrgView($request);
    }
}
