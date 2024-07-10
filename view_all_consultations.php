<?php
  session_start();
  
  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "pharmacist"){

      header("Location: index.html");
    }
  }
?>

<?php

$conn = new mysqli('localhost','root','','malutipharmacy');
	if($conn->connect_error) die($conn->connect_error);
	
	$query="SELECT * FROM consultation";
	$results = $conn->query($query);
	if (!$results) die ($conn->error);
	
	$rows = $results->num_rows;
	
	if($rows == 0)
	{
		?><script type="text/javascript"> 
	    alert("NO FORM FOUND");
	</script><?php
	}
	else
	{
		?>
		<!doctype html>
		<html>
		<head>
			<title>viewconsults</title>
			<link rel="stylesheet" href="maluti_pharmacy.css">
			
			  <script type="text/javascript" src="medical pharmacy.js"></script>
		</head>
		<body class="portal">
				<header>
			<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
			</header>
			<h3>ALL CONSULTANT FORMS</h3>
			<table border="1" class="consultant">
			<tr>
			<th>Consultation ID</th>
			<th>Patient ID</th>
			<th>Pharmacists ID</th>
			<th>Concerns</th>
			<th>Responce</th>
			<th>Description</th>
			<th>Date</th>
			</tr>
			<?php
		
		for($i = 0; $i < $rows; $i++){
			$row = $results->fetch_array(MYSQLI_ASSOC); 
			?>
			<tr>
			<td><?php  echo $row['Consultation_Id']; ?></td>
			<td><?php  echo $row['Patient_Id']; ?></td>
			<td><?php  echo $row['Pharmasist_ID']; ?></td>
			<td><?php  echo $row['Corncerns']; ?></td>
			<td><?php  echo $row['Respond']; ?></td>
			<td><?php  echo $row['Description']; ?></td>
			<td><?php  echo $row['Date']; ?></td>
			</tr>
			<?php
		
		}
		?>
		<td colspan="7" align="center"> <a href="update_consult_form.php">Respond Form</a></td>
		</table>
			</body>
			</html>
		<p class="copy" ><a href="pharmasist_page.php">Back To Pharmacist Page</a></p>
	<hr/>

   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
		<?php
	}


?> 