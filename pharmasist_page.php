<?php
  session_start();
  
  if(!isset($_SESSION['login'] )){
    if($_SESSION['user_position'] != "pharmacist"){

      header("Location: index.html");
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>pharmacistpage</title>
    <link rel="stylesheet" href="maluti_pharmacy.css" />
    <script type="text/javascript" src="maluti.js"></script>
  </head>
  <body class="portal">
    <header>
      <h1 class="header2"><img src="cross.jpg" /> MALUTI PHARMACY</h1>
      <nav>
        <ul>
          <li>
            <a href="#">CONSULTATION</a>
            <ul>
              <li>
                <a href="view_all_consultations.php"
                  >VIEW ALL CONSULTATIONS FORM</a
                >
              </li>
              <li>
                <a href="update_consult_form.php">RESPOND CONSULTATION FORMS</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">MEDICATIONS</a>
            <ul>
              <li><a href="upload_medication.php">UPLOAD MEDICATION</a></li>
              <li><a href="delete_medication.php">DELETE MEDICATION</a></li>
              <li><a href="retrieve_medication.php">RETRIEVE MEDICATION</a></li>
              <li><a href="update_medication.php">UPDATE MEDICATION</a></li>
            </ul>
          </li>
          <li><a href="view_all_orders.php">ORDER</a> </li>
          <li>
            <a href="#">PATIENT</a>
            <ul>
              <li><a href="create_patient.php">ADD NEW PATIENT</a></li>
              <li><a href="delete_patient.php">DELETE PATIENT</a></li>
              <li><a href="retrieve_patient.php">RETRIEVE PATIENT</a></li>
            </ul>
          </li>
          <li>
            <a href="#">MEDICAL RECORDS</a>

            <ul>
              <li>
                <a href="add_new_medical_record.php">ADD NEW MEDICAL RECORDS</a>
                <a href="retrieve_medical_records.php">RETRIEVE MEDICAL RECORDS</a>
                <a href="update_medical.php">UPDATE MEDICAL RECORDS</a>
			  </li>
            </ul>
          </li>
          <li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </nav>
    </header>
    <h4>WELCOME TO PHARMACIST PORTAL</h4>
    <hr />
    <table align="center">
      <tr>
        <td align="center">
          <a href="view_all_consultations.php"
            ><img
              src="consultation.png"
              class="img_login"
            /><br />CONSULTATION</a
          >
        </td>
        <td align="center">
          <a href="upload_medication.php"
            ><img src="medication.jpg" class="img_login" /><br />MEDICATION</a
          >
        </td>
      </tr>
      <tr>
        <td align="center">
          <a href="view_all_orders.php"><img src="order.jpg" class="img_login" /><br />ORDERS</a>
        </td>
        <td align="center">
          <a href="viewAll_Patients.php"
            ><img src="patient.jpg" class="img_login" /><br />PATIENT</a
          >
        </td>
      </tr>
    </table>
    <hr />
    <table align="center">
      <tr>
        <td align="center">
          <a href="addNewMedicalRecord.php"
            ><img src="medical.png" class="img_login" /><br />MEDICAL RECORDS</a
          >
        </td>
      </tr>
    </table>
    <footer>
      <hr />

      <p class="330">&copy;2023 Maluti Pharmacy Lesotho. All Rights Reserved</p>
    </footer>
  </body>
</html>
