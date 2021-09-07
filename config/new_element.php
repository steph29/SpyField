<?php 
session_start();

include('dbconfig.php');

if (isset($_POST['add_agent'])) {
    $lname = $_POST['lastname'];
    $fname = $_POST['firstname'];
    $birthday = $_POST['birthday'];
    $callsign = $_POST['callsign'];
    $nationalityId = $_POST['nationality'];
    $specialities = $_POST['specialities'];

    $agentData = [
        'lname' => $lname,
        'fname' => $fname,
        'birthday' => $birthday,
        'callsign' => $callsign,
        'nationalityId' => $nationalityId,
        'specialities' => $specialities
    ];
        
    
        $choice = $_POST['choice'];
        if ($choice == "Agent") {
        $ref_table = 'agent/';
        $agent_result = $database->getReference($ref_table)->push($agentData);

        if ($agent_result) {
        $_SESSION['status'] = "Agent created in the base";
        header('Location: admin');
        } else {
            $_SESSION['status'] = "Agent uncreated. Something were wrong ";
            header('Location: admin');
        }
        }
        elseif ($choice == "contact") {
        $ref_table = 'contact/';
        $contact_result = $database->getReference($ref_table)->push($agentData);

        if ($contact_result) {
        $_SESSION['status'] = "Contact created in the base";
        header('Location: admin');
        } else {
            $_SESSION['status'] = "Contact uncreated. Something were wrong ";
            header('Location: admin');
        }
        } 
        
        elseif ($choice == "target") {
        $ref_table = 'target/';
        $target_result = $database->getReference($ref_table)->push($agentData);

        if ($target_result) {
        $_SESSION['status'] = "Target created in the base";
        header('Location: admin');
        } else {
            $_SESSION['status'] = "Target uncreated. Something were wrong ";
            header('Location: admin');
        }
    }
 }


?>