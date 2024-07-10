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
			  <title>addmeds</title>
			  <link rel="stylesheet" href="maluti_pharmacy.css">
		</head>
		<body class="portal">
				<header>
			      <h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
			    </header>
		<h3>ADD NEW MEDICAL RECORD</h3>
			<form name="form1" method="POST" action="add_new_medical_record.php">
			<table align="center">
			<tr>
				<td><label for="patientId">Patient ID</label></td>
				<td><input type="number" name="pID"></td>
			</tr>
			<tr>
				<td><label for="date">Date</label></td>
				<td><input type="date" name="date"></td>
			</tr>
			<tr>
				<td><input type="submit" value="ADD" name="add"></td>
			</tr>
			</table>
            </form>
	    <p class="copy" ><a href="pharmasist_page.php">Back To Homepage</a></p>
</body>
</html>
<?php
if(isset($_POST['add']))
{
	$pID= $_POST['pID'];
	$date= $_POST['date'];
	
	$connection = mysqli_connect ('localhost','root','','malutipharmacy');
    if ($connection->connect_error)
    die(connection_error);

$query1 = "INSERT INTO medical_records (Patient_Id,Pharmacists_ID,Name,Surmane,Contact_Number,Location,
Date,Concern,Respond)
SELECT patient.Patient_ID,patient.Pharmacists_ID,patient.Name,patient.Surname,
patient.Contact_Number,patient.Location,consultation.Date,consultation.Corncerns,consultation.Respond FROM
consultation JOIN patient ON patient.Patient_ID = consultation.Patient_Id
WHERE patient.Patient_ID = $pID AND consultation.Date = $date";

$result = $connection->query($query1);
if (!$result)
{
	?><script type="text/javascript"> 
	    alert("ERROR WITH THE QUERY");
	</script><?php
}
else
{
	?><script type="text/javascript"> 
	    alert("Record Successfully Added");
	</script><?php
}
}
?>