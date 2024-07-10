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
   <title>Admin Delete</title>
   <link rel="stylesheet" href="maluti_pharmacy.css">
	</head>
	<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
    <form name="form1" method="POST" action="delete_admin.php">
	<table align="center">
	<tr>
		<td><label for="admin_id">Admin Id</label></td>
	</tr>
	<tr>
	    <td colspan="2"><input type="number" name="Aid"></td>
	    <td><input type="submit" value="Delete" name="delete"></td>
	</tr>
	</table>

	
	</form>
	<p class="copy" ><a href="admin_page.php">Back To Adnin Page</a></p>
 <hr>
   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
</body>
</html>

<?php

if(isset($_POST['delete']))
{
	$Adminid= $_POST['Aid'];
	
	$connection = mysqli_connect ('localhost','root','','malutipharmacy');
	if ($connection->connect_error)
	die(connection_error);
	
	$query="DELETE FROM system_administrators WHERE Admin_ID = $Adminid";
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
	    alert("ADMIN SUCCESSFULLY DELETED");
	</script><?php
	}
}
?>