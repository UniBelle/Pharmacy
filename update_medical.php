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
			  <title>updatemeds</title>
			  <link rel="stylesheet" href="maluti_pharmacy.css">
			  <script type="text/javascript" src="medical pharmacy.js"></script>
		</head>
		<body class="portal">
				<header>
		        	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
		    	</header>
		<h3>UPDATE MEDICAL RECORD</h3>
			<form name="form1" method="POST" action="update_medical.php">
			<table align="center">
			<tr>
				<td><label for="recId">Record Number</label></td>
				<td><input type="number" name="rec"></td>
			</tr>
			<tr>
				<td><input type="submit" value="search" name="search"></td>
			</tr>
			</table>
            </form>
	     <p class="copy" ><a href="pharmasist_page.php">Back To Homepage</a></p>
</body>
</html>
<?php
if(isset($_POST['search']))
{
	$rec= $_POST['rec'];
	
	$conn = new mysqli('localhost','root','','malutipharmacy');;
	if($conn->connect_error) die($conn->connect_error);
	
	$query = "SELECT * FROM medical_records WHERE Record_number = $rec";
	$results = $conn->query($query);
	if (!$results) die ($conn->error);
	
	$rows = $results->num_rows;
	
	if($rows == 0)
	{
		?><script type="text/javascript"> 
	    alert("NO RECORD FOUND");
	</script><?php
	}
	else
	{
		$row = $results->fetch_array(MYSQLI_ASSOC);
		?>
		<form method="POST" action="update_medical.php">
		<table border="1">
		<tr>
		<td>Record Number</td>
		<td><input type="number" name="recNum" value="<?php  echo $row['Record_number']; ?>"></td>
		</tr>
		<tr>
		<td>Patient ID</td>
		<td><input type="number" name="Pid" value="<?php  echo $row['Patient_Id']; ?>"></td>
		</tr>
		<tr>
		<td>Pharmacists ID</td>
		<td><input type="number" name="phrId" value="<?php  echo $row['Pharmacists_ID']; ?>"></td>
		</tr>
		<tr>
		<td>Name</td>
		<td><input type="text" name="name" value="<?php  echo $row['Name']; ?>"></td>
		</tr>
		<tr>
		<td>Surname</td>
		<td><input type="text" name="surname" value="<?php  echo $row['Surmane']; ?>"></td>
		</tr>
		<tr>
		<td>Contact Number</td>
		<td><input type="number" name="telephone" value="<?php  echo $row['Contact_Number']; ?>"></td>
		</tr>
		<tr>
		<td>Location</td>
		<td><input type="text" name="location" value="<?php  echo $row['Location']; ?>"></td>
		</tr>
		<tr>
		<td>Date</td>
		<td><input type="date" name="date" value="<?php  echo $row['Date']; ?>"></td>
		</tr>
		<tr>
		<td>Concern</td>
		<td><input type="text" name="concerns" value="<?php  echo $row['Concern']; ?>"></td>
		</tr>
		<tr>
		<td>Respond</td>
		<td><input type="text" name="responds" value="<?php  echo $row['Respond']; ?>"></td>
		</tr>
		</table>
		<input type="submit" value="update" name="update">
		</form>
	
		
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
	 //receive values
	  $recNum = $_POST['recNum'];
      $patientID = $_POST['Pid'];
	  $phrId = $_POST['phrId'];
      $name = $_POST['name'];
	  $surname = $_POST['surname'];
	  $telephone = $_POST['telephone'];
      $location = $_POST['location'];
	  $date = $_POST['date'];
      $concerns = $_POST['concerns'];
	  $responce = $_POST['responds'];
	 
	  $connection = mysqli_connect ('localhost','root','','malutipharmacy');
     if ($connection->connect_error)
     die(connection_error);
    
	  $query="UPDATE medical_records SET Patient_Id='$patientID',
									     Pharmacists_ID ='$phrId',
										 Name ='$name',
										 Surmane ='$surname',
										 Contact_Number ='$telephone',
										 Location ='$location',
										 Date ='$date',
										 Concern ='$concerns',
										 Respond ='$responce'
  										 WHERE Record_number=$recNum"; 
 
      $result= $connection->query($query);
		if (!$result)
		{
			?><script type="text/javascript"> 
	    alert("THERE WAS AN ERROR WHILE UPDATING");
	</script><?php
		}
		else
		{
			?><script type="text/javascript"> 
	       alert("YOUR RECORD IS UPDATED SUCCESSFULLY");
	      </script><?php
        }
}