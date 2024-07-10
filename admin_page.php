<?php
  session_start();

  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "admin"){
      header("Location: index.html");
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>adminlogin</title>
    <link rel="stylesheet" href="maluti_pharmacy.css" />
    <script type="text/javascript" src="maluti.js"></script>
  </head>
  <body class="portal">
    <header>
      <h1 class="header2"><img src="cross.jpg" /> MALUTI PHARMACY</h1>
      <nav>
        <ul>
          <li>
            <a href="#">PHARMACISTS</a>
            <ul>
              <li><a href="view_all_pharmacists.php">VIEW ALL PHARMACIST</a></li>
              <li><a href="create_pharmacist.php">ADD NEW PHARMASIST</a></li>
              <li>
                <a href="delete_pharmasist.php">DELETE/BLOCK PHARMASIST</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">USERS</a>
            <ul>
              <li><a href="view_all_account.php">VIEW ALL USERS</a></li>
            </ul>
          </li>
          <li>
            <a href="#">PAGES</a>

            <ul>
              <li><a href="#">COOKIES POLICY</a></li>
              <li><a href="about_us.html">ABOUT US</a></li>
              <li><a href="index.html">HOMEPAGE</a></li>
            </ul>
          </li>
          <li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </nav>
    </header>
    <h4>WELCOME TO ADMIN PORTAL</h4>
    <hr />
    <table align="center">
      <tr>
        <td align="center">
          <a href="#"
            ><img src="login.png" class="img_login" /><br />MY PROFILE</a
          >
        </td>
        <td align="center">
          <a href="view_all_account.php"
            ><img src="users.png" class="img_login" /><br />All PROFILES</a
          >
        </td>
      </tr>
      <tr>
        <td align="center">
          <a href="create_pharmacist.php"
            ><img src="add.jpg" class="img_login" /><br />ADD PHARMASIST</a
          >
        </td>
        <td align="center">
          <a href="delete_pharmasist.php"
            ><img src="block.png" class="img_login" /><br />BLOCK PHARMACIST</a
          >
        </td>
      </tr>
    </table>
    <hr />
    <table align="center">
      <tr>
        <td align="center">
          <a href="#"
            ><img src="cookies.png" class="img_login" /><br />COOKIES</a
          >
        </td>
        <td align="center">
          <a href="#"><img src="pages.jpg" class="img_login" /><br />PAGES</a>
        </td>
      </tr>
      <tr>
        <td align="center" colspan="2">
          <a href="logout.php"><img src="logout.png" class="img_login" /><br />LOGOUT</a>
        </td>
      </tr>
    </table>
    <footer>
      <hr />

      <p class="330">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
    </footer>
  </body>
</html>
