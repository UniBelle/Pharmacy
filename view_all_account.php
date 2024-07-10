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
    <title>Maluti Pharmacy Portal</title>
	 <link rel="stylesheet" href="maluti_pharmacy.css">
	  <script type="text/javascript" src="maluti.js"></script>
</head>
<body class="portal">
    <header class="header2">
	<h1 class="header2"> <img src="cross.jpg"/> MALUTI PHARMACY </h1>
	</header>
		<p class="p23">Select User Accounts You Want To View</p>
		<button onclick="patientAccounts()">PATIENT ACCOUNTS </button><br/>
		<button onclick="pharmasistAccounts()">PHARMASIST ACCOUNTS </button><br/>
		<button onclick="adminAccounts()">ADMIN ACCOUNTS </button>
		</fieldset>
		<br/><br/><br/><br/>
   
	   <p class="copy" ><a href="admin_page.php">Back To Admin Portal</a></p>
	   <hr>
	   <p class="copy" >This Site uses Cookies to enhance your experience. Read our: <br/><br/><br/>
				<p class="copy"><a href="#" >Cookies Policy here.</a></p>
				<p class="copy">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
</body>
</html>