<?php
  session_start();

  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "admin"){
      header("Location: index.html");
    }
  }
?>

<!doctype html>
<html>
<head>
   <title>Pharmasist Delete</title>
<link rel="stylesheet" href="maluti_pharmacy.css">
	</head>
	<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
    <form name="form1" method="POST" action="delete_pharmasist.php">
	<table align="center">
	<tr>
		<td><label for="parmasist_id">Pharmasist Id</label></td>
		
	</tr>
	<tr>
	    <td><input type="number" name="Pid"></td>
	    <td><input type="submit" value="Delete" name="delete"></td>
	</tr>
	</table>

	
	</form>
	<p class="copy" ><a href="admin_page.php">Back To Admin Page</a></p>
<hr>
   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
</body>
</html>

<?php

if(isset($_POST['delete']))
{
	$Pid= $_POST['Pid'];
	
	$connection = mysqli_connect ('localhost','root','','malutipharmacy');
	if ($connection->connect_error)
	die(connection_error);
	
	$query="DELETE FROM pharmacists WHERE Pharmacists_ID = $Pid";
	$results = $connection->query($query);
	if (!$results)
	{
		?><script type="text/javascript"> 
	    alert("ERROR WITH THE QUERY");
	</script><?php
	}
	else
	{
		?><script type="text/javascript"> 
	    alert("PHARMACIST SUCCESSFULLY DELETED");
	</script><?php
	}
}
?>