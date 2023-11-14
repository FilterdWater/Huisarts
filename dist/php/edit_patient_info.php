<?php
require_once 'functions.php';

// Retrieve patientID from the URL
$patientID = $_GET['id'];

// Get patient information for editing
$patient = getPatientForEdit($patientID);
?>

<!doctype html>
<html lang="en">
  <?php $pagetitle = 'Edit Patient'; require_once 'head.php'; ?>
  <body>
    <h1>Edit Patient Information</h1>

    <form action="update_patient_info.php" method="post">
      <!-- Display patient information in input fields for editing -->
      <label for="first_name">First Name:</label>
      <input type="text" id="first_name" name="first_name" value="<?= $patient['first_name'] ?>">

      <label for="last_name">Last Name:</label>
      <input type="text" id="last_name" name="last_name" value="<?= $patient['last_name'] ?>">

      <label for="address">Address:</label>
      <input type="text" id="address" name="address" value="<?= $patient['address'] ?>">

      <label for="house_number">House Number:</label>
      <input type="text" id="house_number" name="house_number" value="<?= $patient['house_number'] ?>">

      <label for="postcode">Postcode:</label>
      <input type="text" id="postcode" name="postcode" value="<?= $patient['postcode'] ?>">

      <label for="city">City:</label>
      <input type="text" id="city" name="city" value="<?= $patient['city'] ?>">

      <label for="phone_number">Phone Number:</label>
      <input type="text" id="phone_number" name="phone_number" value="<?= $patient['phone_number'] ?>">


      <input type="submit" value="Save Changes">
    </form>
  </body>
</html>
