<?php 
session_start();

$pageTitle="Contact";
$pageDesc="Une question, un doute, n'hésitez pas. On ne tue que nos cibles! :) ";
?>
<div class="col-md-12 justify-content-center align-items-center d-flex">
          <?php 
                if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
                echo "<h5 class= 'alert alert-success '>".$_SESSION['status']." </h5>";
                unset($_SESSION['status']);
              }
          ?>
</div>

    <form action="mail" method="post">
        <div class="container">
                <div class="form-group">
                    <label for="" class="col-form-label">Enter your name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="col-form-label">Enter your email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Enter your comment</label>
                <textarea name="comment" id="" cols="30" rows="10" class="form-control"></textarea>
                <button type="submit" class="btn btn-outline-success my-4 loginButton" name="sendMail">Send</button>
                </div>
        </div>
    </form>