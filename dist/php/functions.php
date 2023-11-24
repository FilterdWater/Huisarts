<?php
function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "huisartsdb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
}

// this function is used in editPatientInfo.php
// its used to get the info of a patient based on id
function getPatientForEdit($patientID) {
    // Call the function to connect to the database
    $conn = connectToDatabase();

    // Fetch patient information from the database
    $sql = "SELECT * FROM patienten WHERE patientID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $patientID);
    $stmt->execute();
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

    // close the database connection
    $conn = null;

    // return values
    return $patient;
}

function updatePatient($patientID, $newFirstName, $newLastName, $newAddress, $newHouseNumber, $newPostcode, $newCity, $newPhoneNumber, $isActive) {
    // call the function to connect to the database
    $conn = connectToDatabase();

    // update patient information in the database
    $sql = "UPDATE patienten SET 
            first_name = :first_name,
            last_name = :last_name,
            address = :address,
            house_number = :house_number,
            postcode = :postcode,
            city = :city,
            phone_number = :phone_number,
            active = :active
            WHERE patientID = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':first_name', $newFirstName);
    $stmt->bindParam(':last_name', $newLastName);
    $stmt->bindParam(':address', $newAddress);
    $stmt->bindParam(':house_number', $newHouseNumber);
    $stmt->bindParam(':postcode', $newPostcode);
    $stmt->bindParam(':city', $newCity);
    $stmt->bindParam(':phone_number', $newPhoneNumber);
    $stmt->bindParam(':active', $isActive, PDO::PARAM_INT); // use PDO::PARAM_INT for boolean values (chatgpt)
    $stmt->bindParam(':id', $patientID);
    $stmt->execute();

    // close the database connection
    $conn = null;
}



// Values are obtained from functions.js disablePatientJavascript
// didnt know wether to put it inside of a file called disablePatient.php or in here so i did both
if (isset($_GET['action']) && $_GET['action'] === 'disable') {
        if (isset($_GET['patientID'])) {
            $patientID = $_GET['patientID'];
            disablePatientPHP($patientID);

        } else {
            // in this case nothing if 'action' isn't set, it's else isnt needed
            // its just here for when i copy my own code
        }
    }

// patientID value comes from the function disablePatientJavascript() inside function.js
function disablePatientPHP($patientID) {

    // database connection
    $conn = connectToDatabase();

    // make sql query
    $sql = "UPDATE patienten SET active = 0 WHERE patientID = :patientID";
    
    // execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':patientID', $patientID, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Close the database connection
    $conn = null;
}


?>
