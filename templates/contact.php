<?php 
session_start();
$pageTitle = " Nous contacter";
$pageDesc = "Vous voulez nous contacter? Utiliser ce formulaire sécurisé !"; ?>
<h1>Nous contacter <?php  $params['slug'] ?></h1>

<form action="mail" method="post">
<div class="form-group my-3">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
</div>
<div class="form-group my-3">
    <label for="email">Full Name</label>
    <input type="text" name="name" id="name">
</div>
<div class="form-group my-3">
    <label for="email">Your comment</label>
<textarea name="comment" id="comment" cols="30" rows="10"></textarea>
</div>
<div class="form-group my-3">
<button type="submit" class="btn btn-primary btn-sm float-end">Send</button>

</div>
</form>