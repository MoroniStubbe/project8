// Function to extract row data into an object
function getRowData(row) {
    const rowData = {};

    // Get all the cells in the row
    const cells = row.querySelectorAll('td');

    // Get the table headers
    const headers = row.closest('table').querySelectorAll('thead th');

    // Loop through the cells and map them to headers
    cells.forEach((cell, index) => {
        // Only consider the data cells (skip edit/delete buttons)
        if (index < headers.length - 2) { // Adjust based on your layout
            const header = headers[index].innerText;
            rowData[header] = cell.innerText; // Set the header as key and cell value as value
        }
    });

    return rowData; // Return the constructed object
}


document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Define the URL of the resource you're updating
            var url = "/destroy/"; // Replace with your actual endpoint and product ID

            // Configure the request: method (PUT) and URL
            xhr.open("POST", url, true);

            // Set the request headers (optional, but necessary for sending JSON)
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

            // Get the parent row of the clicked button
            const row = this.closest('tr');

            // Create the data object to send with the PUT request
            var updatedProductData = getRowData(row);

            // Convert the JavaScript object to a JSON string
            var jsonData = JSON.stringify(updatedProductData);

            // Send the PUT request with the data
            xhr.send(jsonData);
        });
    });
});