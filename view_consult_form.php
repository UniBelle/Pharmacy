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
   <title>View Consultant Form</title>
   <link rel="stylesheet" href="maluti_pharmacy.css">
	</head>
	<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
    <form name="form1" method="POST" action="view_consult_form.php">
	<table>
	<tr>
		<td><label for="consult_id">Consultant Id</label></td>
		<td><input type="number" name="Cid"></td>
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
	$cID= $_POST['Cid'];
	
	$conn = new mysqli('localhost','root','','malutipharmacy');
	if($conn->connect_error) die($conn->connect_error);
	
	$query="SELECT * FROM consultation WHERE Consultation_Id = $cID ";
	$results = $conn->query($query);
	if (!$results) die ($conn->error);
	
	$rows = $results->num_rows;
	
	if($rows == 0)
	{
		?><script type="text/javascript"> 
	    alert("NO FORM FOUND");
	</script><?php
	}
	else
	{
		$row = $results->fetch_array(MYSQLI_ASSOC);
		?>
		<form>
	
	<h1 align="center">Consultation Form</h1>
	<table align="right">
	   <tr>
	      <td>DATE</td>
		  <td><input type="date" name="date" value="<?php  echo $row['Date']; ?>" disabled ></td>
	   </tr>
	   <tr>
	      <td>Consultation ID</td>
		  <td><input type="number" name="cID" value="<?php  echo $row['Consultation_Id']; ?>" disabled></td>
	   </tr>
	   <tr>
		<td><label for="pharmacistID">Pharmacist ID</label</td>
		<td><input type="number" name="phrID" value="<?php  echo $row['Pharmasist_ID']; ?>" disabled></td>
	</tr>
	</table>
	<br/>
	<br/>
	<br/>
	<br/>
	<fieldset>
	
	    <legend align="center" text="bold">DETAILS</legend>
	<table>
	<tr>
		<td><label for="patientID">Patient ID</label</td>
		<td><input type="number" name="Pid" value="<?php  echo $row['Patient_Id']; ?>" disabled></td>
	</tr>
	</table>
	<fieldset>
	<legend align="center"> Consultation Details </legend>
	<table>
	<tr>
	<td><label for="concerns"> Concerns </label></td>
	<td><input type="text" name="concerns" value="<?php  echo $row['Corncerns']; ?>" disabled></td>
	</tr>
	<tr>
	<td colspan="2"><label for="description" > Description</label></td>
	</tr>
	<tr>
	<td><textarea cols="160" rows="4" name="description" disabled><?php  echo $row['Description']; ?> </textarea></td>
	</tr>
	<td colspan="2"><label for="responce" > Pharmacist Responce</label></td>
	</tr>
	<tr>
	<td><textarea cols="160" rows="4" name="response" disabled><?php  echo $row['Respond']; ?></textarea></td>
	</tr>
	</fieldset>
	</table>
	</fieldset>
	</form>
	<p class="copy" ><a href="patient_page.php">Back To Homepage</a></p>
	<hr/>

   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
		<?php
	}
}
?>