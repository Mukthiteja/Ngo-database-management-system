<?php
session_start();

include('connection.php');

// Fetch donor details from the database
$select_donors_query = "SELECT * FROM `donor`";
$result_donors = mysqli_query($con, $select_donors_query);

// Fetch donor with maximum sponsorship
$select_maxdonor_query = "SELECT donor_id, COUNT(PRN) AS num_students_sponsored
                          FROM sponsor_by
                          GROUP BY donor_id
                          ORDER BY num_students_sponsored DESC
                          LIMIT 1";
$result_maxdonor = mysqli_query($con, $select_maxdonor_query);
$max_donor_row = mysqli_fetch_assoc($result_maxdonor);
$max_donor_id = $max_donor_row['donor_id'];
$max_num_students_sponsored = $max_donor_row['num_students_sponsored'];
$donorQuery = "SELECT donor_id, donor_name FROM donor";
$donorResult = mysqli_query($con, $donorQuery);
$max_donorname = mysqli_fetch_assoc($donorResult);

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>NGO: Donor Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <!-- header -->
    <section class="w3layouts-header py-2">
        <div class="container">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
                    <h1>
                        <a class="navbar-brand" href="index.html">
                            NGO
                        </a>
                    </h1>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto text-center">
                            <li class="nav-item  mr-3">
                                <a class="nav-link" href="ahome.php">Home
                                    
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="rdonor.php">Add New Donor</a>
                            </li>
                            
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Add your navigation links here if needed -->
                </nav>
            </header>
            <h3>Hello Admin</h3>
        </div>
    </section>

    <div style="padding-top: 50px; padding-left: 50px">
        <div class="container-fluid my-3">
            <h2 class="text-center">Donor Details</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Donor ID</th>
                        <th scope="col">Donor Name</th>
                        <th scope="col">Donor Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_donors)) {
                        echo "<tr>";
                        echo "<td>" . $row['donor_id'] . "</td>";
                        echo "<td>" . $row['donor_name'] . "</td>";
                        echo "<td>" . $row['donor_address'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            
            <div>
            <p >Maximum sponsorship by Donor Name: <?php echo $max_donorname['donor_name']; ?> - Number of Students Sponsored: <?php echo $max_num_students_sponsored; ?></p>
            </div>
        </div>
    </div>
    <!-- copyright -->
    <section class="copyright-w3layouts py-xl-4 py-3">
        <div class="container">
            <p>© 2024 Attainment . All Rights Reserved | Design by
                <a href=""> RVCE </a>
            </p>
            <ul class="social-nav footer-social social two text-center mt-2">
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-pinterest" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
        </div>
    </section>
    <!-- //copyright -->
</body>

</html>
