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
	
	$query="SELECT * FROM patient";
	$results = $conn->query($query);
	if (!$results) die ($conn->error);
	
	$rows = $results->num_rows;
	
	if($rows == 0)
	{
		?><script type="text/javascript"> 
	    alert("NO PATIENT FOUND");
	</script><?php
	}
	else
	{
		?>
		<!doctype html>
		<html>
		<head>
			<title>viewpatient</title>
			 <link rel="stylesheet" href="maluti_pharmacy.css">
			  <script type="text/javascript" src="medical pharmacy.js"></script>
		</head>
		<body class="portal">
				<header>
			<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
			</header>
			<h3>ALL PATIENTS</h3>
			<table border="1">
			<tr>
			<th>Patient ID</th>
			<th>Pharmacists ID</th>
			<th>Username</th>
			<th>Name</th>
			<th>Surname</th>
			<th>Gender</th>
			<th>Contact Number</th>
			<th>Email Address</th>
			<th>Location</th>
			</tr>
			<?php
		
		for($i = 0; $i < $rows; $i++){
			$row = $results->fetch_array(MYSQLI_ASSOC); 
			?>
			
			<tr>
			<td><?php  echo $row['Patient_ID']; ?></td>
			<td><?php  echo $row['Pharmacists_ID']; ?></td>
			<td><?php  echo $row['Username']; ?></td>
			<td><?php  echo $row['Name']; ?></td>
			<td><?php  echo $row['Surname']; ?></td>
			<td><?php  echo $row['Gender']; ?></td>
			<td><?php  echo $row['Contact_Number']; ?></td>
			<td><?php  echo $row['Email_address']; ?></td>
			<td><?php  echo $row['Location']; ?></td>
			</tr>
			
			<?php
		
		}
		?>
		</table>
		<p class="copy" ><a href="view_all_account.php">Back To Accounts Portal</a> | <a href="admin_page.php">Back To Admin Portal</a></p>

			</body>
			</html>
	<hr/>
  
   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
		<?php
	}


?> 