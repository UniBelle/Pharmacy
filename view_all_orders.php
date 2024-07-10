<?php
  session_start();
  
  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "pharmacist"){

      header("Location: index.html");
    }
  }
?>

<?php

	$connection = mysqli_connect ('localhost','root','','malutipharmacy');
	if ($connection->connect_error)
	 die(connection_error);
	
	$query="SELECT * FROM orders";
	
	$result= $connection->query($query);
	if (!$result) die ($connection->error);
	
	$rows = $result->num_rows;
	
	if($rows == 0)
	{
		?><script type="text/javascript"> 
	    alert("NO ORDERS FOUND");
	    </script><?php
	}
	else
	{
		?>
		<!doctype html>
		<html>
		<head>
		   <title>ALL ORDERS</title>
		   <link rel="stylesheet" href="maluti_pharmacy.css">
			</head>
			<body class="portal">
				<header>
			<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
			</header>
		<form method="POST" action="process_order.php">
		<table border="1">
		<tr>
		<td>Order ID</td>
		<td>Patient ID</td>
		<td>Medication_Id</td>
		<td>Quantity</td>
		<td>Order Date</td>
		<td>Delivery Type</td>
		<td>Location</td>
		<td>Kilometers</td>
		<td>Total Price</td>
		<td>Status</td>
		<td>Process</td>
		</tr>
		<?php
		for($i = 0; $i < $rows; $i++){
		$row = $result->fetch_array(MYSQLI_ASSOC);
		?>

		<tr>
		<td><?php  echo $row['Order_Id']; ?></td>
		<td><?php  echo $row['Patient_Id']; ?></td>
		<td><?php  echo $row['Medication_Id']; ?></td>
	    <td><?php  echo $row['Quantity']; ?></td>
		<td><?php  echo $row['Order_Date']; ?></td>
	    <td><?php  echo $row['Delivery_type']; ?></td>
		<td><?php  echo $row['Location']; ?></td>
	    <td><?php  echo $row['Kilometers']; ?></td>
		<td><?php  echo $row['Total_Price']; ?></td>
		<td><?php  echo $row['Status']; ?></td>
		<td><a href="process_order.php?Order_Id=<?php  echo $row['Order_Id']; ?>" style="color: green" >Process</a> </td>
		</tr>
		
		<?php
	}
	?>
	</table><?php
	}	

?>
<p class="copy" ><a href="pharmasist_page.php">Back To Pharmacist Page</a></p>
