<!doctype html>
<html lang="en">
  <head>
    <?php $pagetitle = 'huisArts | Home'; 
    require_once 'head.php';

    require_once 'functions.php';
    ?>
    <script src="../js/functions.js"></script>
    <script src="../js/inputFieldFunctionality.js"></script>
  </head>
  <body>
    
      <table class="w-full bg-white border">
        <!-- Table Header -->
      <thead>
          <!-- input fields for each column -->
          <tr class="bg-gray-400">
            <th class="p-0 xl:p-2 pl-2 xl:px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-300  ps-1 rounded focus:outline-none focus:ring ring-black transition" type="text" id="search-input-Voornaam" placeholder="Voornaam"></th>
            <th class="p-0 xl:p-2 pl-2 xl:px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-300  ps-1 rounded focus:outline-none focus:ring ring-black transition" type="text" id="search-input-Achternaam" placeholder="Achternaam"></th>
            <th class="p-0 xl:p-2 pl-2 xl:px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-300  ps-1 rounded focus:outline-none focus:ring ring-black transition" type="text" id="search-input-Adres" placeholder="Adres"></th>
            <th class="p-0 xl:p-2 pl-2 xl:px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-300  ps-1 rounded focus:outline-none focus:ring ring-black transition" type="text" id="search-input-Huisnummer" placeholder="Huisnummer"></th>
            <th class="p-0 xl:p-2 pl-2 xl:px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-300  ps-1 rounded focus:outline-none focus:ring ring-black transition" type="text" id="search-input-Postcode" placeholder="Postcode"></th>
            <th class="p-0 xl:p-2 pl-2 xl:px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-300  ps-1 rounded focus:outline-none focus:ring ring-black transition" type="text" id="search-input-Plaats" placeholder="Plaats"></th>
            <th class="p-0 xl:p-2 pl-2 xl:px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-300  ps-1 rounded focus:outline-none focus:ring ring-black transition" type="text" id="search-input-Telefoonnummer" placeholder="Telefoonnummer"></th>
            <th class="p-0 xl:p-2 pl-2 xl:px-4 border">Admin opties</th>
          </tr>
        </thead>
        <tbody>

          <?php
            // connect to database using functions.php
            $conn = connectToDatabase();

            // mysql query to select all active patients
            $sql = "SELECT * FROM patienten WHERE active = 1";
            $stmt = $conn->query($sql);

            // foreach row inside the patienten table create a table row
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              // Patient Info TableRow
              echo "<tr class='hover:bg-gray-100' id='". $row["patientID"] ."' >";
              echo "<td class='p-0 xl:p-2 pl-2 xl:px-4 border'>" . $row["first_name"] . "</td>";
              echo "<td class='p-0 xl:p-2 pl-2 xl:px-4 border'>" . $row["last_name"] . "</td>";
              echo "<td class='p-0 xl:p-2 pl-2 xl:px-4 border'>" . $row["address"] . "</td>";
              echo "<td class='p-0 xl:p-2 pl-2 xl:px-4 border'>" . $row["house_number"] . "</td>";
              echo "<td class='p-0 xl:p-2 pl-2 xl:px-4 border'>" . $row["postcode"] . "</td>";
              echo "<td class='p-0 xl:p-2 pl-2 xl:px-4 border'>" . $row["city"] . "</td>";
              echo "<td class='p-0 xl:p-2 pl-2 xl:px-4 border'>" . $row["phone_number"] . "</td>";
              echo "<td class='pl-2 border'>";
              
              // View Patient Button
              echo "<a class='inline-block rounded bg-blue-400 px-2 ml-2 py-1 text-sm font-medium text-white hover:scale-110 hover:shadow-xl focus:outline-none focus:ring ring-black active:bg-blue-300' href='patientInfo.php?id=" . $row["patientID"] . "'>View</a>";
              
              // Edit Patient Button
              echo "<a class='inline-block rounded bg-gray-400 px-2  ml-2 py-1 text-sm font-medium text-white hover:scale-110 hover:shadow-xl focus:outline-none focus:ring ring-black active:bg-gray-300' href='editPatientInfo.php?id=" . $row["patientID"] . "'>Edit</a>";

              // Modal Button
              echo "<button 
              class='inline-block rounded bg-red-400 px-2 ml-2 py-1 text-sm font-medium text-white hover:scale-110 hover:shadow-xl focus:outline-none focus:ring ring-black active:bg-red-300' 
              onclick=\"openConfirmationModal('" . $row["patientID"] . "', '" . $row["first_name"] . "')\"
              >
              Disable
              </button>";

            }

            // Close database Connection
            $conn = null;
          ?>

            <!-- The Modal -->
            <dialog id='confirmationModal' class='bg-white p-6 rounded-md shadow-md'>
            <h2 class='text-lg font-semibold mb-4'>Confirmation</h2>
            <p id='confirmationMessage' class='mb-4'></p>
            <button id='confirmButton' class='bg-red-500 transition focus:outline-none focus:ring ring-black text-white px-4 py-2 rounded-md mr-2'>Yes</button>
            <button class='bg-gray-300 text-gray-800 transition focus:outline-none focus:ring ring-black px-4 py-2 rounded-md' onclick='closeConfirmationModal()'>No</button>
            </dialog>

        </tbody>
      </table>
    </div>
  </body>
</html> 
