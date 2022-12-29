<?php



$router->get('/test', function () use ($router) {
    return $router->app->version();
});

$router->get('/', function () use ($router) {
    return view('home', ['version' => $router->app->version()]);
});

$router->post('/user-login', 'UserController@doLogin');
$router->post('/add-user', 'UserController@addNewUser');
$router->post('/delete-user', 'UserController@deleteUser');