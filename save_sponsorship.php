<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve values from the query parameters
    $prn = $_GET['prn'];
    $amount = $_GET['amount'];
    $donorId = $_GET['donor_id'];

    // Update the sponsor_by table with the new values
    $updateQuery = "UPDATE sponsor_by SET Amount = '$amount', donor_id = '$donorId' WHERE PRN = '$prn'";
    
    if (mysqli_query($con, $updateQuery)) {
        // Redirect to a_scholarship.php after successful update
        header("Location: a_scholarship.php");
        exit(); // Make sure to exit after the header to prevent further execution
    } else {
        echo "Error updating sponsorship details: " . mysqli_error($con);
    }
} else {
    echo "Invalid request method.";
}

// You can add additional code or redirection as needed.
?>
