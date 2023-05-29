<?php

require_once '../BusinessLogicLayer/UserBLL.php';
require_once '../DataAccessLayer/UserDAL.php';

$userDAL = new UserDAL(); // Instantiate UserDAL (adjust if necessary)
$userBLL = new UserBLL($userDAL); // Instantiate UserBLL with UserDAL instance

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $verificationCode = $_POST['verificationCode'];

    // Call the verifyUser() method from UserBLL
    $verificationResult = $userBLL->verifyUser($username, $verificationCode);

    // Display the verification result
    echo $verificationResult;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CMS | Email Verification</title>
</head>
<body>

  <h2>Email Verification</h2>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div>
      <label for="verificationCode">Verification Code:</label>
      <input type="text" id="verificationCode" name="verificationCode" required>
    </div>
    <div>
      <button type="submit">Verify</button>
    </div>
  </form>

</body>
</html>
