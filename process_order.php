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
	
   $oid = $_GET['Order_Id'];

	$query="SELECT * FROM orders WHERE Order_Id = $oid";
	
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
  
       <p>Order ID: <?php  echo  $oid;?></p>
       <?php $line = $result->fetch_assoc(); ?>
	   <p>Patient ID: <?php  echo $line['Patient_Id']; ?></p>
	   <p>Order Date: <?php  echo $line['Order_Date']; ?></p>
		<p>Location: <?php  echo $line['Location']; ?> </p>
		<p>Distance: <?php  echo $line['Kilometers']; ?>km </p>
		<form method="POST" action="process_order.php?Order_Id=<?php  echo $line['Order_Id']; ?>">
		<table border="1">
		<tr>

		<td>Medication_Id</td>
		<td>Quantity</td>
		<td>Order Date</td>
		<td>Delivery Type</td>
		<td>Status</td>
		</tr>
		<?php
    $result= $connection->query($query);
		for($i = 0; $i < $rows; $i++){
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$med= $row['Medication_Id'];
		$qty= $row['Quantity'];
		?>

		<tr>
		<td><input type="number" name="med" value="<?php  echo $row['Medication_Id']; ?>" disabled ></td>
	    <td><input type="number" name="quantity" value="<?php  echo $row['Quantity']; ?>" disabled ></td>
		<td><input type="date" name="date" value="<?php  echo $row['Order_Date']; ?>" disabled ></td>
	    <td><input type="text" name="delivery" value="<?php  echo $row['Delivery_type']; ?>" disabled ></td>
		<td><input type="text" name="status" value="<?php  echo $row['Status']; ?>"></td>
		</tr>
		
		<?php
		
	}
	?>

		<tr>
			<td colspan="4"><p>Total Price: <?php  echo $line['Total_Price']; ?> </p></td>
		</tr>
     <?php $sql2 = "UPDATE medication SET Quantity = Quantity - $qty WHERE Medication_Id = $med";
              $result = $connection->query($sql2);
	          if (!$result) die ($connection->error); ?>
		<tr>
		<td colspan="4"><input type="submit" value="Process" name="process"></td>
		</tr>
		</table><?php
		}	
        
?>


		<p class="copy" ><a href="pharmasist_page.php">Back To Pharmacist Page</a></p>


<?php
  if(isset($_POST['process']))
  {
	  $status=$_POST['status'];
	  
    $connection = mysqli_connect ('localhost','root','','malutipharmacy');
    if ($connection->connect_error)die(connection_error);
   
     $oid =$_GET['Order_Id'];
	 
     $sql = "UPDATE orders SET Status='$status' WHERE Order_Id=$oid";
     $results = $connection->query($sql);
	 if (!$results) 
	 {
		  ?><script type="text/javascript"> 
	          alert("ERROR WITH THE QUERY");
        	</script><?php
			 
    }
	else {
     		 ?><script type="text/javascript"> 
				alert("Order processed Successfully");
			   </script><?php
			  header("Location: view_all_orders.php?");
    }
  }

?>