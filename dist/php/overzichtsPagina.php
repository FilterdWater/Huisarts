<!doctype html>
<html lang="en">
  <head>
    <?php $pagetitle = 'Home'; require_once 'head.php'; require_once 'functions.php';?>
    <script src="../js/functions.js"></script>
  </head>
  <body>
    
      <table class="w-full bg-white border border-gray-300">
      <thead>
          <tr class="bg-gray-200">
            <th class="py-2 px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-400 ps-1 rounded" type="text" id="search-input" placeholder="Voornaam"></th>
            <th class="py-2 px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-400 ps-1 rounded" type="text" id="search-input" placeholder="Achternaam"></th>
            <th class="py-2 px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-400 ps-1 rounded" type="text" id="search-input" placeholder="Adres"></th>
            <th class="py-2 px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-400 ps-1 rounded" type="text" id="search-input" placeholder="Huisnummer"></th>
            <th class="py-2 px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-400 ps-1 rounded" type="text" id="search-input" placeholder="Postcode"></th>
            <th class="py-2 px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-400 ps-1 rounded" type="text" id="search-input" placeholder="Plaats"></th>
            <th class="py-2 px-4 border"><input class="m-0 w-36 bg-gray-100 placeholder:text-gray-400 ps-1 rounded" type="text" id="search-input" placeholder="Telefoonnummer"></th>
            <th class="py-2 px-4 border">Admin opties</th>
          </tr>
        </thead>
        <tbody>
          <?php

            $conn = connectToDatabase();

            $sql = "SELECT * FROM patienten";
            $stmt = $conn->query($sql);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               echo "<tr class='hover:bg-gray-100 cursor-pointer' onclick=\"window.location='patientInfo.php?id=" . $row["patientID"] . "';\">";
echo "<td class='py-2 px-4 border'>" . $row["first_name"] . "</td>";
echo "<td class='py-2 px-4 border'>" . $row["last_name"] . "</td>";
echo "<td class='py-2 px-4 border'>" . $row["address"] . "</td>";
echo "<td class='py-2 px-4 border'>" . $row["house_number"] . "</td>";
echo "<td class='py-2 px-4 border'>" . $row["postcode"] . "</td>";
echo "<td class='py-2 px-4 border'>" . $row["city"] . "</td>";
echo "<td class='py-2 px-4 border'>" . $row["phone_number"] . "</td>";
echo "<td class='pl-2 border'>";
echo "<a class='inline-block rounded bg-blue-400 px-2 ml-2 py-1 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-blue-300' href='#" . $row["patientID"] . "'>View</a>";
echo "<a class='inline-block rounded bg-gray-400 px-2  ml-2 py-1 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-gray-300' href='editPatientInfo.php?id=" . $row["patientID"] . "'>Edit</a>";
echo "<a class='inline-block rounded bg-red-400 px-2 ml-2 py-1 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-red-300' href='#" . $row["patientID"] . "'>Disable</a>";
echo "</td>";
echo "</tr>";

            }

            // Sluit de database connectie
            $conn = null;
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html> 
