<?php
  session_start();

  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "patient"){
      header("Location: index.html");
    }
  }
?>
<!doctype html>
		<html>
		<head>
			  <title>medicalrecord</title>
			  <link rel="stylesheet" href="maluti_pharmacy.css">
			  <script type="text/javascript" src="medical pharmacy.js"></script>
		</head>
		<body class="portal">
				<header>
			    <h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
			    </header>
		<h3> MEDICAL RECORD</h3>
		<form name="form1" method="POST" action="individual_medical_record.php">
		<table align="center">
		<tr>
			<td><label for="patientid">Patient ID</label></td>
			<td><input type="number" name="Pid"></td>
		</tr>
		<tr>
			<td><input type="submit" value="search" name="search"></td>
		</tr>
		</table>
        </form>
	    <p class="copy" ><a href="patient_page.php">Back To Homepage</a></p>
</body>
</html>
<?php
if(isset($_POST['search']))
{
	$Pid=$_POST['Pid'];
	
	$conn = new mysqli('localhost','root','','malutipharmacy');;
	if($conn->connect_error) die($conn->connect_error);
	
	$query = "SELECT * FROM medical_records WHERE Patient_Id = $Pid";
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
		for($i = 0; $i < $rows; $i++){
		$row = $results->fetch_array(MYSQLI_ASSOC);
		?>
		<table border="1">
		<tr>
		<td>Record Number</td>
		<td>Patient ID</td>
		<td>Pharmacists ID</td>
		<td>Name</td>
		<td>Surname</td>
		<td>Contact Number</td>
		<td>Location</td>
		<td>Date</td>
		<td>Concern</td>
		<td>Respond</td>
		</tr>
		<tr>
		<td><?php  echo $row['Record_number']; ?></td>
		<td><?php  echo $row['Patient_Id']; ?></td>
		<td><?php  echo $row['Pharmacists_ID']; ?></td>
		<td><?php  echo $row['Name']; ?></td>
		<td><?php  echo $row['Surmane']; ?></td>
		<td><?php  echo $row['Contact_Number']; ?></td>
		<td><?php  echo $row['Location']; ?></td>
		<td><?php  echo $row['Date']; ?></td>
		<td><?php  echo $row['Concern']; ?></td>
		<td><?php  echo $row['Respond']; ?></td>
		</tr>
		</table>
	
		
	<hr/>

   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
		<?php
	}
	}
}


?>