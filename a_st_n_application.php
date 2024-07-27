<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csv_file"])) {
    getcsv_PHP();
}

function getcsv_PHP(){
    $final_arr = array();
    $inputFilename = $_FILES["csv_file"]["tmp_name"];
    include 'connection.php';
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    if (($handle = fopen($inputFilename, "r")) !== FALSE){
        $length = 1000; // Define length variable
        $delimiter = ","; // Define delimiter variable
        $i = 0; 
        while ( ( $data = fgetcsv( $handle, $length, $delimiter ) ) !== FALSE ){
            if( $i != 0){
                try {
                    // Insert data into the student table
                    $query = $con->prepare("INSERT INTO student (prn, st_name, gender, dob, mobile_number, location, college, course, stream, year, fee) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $query->bind_param('sssssssssss', $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10]);
                    $query->execute();

                    // Insert data into the parent table
                    $query1 = $con->prepare("INSERT INTO parent (prn, parent_name, parent_address, parent_m_number, parent_occupation) VALUES (?, ?, ?, ?, ?)");
                    $query1->bind_param('sssss', $data[0], $data[11], $data[12], $data[13], $data[14]);
                    $query1->execute();

                    echo "Entered ". $i. " record<br/>";
                } catch (mysqli_sql_exception $e) {
                    if ($e->getCode() == 1062) { // MySQL error code for duplicate entry
                        // Show alert for duplicate entry
                        echo "<script>alert('Duplicate entry detected.');</script>";
                    } else {
                        // For other MySQL errors, print the error message
                        echo "Error: " . $e->getMessage();
                    }
                }
            }
            $i++;
        }
        fclose($handle);
    }
    echo "Data imported successfully.";
}

if (isset($_POST['apply'])) {
    // Get data from the form
    $student_name = $_POST['st_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mobile_number = $_POST['mobile_number'];
    $location = $_POST['location'];
    $college = $_POST['college'];
    $course = $_POST['course'];
    $stream = $_POST['stream'];
    $year = $_POST['year'];
    $fee = $_POST['fee'];

    // Check if the mobile number already exists
    $check_query = "SELECT * FROM student WHERE mobile_number = '$mobile_number'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Mobile number already exists
        $row = mysqli_fetch_assoc($check_result);
        $existing_prn = $row['PRN'];
        echo '<script>alert("Mobile number already exists! PRN: ' . $existing_prn . ' - Use this PRN for future processes and keep it safely.");</script>';
    } else {
        // Generate a random 6-digit PRN
        $prn = mt_rand(100000, 999999);

        // Insert data into the student table
        $query = "INSERT INTO student (prn, st_name, gender, dob, mobile_number, location, college, course, stream, year, fee) 
                  VALUES ('$prn', '$student_name', '$gender', '$dob', '$mobile_number', '$location', '$college', '$course', '$stream', '$year','$fee')";

        $result = mysqli_query($con, $query);

        if ($result) {
            // Insert data into the parent table
            $parent_name = $_POST['parent_name'];
            $parent_address = $_POST['parent_address'];
            $parent_m_number = $_POST['parent_m_number'];
            $parent_occupation = $_POST['parent_occupation'];

            $parent_query = "INSERT INTO parent (prn,parent_name, parent_address, parent_m_number, parent_occupation) 
                             VALUES ('$prn','$parent_name', '$parent_address', '$parent_m_number', '$parent_occupation')";
            
            $parent_result = mysqli_query($con, $parent_query);

            if ($parent_result) {
                echo '<script>alert("Application submitted successfully! PRN: ' . $prn . ' - Use this PRN for future processes and keep it safely.");</script>';
            } else {
                echo "Error submitting parent details.";
            }
        } else {
            echo "Error submitting application.";
        }
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

    <div style="padding-top: 50px; padding-left: 50px">
        <div class="container-fluid my-3">
            <h2 class="text-center">Student Scholarship Application</h2>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-12 col-xl-6">
                    <div id="google_translate_element"></div>
                    <div class="form-outline my-4">
                        <button type="button" class="btn btn-dark" onclick="toggleCSVApplication()">Upload
                            Application</button>
                        <div id="CSVApplicationContainer" style="display: none;">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                                enctype="multipart/form-data">
                                <label for="csv_file">Choose CSV File to Upload:</label>
                                <input type="file" name="csv_file" id="csv_file" accept=".csv">
                                <input type="submit" value="Upload" name="submit">
                            </form>
                        </div>
                        <p>------------or---------</p>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-outline my-4">
                                <button type="button" class="btn btn-dark"
                                    onclick="toggleManualApplication()">Manual Application</button>
                                <div id="ManualApplicationContainer" style="display: none;">
                                    <div class="form-outline my-4">
                                        <button type="button" class="btn btn-dark"
                                            onclick="toggleBasicDetails()">Basic Details</button>
                                        <div id="BasicDetailsContainer" style="display: none;">
                                            <!--studentname field-->
                                            <div class="form-outline">
                                                <label for="student_name" class="form-label">Student Name</label>
                                                <input type="text" id="student_name" class="form-control"
                                                    placeholder="Enter your Student Name" autocomplete="off"
                                                    required="required" name="st_name">
                                            </div>
                                            <!--gender field-->
                                            <div class="form-outline my-4">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select id="gender" class="form-control" required="required"
                                                    name="gender">
                                                    <option value="" disabled selected>Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <!--DOB field-->
                                            <div class="form-outline my-4">
                                                <label for="dob" class="form-label">Date of Birth</label>
                                                <input type="date" id="dob" class="form-control"
                                                    required="required" name="dob">
                                            </div>
                                            <!--mobile number field-->
                                            <div class="form-outline my-4">
                                                <label for="mobile_number" class="form-label">Mobile
                                                    Number</label>
                                                <input type="tel" id="mobile_number" class="form-control"
                                                    placeholder="Enter your Mobile Number" pattern="[0-9]{10}"
                                                    required="required" name="mobile_number">
                                            </div>
                                            <!--location field-->
                                            <div class="form-outline my-4">
                                                <label for="location" class="form-label">Location</label>
                                                <input type="text" id="location" class="form-control"
                                                    placeholder="Enter your Location" autocomplete="off"
                                                    required="required" name="location">
                                            </div>
                                            <div class="form-outline my-4">
                                                <button type="button" class="btn btn-light"
                                                    onclick="togglecollegeDetails()">Next</button>
                                            </div>
                                        </div>
                                        <div class="form-outline my-4">
                                            <button type="button" class="btn btn-dark"
                                                onclick="togglecollegeDetails()">College Details</button>
                                            <div id="CollegeDetailsContainer" style="display: none;">
                                                <!--college field-->
                                                <div class="form-outline my-4">
                                                    <label for="college" class="form-label">College</label>
                                                    <input type="text" id="college" class="form-control"
                                                        placeholder="Enter your College" autocomplete="off"
                                                        required="required" name="college">
                                                </div>
                                                <!--course field-->
                                                <div class="form-outline my-4">
                                                    <label for="course" class="form-label">Course</label>
                                                    <input type="text" id="course" class="form-control"
                                                        placeholder="Enter your Course" autocomplete="off"
                                                        required="required" name="course">
                                                </div>
                                                <!--stream field-->
                                                <div class="form-outline my-4">
                                                    <label for="stream" class="form-label">Stream</label>
                                                    <input type="text" id="stream" class="form-control"
                                                        placeholder="Enter your Stream" autocomplete="off"
                                                        required="required" name="stream">
                                                </div>
                                                <!--year field-->
                                                <div class="form-outline my-4">
                                                    <label for="year" class="form-label">Year</label>
                                                    <input type="text" id="year" class="form-control"
                                                        placeholder="Enter your Year" autocomplete="off"
                                                        required="required" name="year">
                                                </div>
                                                <div class="form-outline my-4">
                                                    <label for="fee" class="form-label">Fee</label>
                                                    <input type="text" id="fee" class="form-control"
                                                        placeholder="Enter your fee" autocomplete="off"
                                                        required="required" name="fee">
                                                </div>
                                                <div class="form-outline my-4">
                                                    <button type="button" class="btn btn-light"
                                                        onclick="toggleParentDetails()">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline my-4">
                                            <button type="button" class="btn btn-dark"
                                                onclick="toggleParentDetails()">Parent Details</button>
                                            <div id="parentDetailsContainer" style="display: none;">
                                                <!--parentname field-->
                                                <div class="form-outline my-4">
                                                    <label for="parent_name" class="form-label">Parent
                                                        Name</label>
                                                    <input type="text" id="parent_name" class="form-control"
                                                        placeholder="Enter Parent Name" autocomplete="off"
                                                        required="required" name="parent_name">
                                                </div>
                                                <!--parent address field-->
                                                <div class="form-outline my-4">
                                                    <label for="parent_address"
                                                        class="form-label">Parent Address</label>
                                                    <input type="text" id="parent_address" class="form-control"
                                                        placeholder="Enter Parent Address" autocomplete="off"
                                                        required="required" name="parent_address">
                                                </div>
                                                <!--parent mobile number field-->
                                                <div class="form-outline my-4">
                                                    <label for="parent_m_number"
                                                        class="form-label">Parent Mobile Number</label>
                                                    <input type="tel" id="parent_m_number" class="form-control"
                                                        placeholder="Enter Parent Mobile Number" pattern="[0-9]{10}"
                                                        required="required" name="parent_m_number">
                                                </div>
                                                <!--parent occupation field-->
                                                <div class="form-outline my-4">
                                                    <label for="parent_occupation"
                                                        class="form-label">Parent Occupation</label>
                                                    <input type="text" id="parent_occupation"
                                                        class="form-control" placeholder="Enter Parent Occupation"
                                                        autocomplete="off" required="required"
                                                        name="parent_occupation">
                                                </div>
                                                <div class="m-4 pt-2">
                                                    <input type="submit" value="Apply" class="btn btn-dark"
                                                        name="apply">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
    <script>
        function toggleCSVApplication() {
            var container = document.getElementById("CSVApplicationContainer");
            if (container.style.display === "none") {
                container.style.display = "block";
            } else {
                container.style.display = "none";
            }
        }

        function toggleManualApplication() {
            var container = document.getElementById("ManualApplicationContainer");
            if (container.style.display === "none") {
                container.style.display = "block";
            } else {
                container.style.display = "none";
            }
        }

        function toggleBasicDetails() {
            var container = document.getElementById("BasicDetailsContainer");
            if (container.style.display === "none") {
                container.style.display = "block";
            } else {
                container.style.display = "none";
            }
        }

        function toggleParentDetails() {
            var container = document.getElementById("parentDetailsContainer");
            if (container.style.display === "none") {
                container.style.display = "block";
            } else {
                container.style.display = "none";
            }
        }

        function togglecollegeDetails() {
            var container = document.getElementById("CollegeDetailsContainer");
            if (container.style.display === "none") {
                container.style.display = "block";
            } else {
                container.style.display = "none";
            }
        }
    </script>
</body>
</html>
