<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Jobs;
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






//
//
// SEARCH FUNCTION RETURNING VIEW
//
//
// Search in :
//      _ users *
//      _ jobs
//      _ articles
//      _ organizations
// * if user is connected
//
    public function SearchView(Request $request, $search) {
        $searchreal = urldecode($search);


        $fusers = Users::where('login', 'LIKE', '%' . $search . '%')->orWhere('email', 'LIKE', '%' . $search . '%')->orWhere('firstname', 'LIKE', '%' . $search . '%')->orWhere('lastname', 'LIKE', '%' . $search . '%')->get();


        $farticles = Articles::where('title', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->get();


        $forganizations = Organizations::where('name', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->orWhere('website', 'LIKE', '%' . $search . '%')->get();


        $fjobs = Jobs::where('title', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->get();
        return view('site.search', ['users' => $fusers, 'articles' => $farticles, 'organizations' => $forganizations, 'jobs' => $fjobs]);
    }
}






