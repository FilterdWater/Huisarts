<?php
require_once 'functions.php';

$patientID = $_GET['id'];

$patient = getPatientForEdit($patientID);
?>

<!doctype html>
<html lang="en">
  <head>
  <?php $pagetitle = 'Edit Patient'; require_once 'head.php'; ?>
  </head>
      <body class="bg-gray-100">

    <div class="container mx-auto p-4">
  <h1 class="text-2xl font-bold mb-4">Patient Information</h1>

  <div class="max-w-xl bg-white p-6 rounded-md shadow-md">

    <div class="grid grid-cols-2 gap-4 mb-4">
      <div>
        <label class="block text-sm font-semibold text-gray-600">First Name:</label>
        <p class="mt-1 p-2 w-full border rounded-md"><?= $patient['first_name'] ?></p>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-600">Last Name:</label>
        <p class="mt-1 p-2 w-full border rounded-md"><?= $patient['last_name'] ?></p>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-600">Address:</label>
        <p class="mt-1 p-2 w-full border rounded-md"><?= $patient['address'] ?></p>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-600">House Number:</label>
        <p class="mt-1 p-2 w-full border rounded-md"><?= $patient['house_number'] ?></p>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-600">Postcode:</label>
        <p class="mt-1 p-2 w-full border rounded-md"><?= $patient['postcode'] ?></p>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-600">City:</label>
        <p class="mt-1 p-2 w-full border rounded-md"><?= $patient['city'] ?></p>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-600">Phone Number:</label>
        <p class="mt-1 p-2 w-full border rounded-md"><?= $patient['phone_number'] ?></p>
      </div>

      <div>
          <label for="active" class="block text-sm font-semibold text-gray-600">Active:</label>
          <input type="checkbox" id="active" name="active" <?= $patient['active'] ? 'checked' : '' ?> class="mt-1 p-2" onclick="return false;">
        </div>

    </div>

    <div class="mt-12">
      <a href="./overzichtsPagina.php" class="inline-block rounded bg-red-400 px-4 py-2 text-lg font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-red-300">Back</a>
    </div>

  </div>
</div>


  </body>
</html>
