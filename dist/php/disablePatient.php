<?php
require_once 'functions.php';

if (isset($_GET['action']) && $_GET['action'] === 'disable') {
        if (isset($_GET['patientID'])) {
            $patientID = $_GET['patientID'];
            disablePatientPHP($patientID);

        } else {
            // in this case nothing if 'action' isn't set, it's else isnt needed
            // its just here for when i copy my own code
        }
    }

?>