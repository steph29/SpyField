<?php 

$router->map('GET', '/', 'templates/home');
$router->map('GET|POST', '/login', 'admin/login');
$router-> map('GET|POST', '/admin', 'admin/admin' );
$router-> map('GET', '/mission/[*:slug]-[i:id]', 'mission/mission');