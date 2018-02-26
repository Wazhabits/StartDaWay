<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class Users extends Model
{
    protected $table = "users";

    // Unicode Creator (unique key for account activation)
    // Generate 25 length string, with a-z A-Z 0-9 chars
    protected static function CreateUnicode($length) {
        // Allowed chars
        $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $unicode = "";
        $i = 0;

        // Generate $length unicode
        while ($i < $length) {
            $unicode .= $char[rand(0, strlen($char) - 1)];
            $i++;
        }

        // Return the generated unicode
        return $unicode;
    }

    // Account activation function getting the unicode to parameter
    // Call by the mail link's route
    // Need to get valid unicode
    public static function Activate ($unicode) {

        // Count number of unicode occurence's in DataBase
        // Need 1 occurence
        $valid = self::where('unicode', $unicode)->count();

        // If unicode didn't match
        if ($valid == 0)
            return view('site.index', ['error' => "Ce compte est déja activer ou n'est rattaché à aucun compte existant."]);
        else {
            // If DataBase get 1 unicode in Users Table
            // Get associate user
            $user = self::where('unicode', $unicode)->get()[0];

            // If user already validate
            if ($user->validate == 1)
                // Return to index with error messaeg
                return view('site.index', ['error' => "Ce compte est déja activer ou n'est rattaché à aucun compte existant."]);
            else {
                // Else, valid user account's
                $user->validate = 1;
                $user->save();
                // Return to index page, with a validation message
                return view('site.index', ['valid' => "Votre compte à bien été validé"]);
            }
        }
    }

    // Account register function
    // Catch error :
    //   _ Inputs Empty
    //   _ Password & Confirmation doesn't match
    //   _ Email & Login already exist
    //   _ Login length < 5

    public static function Register(Request $request) {

        // Get form inputs
        $inputs = $request->all();

        // Detect if inputs are empty | Mail or Login already exist | Login length < 5
        if ((!empty($inputs['login']) || !empty($inputs['password']) || !empty($inputs['email']) ||
                !empty($inputs['firstname']) || !empty($inputs['lastname']) || !empty($inputs['phone']))
                && ($inputs['password'] == $inputs['confirmation']) && (strlen($inputs['login']) < 5)
                && (strlen($inputs['phone'])) < 10 && (Users::where('email', $inputs['mail'])->count() == 0)) {

            // Create a new user instance
            $NewUser = new Users;

            // Set the user informations
            $NewUser->login = $inputs['login'];
            $NewUser->password = md5($inputs['password']);
            $NewUser->firstname = $inputs['firstname'];
            $NewUser->lastname = $inputs['lastname'];
            $NewUser->email = $inputs['mail'];
            $NewUser->phone = $inputs['phone'];

            // Generating Account unicode
            $NewUser->unicode = self::CreateUnicode(25);

            // Set the default image to null
            $NewUser->image = "null";

            // Set the account level
            //   _ 1 -> Viewer
            //   _ 2 -> Publisher
            //   _ 3 -> Moderator
            //   _ 4 -> SuperModerator
            //   _ 5 -> Owner
            $NewUser->level = 1;

            // Validation boolean
            //   _ 0 -> Account unvalidate
            //   _ 1 -> Account validate
            $NewUser->validate = 0;

            // Save new user to DataBase
            $NewUser->save();

            // Sending mail with the activation link
            Mail::send('mail.member.activation' , ['NewUser' => $NewUser], function ($message) use ($NewUser) {
                $message->to($NewUser->email, $NewUser->firstname . " " . $NewUser->lastname)->subject('Validation d\'inscription');
            });
            return redirect()->route('index');
        }
        else
            return view('site.index', ['error' => 'Veuillez vérifier que tout les champs soit bien rempli et valide.']);
    }

    // Account connection function
    // Need $request parameter, who contain inputs
    public static function Connect(Request $request) {
        // Get inputs
        $inputs = $request->all();
        // Try if the login entered was login or email information
        if (Users::where('login', $inputs['login'])->count() < 1) {
            if (Users::where('email', $inputs['login'])->count() < 1)
                // If login or email didn't match in DataBase
                // return to index with error message
                return view('site.index', ["error" => "Erreur lors de la connexion"]);
            else
                // Get user by email information
                $user = Users::where('email', $inputs['login'])->get()[0];
        }
        else
            // Get user by login information
            $user = Users::where('login', $inputs['login'])->get()[0];
        // If inputs password match with password in DataBase
        // AND if user account is validate
        if ($user->password == md5($inputs['password']) && $user->validate == 1)
        {
            // Set session
            Session::put('user', $user);
            // Redirect to index
            return redirect()->route('index');
        }
        else
            // Return to index with error message
            // Password didn't match, or account isn't validate
            return view('site.index', ["error" => "Erreur lors de la connexion, vérifier votre 
            pseudo / mots de passe et/ou activez votre compte avec le lien envoyer à votre adresse mail"]);
    }

    // Delete user from Users Table
    public static function DeleteUser(Request $request) {
        $user = $request->session()->get('user');
        $deletion = Users::where('id', $user['id'])->delete();
    }

    // Account discconect function
    public static function Disconnect(Request $request) {
        // Destroy all session running
        $request->session()->flush();
        // Redirect to index
        return redirect()->route('index');
    }

    // Account updater function
    public static function Updator(Request $request) {
        // Get input
        //   _ new password
        //   _ new email
        $inputs = $request->all();

        // If password and confirmation math, and email input not empty
        if ($inputs['password'] == $inputs['confirmation'] && !empty($inputs['email'])) {
            // Get user line from DataBase by session information
            $user = Users::where('id', $request->session()->get('user')->id)->get()[0];

            // If input sentinel password's was not found
            if ($inputs['password'] != 'noresetpassword')
                // Password Change
                $user->password = md5($inputs['password']);

            // If modify email adress
            if ($inputs['email'] != $user->email) {
                // User must re-activate hes account
                $user->validate = 0;

                // New unicode generate
                $user->unicode = self::CreateUnicode(25);

                // Information mail send at the old email adress
                Mail::send('mail.member.notification', ["user" => $user], function ($message) use ($user) {
                    $message->to($user->email, $user->firstname . " " . $user->lastname)->subject('Mise à jour du profil');
                });

                // Email change
                $user->email = $inputs['email'];

                // Email of account reactivation send to new adress email
                Mail::send('mail.member.activation', ["user" => $user], function ($message) use ($user) {
                    $message->to($user->email, $user->firstname . " " . $user->lastname)->subject('Mise à jour du profil');
                });

                // Disconnect user
                $request->session()->flush();
            }

            // Save modification
            $user->save();

            // Redirect to index page
            return redirect()->route('index');
        }
    }
}
