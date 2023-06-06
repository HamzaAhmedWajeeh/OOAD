<?php

function save($cn, $ce, $cc, $ct)
{
   $con = mysqli_connect("localhost","lawsjgfe_hamzaadnan","qwerty@hamza123adnan","lawsjgfe_cmslawyer");
    $query = "INSERT INTO client_tb(Client_name, C_contact, Case_type,Client_Email) VALUES ('$cn','$ce','$cc','$ct')";
    
    $run = mysqli_query($con, $query);
    
    if ($run) {
        mysqli_close($con); // Close the database connection before redirecting
        header('Location: http://cms.lawseer.co/PresentationLayer/vnewclient.php');
        exit(); // Terminate the script after redirection
    } else {
        echo "Not Established";
    }
}


if(isset($_POST["btnc"])){
   
   $cn =  $_POST["cn"];
   $cc =  $_POST["cc"];
   $ct =  $_POST["ct"];
   $ce =  $_POST["ce"];
   save($cn, $ce, $cc, $ct);
   
    
}


?>
