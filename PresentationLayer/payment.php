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
   <form action="http://cms.lawseer.co/BusinessLogicLayer/vpay.php" method="post">
        <h1>Have you made a payment?</h1>
    <button class="btn btn-primary btn-yes" name="pay">Yes, I have paid for the product</button>
   </form>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
