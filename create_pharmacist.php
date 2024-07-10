<?php
  session_start();

  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "admin"){
      header("Location: index.html");
    }
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create Pharmacist Form </title>
		<link rel="stylesheet" href="maluti_pharmacy.css">
	</head>
	<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
		<form method="POST" action="create_pharmacist.php">
			<h1> Create Pharmacist Form </h1>
			<br/>
			<label for="admin">ADMIN ID</label><input type="number" name="Aid">
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
					</table>
					</fieldset>
					<br/>
			        <br/>
					  <fieldset>
			       <table>
					<legend>CONTACT DETAILS AND QUALIFICATIONS</legend>
					<tr>
					<td> <label for="telephone"> Telephone</label> </td><td>  <input type="telephone" name="telephone"></td>
					</tr>
					<tr>
					<td> <label for="email"> Email</label></td><td> <input type="email" name="email"> </td>
					</tr>
				    <tr>
					<td> <label for="qualification">Qualification</label></td><td> <input type="text" name="qualification"> </td>
					</tr>
					</table>
				  </fieldset>
			<br/>
			<br/>
			<input type="submit" value="Create Pharmasist" name="create">
	 </form>
	 <p class="copy" ><a href="admin_page.php">Back To Admin Page</a></p>
	 <hr>
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
$gender=$_POST['gender'];
$telephone=$_POST['telephone'];
$email=$_POST['email'];
$qualification=$_POST['qualification'];
$admin=$_POST['Aid'];
$username=$_POST['username'];
$pass=$_POST['password'];
//connect to the database
$connection = mysqli_connect ('localhost','root','','malutipharmacy');
if ($connection->connect_error)
 die(connection_error);
//build the query
$query="INSERT INTO pharmacists (Username,Name,Surname,Gender,Email_Address,Contact_Number,Password,
   Qualification, Admin_ID)  VALUES  ('$username','$name','$surname','$gender','$email','$telephone','$pass','$qualification','$admin')";
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
	    alert("PHARMASIST SUCCESSFULLY ADDED");
	</script><?php
}

}
?>