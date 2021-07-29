<?php 
session_start();
include('dbconfig.php');

if (isset($_POST['mission'])) {
   $key_child = $_POST['mission'];

    $ref_table = 'missions/'.$key_child;
    $getData = $database->getReference($ref_table)->getValue();


 if($getData > 0){   
    ?>
    <table  class="table table-striped">
         <tbody>
            <tr><td>Mission: </td><td> <?= $getData['mission'] ;?></td></tr> 
           <tr><td>Code name: </td><td>  <?= $getData['codeName'] ;?></td></tr> 
           <tr><td>target: </td><td>  <?= $getData['target'] ;?></td></tr> 
           <tr><td>agent: </td><td>  <?= $getData['agent'] ;?></td></tr> 
           <tr><td>description: </td><td>  <?= $getData['desc'] ;?></td></tr> 
           <tr><td>type: </td><td>  <?= $getData['type'] ;?></td></tr> 
           <tr><td>contact: </td><td>  <?= $getData['contact'] ;?></td></tr> 
           <tr><td>status: </td><td>  <?= $getData['status'] ;?></td></tr> 
           <tr><td> hideouts: </td><td>  <?= $getData['hideouts'] ;?></td></tr> 
           <tr><td>specialities: </td><td>  <?= $getData['specialities'] ;?></td></tr> 
           <tr><td>startDate: </td><td>  <?= $getData['startDate'] ;?></td></tr> 
           <tr><td>endDate: </td><td>  <?= $getData['endDate'] ;?></td></tr> 
           <tr><td>country: </td><td>  <?= $getData['country'] ;?></td></tr> 
         </tbody>
    </table>
        <?php 
        exit();
} 
}
?>

