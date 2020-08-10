<?php

require 'vendor/autoload.php';
$route = require 'routes.php';

$router->direct(Request::uri(), Request::method());
