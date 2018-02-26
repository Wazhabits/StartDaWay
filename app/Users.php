<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Users extends Model
{
    protected $table = "users";

    protected function CreateUnicode() {
        $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $unicode = "";
        $i = 0;
        while ($i < 25) {
            $unicode += $char[rand(0, count($char) - 1)];
            $i++;
        }
        return $unicode;
    }

    public function InsertUser(Request $request) {
        $NewUser = new Users;
        $inputs = $request->all();
        if ((!empty($inputs['login']) || !empty($inputs['password']) || !empty($inputs['email']) ||
                !empty($inputs['firstname']) || !empty($inputs['lastname']) || !empty($inputs['phone']))
                && ($inputs['password'] == $inputs['confirmation']) && (count($inputs['login']) < 5)
                && (count($inputs['phone'])) < 10) {
            $NewUser->login = $inputs['login'];
            $NewUser->password = md5($inputs['password']);
            $NewUser->firstname = $inputs['firstname'];
            $NewUser->lastname = $inputs['lastname'];
            $NewUser->email = $inputs['email'];
            $NewUser->phone = $inputs['phone'];
            $NewUser->unicode = self::CreateUnicode();
            $NewUser->image = null;
            $NewUser->level = 1;
            $NewUser->save();
        }
        else
            return false;
    }
}
