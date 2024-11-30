$.ajax({
    url: 'delete-record.php', // Change this if your file is in a subdirectory, like 'backend/delete-record.php'
    type: 'POST',
    data: { id: id },
    success: function(response) {
        response = JSON.parse(response);
        if (response.success) {
            console.log('Record deleted successfully');
            row.remove();
        } else {
            alert('Error deleting record: ' + response.message);
        }
    },
    error: function(xhr, status, error) {
        console.error('Error deleting record:', error);
    }
});
