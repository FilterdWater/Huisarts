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
