<?php
session_start();
include('connection.php'); // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the PRN and student name from the POST data
    $PRN = $_POST["PRN"];
    $st_name = $_POST["student_name"];

    // Perform the rejection logic (e.g., store in rej_application table)
    // You might want to create a rej_application table in your database
    $rejectQuery = "INSERT INTO rej_application (PRN, st_name) VALUES ('$PRN', '$st_name')";
    mysqli_query($con, $rejectQuery);

    // Send a response (optional)
    echo "<script>window.alert('Application rejected successfully.')</script>";
} else {
    // Handle the case where the form is not submitted
    echo "Invalid request.";
}
if (isset($_POST['PRN']) && isset($_POST['st_name'])) {
    $PRN = $_POST['PRN'];
    $st_name = $_POST['st_name'];

    // Update the 'status' column to 'no' for the rejected application
    $updateQuery = "UPDATE student SET status = 'no' WHERE PRN = '$PRN'";
    mysqli_query($con, $updateQuery);

    // You can add additional logic or response handling if needed
    echo 'Application Rejected';
}
?>
