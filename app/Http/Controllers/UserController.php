<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function doLogin(Request $request) {
        $email = $request->post('email');
        $passwd = $request->post('passwd');

        if ($email == null || $passwd == null) {
            return $this->responseError('Please fill email and password correctly');
        }

        $user = User::where('email', $email)
                        ->where('passwd', $passwd)
                        ->first();

        if($user == null) {
            return $this->responseError('User doesn\'t exist');
        } 

        return $this->responseOk($user);
    }

    public function getAllUsers()
    {
        $users = \DB::table('users')->get();
 
        foreach ($users as $user)
        {
            var_dump($user->name);
        }
    }

    //
}
