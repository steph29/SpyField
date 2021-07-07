<?php 

$router->map('GET', '/', 'templates/home');
$router->map('GET', '/login', 'admin/login');
$router-> map('GET', '/admin', 'admin/admin' );
$router-> map('GET', '/mission/[*:slug]-[i:id]', 'mission/mission');