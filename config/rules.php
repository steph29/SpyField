<?php 
session_start();
include('dbconfig.php') ;

// compatibilté de planques avec le pays de la mission
if(isset($_POST['country'])){
    $country_key = $_POST['country'];
    $ref_table = "countries/".$country_key;
    $dataCountryCapital = $database->getReference($ref_table)->getValue();

    if($dataCountryCapital > 0){
        $arrayCapital = array('capital' => $dataCountryCapital['capital']);
     echo json_encode( $arrayCapital );

    }
exit();
}

// nationalité de la target != nationalité de l'agent

elseif (isset($_POST['target'])){
    $target_key = $_POST['target'];
    $ref_table = "target/".$target_key;
    $dataTarget = $database->getReference($ref_table)->getValue();

    $ref_table_agent = "agent/";
    $dataAgent = $database->getReference($ref_table_agent)->getValue();

    $arrayTargetNationailty = array();
    if($dataTarget > 0 || $dataAgent > 0){
        foreach ($dataAgent as $key => $value) {
            if($dataTarget['nationality'] !=  $value['nationality']){
            array_push($arrayTargetNationailty, $value['callsign']);
        }
    }
    echo json_encode( $arrayTargetNationailty );   
    }
    exit();
}
// Contact de la meme nationalité que le pays de la mission
if(isset($_POST[''])){

}

// Spécialité requise de l'agent pour la mission
if(isset($_POST[''])){
    
}

?>