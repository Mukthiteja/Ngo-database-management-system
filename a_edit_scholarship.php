<?php
session_start();
include('connection.php'); // Include your database connection file

// Fetch data from the sponsor_by table
$query = "SELECT * FROM sponsor_by";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>NGO: Student</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Attainment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <!--banner slider  -->
    <link href="css/JiSlider.css" rel="stylesheet">
    <!-- //banner-slider -->
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

</head>

<body>
    <!-- header -->
    <section class="w3layouts-header py-2">
        <div class="container">
            <!-- header -->
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
                    <h1>
                        <a class="navbar-brand" href="ahome.php">
                            NGO
                        </a>
                    </h1>
                    <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto text-center">
                            <li class="nav-item active mr-3">
                                <a class="nav-link" href="a_st_application.php">Students<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="a_scholarship.php">Scholarship</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- //header -->
            <h3>Hello Admin</h3>
        </div>
    </section>
    <div class="container-fluid my-3">
        <h2 class="text-center">Sponsorship Report</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>PRN</th>
                    <th>Amount</th>
                    <th>Donor name</th>
                    <th>Student name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the query results and display each row in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['PRN'] . "</td>";
                    echo "<td>" . $row['Amount'] . "</td>";

                    // Fetch donor_name from donor table using donor_id
                    $donorQuery = "SELECT donor_name FROM donor WHERE donor_id = " . $row['donor_id'];
                    $donorResult = mysqli_query($con, $donorQuery);
                    $donorRow = mysqli_fetch_assoc($donorResult);
                    echo "<td>" . $donorRow['donor_name'] . "</td>";

                    // Fetch student_name from student table using PRN
                    $studentQuery = "SELECT st_name FROM student WHERE PRN = '" . $row['PRN'] . "'";
                    $studentResult = mysqli_query($con, $studentQuery);
                    $studentRow = mysqli_fetch_assoc($studentResult);
                    echo "<td>" . $studentRow['st_name'] . "</td>";

                    // Edit link
                    echo "<td><a href='a_edit_scholarship.php?id=" . $row['PRN'] . "'><i class='fas fa-edit'></i> Edit</a></td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
</body>

</html>