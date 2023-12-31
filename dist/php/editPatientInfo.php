<!doctype html>
<html lang="en">
  <head>
  <?php 
  $pagetitle = 'Edit Patient'; 
  require_once 'head.php';

  require_once 'functions.php';
  // get patient id from url
  $patientID = $_GET['id'];
  // function inside of functions.php
  $patient = getPatientForEdit($patientID);
  ?>
  </head>
      <body class="bg-gray-100">

    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-bold mb-4">Edit Patient Information</h1>
      
      <!-- Send the form info to updatePatientInfo.php to be checked -->
      <form action="updatePatientInfo.php" method="post" class="max-w-xl bg-white p-6 rounded-md shadow-md">

        <div class="grid grid-cols-2 gap-4 mb-4">
          <div>
            <label for="first_name" class="block text-sm font-semibold text-gray-600">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?= $patient['first_name'] ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring ring-black transition">
          </div>

          <div>
            <label for="last_name" class="block text-sm font-semibold text-gray-600">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?= $patient['last_name'] ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring ring-black transition">
          </div>

          <div>
            <label for="address" class="block text-sm font-semibold text-gray-600">Address:</label>
            <input type="text" id="address" name="address" value="<?= $patient['address'] ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring ring-black transition">
          </div>

          <div>
            <label for="house_number" class="block text-sm font-semibold text-gray-600">House Number:</label>
            <input type="text" id="house_number" name="house_number" value="<?= $patient['house_number'] ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring ring-black transition">
          </div>

          <div>
            <label for="postcode" class="block text-sm font-semibold text-gray-600">Postcode:</label>
            <input type="text" id="postcode" name="postcode" value="<?= $patient['postcode'] ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring ring-black transition">
          </div>

          <div>
            <label for="city" class="block text-sm font-semibold text-gray-600">City:</label>
            <input type="text" id="city" name="city" value="<?= $patient['city'] ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring ring-black transition">
          </div>

          <div>
            <label for="phone_number" class="block text-sm font-semibold text-gray-600">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="<?= $patient['phone_number'] ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring ring-black transition">
          </div>

          <div>
          <label for="active" class="block text-sm font-semibold text-gray-600">Active:</label>
          <input type="checkbox" id="active" name="active" <?= $patient['active'] ? 'checked' : '' ?> class="mt-1 p-2 transition-all">
        </div>

        </div>

        <div class="mt-12">
          <input type="submit" value="Save Changes" class="inline-block rounded bg-gray-400 px-4 py-2 text-lg font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring ring-black">
          <a href="./overzichtsPagina.php" class="mx-2 inline-block rounded bg-red-400 px-4 py-2 text-lg font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring ring-black">Cancel</a>
        </div>

        <input type="hidden" name="patient_id" value="<?= $patientID ?>">
        <!--Zodat updatepatientinfo.php weet welke patient geupdate moet worden-->

      </form>
    </div>

  </body>
</html>
