<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php

$con = mysqli_connect('localhost','id20798358_cmsuser','Cms@12345','id20798358_cms');

$id = $_GET['id'];

$query = "delete from emailtb where id = '$id'";

$row = mysqli_query($con,$query);

if($row)
{
 header('Location: ../PresentationLayer/pages/mailbox/sent.php');
	}
	else {
		echo"Data Not Deleted";
		}
		
		

?>
<a href='view.php'> <h1>Back To HomePage</h1></a></body>
</html>