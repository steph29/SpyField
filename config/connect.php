<?php 
session_start() ;
include('dbconfig.php');

if(isset($_POST['loginBtn'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    try {

    $user = $auth->getUserByEmail("$email");

    try {
    $signInResult = $auth->signInWithEmailAndPassword($email, $password);

    $idTokenString = $signInResult->idToken();

    try {
        $verifiedIdToken = $auth->verifyIdToken($idTokenString);
        $uid = $verifiedIdToken->claims()->get('sub');

        $_SESSION[ 'verified_user_id'] = $uid;
        $_SESSION[ 'idTokenString'] = $idTokenString;

        $_SESSION['status'] = "Logged in successfully";
        header('location: admin');

    } catch (InvalidToken $e) {
        echo 'The token is invalid: '.$e->getMessage();
    } catch (\InvalidArgumentException $e) {
        echo 'The token could not be parsed: '.$e->getMessage();
    }

    } catch (Exception $e) {
 $_SESSION['status'] = "Invalid email or password";
    header('location: login');
    }

} catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
    // echo $e->getMessage();
     $_SESSION['status'] = "PLease, register you before.";
    header('location: login');
}

}else {
    $_SESSION['status'] = "PLease, register you before.";
    header('location: login');
}



?>