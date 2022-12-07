<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
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
