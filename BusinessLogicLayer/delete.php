<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php

 $con = mysqli_connect("localhost","lawsjgfe_hamzaadnan","qwerty@hamza123adnan","lawsjgfe_cmslawyer");
$id = $_GET['id'];

$query = "delete from emailtb where id = '$id'";

$row = mysqli_query($con,$query);

if($row)
{
 header('Location: http://cms.lawseer.co/PresentationLayer/sent.php');
	}
	else {
		echo"Data Not Deleted";
		}
		
		

?>
<a href='view.php'> <h1>Back To HomePage</h1></a></body>
</html>