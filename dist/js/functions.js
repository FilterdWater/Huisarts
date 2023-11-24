// function to make the modal inside overzichtPagina.php functional
function openConfirmationModal(patientID, first_name) {
  // variabals to make dynamic text and button values
  var modal = document.getElementById("confirmationModal");
  var confirmationMessage = document.getElementById("confirmationMessage");
  var confirmButton = document.getElementById("confirmButton");

  // confirmationMessage based on patient
  confirmationMessage.textContent =
    "Are you sure you want to disable the patient " + first_name + "?";

  // onclick event for modal confirm button inside overzichtsPagina.php
  confirmButton.onclick = function () {
    disablePatientJavascript(patientID);
    document.getElementById(patientID).remove();
    modal.close();
  };

  modal.showModal();
}

// functionality for close modal button inside overzichtsPagina.php
function closeConfirmationModal() {
  var modal = document.getElementById("confirmationModal");
  modal.close();
}

// patientID paramater comes from openConfirmationModal() inside of function.js aka this file
function disablePatientJavascript(patientID) {
  // perform disabling patient action using AJAX
  var xhr = new XMLHttpRequest();

  // create & specify the request
  xhr.open("GET", "functions.php?action=disable&patientID=" + patientID, true);

  // send te request to the stated file
  xhr.send();
}

// Unfinished code
// Tried to update the DOM without reloading page didnt get it to work

// xhr.onreadystatechange = function () {
//   if (xhr.status == 200) {
//     var response = JSON.parse(xhr.responseText);

//     if (response.success) {
//       // Update table
//       // removeRow(patientID);
//     } else {
//       console.error("Error:", xhr.status, xhr.statusText);
//     }
//   }
// };

// function removeRow(Paramater) {
//   var rowToRemove = document.getElementById("patientRow_" + Paramater);
//   if (rowToRemove) {
//     rowToRemove.parentNode.removeChild(rowToRemove);
//   } else {
//     console.error("Error: Row not found for patientID " + Paramater);
//   }
// }

// console.log(xhr.responseText);
