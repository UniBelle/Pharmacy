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
		<title>Create Admin Form </title>
		<link rel="stylesheet" href="maluti_pharmacy.css">
	</head>
	<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
		<form method="POST" action="create_admin.php">
			<h1> Create Admin Form </h1>
			<br/>
			 <fieldset>
					<legend>PERSONAL INFORMATION</legend>
					<table>
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
					<legend>CONTACT DETAILS</legend>
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
			<input type="submit" value="Create Admin" name="create">
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

//connect to the database
$connection = mysqli_connect ('localhost','root','','malutipharmacy');
if ($connection->connect_error)
 die(connection_error);
//build the query
$query="INSERT INTO system_administrators (Name,Surname,Email_Address,Contact_Number,Gender)
VALUES ('$name','$surname','$email','$telephone','$gender')";
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
	    alert("ADMIN SUCCESSFULLY ADDED");
	</script><?php
}

}
?>