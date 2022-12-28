<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    private $error;
    private $msg;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->error = false;
        $this->msg = "";
    }

    public function doLogin(Request $request) {
        $email = $request->post('email');
        $passwd = $request->post('passwd');

        if ($email == null || $passwd == null) {
            $this->error = true;
            $this->msg = "Please fill email and password correctly";

            return json_encode([
                "error" => $this->error,
                "msg" => $this->msg,
                "data" => null
            ]);
        }

        $user = User::where('email', $email)
                        ->where('passwd', $passwd)
                        ->first();

        if($user == null) {
            $this->error = true;
            $this->msg = "User doesn't exist";
        } 

        return json_encode([
            "error" => $this->error,
            "msg" => $this->msg,
            "data" => $user
        ]);
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
