<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

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

    /**
     * Get the user by password and create a JWT token to response
     */
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

        $data = [
            "username"  => $user->username,
            "name"      => $user->name,
            "location"  => $user->location,
            "email"     => $user->email,
        ];

        $jwt = JWT::encode($data, 'secret', 'HS256');

        return $this->responseOk(['token' => $jwt]);
    }

    /**
     * Function to add a new user to DB
     * 
     * Need username, name, location, email, passwd as required parameters
     */
    public function addNewUser(Request $request) {
        $data = $request->post();

        // Check if some data is null or is empty, all must be required
        if( $data == null || 
        !isset($data['username']) || $data['username'] == null || 
        !isset($data['name']) || $data['name'] == null || 
        !isset($data['location']) || $data['location'] == null || 
        !isset($data['email']) || $data['email'] == null || 
        !isset($data['passwd']) || $data['passwd'] == null) 
        {
            return $this->responseError("Error, fill all required data");
        }

        try {
            $newUser = User::create([
                'username' => $data['username'],
                'name'     => $data['name'],
                'location' => $data['location'],
                'email'    => $data['email'],
                'passwd'   => $data['passwd'],
                'active'   => 1
            ]);

            return $this->responseOk('User created successfully!');

        } catch (Exception $e) {
            return $this->responseError('There was an error during the user creation process, try again in a few minutes');
        }
    }

    /**
     * Function to find and delete a user by password and id
     */
    public function deleteUser(Request $request) {
        $id = $request->post('id');
        $passwd = $request->post('passwd');

        $user = User::where('id', $id)
                        ->where('passwd', $passwd)
                        ->first();
        
        if($user == null) {
            return $this->responseError('Incorrect password or user doesn\'t exist');
        }

        try{
            $user->delete();
            return $this->responseOk('User deleted successfully');
        }catch (Exception $e) {
            return $this->responseError('There was an error during deleting the user, please try again in a few minutes');
        }
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
