<?php 
// router config
$router-> map('GET|POST', '/autoload', 'vendor/autoload', 'autoload' );
$router-> map('GET|POST', '/code', 'config/code', 'code' );
$router->map('GET|POST', '/dbconfig', 'config/dbconfig', 'dbconfig');
$router-> map('GET|POST', '/signin', 'config/signin', 'signin' );
$router-> map('GET|POST', '/loggout', 'config/loggout', 'loggout' );
$router-> map('GET|POST', '/connect', 'config/connect', 'connect' );
$router-> map('GET|POST', '/mail', 'config/mail', 'mail' );

// Router website
$router->map('GET', '/', 'templates/home', 'home');
$router->map('GET', '/contact', 'templates/contact', 'contact', 'contact');
$router->map('GET|POST', '/login', 'admin/login', 'login');
$router-> map('GET|POST', '/admin', 'admin/admin', 'admin' );
$router-> map('GET|POST', '/add_mission', 'admin/add_mission', 'add' );
$router-> map('GET|POST', '/register', 'admin/register', 'registerPage' );
$router-> map('GET', '/mission/[*:slug]-[i:id]', 'mission/mission');

// CRUD
$router-> map('GET|POST', '/create', 'config/CRUD/create', 'create');
$router-> map('GET|POST', '/delete', 'config/CRUD/delete', 'delete');
$router-> map('GET|POST', '/update', 'config/CRUD/update', 'update');