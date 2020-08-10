<?php


$router = new Router();

$router->define('', 'LoginController@index');
$router->define('login', 'LoginController@login');
$router->define('logout', 'LoginController@logout');
$router->define('register', 'LoginController@register');
$router->define('upload' , 'HomeController@upload');





