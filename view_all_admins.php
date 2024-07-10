<?php
  session_start();

  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "admin"){
      header("Location: index.html");
    }
  }
?>

<?php

$conn = new mysqli('localhost','root','','malutipharmacy');
	if($conn->connect_error) die($conn->connect_error);
	
	$query="SELECT * FROM system_administrators";
	$results = $conn->query($query);
	if (!$results) die ($conn->error);
	
	$rows = $results->num_rows;
	
	if($rows == 0)
	{
		?><script type="text/javascript"> 
	    alert("NO ADMIN FOUND");
	    </script><?php
	}
	else
	{
		?>
		<!doctype html>
		<html>
		<head>
			<title>viewadmins</title>
			 <link rel="stylesheet" href="maluti_pharmacy.css">
			  <script type="text/javascript" src="medicalpharmacy.js"></script>
		</head>
		<body class="portal">
				<header>
			<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
			</header>
			<h3>ALL ADMINS</h3>
			<table border="1">
			<tr>
			<th>Admin ID</th>
			<th>Username</th>
			<th>Email Address</th>
			</tr>
			<?php
		
		for($i = 0; $i < $rows; $i++){
			$row = $results->fetch_array(MYSQLI_ASSOC); 
			?>
			
			<tr>
			<td><?php  echo $row['Admin_ID']; ?></td>
			<td><?php  echo $row['Username']; ?></td>
			<td><?php  echo $row['Email_Address']; ?></td>
			</tr>
			
			<?php
		
		}
		?>
		</table>
			</body>
			</html>
		<p class="copy" ><a href="view_all_account.php">Back To Accounts Portal</a> | <a href="admin_page.php">Back To Admin Portal</a></p>

	<hr/>

   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
		<?php
	}


?> 