<?php 
// router config
$router-> map('GET|POST', '/autoload', 'vendor/autoload' );
$router-> map('GET|POST', '/code', 'config/code' );
$router->map('GET|POST', '/dbconfig', 'config/dbconfig');

// Router website
$router->map('GET', '/', 'templates/home');
$router->map('GET|POST', '/login', 'admin/login');
$router-> map('GET|POST', '/admin', 'admin/admin' );
$router-> map('GET', '/mission/[*:slug]-[i:id]', 'mission/mission');