<?php 
// data secure
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeload();

// Connexion to the database
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$factory = (new Factory)->withServiceAccount(__DIR__.'/spyfield-b2064-firebase-adminsdk-56zwj-7eb7df33b5.json');

$database = $factory->createDatabase();



?>