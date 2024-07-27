<?php
session_start();
include('connection.php');

// Fetch mentor details from the database for the dropdown
$select_mentors_query = "SELECT mentor_id, mentor_name, mentor_fee FROM `mentor`";
$result_mentors = mysqli_query($con, $select_mentors_query);
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>NGO:Home</title>
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
                                <a class="nav-link" href="vprogram.php">View Program</a>
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
    <div style="padding-top: 50px;padding-left: 50px">
        <div class="container-fluid my-3">
            <h2 class="text-center">New Program</h2>

            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-12 col-xl-6">
                    <div id="google_translate_element"></div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <!--mentor name field-->
                        <div class="form-outline">
                            <label for="program_name" class="form-label">Program Name</label>
                            <input type="text" id="program_name" class="form-control"
                                placeholder="Enter your program Name" autocomplete="off" required="required"
                                name="program_name">
                        </div>
                        <div class="form-outline">
                            <label for="orbit_id" class="form-label">Orbit ID</label>
                            <input type="number" id="orbit_id" class="form-control" placeholder="Enter your orbit id"
                                autocomplete="off" required="required" name="orbit_id">
                        </div>
                        <div class="form-outline">
                            <label for="mentor_name" class="form-label">Mentor Name</label>
                            <select id="mentor_name" class="form-control" required="required" name="mentor_id">
                                <?php
                                while ($row_mentor = mysqli_fetch_assoc($result_mentors)) {
                                    echo "<option value='" . $row_mentor['mentor_id'] . "'>" . $row_mentor['mentor_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-outline">
                            <label for="mentor_fee" class="form-label">Mentor Fee</label>
                            <input type="number" id="mentor_fee" class="form-control" placeholder="Mentor fee"
                                autocomplete="off" required="required" name="mentor_fee">
                        </div>
                        <div class="form-outline">
                            <label for="no_students_attended" class="form-label">No. of Students Attended</label>
                            <input type="number" id="no_students_attended" class="form-control"
                                placeholder="Number of students attended" autocomplete="off" required="required"
                                name="no_students_attended">
                        </div>
                        <div class="m-4 pt-2">
                            <input type="submit" value="Register Program" class="btn btn-dark"
                                name="program_register">
                        </div>
                    </form>
                </div>
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

<?php
if (isset($_POST['program_register'])) {
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $orbit_id = mysqli_real_escape_string($con, $_POST['orbit_id']);
    $mentor_id = mysqli_real_escape_string($con, $_POST['mentor_id']);
    $mentor_fee_input = mysqli_real_escape_string($con, $_POST['mentor_fee']);
    $no_students_attended = mysqli_real_escape_string($con, $_POST['no_students_attended']);

    // Select mentor's name and previous mentor_fee from mentor table based on mentor_id
    $select_mentor_query = "SELECT mentor_name, mentor_fee FROM `mentor` WHERE mentor_id='$mentor_id'";
    $result_mentor = mysqli_query($con, $select_mentor_query);
    $row_mentor = mysqli_fetch_assoc($result_mentor);
    $mentor_name = $row_mentor['mentor_name'];
    $previous_mentor_fee = $row_mentor['mentor_fee'];

    // Calculate the new mentor_fee as the sum of the previous and input mentor_fee
    $new_mentor_fee = $previous_mentor_fee + $mentor_fee_input;

    // Insert query
    $insert_query = "INSERT INTO `program` (program_name, orbit_id, mentor_id, mentor_fee, no_students_attended, date) VALUES ('$program_name', '$orbit_id', '$mentor_id', '$mentor_fee_input', '$no_students_attended', NOW())";
    $sql_execute = mysqli_query($con, $insert_query);

    if ($sql_execute) {
        // Update mentor_fee in mentor table with the new sum
        $update_mentor_fee_query = "UPDATE `mentor` SET mentor_fee='$new_mentor_fee' WHERE mentor_id='$mentor_id'";
        mysqli_query($con, $update_mentor_fee_query);

        echo "<script>alert('Program registered successfully')</script>";
        // Redirect to program or any other page
        echo "<script>window.open('vprogram.php','_self')</script>";
    } else {
        echo "<script>alert('Error registering program')</script>";
        echo mysqli_error($con); // Print detailed MySQL error message for debugging
    }
}
?>