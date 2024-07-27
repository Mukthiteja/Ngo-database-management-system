<?php
session_start();
include('connection.php');
// Count the number of rows in the student table
$studentCountQuery = "SELECT COUNT(*) as count FROM student";
$studentCountResult = mysqli_query($con, $studentCountQuery);
$studentCountRow = mysqli_fetch_assoc($studentCountResult);
$studentCount = $studentCountRow['count'];

// Count the number of rows in the mentor table
$mentorCountQuery = "SELECT COUNT(*) as count FROM mentor";
$mentorCountResult = mysqli_query($con, $mentorCountQuery);
$mentorCountRow = mysqli_fetch_assoc($mentorCountResult);
$mentorCount = $mentorCountRow['count'];

// Count the number of rows in the program table
$programCountQuery = "SELECT COUNT(*) as count FROM program";
$programCountResult = mysqli_query($con, $programCountQuery);
$programCountRow = mysqli_fetch_assoc($programCountResult);
$programCount = $programCountRow['count'];


// Count the number of rows in the donor table
$donorCountQuery = "SELECT COUNT(*) as count FROM donor";
$donorCountResult = mysqli_query($con, $donorCountQuery);
$donorCountRow = mysqli_fetch_assoc($donorCountResult);
$donorCount = $donorCountRow['count'];

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>NGO: Home</title>
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
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="a_student.php">Students</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="vprogram.php">Programs</a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="vdonor.php">Donors</a>
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

<!-- stats -->
<section class="stats py-5">
        <div class="container py-md-4 mt-md-3">
            <h3 class="tittle-w3ls text-center mb-3">LET THE NUMBERS SPEAK FOR US</h3>
            <div class="row inner_w3l_agile_grids-1 pt-4 mt-md-4">

                <!-- Display the number of rows from the student table -->
                <div class="col-md-3 col-sm-6 w3layouts_stats_left w3_counter_grid1">
                    <p class="counter"><?php echo $studentCount; ?></p>
                    <h3>STUDENT</h3>
                </div>

                <!-- Display the number of rows from the donor table -->
                <div class="col-md-3 col-sm-6 w3layouts_stats_left w3_counter_grid1">
                    <p class="counter"><?php echo $donorCount; ?></p>
                    <h3>Donors</h3>
                </div>

                <!-- Display the number of rows from the program table -->
                <div class="col-md-3 col-sm-6 w3layouts_stats_left w3_counter_grid2">
                    <p class="counter"><?php echo $programCount; ?></p>
                    <h3>total session</h3>
                </div>

                <!-- Display the number of rows from the mentor table -->
                <div class="col-md-3 col-sm-6 w3layouts_stats_left w3_counter_grid">
                    <p class="counter"><?php echo $mentorCount; ?></p>
                    <h3>Total mentor</h3>
                </div>

            </div>
        </div>
    </section>
    <!-- //stats -->
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