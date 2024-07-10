<?php
  session_start();

  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "pharmacist"){
      header("Location: index.html");
    }
  }
?>
<!doctype html>
<html>
<head>
   <title> Retrieve Patient</title>
<link rel="stylesheet" href="maluti_pharmacy.css">
	</head>
	<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
    <form name="form1" method="POST" action="retrieve_patient.php">
	<table>
	<tr>
		<td><label for="patient_id">Patient Id</label></td>
		<td><input type="number" name="Pid"></td>
	</tr>
	<tr>
	    <td><input type="submit" value="search" name="search"></td>
	</tr>
	</table>

	
	</form>
</body>
</html>

<?php

if(isset($_POST['search']))
{
	$pid= $_POST['Pid'];
	
	$connection = mysqli_connect ('localhost','root','','malutipharmacy');
if ($connection->connect_error)
 die(connection_error);
	
	$query="SELECT * FROM patient WHERE Patient_ID = $pid";
	$results = $connection->query($query);
	if (!$results) die ($connection->error);
	
	$rows = $results->num_rows;
	
	if($rows == 0)
	{
		?><script type="text/javascript"> 
	    alert("THE PATIENT WAS NOT FOUND");
	</script><?php
	}
	else
	{
		$row = $results->fetch_array(MYSQLI_ASSOC);
		?>
		<table border="1">
		<tr>
		<td colspan="2"><?php echo "Patient ID $pid records are: "; ?></td>
		</tr>
		<tr>
		<td>Username</td>
		<td> <?php echo $row['Username']; ?></td>
		</tr>
		<tr>
		<td>Name</td>
		<td> <?php echo $row['Name']; ?></td>
		</tr>
		<tr>
		<td>Surname</td>
		<td> <?php echo $row['Surname']; ?></td>
		</tr>
		<tr>
		<td>Gender</td>
		<td> <?php echo $row['Gender']; ?></td>
		</tr>
		<tr>
		<td>Contact Number</td>
		<td> <?php echo $row['Contact_Number']; ?></td>
		</tr>
		<tr>
		<td>Email Address</td>
		<td> <?php echo $row['Email_address']; ?></td>
		</tr>
		<tr>
		<td>Location</td>
		<td> <?php echo $row['Location']; ?></td>
		</tr>
		</table>
		<p class="copy" ><a href="pharmasist_page.php">Back To Pharmasist Page</a></p>
	 <hr>
   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
		<?php
	}
}
?>
