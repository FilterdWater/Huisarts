<!doctype html>
<html lang="en">
  <?php $pagetitle = 'Home'; require_once 'head.php'; require_once 'functions.php';?>
  <body>
    <div class="flow-root">
      <table class="min-w-full bg-white border border-gray-300">
      <thead>
          <tr class="bg-gray-200">
            <th class="py-2 px-4 border-r">Voornaam</th>
            <th class="py-2 px-4 border-r">Achternaam</th>
            <th class="py-2 px-4 border-r">Adres</th>
            <th class="py-2 px-4 border-r">Huisnummer</th>
            <th class="py-2 px-4 border-r">Postcode</th>
            <th class="py-2 px-4 border-r">Plaats</th>
            <th class="py-2 px-4">Telefoonnummer</th>
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
                echo "<td class='py-2 px-4 border'> <a href='edit_patient_info.php?id=" . $row["patientID"] . "'>Edit</a></td>";
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
