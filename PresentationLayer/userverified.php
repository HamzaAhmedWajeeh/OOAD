<?php

require_once '../BusinessLogicLayer/UserBLL.php';
require_once '../DataAccessLayer/UserDAL.php';
require_once '../DataAccessLayer/Database.php'; // Assuming the Database class is defined in Database.php

// Create a new instance of the Database class
$db = new Database(/* provide any necessary arguments */); // Adjust this based on your implementation

$userDAL = new UserDAL($db); // Pass the Database instance to UserDAL constructor
$userBLL = new UserBLL($userDAL); // Instantiate UserBLL with UserDAL instance

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $username = $_GET['username'];
    $verificationCode = $_GET['code'];

    // Call the verifyUser() method from UserBLL
    $verificationResult = $userBLL->verifyUser($username, $verificationCode);

    // Display the verification result
    echo $verificationResult;
}


?>