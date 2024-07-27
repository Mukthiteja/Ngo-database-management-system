<?php
session_start();
include('connection.php'); // Include your database connection file

// Fetch data from the student table
$query1 = "SELECT * FROM sponsor_by";
$result1 = mysqli_query($con, $query1);

// Fetch data from the student table
$query = "SELECT * FROM student";
$result = mysqli_query($con, $query);

$rows = []; // Initialize an empty array to store fetched rows

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row; // Append each row to the $rows array
        $PRN = $row['PRN'];
        $status = $row['status'];

        // Check if the status is 'yes' and if the PRN doesn't already exist in the sponsor_by table
        $checkQuery = "SELECT * FROM sponsor_by WHERE PRN = '$PRN'";
        $checkResult = mysqli_query($con, $checkQuery);

        if ($status == 'yes' && mysqli_num_rows($checkResult) == 0) {
            // Insert PRN into the sponsor_by table
            $insertQuery = "INSERT INTO sponsor_by (PRN) VALUES ('$PRN')";
            $insertResult = mysqli_query($con, $insertQuery);

            if (!$insertResult) {
                echo "Error inserting PRN $PRN into sponsor_by table: " . mysqli_error($con) . "<br>";
            }
        }
    }
} else {
    echo "Error fetching data from student table: " . mysqli_error($con);
}
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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto text-center">
                        <li class="nav-item mr-3">
                                <a class="nav-link" href="a_student.php">back to student</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="a_vscholarship.php">Sanctioned</a>
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
        <h2 class="text-center">Sponsor a Student</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>PRN</th>
                    <th>Student Name</th>
                    <th>Amount</th>
                    <th>Donor Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result1)) {
                    echo '<tr>';
                    echo '<td>' . $row['PRN'] . '</td>';

                    // Fetch student name from student table using PRN
                    $studentQuery = "SELECT st_name FROM student WHERE PRN = '" . $row['PRN'] . "'";
                    $studentResult = mysqli_query($con, $studentQuery);
                    $studentRow = mysqli_fetch_assoc($studentResult);

                    echo '<td>' . $studentRow['st_name'] . '</td>';
                    echo '<td><input type="text" name="amount[]" value="' . $row['Amount'] . '"></td>';
                    echo '<td>';
                    echo '<select name="donor_id[]">';

                    // Fetch donor names from donor table
                    $donorQuery = "SELECT donor_id, donor_name FROM donor";
                    $donorResult = mysqli_query($con, $donorQuery);

                    // Iterate through donor names and create dropdown options
                    while ($donorRow = mysqli_fetch_assoc($donorResult)) {
                        $selected = ($donorRow['donor_id'] == $row['donor_id']) ? 'selected' : '';
                        echo '<option value="' . $donorRow['donor_id'] . '" ' . $selected . '>' . $donorRow['donor_name'] . '</option>';
                    }

                    echo '</select>';
                    echo '</td>';
                    echo '<td>';
                    echo '<button class="btn btn-success" onclick="acceptApplication(' . $row['PRN'] . ', this)">Save</button>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

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

    <script>
        function acceptApplication(prn, button) {
            var row = button.closest("tr");
            var amount = row.querySelector('input[name="amount[]"]').value;
            var donorId = row.querySelector('select[name="donor_id[]"]').value;

            // Send the data to save_sponsorship.php using AJAX or redirect to another page
            // Here, I'm redirecting to save_sponsorship.php with query parameters
            window.location.href = 'save_sponsorship.php?prn=' + prn + '&amount=' + amount + '&donor_id=' + donorId;
        }
    </script>
</body>

</html>
