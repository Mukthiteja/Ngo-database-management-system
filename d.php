<!DOCTYPE html>
<html>
<head>
    <title>Students in Bangalore</title>
</head>
<body>
    <h2>Students in Bangalore</h2>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Location</th>
            <!-- Add more columns if necessary -->
        </tr>
        <?php
            // Establish a connection to your database

            include('connection.php'); 




            // SQL query to fetch students from Bangalore
            $sql = "SELECT * FROM student WHERE location = 'Bangalore'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["PRN"]."</td><td>".$row["st_name"]."</td><td>".$row["location"]."</td></tr>";
                    // Add more columns if necessary
                }
            } else {
                echo "<tr><td colspan='3'>No students found in Bangalore.</td></tr>";
            }
            $con->close();
        ?>
    </table>
</body>
</html>
