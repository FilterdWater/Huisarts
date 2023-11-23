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

    // call updatePatient() inside functions.php
    updatePatient($patientID, $first_name, $last_name, $address, $house_number, $postcode, $city, $phone_number, $isActive);

    // redirect to overzichtsPagina.php
    header('Location: ./overzichtsPagina.php');
    exit();
} else {
    // if for some reason it didnt work direct back
    header('Location: ./editPatient.php');
    exit();
}
?>
