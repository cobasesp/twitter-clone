<?php



$router->get('/test', function () use ($router) {
    return $router->app->version();
});

$router->get('/', function () use ($router) {
    return view('home', ['version' => $router->app->version()]);
});

// Login and user creation
$router->post('/user-login', 'UserController@doLogin');
$router->post('/add-user', 'UserController@addNewUser');
$router->post('/delete-user', 'UserController@deleteUser');

// Tweets
$router->post('/new-tweet', 'TweetController@createNewTweet');