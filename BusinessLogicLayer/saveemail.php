<?php
function save($recipientEmail, $emailSubject, $headers, $message)
{
   $con = mysqli_connect("localhost","lawsjgfe_hamzaadnan","qwerty@hamza123adnan","lawsjgfe_cmslawyer");
    $query = "INSERT INTO emailtb(`to`, subject, sms, date) VALUES ('$recipientEmail', '$emailSubject', '$message', NOW())";
    
    $run = mysqli_query($con, $query);
    
    if ($run) {
        mysqli_close($con); // Close the database connection before redirecting
        header('Location: http://cms.lawseer.co/PresentationLayer/sent.php');
        exit(); // Terminate the script after redirection
    } else {
        echo "Not Established";
    }
}
?>
