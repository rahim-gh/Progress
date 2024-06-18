const table = document.getElementById("students_table");
const headers = table.querySelectorAll("th");
const rows = table.querySelectorAll("tbody tr");

// add event listeners to each header cell
headers.forEach((header, index) => {
    header.addEventListener("click", () => {
        sortTable(index);
    });
});

function sortTable(columnIndex) {
    const enumSortOrder = {
        '1 Licence': 1,
        '2 Licence': 2,
        '3 Licence': 3,
        '1 Master': 4,
        '2 Master': 5,
        // add more enum values as needed
    };

    const rowsArray = Array.from(rows);
    const sortedRows = rowsArray.sort((a, b) => {
        const aValue = a.cells[columnIndex].textContent;
        const bValue = b.cells[columnIndex].textContent;

        if (enumSortOrder[aValue] && enumSortOrder[bValue]) {
            return enumSortOrder[aValue] - enumSortOrder[bValue];
        } else {
            // if the value is not in the enumSortOrder object, sort alphabetically
            if (aValue < bValue) return -1;
            if (aValue > bValue) return 1;
            return 0;
        }
    });

    const columnValues = rowsArray.map((row) => row.cells[columnIndex].textContent);
    const allValuesIdentical = columnValues.every((value) => value === columnValues[0]);

    if (allValuesIdentical) {
        return;
    }

    // toggle the sort direction
    const header = headers[columnIndex];
    if (header.classList.contains("asc")) {
        header.classList.remove("asc");
        header.classList.add("desc");
        sortedRows.reverse();
    } else {
        header.classList.remove("desc");
        header.classList.add("asc");
    }

    // update the table with the sorted rows
    table.tBodies[0].innerHTML = "";
    sortedRows.forEach((row) => {
        table.tBodies[0].appendChild(row);
    });
}