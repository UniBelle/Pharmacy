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
   <title>Medication Update</title>
   <link rel="stylesheet" href="maluti_pharmacy.css">
	</head>
	<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
    <form name="form1" method="POST" action="update_medication.php">
	<table align="center">
	<tr>
		<td><label for="med name">Medication ID</label></td>
	</tr>
	<tr>
	    <td colspan="2"><input type="number" name="medID"></td>
	    <td><input type="submit" value="Search" name="search"></td>
	</tr>
	</table>
	</form>

	
	<p class="copy" ><a href="pharmasist_page.php">Back To Pharmacist Page</a></p>
</body>
</html>

<?php

if(isset($_POST['search']))
{
	$medID = $_POST['medID'];

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
		<form action="update_medication.php" method="POST" enctype="multipart/form-data">
		<fieldset>
		<legend align="center">MEDICATION UPDATE</legend>
		<table align="center">
		<tr>
		<td>Medication ID</td>
		<td ><input type="number" name="medID" value="<?php echo $row['Medication_Id'];?>"></td>
		</tr>
		<tr>
		<td>Medication Name</td>
		<td ><input type="text" name="name" value="<?php echo $row['Medication_name'];?>"></td>
		</tr>
		<tr>
		<td align="center" colspan="2"><img src="medication/<?php echo $row['Image_name']; ?>" /></td>
		</tr>
		<tr>
		 <td>NEW MEDICATION PICTURE<input type="file" name="image"><td>
		</tr>
		<td>Price</td>
		<td><input type="number" name="price" value="<?php echo $row['Price']; ?>"></td>
		</tr>
		</tr>
		<td>Quantity In stock</td>
		<td><input type="number" name="qty" value="<?php echo $row['Quantity'];?>"></td>
		</tr>
		</table>
		</fieldset>
		<input type="submit" value="Update" name="update">
			<hr/>
            <p class="copy" ><a href="pharmasist_page.php">Back To Homepage</a></p>
            <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
		<?php
	}
}


?>

<?php

if(isset($_POST['update']))
{
	$medID=$_POST['medID'];
	$name=$_POST['name'];
	$price=$_POST['price'];
	$qty=$_POST['qty'];
    
	$image=$_FILES['image']['name'];
	$temp_name = $_FILES['image']['tmp_name'];

    $dir = "medication\\";
	if($image != "")
{
	if(file_exists($dir.$image))
	{
		$image = time()."-".$image;		
	}
	$fdir = $dir.$image;
	move_uploaded_file($temp_name,$fdir);
}
    $connection = mysqli_connect ('localhost','root','','malutipharmacy');
	if ($connection->connect_error)
	 die(connection_error);

	$query="UPDATE medication SET  Medication_Id = '$medID',
					    			 Image_name = '$image',
							     	 Medication_name='$name',
									 Price ='$price',
									 Quantity =$qty
									 WHERE Medication_Id = $medID";
	$result= $connection->query($query);
     if(!$result)
{
    ?><script type="text/javascript"> 
	    alert("ERROR WITH THE QUERY");
	</script><?php
}
else
{
	?><script type="text/javascript"> 
	    alert("Medication Successfully Updated");
	</script><?php
}
}
?>
