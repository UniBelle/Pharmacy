<?php
  session_start();

  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "patient"){
      header("Location: index.html");
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Consultation form</title>
    <link rel="stylesheet" href="maluti_pharmacy.css">
</head>
<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
	<form name="form1" method="POST" action="consultation_form.php">
	
	<h1 align="center">Consultation Form</h1>
	<table align="right">
	   <tr>
	      <td>DATE</td>
		  <td><input type="date" name="date"></td>
	   </tr>
	   <tr>
	      <td>Consultation ID</td>
		  <td><input type="number" name="consID"></td>
	   </tr>
	   <tr>
		<td><label for="pharmacistID">Pharmacist ID</label</td>
		<td><input type="number" name="phrID"></td>
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
		<td><input type="number" name="Pid"></td>
	</tr>
	</table>
	<fieldset>
	<legend align="center"> Consultation Details </legend>
	<table>
	<tr>
	<td><label for="concerns"> Concerns </label></td>
	<td><input type="text" name="concerns"></td>
	</tr>
	<tr>
	<td colspan="2"><label for="description"> Description</label></td>
	</tr>
	<tr>
	<td><textarea cols="160" rows="4" name="description"></textarea></td>
	</tr>
	</fieldset>
	</table>
	</fieldset>
    <input type="submit" value="Submit Form" name="consult">
	</form>
	<p class="copy" ><a href="patient_page.php">Back To Homepage</a></p>
	 <hr>
   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
</body>
</html>
<?php

if(isset($_POST['consult']))
{
//receive values
$cID=$_POST['consID'];
$date=$_POST['date'];
$phrID=$_POST['phrID'];
$pID=$_POST['Pid'];
$concerns=$_POST['concerns'];
$desc=$_POST['description'];


//connect to the database
$connection = mysqli_connect ('localhost','root','','malutipharmacy');
if ($connection->connect_error)
 die(connection_error);
//build the query
$query="INSERT INTO consultation (Consultation_Id,Corncerns,Description,Date,Patient_Id,
Pharmasist_ID)VALUES ('$cID','$concerns','$desc','$date','$pID','$phrID')";
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
	    alert("YOUR FORM IS SUCCESSFULLY SUBMITTED");
	</script><?php
}

}
?>