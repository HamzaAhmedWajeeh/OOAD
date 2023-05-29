<?php
function save($recipientEmail, $emailSubject, $headers, $message)
{
    $con = mysqli_connect('localhost','id20798358_cmsuser','Cms@12345','id20798358_cms');
    $query = "INSERT INTO emailtb(`to`, subject, sms, date) VALUES ('$recipientEmail', '$emailSubject', '$message', NOW())";
    
    $run = mysqli_query($con, $query);
    
    if ($run) {
        mysqli_close($con); // Close the database connection before redirecting
        header('Location: ../PresentationLayer/pages/mailbox/sent.php');
        exit(); // Terminate the script after redirection
    } else {
        echo "Not Established";
    }
}
?>
