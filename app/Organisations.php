<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Users;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Organizations extends Model
{
    protected $table = "organizations";






//
// UNICODE
//
// Using Users method CreateUnicode
// Organizations unicode length's is 5 chars
//
    protected static function CreateUnicode($length) {
        return Users::CreateUnicode(5);
    }






//
// CREATE ORGANIZATION METHOD
//
// Inputs :
//      _ Organization Name
//      _ Organization SIREN
//      _ Organization Adresse
//      _ Organization Description
//      _ Organization Email Contact
//      _ Organization Phone number Contact
//      _ Organization WebSite
//      _ Organization Logo
// Catch :
//      _ Inputs Empty
//      _ User can own only 1 Organization
//      _ SIREN lenght's equal 9 and only digit
//
    public static function NewOrg(Request $request) {
        $inputs = $request->all();
        if (!empty($inputs['name']) && !empty($inputs['siren'])
         && !empty($inputs['adresse']) && !empty($inputs['description'])
         && strlen($inputs['siren']) == 9 && !empty($inputs['email'])
         && is_numeric($inputs['siren']) == true
         && Organizations::where('owner_id', $request->session()->get('user')->id)->count() == 0) {
            $new = new Organizations;
            $i = 3;
            $ad = explode(' ', $inputs['adresse']);
            $new->name = $inputs['name'];
            $new->description = $inputs['description'];
            $new->siren = $inputs['siren'];
            $new->email = $inputs['email'];
            $new->phone = $inputs['phone'];
            $new->website = $inputs['site'];
            $new->logo = 'null';
            $new->ad_nbr = $ad[0];
            $new->ad_type = $ad[1];
            $new->ad_name = $ad[2];
            while ($i < count($ad) - 2) {
                $new->ad_name .= $ad[$i] . " ";
                $i++;
            }
            $new->ad_pc = $ad[$i];
            $new->ad_city = $ad[$i + 1];
            $new->unicode = self::CreateUnicode(5);
            $new->owner_id = $request->session()->get('user')->id;
            $new->save();
            OrgUsers::AddUserToOrg($new->id, $request->session()->get('user')->id, 1);
            unset($new);
            return redirect()->route('index');
        }
        else
            return redirect()->route('index')->with(["error" => "Veuillez vous assurer que vous avez bien remplit les champs requis"]);
    }





//
// UPDATE ORGANIZATION METHOD
//
// Inputs :
//      _ Organization Name
//      _ Organization SIREN
//      _ Organization Adresse
//      _ Organization Description
//      _ Organization Email Contact
//      _ Organization Phone number Contact
//      _ Organization WebSite
//      _ Organization Logo
// Catch :
//      _ Inputs Empty
//      _ User can own only 1 Organization
//
    public static function UpdateOrg(Request $request) {
        $inputs = $request->all();
        $i = 2;
        $org = Organizations::where('unicode', $inputs['reference'])->get()[0];
        print_r($inputs);
         if (!empty($inputs['name']) && !empty($inputs['siren'])
             && !empty($inputs['adresse']) && !empty($inputs['description'])
             && !empty($inputs['mail'])
             && $org->owner_id  == $request->session()->get('user')->id
         ){
             $org->name = $inputs['name'];
             $org->description = $inputs['description'];
             $org->email = $inputs['mail'];
             $org->phone = $inputs['phone'];
             $org->ad_name = "";
             $ad = explode(' ', $inputs['adresse']);
             $org->ad_nbr = $ad[0];
             $org->ad_type = $ad[1];
             while ($i < count($ad) - 2) {
                 $org->ad_name .= $ad[$i] . " ";
                 $i++;
             }
             $org->ad_pc = $ad[$i];
             $org->ad_city = $ad[$i + 1];
             $org->website = $inputs['website'];
             $org->logo = $inputs['logo'];
             $org->save();
             return redirect('/');
         }
         else
            return redirect('/');
    }
}
