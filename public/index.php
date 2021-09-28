<?php 
require '../vendor/autoload.php';

define('BASE_URL', dirname($_SERVER["DOCUMENT_ROOT"]));
$page = $_GET['page'] ?? '404';
$router = new AltoRouter();

$racine = dirname($_SERVER["DOCUMENT_ROOT"]);
require $racine.'/config/routes.php';

$match = $router->match();

if(is_array($match)) {
    if(is_callable($match['target'])){
        call_user_func_array($match['target'], $match['params']);
    } else{
        $params = $match['params'];
        ob_start();
        require "../{$match['target']}.php";
        $pageContent = ob_get_clean();
    }
    require '../elements/layout.php';

} else {
    ob_start();
    require '../errors/404.php';
    $pageContent = ob_get_clean();
    require '../elements/layout.php';
}

?>


  