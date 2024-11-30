<?php
session_start(); // Start the session

// Unset all session variables
session_unset(); // Clear all session variables

// Destroy the session
session_destroy();

// Redirect to the login page or home page
// Make sure to use a header redirect before any output
header("Location: index.php");
exit; // Ensure the script stops executing after the redirect

// Optional: Display a logout message if you want to use it 
// (move this part to a separate page if needed)
?>
