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
    <title>patientlogin</title>
    <link rel="stylesheet" href="maluti_pharmacy.css" />
    <script type="text/javascript" src="medical pharmacy.js"></script>
  </head>
  <body class="portal">
    <header>
      <h1 class="header2"><img src="cross.jpg" /> MALUTI PHARMACY</h1>
      <nav>
        <ul>
          <li><a href="order.php">ORDER</a></li>
          <li>
            <a href="#">CONSULTATION</a>
            <ul>
              <li>
                <a href="consultation_form.php">FILL CONSULTATION FORM</a>
              </li>
              <li><a href="view_consult_form.php">VIEW RESPONSE</a></li>
            </ul>
          </li>
          <li><a href="individual_medical_record.php">MY MEDICAL RECORDS</a></li>
          <li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </nav>
    </header>
    <h4>WELCOME TO PATIENT PORTAL</h4>
    <form method="POST" action="search.php" align="center">
      <input type="text" placeholder="SEARCH..." name="name" />
      <input type="submit" value="Go" name="search" />
    </form>
    <hr />
    <table align="center">
      <tr>
        <th>NEW IN STOCK</th>
      </tr>
      <tr>
        <td>
        <a href="order.php"><img src="aspirin.jpg" /></a>
        <a href="order.php"> <img src="tonsari.jpg" /></a>
        <a href="order.php"><img src="vivitrol.jpg"/></a>
            
           
            
        </td>
      </tr>
    </table>
    <hr />
    <footer>
      <hr />

      <p class="330">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
    </footer>
  </body>
</html>
