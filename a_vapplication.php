<?php
session_start();

include('connection.php');

$message = ''; // Initialize message variable

if (isset($_POST['PRN'])) {
    $PRN = mysqli_real_escape_string($con, $_POST['PRN']);

    // Check in the student table
    $student_query = "SELECT * FROM student WHERE PRN = ?";
    $student_statement = mysqli_prepare($con, $student_query);
    mysqli_stmt_bind_param($student_statement, 's', $PRN);
    mysqli_stmt_execute($student_statement);
    $student_result = mysqli_stmt_get_result($student_statement);

    // Fetch details from the student_result
    $details = mysqli_fetch_assoc($student_result);

    $parent_query = "SELECT * FROM parent WHERE PRN = ?";
$parent_statement = mysqli_prepare($con, $parent_query);
mysqli_stmt_bind_param($parent_statement, 's', $PRN);
mysqli_stmt_execute($parent_statement);
$parent_result = mysqli_stmt_get_result($parent_statement);

// Fetch details from the parent_result
$details1 = mysqli_fetch_assoc($parent_result);


    // Check in the sponsor_by table
    $sponsor_query = "SELECT * FROM sponsor_by WHERE PRN = ?";
    $sponsor_statement = mysqli_prepare($con, $sponsor_query);
    mysqli_stmt_bind_param($sponsor_statement, 's', $PRN);
    mysqli_stmt_execute($sponsor_statement);
    $sponsor_result = mysqli_stmt_get_result($sponsor_statement);

    // Check in the rej_application table
    $rej_query = "SELECT * FROM rej_application WHERE PRN = ?";
    $rej_statement = mysqli_prepare($con, $rej_query);
    mysqli_stmt_bind_param($rej_statement, 's', $PRN);
    mysqli_stmt_execute($rej_statement);
    $rej_result = mysqli_stmt_get_result($rej_statement);

    // Check the conditions and update the message variable
    if (mysqli_num_rows($student_result) > 0 && mysqli_num_rows($sponsor_result) > 0) {
        $message = 'Scholarship sanctioned.';
    } elseif (mysqli_num_rows($student_result) > 0) {
        $message = 'Scholarship application pending.';
    } elseif (mysqli_num_rows($rej_result) > 0 && mysqli_num_rows($student_result) == 0) {
        $message = 'Not found in student table.';
    } else {
        $message = 'Application not found.';
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>NGO: Student</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords"
        content="Attainment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
    addEventListener("load", function() {
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
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">

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
                                <a class="nav-link" href="a_student.php">back to student</a>
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
    <div class="center-box">
        <form method="post" action="">
            <label for="PRN">Enter PRN:</label>
            <input type="text" id="PRN" name="PRN" required>
            <button type="submit">Check PRN</button>
        </form>

        <!-- Display the message after the input -->
        <?php echo $message; ?>

        <?php if (isset($message) && $message == 'Scholarship sanctioned.') { ?>
        <!-- Display details for PRN -->
        <div>
            <h3>Details for PRN: <?php echo $PRN; ?></h3>
            <form>
                <!-- Display student details -->
                <label for='student_name'>Student Name:<?php echo $details['st_name']; ?><br>

                    <label for='gender'>Gender:<?php echo $details['gender']; ?><br></label>

                    <label for='dob'>Date of Birth:</label><?php echo $details['dob']; ?><br>

                    <label for='mobile_number'>Mobile Number:</label><?php echo $details['mobile_number']; ?><br>

                    <label for='location'>Location:</label><?php echo $details['location']; ?><br>

                    <h4>College Details</h4>
                    <!-- Display college details -->
                    <label for='college'>College:</label><?php echo $details['college']; ?><br>

                    <label for='course'>Course:</label><?php echo $details['course']; ?><br>

                    <label for='stream'>Stream:</label><?php echo $details['stream']; ?><br>

                    <label for='year'>Year:</label><?php echo $details['year']; ?><br>

                    <label for='fee'>Fee:</label><?php echo $details['fee']; ?><br>


                    <h4>Parent Details</h4>
                    <!-- Display parent details -->
                    <label for='parent_name'>Parent Name:</label><?php echo $details1['parent_name']; ?><br>

                    <label for='parent_address'>Parent Address:</label><?php echo $details1['parent_address']; ?><br>

                    <label for='parent_m_number'>Parent Mobile
                        Number:</label><?php echo $details1['parent_m_number']; ?><br>

                    <label for='parent_occupation'>Parent
                        Occupation:</label><?php echo $details1['parent_occupation']; ?><br>

                    <div class='m-4 pt-2'>
                        <input type='submit' value='OK' class='btn btn-dark' name='OK' readonly>
                    </div>
            </form>
        </div>
        <?php } 
        elseif (isset($message) && $message == 'Scholarship application pending.') { ?>
        <!-- Display details for PRN -->
        <div>
            <h3>Details for PRN: <?php echo $PRN; ?><br></h3>
            <form>
                <!-- Display student details -->
                <label for='student_name'>Student Name:<?php echo $details['st_name']; ?><br></label>

                <label for='gender'>Gender:<?php echo $details['gender']; ?><br></label>

                <label for='dob'>Date of Birth:</label><?php echo $details['dob']; ?><br>

                <label for='mobile_number'>Mobile Number:</label><?php echo $details['mobile_number']; ?><br>

                <label for='location'>Location:</label><?php echo $details['location']; ?><br>

                <h4>College Details</h4>
                <!-- Display college details -->
                <label for='college'>College:</label><?php echo $details['college']; ?><br>

                <label for='course'>Course:</label><?php echo $details['course']; ?><br>

                <label for='stream'>Stream:</label><?php echo $details['stream']; ?><br>

                <label for='year'>Year:</label><?php echo $details['year']; ?><br>

                <label for='fee'>Fee:</label><?php echo $details['fee']; ?><br>


                <h4>Parent Details</h4>
                <!-- Display parent details -->
                <label for='parent_name'>Parent Name:</label><?php echo $details1['parent_name']; ?><br>

                <label for='parent_address'>Parent Address:</label><?php echo $details1['parent_address']; ?><br>

                <label for='parent_m_number'>Parent Mobile
                    Number:</label><?php echo $details1['parent_m_number']; ?><br>

                <label for='parent_occupation'>Parent
                    Occupation:</label><?php echo $details1['parent_occupation']; ?><br>

                <div class='m-4 pt-2'>
                    <input type='submit' value='OK' class='btn btn-dark' name='OK' readonly>
                </div>
            </form>
        </div>
        <?php } ?>


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