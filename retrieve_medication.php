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
   <title>Medication Retrieve</title>
   <link rel="stylesheet" href="maluti_pharmacy.css">
	</head>
	<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
    <form name="form1" method="POST" action="retrieve_medication.php">
	<table align="center">
	<tr>
		<td><label for="med ID">Medication ID</label></td>
	</tr>
	<tr>
	    <td colspan="2"><input type="number" name="ID"></td>
	    <td><input type="submit" value="Retrieve" name="retrieve"></td>
	</tr>
	</table>
	</form>

	<p class="copy" ><a href="pharmasist_page.php">Back To Pharmacist Page</a></p>
</body>
</html>

<?php

if(isset($_POST['retrieve']))
{
	$medID= $_POST['ID'];

	$connection = mysqli_connect ('localhost','root','','malutipharmacy');
	if ($connection->connect_error)
	die(connection_error);
	
	$query="SELECT * FROM medication WHERE Medication_Id = '$medID' ";
	$results = $connection->query($query);
	if (!$results) die ($connection->error);
	
	$rows = $results->num_rows;
	
	if($rows == 0)
	{
		?><script type="text/javascript"> 
	    alert("MEDICATION IS NOT AVAILABLE");
	    </script><?php
	}
	else
	{
		$row = $results->fetch_array(MYSQLI_ASSOC);
		?>
		<br/>
		<table align="center">
		<tr>
		<td colspan="2" align="center">Medication ID</td>
		</tr>
		<tr>
		<td align="center"><?php echo $row['Medication_Id']; ?></td>
		</tr>
		<tr>
		<td align="center"><img src="medication/<?php echo $row['Image_name']; ?>" /></td>
		</tr>
		</tr>
		<td>Medication Name</td>
		<td><?php echo $row['Medication_name']; ?></td>
		</tr>
		<tr>
		<td>Price</td>
		<td><?php echo "M".$row['Price']; ?></td>
		</tr>
		<tr>
		<td>Quantity In stock</td>
		<td><?php echo $row['Quantity']; ?></td>
		</tr>
		</table>
			<hr/>
            <p class="copy" ><a href="pharmasist_page.php">Back To Homepage</a></p>
            <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
		<?php
	}
}


?>