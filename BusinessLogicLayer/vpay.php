

<?php

if(isset($_POST["pay"])){
    
      session_start();
    
            
         
           $uid = $_SESSION['userId'];
           $_SESSION['pay'] = "Paid";
           
}


?>


<!DOCTYPE html>
<html>
<head>
  <title>Payment Confirmation</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      max-width: 400px;
      margin: 100px auto;
      text-align: center;
      padding: 20px;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    h1 {
      font-size: 30px;
      margin-bottom: 30px;
    }

    .btn-yes {
      background-color: #28a745;
      border-color: #28a745;
    }

    .btn-yes:hover {
      background-color: #218838;
      border-color: #1e7e34;
    }
  </style>
</head>
<body>
  <div class="container">
   <form action="http://cms.lawseer.co/PresentationLayer/layout.php" method="post">
        <h1>Fine! We are reviewing your claim and we will get back to you via email ASAP</h1>
    <button class="btn btn-primary btn-yes" name="pay">Till then, check out our other features!<br>Back to Dashboard!</button>
   </form>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
