<?php 

$router->map('GET', '/', 'templates/home');
$router-> map('GET', '/admin', 'admin/login' );
$router-> map('GET', '/mission/[*:slug]-[i:id]', 'mission/mission');