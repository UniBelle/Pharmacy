<!doctype html>
<html>
<head>
    <title>registration</title>
	 <link rel="stylesheet" href="maluti_pharmacy.css">
	   <script type="text/javascript" src="maluti.js"></script>
</head>
<body class="portal">
     <header class="header2">
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
	<p class="p23"><em>WELCOME TO ADMIN PORTAL REGISTRATION</em></p>
	<form name="login"  onsubmit="return(validate());" method="POST" action="register_admin.php">
	<fieldset class="field">
	<input type="email" placeholder="Email Address" name="email" /><br/>
	<input type="text" placeholder="Username"  name="username"/><br/>
	<input type="password" placeholder="Enter Password" name="password" /><br/>
	<input type="submit" name="register" value="Register" onclick="validate()"/>
	</fieldset>
	</form>
	<br/><br/><br/><br/>
   <p class="copy" ><a href="index.html">Back To Homepage</a>|<a href="admin_login.php">Back To Login</a></p>
   <hr>
   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
</body>
</html>
<?php
if(isset($_POST['register']))
{
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$connection = mysqli_connect ('localhost','root','','malutipharmacy');
    if ($connection->connect_error)
    die(connection_error);
    
	$sql="INSERT INTO system_administrators (Admin_ID,Username,Password,Email_Address) 
	         VALUES('','$username','$password','$email')";
	$result= $connection->query($sql);
	if(!$result)
	{
		 ?><script type="text/javascript"> 
	    alert("ERROR WITH THE QUERY");
	    </script><?php
    }
	else
	{
	     ?><script type="text/javascript"> 
	    alert("REGISTRATION SUCCESSFUL");
	    </script><?php
	}
}