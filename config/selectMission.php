<?php 
session_start();
include('dbconfig.php');

$targetNameArray = [];
$contactNameArray = [];
$agentNameArray = [];
if (isset($_POST['mission'])) {
   $key_child = $_POST['mission'];

    $ref_table = 'missions/'.$key_child;
    $getData = $database->getReference($ref_table)->getValue();

    $ref_country = "countries/";
    $getCountryData = $database->getReference($ref_country)->getValue();
    if($getCountryData > 0){
       foreach ($getCountryData as $key => $value) {
      if($getData['countryId'] == $key){
         $countryName = $value['name'] ;
      }
    }
    }
   
    $ref_target = "target/";
    $getTargetData = $database->getReference($ref_target)->getValue();
    if($getTargetData > 0){
       foreach ($getTargetData as $key => $value) {
          for ($i = 0 ; $i < count($getData['target']); $i++){
             if($getData['target'][$i] == $key){
          array_push($targetNameArray, $value['callsign']) ;
      }
          }
      
    }
    }
    
    $ref_type = "types/";
    $getTypeData = $database->getReference($ref_type)->getValue();
    if($getTypeData > 0){
       foreach ($getTypeData as $key => $value) {
          if($getData['type'] == $key){
         $typeName = $value['name'] ;
      }
          }
      
    }
    $ref_specialities = "specialities/";
    $getSpecialitiesData = $database->getReference($ref_specialities)->getValue();
    if($getSpecialitiesData > 0){
       foreach ($getSpecialitiesData as $key => $value) {
          if($getData['specialities'] == $key){
         $specialitiesName = $value['name'] ;
      }
          }
      
    }
    $ref_target = "contact/";
    $getContactData = $database->getReference($ref_target)->getValue();
    if($getContactData > 0){
       foreach ($getContactData as $key => $value) {
          for ($i = 0 ; $i < count($getData['contact']); $i++){
             if($getData['contact'][$i] == $key){
          array_push($contactNameArray, $value['callsign']) ;
      }
          }
      
    }
    }
    
    $ref_target = "agent/";
    $getAgentData = $database->getReference($ref_target)->getValue();
    if($getAgentData > 0){
       foreach ($getAgentData as $key => $value) {
          for ($i = 0 ; $i < count($getData['agent']); $i++){
             if($getData['agent'][$i] == $key){
          array_push($agentNameArray, $value['callsign']) ;
      }
          }
      
    }
    }
  
    
 if($getData > 0){   
    ?>
    <table  class="table table-striped">
         <tbody>
            <tr><td>Mission: </td><td> <?= $getData['mission'] ;?></td></tr> 
           <tr><td>Code name: </td><td>  <?= $getData['codeName'] ;?></td></tr> 
           <tr><td>target: </td><td>  <?php for ($i = 0 ; $i < count($targetNameArray) ; $i++){
              echo $targetNameArray[$i] .', ';}; ?></td></tr> 
           <tr><td>agent: </td><td>  <?php for ($i = 0 ; $i < count($agentNameArray) ; $i++){
              echo $agentNameArray[$i] .', ';}; ?></td></tr> 
           <tr><td>description: </td><td>  <?= $getData['desc'] ;?></td></tr> 
           <tr><td>type: </td><td>  <?= $typeName ;?></td></tr> 
           <tr><td>contact: </td><td>  <?php for ($i = 0 ; $i < count($contactNameArray) ; $i++){
              echo $contactNameArray[$i] .', ';}; ?></td></tr> 
           <tr><td>status: </td><td>  <?= $getData['status'] ;?></td></tr> 
           <tr><td> hideouts: </td><td>  <?php for ($i = 0 ; $i < count($getData['hideouts']) ; $i++){
              echo $getData['hideouts'][$i] .', ';}; ?></td></tr> 
           <tr><td>specialities: </td><td>  <?= $specialitiesName ;?></td></tr> 
           <tr><td>startDate: </td><td>  <?= $getData['startDate'] ;?></td></tr> 
           <tr><td>endDate: </td><td>  <?= $getData['endDate'] ;?></td></tr> 
           <tr><td>country: </td><td>  <?= $countryName  ;?></td></tr> 
         </tbody>
    </table>
        <?php 
        exit();
} 
}
?>

