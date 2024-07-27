<?php
session_start();
include('connection.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['PRN'])) {
    $PRN = $_POST['PRN'];

    // Update the status in the student table
    $updateQuery = "UPDATE student SET status = 'yes' WHERE PRN = ?";
    $stmt1 = mysqli_prepare($con, $updateQuery);
    mysqli_stmt_bind_param($stmt1, "s", $PRN);
    $result = mysqli_stmt_execute($stmt1);

    if ($result) {
        // Insert PRN into the sponsor_by table
        $insertQuery = "INSERT INTO sponsor_by (PRN) VALUES (?)";
        $stmt2 = mysqli_prepare($con, $insertQuery);
        mysqli_stmt_bind_param($stmt2, "s", $PRN);
        $insertResult = mysqli_stmt_execute($stmt2);

        if ($insertResult) {
            echo "PRN " . $PRN . " accepted and updated in sponsor_by table.";
        } else {
            echo "Error creating sponsorship: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt2); // Close the statement for insertion
    } else {
        echo "Error updating student table: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt1); // Close the statement for updating student table
} else {
    echo "Invalid request.";
}
?>
