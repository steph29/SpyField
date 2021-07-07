<?php 
// Connexion to the database

use Kreait\Firebase\Factory;
use Keait\Firebase\ServiceAccount;


$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/spyfield-b2064-firebase-adminsdk-56zwj-64752f6ee0.json');
$firebase = (new Factory)
->withServiceAccount($serviceAccount)
->withDatabaseUri('https://spyfield-b2064-default-rtdb.europe-west1.firebasedatabase.app')
->create();

$database = $firebase->getDatabase();

?>