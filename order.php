<?php
  session_start();

  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "patient"){
      header("Location: index.html");
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>order form</title>
	<script type="text/javascript" src="maluti.js"></script>
    <link rel="stylesheet" href="maluti_pharmacy.css">
	</head>
	<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
	<form method="POST" action="" id="formOrder" >
	
	<h1 align="center">ORDER FORM</h1>
	<table align="right">
	   <tr>
	      <td>DATE</td>
		  <td><input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" disabled ></td>
	   </tr>
	   <tr>
	      <td>Order ID</td>
		  <?php
			//connect to the database
			$connection = mysqli_connect ('localhost','root','','malutipharmacy');
			if ($connection->connect_error)
			die(connection_error);

			$query="SELECT Order_Id FROM orders ORDER BY order_Id";
			$result= $connection->query($query);
			$row = $result->fetch_assoc();
			$orderid = $row['Order_Id'] + 1;
		  ?>
		  <td><input type="number" name="Oid" id="Oid" value="<?php echo $orderid; ?>" disabled /><td>
	   </tr>
	</table>
	<br/>
	<br/>
	<br/>
	<br/>
	<fieldset>
	
	    <legend align="center" text="bold">DETAILS</legend>
	<table>
	<tr>
		<td><label for="name"> Patient ID</label></td>
		<td><input type="number" name="Pid" id="Pid" value="<?php echo $_SESSION['user_id']; ?>" disabled /></td>
	</tr>
	</table>
	<fieldset>
	<legend align="center"> ORDER DETAILS </legend>

	<table align="center">
	<tr>
		<td></td>
		<td ><label for="Medication_ID">Medication ID</label>
		
		<td ><label for="qty"> Qty </label></td>
		<td><label for="Unit Price">Unit Price</label><td>
		
	</tr>
	<?php
		$query="SELECT * FROM medication";
		$result= $connection->query($query);
		$data = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		foreach($data as $row)
		?> 
	<tr>
		<td><img src="<?php echo $row['Image_name']; ?>" width="150px" height="150px"> </td>
	   <td><input type="number" name="medID" class="medID" value="<?php echo $row['Medication_Id']; ?>" disabled ></td>
	   <td><input type="number" name="qty" class="qty" id="qty" value="0"></td>
	   <td><input type="number" name="price" class="price" id="price" value="<?php echo $row['Price']; ?>" disabled></td>
	</tr>
		<?php
			
		
		?>

	</table>


	</fieldset>
	<fieldset>
		<legend align="center"> DELIVERY </legend>
		<input type="radio" name="delivery" value="Physical Collection"><label for="collection">Physical Collection</label>
		<input type="radio" name="delivery" value="Delivery"><label for="delivery">Delivery</label>
		<br/>
		<br/>
		<label for="location"> Location</label>
		<input type="text" name="location">
		<label for="km"> Kilometers </label>
		<input type="number" name="km" id="km">	
	</fieldset>
	<input type="submit" name="order" value="Order">
		</form>
	<p class="copy" ><a href="patient_page.php">Back To Patient Page</a></p>
	 <hr>
   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
			<p class="copy"><a href="#" >Cookies Policy here.</a></p>
			<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
</body>
</html>
