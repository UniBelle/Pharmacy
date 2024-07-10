<?php
  session_start();

  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "pharmacist"){
      header("Location: index.html");
    }
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create Patient Form </title>
	<link rel="stylesheet" href="maluti_pharmacy.css">
	</head>
	<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
		<form method="POST" action="create_patient.php">
			<h1> Create Patient Form </h1>
			<br/>
			   <label for="pharmacistid">Pharmasist ID</label> 
			    <input type="number" name="pid">
			  <fieldset>
					<legend>PERSONAL INFORMATION</legend>
					<table>
					<tr>
					<td><label for="username">Username</label> </td><td><input type="text" name="username"></td>
					</tr>
					<tr>
					<td><label for="password">Password</label> </td><td><input type="password" name="password"></td>
					</tr>
					<tr>
					<td><label for="name">Name</label> </td><td><input type="text" name="name"></td>
					</tr>
					<tr>
					<td><label for="surname">Surname</label> </td><td><input type="text" name="surname"></td>
					</tr>
					<tr>
					<td><label for="gender"> Gender</label></td><td>  <select id="Gender" name="gender">
														 <option value="Female">Female</option>
														 <option value="Male">Male</option>
														<option value="Other">Other</option></td>
					</tr>
					<tr>
					<td><label for="location">Location</label> </td><td><input type="text" name="location"></td>
					</tr>
					</table>
					</fieldset>
					<br/>
			        <br/>
					  <fieldset>
			       <table>
					<legend>CONTACT DETAILS </legend>
					<tr>
					<td> <label for="telephone"> Telephone</label> </td><td>  <input type="number" name="telephone"></td>
					</tr>
					<tr>
					<td> <label for="email"> Email</label></td><td> <input type="email" name="email"> </td>
					</tr>
					</table>
				  </fieldset>
			<br/>
			<br/>
			<input type="submit" value="Create Patient" name="create">
	 </form>
	 <p class="copy" ><a href="pharmasist_page.php">Back To Homepage</a></p>
	<hr/>
	
   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
	 </body>
</html>

<?php
if(isset($_POST['create']))
{
//receive values
$name=$_POST['name'];
$surname=$_POST['surname'];
$pass=$_POST['password'];
$username=$_POST['username'];
$gender=$_POST['gender'];
$telephone=$_POST['telephone'];
$email=$_POST['email'];
$location= $_POST['location'];
$phrId=$_POST['pid'];
//connect to the database
$connection = mysqli_connect ('localhost','root','','malutipharmacy');
if ($connection->connect_error)
 die(connection_error);
//build the query
$query="INSERT INTO patient (Username,Name,Surname,Gender,Contact_Number,Email_address,Location,Password,
Pharmacists_ID)  VALUES  ('$username','$name','$surname','$gender','$telephone','$email','$location','$pass','$phrId')";
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
	    alert("THE PATIENT WAS SUCCESSFULLY ADDED");
	</script><?php
}

}
?>