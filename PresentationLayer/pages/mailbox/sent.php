<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<?php
include('../../../DataAccessLayer/db.php');

$query = "select * from emailtb";
$row = mysqli_query($con,$query);
$totalrow = mysqli_num_rows($row);


	if ($totalrow != 0)
	{
		?>
		<div class="container p-5 m-5">
        <table class="table table-hover">
        <thead>
    <tr>
      <th scope="col">#Sentid</th>
      <th scope="col">To</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <th scope="col">Sent Date & Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
        
        <?php
		
		while($data = mysqli_fetch_assoc($row))
		{
			echo "<tbody>
            <tr>
              <th scope='row'>". $data['id']."</th>
              <td>". $data['to']."</td>
              <td>". $data['subject']."</td>
              <td>". $data['sms']."</td>
              <td>". $data['date']."</td>

              
			  <td><a href='../../../BusinessLogicLayer/delete.php?id=$data[id]'>Delete</a></td>
			
            </tr>
           
            
          </tbody>
          
			";

			}
		
		}
		
		else
		{
			echo"No Records Found";
			}



?>
</table>
<a href='compose.php'> <h1>Compose new</h1></a>
</div>
</body>
</html>