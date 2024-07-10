<!doctype html>
<html>
<head>
    <title>adminlogin</title>
	 <link rel="stylesheet" href="maluti_pharmacy.css">
	  <script type="text/javascript" src="maluti.js"></script>
</head>
<body class="portal">
     <header class="header2">
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
	<p class="p23"><em>WELCOME TO ADMIN PORTAL LOGIN</em></p>
	<form name="login" onsubmit="return(validate());" method="POST" action="admin_login.php">
	<fieldset class="field">
	  <legend><img src="login.png" class="img_login"></legend>
	  <div>
	   <input type="text" placeholder="Username" name="username" /><br/>
	   <input type="password" placeholder="***" name="password" /><br/>
	   <input type="submit" name="login" value="LOGIN" onsubmit="validate()" /></div>
	    </fieldset>
    </form>
	<br/><br/><br/><br/>
    <p class="copy" ><a href="index.html">Back To Homepage</a>|<a href="register_admin.php">Sign Up</a></p>
   <hr>
   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
</body>
</html>

<?php
if(isset($_POST['login']))
{
//receive values
$username=$_POST['username'];
$password=$_POST['password'];	

//connect to the database
$connection = mysqli_connect ('localhost','root','','malutipharmacy');
if ($connection->connect_error)
 die(connection_error);

$query="SELECT * FROM system_administrators WHERE Password = '$password' AND Username = '$username'";
$result= $connection->query($query);
if(!$result)
{
    ?><script type="text/javascript"> 
	    alert("ERROR WITH THE QUERY");
	</script><?php
}
else
{
	$rows = $result->num_rows;
	if ($rows == 0)
    {
        ?><script type="text/javascript"> 
	    alert("ACCESS DENIED!!");
	    </script><?php
	}	
	else
	{
		session_start();
		$row = $result->fetch_assoc();
		$_SESSION['login'] = true;
		$_SESSION['user_position'] = "admin";
		
		header("Location: admin_page.php");
	}

}

}





?>