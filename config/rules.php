<?php 
session_start();
include('dbconfig.php') ;

// compatibilté de planques avec le pays de la mission
    $arrayCountry= array();
    $arrayTargetNationality = array();
    $arraySpe = array();

if(isset($_POST['country'])){
    $country_key = $_POST['country'];
    $ref_table = "countries/".$country_key;
    $dataCountryCapital = $database->getReference($ref_table)->getValue();

    $ref_table_contact = "contact/";
    $dataContact = $database->getReference($ref_table_contact)->getValue();

    if($dataCountryCapital > 0){
        array_push($arrayCountry, $dataCountryCapital['capital']);
    foreach ($dataContact as $key => $value) {
       if($country_key == $value['nationalityId']){
        array_push($arrayCountry, $value['callsign']);
       }
    }
    echo json_encode( $arrayCountry);
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

    if($dataTarget > 0 || $dataAgent > 0){
        foreach ($dataAgent as $key => $value) {
            if($dataTarget['nationalityId'] !=  $value['nationalityId']){
            array_push($arrayTargetNationality, $value['callsign']);
        }
    }
    echo json_encode( $arrayTargetNationality );   
    }
    exit();
}

// Spécialité requise de l'agent pour la mission

elseif (isset($_POST['specialities'])) {
    $spe_key = $_POST['specialities'];
    $ref_table_spe = "specialities/".$spe_key;
    $dataSpe = $database->getReference($ref_table_spe)->getValue();

    $ref_table_agent = "agent/";
    $dataAgentSpe = $database->getReference($ref_table_agent)->getValue();

    if($dataSpe > 0){
        array_push($arraySpe, $spe_key)  ;
        foreach ($dataAgentSpe as $key => $value) {
            if($spe_key == $value['specialities'][0]){
                array_push($arraySpe, $value['callsign']);
            }
        }
    echo json_encode( $arraySpe );
    }
    exit();
}
?>