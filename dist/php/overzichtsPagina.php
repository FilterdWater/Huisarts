<!doctype html>
<html lang="en">
  <?php $pagetitle = 'Home'; require_once 'head.php'; require_once 'functions.php';?>
  <body>
    <div>
      <table class="min-w-full bg-white border border-gray-300">
      <thead>
          <tr class="bg-gray-200">
            <th class="py-2 px-4 border">Voornaam</th>
            <th class="py-2 px-4 border">Achternaam</th>
            <th class="py-2 px-4 border">Adres</th>
            <th class="py-2 px-4 border">Huisnummer</th>
            <th class="py-2 px-4 border">Postcode</th>
            <th class="py-2 px-4 border">Plaats</th>
            <th class="py-2 px-4 border">Telefoonnummer</th>
            <th class="py-2 px-4 border">Admin opties</th>
          </tr>
        </thead>
        <tbody>
          <?php

            // Call the function to connect to the database
            $conn = connectToDatabase();

            // Fetch data from the database using PDO
            $sql = "SELECT * FROM patienten";
            $stmt = $conn->query($sql);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td class='py-2 px-4 border'>" . $row["first_name"] . "</td>";
                echo "<td class='py-2 px-4 border'>" . $row["last_name"] . "</td>";
                echo "<td class='py-2 px-4 border'>" . $row["address"] . "</td>";
                echo "<td class='py-2 px-4 border'>" . $row["house_number"] . "</td>";
                echo "<td class='py-2 px-4 border'>" . $row["postcode"] . "</td>";
                echo "<td class='py-2 px-4 border'>" . $row["city"] . "</td>";
                echo "<td class='py-2 px-4 border'>" . $row["phone_number"] . "</td>";
                echo "<td class='pl-2 border'> <a class='inline-block rounded bg-gray-400 px-2 py-1 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-gray-300' href='editPatientInfo.php?id=" . $row["patientID"] . "'>Edit</a>";
                echo " <a class='inline-block rounded bg-red-400 px-2 mx-2 py-1 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-red-300' href='editPatientInfo.php?id=" . $row["patientID"] . "'>Remove patient from list</a></td>";

                echo "</tr>";
            }

            // Close the database connection
            $conn = null;
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html> 
