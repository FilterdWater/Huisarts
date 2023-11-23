// Search input functionaliteit
// Credit: https://www.youtube.com/watch?v=qp7PdguA0Vg

// wait for everything to load before executing
document.addEventListener("DOMContentLoaded", () => {
  // Select all the search inputs based on their id
  document
    .querySelectorAll(
      "#search-input-Voornaam, #search-input-Achternaam, #search-input-Adres, #search-input-Huisnummer, #search-input-Postcode, #search-input-Plaats, #search-input-Telefoonnummer",
    )
    .forEach((inputField) => {
      const tableRows = inputField
        .closest("table")
        .querySelectorAll("tbody > tr");
      const headerCell = inputField.closest("th");
      const otherHeaderCells = headerCell.closest("tr").children;
      const columnIndex = Array.from(otherHeaderCells).indexOf(headerCell);
      const searchableCells = Array.from(tableRows).map(
        (row) => row.querySelectorAll("td")[columnIndex],
      );

      inputField.addEventListener("input", () => {
        const searchQuery = inputField.value.toLowerCase();

        for (const tableCell of searchableCells) {
          const row = tableCell.closest("tr");
          const value = tableCell.textContent.toLowerCase().replace(",", "");

          row.style.visibility = null;

          if (value.search(searchQuery) === -1) {
            row.style.visibility = "collapse";
          }
        }
      });
    });
});

// function to make the modal inside overzichtPagina.php function
function openConfirmationModal(patientID, first_name) {
  // variabals to make dynamic text and button functionality
  var modal = document.getElementById("confirmationModal");
  var confirmationMessage = document.getElementById("confirmationMessage");
  var confirmButton = document.getElementById("confirmButton");

  // confirmationMessage based on patient
  confirmationMessage.textContent =
    "Are you sure you want to disable the patient " + first_name + "?";

  // onclick event for modal confirm button inside of overzichtsPagina.php
  confirmButton.onclick = function () {
    disablePatientJavascript(patientID);
    modal.close();
  };

  modal.showModal();
}

// functionality for close modal button inside overzichtsPagina.php
function closeConfirmationModal() {
  var modal = document.getElementById("confirmationModal");
  modal.close();
}

// patientID paramater comes from openConfirmationModal() inside of this file
function disablePatientJavascript(patientID) {
  // perform disabling patient action using AJAX
  var xhr = new XMLHttpRequest();

  // create & specify the request
  xhr.open(
    "GET",
    "disablePatient.php?action=disable&patientID=" + patientID,
    true,
  );

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
