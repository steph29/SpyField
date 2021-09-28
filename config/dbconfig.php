<?php 
var_dump("je suis dans le dbconfig");
require '../vendor/autoload.php';
var_dump("j'ai passé le vendor'");

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$url = 'spyfield-b2064-firebase-adminsdk-56zwj-0cf183d972.json';
$racine = dirname($_SERVER["DOCUMENT_ROOT"]);

$factory = (new Factory)->withServiceAccount($racine."/config/".$url)
->withDatabaseUri('https://spyfield-b2064-default-rtdb.europe-west1.firebasedatabase.app/');
    

    $database = $factory->createDatabase();
    $auth = $factory->createAuth();
 
?>