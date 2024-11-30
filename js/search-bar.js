document.getElementById('searchInput').addEventListener('input', function() {
    var input = this.value.toLowerCase(); // Get search input
    var rows = document.querySelectorAll('#table-body tr'); // Select all table rows

    // Reset any previous highlights
    rows.forEach(function(row) {
        row.style.backgroundColor = ''; // Reset row background color
        row.querySelectorAll('td').forEach(function(cell) {
            cell.style.backgroundColor = ''; // Reset cell background color
        });
    });

    // Loop through rows to find matches
    rows.forEach(function(row) {
        var cells = row.querySelectorAll('td'); // Get all table cells in the row
        var found = false; // Flag to track if search term is found

        cells.forEach(function(cell) {
            if (cell.innerText.toLowerCase().includes(input)) {
                found = true; // Set found to true if a match is found
                cell.style.backgroundColor = 'yellow'; // Highlight matching cell
            }
        });

        // Scroll to the first matching row
        if (found) {
            row.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });
});
