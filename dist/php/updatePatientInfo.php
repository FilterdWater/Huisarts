<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patientID = $_POST['patient_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $house_number = $_POST['house_number'];
    $postcode = $_POST['postcode'];
    $city = $_POST['city'];
    $phone_number = $_POST['phone_number'];
    $isActive = isset($_POST['active']) ? 1 : 0;

    // Assuming you have a function like updatePatient in functions.php
    updatePatient($patientID, $first_name, $last_name, $address, $house_number, $postcode, $city, $phone_number, $isActive);

    // Redirect to the overview page or wherever you want after updating
    header('Location: ./overzichtsPagina.php');
    exit();
} else {
    // Handle the case when the form is not submitted via POST method
    // You might want to redirect the user to the edit page or show an error message
    header('Location: ./editPatient.php');
    exit();
}
?>
