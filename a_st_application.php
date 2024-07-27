<?php
session_start();
include('connection.php'); // Include your database connection file

// Fetch data from the student table
$query = "SELECT * FROM student";
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
                                <a class="nav-link" href="a_new_st_application.php">New Students<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="a_vscholarship.php">Scholarship</a>
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
        <h2 class="text-center">Applied Students Report</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>PRN</th>
                    <th>Student Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Mobile Number</th>
                    <th>Location</th>
                    <th>College</th>
                    <th>Course</th>
                    <th>Stream</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['PRN'] . '</td>';
        echo '<td>' . $row['st_name'] . '</td>';
        echo '<td>' . $row['gender'] . '</td>';
        echo '<td>' . $row['dob'] . '</td>';
        echo '<td>' . $row['mobile_number'] . '</td>';
        echo '<td>' . $row['location'] . '</td>';
        echo '<td>' . $row['college'] . '</td>';
        echo '<td>' . $row['course'] . '</td>';
        echo '<td>' . $row['stream'] . '</td>';
        echo '<td>' . $row['year'] . '</td>';
        echo '<td id="actions-' . $row['PRN'] . '">'; // Add an ID for the actions container
        echo '<button class="btn btn-success" onclick="acceptApplication(' . $row['PRN'] . ')">Accept</button>';
        echo '<button class="btn btn-danger" onclick="rejectApplication(' . $row['PRN'] . ', \'' . $row['st_name'] . '\')">Reject</button>';
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

    <!-- JavaScript script for AJAX request -->
    <script>
    function acceptApplication(PRN) {
        if (confirm('Are you sure you want to accept this application?')) {
            // Send an AJAX request to the server to handle the acceptance
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'accept_application.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response from the server (if needed)
                    console.log(xhr.responseText);
                    // Hide the buttons after successful acceptance
                    document.getElementById('actions-' + PRN).innerHTML = 'Application Accepted';
                }
            };
            // Send the PRN to the server
            xhr.send('PRN=' + PRN);
        }
    }

    function rejectApplication(PRN, st_name) {
        if (confirm('Are you sure you want to reject the application of ' + st_name + '?')) {
            // Send an AJAX request to the server to handle the rejection
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'reject_application.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response from the server (if needed)
                    console.log(xhr.responseText);
                    // Hide the buttons after successful rejection
                    document.getElementById('actions-' + PRN).innerHTML = 'Application Rejected';
                }
            };
            // Send the PRN and student name to the server
            xhr.send('PRN=' + PRN + '&st_name=' + st_name);
        }
    }
</script>
</body>



</html>
