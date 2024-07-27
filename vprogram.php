<?php
session_start();

include('connection.php');

// Fetch mentor details from the database for the dropdown
$select_mentors_query = "SELECT mentor_id, mentor_name FROM `mentor`";
$result_mentors = mysqli_query($con, $select_mentors_query);
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>NGO: Program View</title>
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
                                <a class="nav-link" href="ahome.php">Home</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="a_vmentor.php">Mentor</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="aprogrm.php">Add Program</a>
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
    <div style="padding-top: 50px; padding-left: 50px">
        <div class="container-fluid my-3">
            <h2 class="text-center">Programs</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Session ID</th>
                        <th scope="col">Program Name</th>
                        <th scope="col">Orbit ID</th>
                        <th scope="col">Mentor ID</th>
                        <th scope="col">Mentor Fee</th>
                        <th scope="col">No. of Students Attended</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_programs_query = "SELECT * FROM `program`";
                    $result_programs = mysqli_query($con, $select_programs_query);
                    while ($row_program = mysqli_fetch_assoc($result_programs)) {
                        echo "<tr>
                            <td>" . $row_program['session_id'] . "</td>
                            <td>" . $row_program['program_name'] . "</td>
                            <td>" . $row_program['orbit_id'] . "</td>
                            <td>" . $row_program['mentor_id'] . "</td>
                            <td>" . $row_program['mentor_fee'] . "</td>
                            <td>" . $row_program['no_students_attended'] . "</td>
                            <td>" . $row_program['date'] . "</td> 
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
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
