<?php
  session_start();
  
  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "pharmacist"){

      header("Location: index.html");
    }
  }
?>


<!doctype html>
<html>
<head>
    <title>pharmacistpage</title>
	 <link rel="stylesheet" href="maluti_pharmacy.css">
	  <script type="text/javascript" src="medical pharmacy.js"></script>
</head>
<body class="portal">
        <header>
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
	<form action="upload_medication.php" method="POST" enctype="multipart/form-data">
	<fieldset>
	<label for="medicationID">Medication ID</label><br/>
	<input type="number" name="medID" >
	</fieldset>
	<fieldset>
	 <label for="medicationID">Upload Medication Image Here:</label><br/>
	<input type="file" name="image">
	</fieldset>
	<fieldset>
	<label for="medicationID">Medication Name</label><br/>
	<input type="text" name="name">
	</fieldset>
	<fieldset>
	<label for="price">Price</label><br/>
	<input type="number" name="price">
	</fieldset>
	<fieldset>
	<label for="price">Quantity</label><br/>
	<input type="number" name="qty">
	</fieldset>
	<input type="submit" value="upload" name="upload">
	</form>

	<p class="copy" ><a href="pharmasist_page.php">Back To Pharmacist Page</a></p>
</body>
</html>
<?php
if(isset($_POST['upload']))
{
	//receive values
$medID=$_POST['medID'];
$name=$_POST['name'];
$price=$_POST['price'];
$qty=$_POST['qty'];
 //receive image name
$img = $_FILES['image']['name'];

// accessing temporary file in phpmyadmin
$temp_name = $_FILES['image']['tmp_name'];

//accessing root folder in xammp to upload
$dir = "medication\\";
//checking if the image already exist 
if($img != "")
{
	if(file_exists($dir.$img))
	{
		$img = time()."-".$img;		
	}
	$fdir = $dir.$img;
	move_uploaded_file($temp_name,$fdir);
}
//connect to the database
$connection = mysqli_connect ('localhost','root','','malutipharmacy');
if ($connection->connect_error)
 die(connection_error);

$query="INSERT INTO medication VALUES ('$medID','$img','$name','$price','$qty')";
$result= $connection->query($query);
if(!$result)
{
    ?><script type="text/javascript"> 
	    alert("ERROR WITH THE QUERY");
	</script><?php
}
else
{
	?><script type="text/javascript"> 
	    alert("Medication Successfully Added");
	</script><?php
}
}
?>