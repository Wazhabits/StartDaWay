<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Jobs;
use Illuminate\Http\Request;
use App\Organizations;
use App\Users;
use Illuminate\Support\Facades\Session;

class ViewController extends Controller
{





//
//
// INDEX FUNCTION RETURNING VIEW
//
//
    public function IndexView() {
        $last_org = Organizations::limit(4)->offset(4)->get();
        if (Session::has('user'))
        {
            $users_info = Users::where('users.id', Session::get('user')->id)->join('organizations', 'users.id', '=', 'organizations.owner_id')->get()[0];
            return view("site.index", ['all', $users_info, 'startup' => $last_org]);
        } else {
            return view("site.index", ['startup' => $last_org]);
        }
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
        $words = explode(" ", $searchreal);
        $fusers = array();
        $forganizations = array();
        $fjobs = array();
        $farticles = array();
        foreach($words as $word) {


            $fuser = array_merge($fusers, Users::where('login', 'LIKE', '%' . $word . '%')
                ->orWhere('email', 'LIKE', '%' . $word . '%')
                ->orWhere('firstname', 'LIKE', '%' . $word . '%')
                ->orWhere('lastname', 'LIKE', '%' . $word . '%')->get()->toArray());
            $fusers = array_unique($fuser, SORT_REGULAR);



            $farticle = array_merge($farticles, Articles::where('title', 'LIKE', '%' . $word . '%')
                ->orWhere('description', 'LIKE', '%' . $word . '%')->get()->toArray());
            $farticles = array_unique($farticle, SORT_REGULAR);



            $forganization = array_merge($forganizations, Organizations::where('organizations.name', 'LIKE', '%' . $word . '%')
                ->orWhere('organizations.description', 'LIKE', '%' . $word . '%')
                ->orWhere('organizations.website', 'LIKE', '%' . $word . '%')->get()->toArray());
            $forganizations = array_unique($forganization, SORT_REGULAR);



            $fjob = array_merge($fjobs, Jobs::where('title', 'LIKE', '%' . $word . '%')
                ->orWhere('description', 'LIKE', '%' . $word . '%')->get()->toArray());
            $fjobs = array_unique($fjob, SORT_REGULAR);
        }
        return view('site.search', ['users' => $fusers, 'articles' => $farticles, 'organizations' => $forganizations, 'jobs' => $fjobs, 'search' => $searchreal]);
    }
}






