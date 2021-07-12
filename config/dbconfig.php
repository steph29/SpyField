<?php 

require '../vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('/Users/stephaneverardo/SpyField/config/spyfield-b2064-firebase-adminsdk-56zwj-0cf183d972.json')
->withDatabaseUri('https://spyfield-b2064-default-rtdb.europe-west1.firebasedatabase.app/');
    $database = $factory->createDatabase();

?>