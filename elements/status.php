<div class="container">
    <div class="row ">
<div class="col-md-12 justify-content-center align-items-center d-flex">
            <div>
                      <?php 
                if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
                echo "<h5 class= 'alert alert-success'>".$_SESSION['status']." </h5>";
                unset($_SESSION['status']);
              }

?>
</div>
 </div>
 </div>
</div>