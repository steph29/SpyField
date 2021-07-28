<?php 
session_start();
include('dbconfig.php');

function sendMail() {
    $to = $toSend; 
    $message = $comment;
    $header="MIME-Version: 1.0\r\n";
    $header.='Content-Type:text/html; charset="utf-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $title.='Contact depuis le site Spyfield';

      mail($to, $message,$title, $header);
}


if(isset($_POST['sendMail'])){
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comment'])){
        $email = htmlspecialchars($_POST['email']);
        $name = htmlspecialchars($_POST['name']);
        $comment = htmlspecialchars($_POST['comment']);
        $toSend = 's.verardo29@gmail.com';
        // A tester une fois sur le serveur
        sendMail();
        $_SESSION['status'] = "Your mail has been sended. I will answer you as far as possible";
        header('Location: contact');
    }else{
        $_SESSION['status'] = "Please, fill all the form.";
        header('Location: contact');
    }
}




?>