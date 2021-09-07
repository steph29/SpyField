<?php 
// router config
$router-> map('GET|POST', '/autoload', 'vendor/autoload', 'autoload' );
$router-> map('GET|POST', '/code', 'config/code', 'code' );
$router->map('GET|POST', '/dbconfig', 'config/dbconfig', 'dbconfig');
$router-> map('GET|POST', '/signin', 'config/signin', 'signin' );
$router-> map('GET|POST', '/loggout', 'config/loggout', 'loggout' );
$router-> map('GET|POST', '/connect', 'config/connect', 'connect' );
$router-> map('GET|POST', '/new_element', 'config/new_element', 'new_element' );
$router-> map('GET|POST', '/mail', 'config/mail', 'mail',  );
$router-> map('GET|POST', '/selectMission', 'config/selectMission', 'selectMission' );
$router-> map('GET|POST', '/selectContact', 'config/selectContact', 'selectContact' );
$router-> map('GET|POST', '/mapCoord', 'config/mapCoord', 'mapCoord' );
$router-> map('GET|POST', '/rules', 'config/rules', 'rules' );


// Router image

// Router website
$router->map('GET', '/', 'templates/home', 'home');
$router->map('GET', '/contact', 'templates/contact', 'contact');
$router->map('GET|POST', '/login', 'admin/login', 'login');
$router-> map('GET|POST', '/admin', 'admin/admin', 'admin' );
$router-> map('GET|POST', '/add', 'admin/add', 'add' );
$router-> map('GET|POST', '/add_agent', 'admin/add_agent', 'add_agent');
$router-> map('GET', '/mission', 'admin/mission', 'mission');
$router-> map('GET|POST', '/status', 'elements/status', 'status');

$router-> map('GET|POST', '/register', 'admin/register', 'registerPage' );

// CRUD
$router-> map('GET|POST', '/create', 'config/CRUD/create', 'create');
$router-> map('GET|POST', '/delete', 'config/CRUD/delete', 'delete');
$router-> map('GET|POST', '/update', 'config/CRUD/update', 'update');
