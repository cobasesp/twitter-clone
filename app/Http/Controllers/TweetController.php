<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TweetController extends Controller
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

    public function createNewTweet(Request $request) {
        $data = $request->post();

        // Check if some data is null or is empty, all must be required
        if( $data == null || !isset($data['token']) || $data['token'] == null)
        {
            return $this->responseError("Error, auth token is required");
        }

        // Check if the token is real
        try {
            $token = env('JWT_TOKEN_SECRET');
            $jwt = JWT::decode($data['token'], new Key($token, 'HS256'));
        } catch (Exception $e) {
            return $this->responseError('Error, the authentification failed');
        }

        // TODO: Comprobar que el contenido del token es igual a la peticion

        // Check if some data is null or is empty, all must be required
        if( $data == null || 
        !isset($data['author']) || $data['author'] == null || 
        !isset($data['content']) || $data['content'] == null)
        {
            return $this->responseError("Error, fill all required data");
        }

        $user = User::where('id', $data['author'])->first();

        if ($user == null || $user->active == 0) {
            return $this->responseError("Error, the user doesn't exist or is not active");
        }

        try {
            $newUser = Tweet::create([
                'author' => $data['author'],
                'content'     => $data['content'],
                'files' => isset($data['files']) ? $data['files'] : "",
            ]);

            return $this->responseOk('Tweet created successfully!');

        } catch (Exception $e) {
            return $this->responseError('There was an error during the tweet creation, try again in a few minutes');
        }
    }
}
