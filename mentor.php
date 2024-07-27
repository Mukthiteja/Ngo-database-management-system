<?php
 session_start();

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
                            <li class="nav-item  mr-3">
                                <a class="nav-link" href="ahome.php">Home
                                    
                                </a>
                            </li>
                            <li class="nav-item  mr-3">
                                <a class="nav-link" href="vprogram.php">Program
                                    
                                </a>
                            </li> 
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="a_vmentor.php">Mentor</a>
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
        <h2 class="text-center">Mentor Registration</h2>
        
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
            <div id="google_translate_element"></div>
                <form action="" method="post" enctype="multipart/form-data">
                    <!--mentor name field-->
                    <div class="form-outline">
                        <label for="mentor_name" class="form-label">mentor Name</label>
                        <input type="text" id="mentor_name" class="form-control" placeholder="Enter your mentor Name" 
                        autocomplete="off" required="required" name="mentor_name">
                    </div>
                    <div class="m-4 pt-2">
                        <input type="submit" value="Mentor Register" class="btn btn-dark" name="mentor_register">
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
include('connection.php');

if(isset($_POST['mentor_register'])){
    $mentor_name = mysqli_real_escape_string($con, $_POST['mentor_name']);
    $mentor_address = mysqli_real_escape_string($con, $_POST['mentor_address']);

    // Select query
    $select_query = "SELECT * FROM `mentor` WHERE mentor_name='$mentor_name'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('mentor already exists')</script>"; 
    } else {
        // Insert query
        $insert_query = "INSERT INTO `mentor` (mentor_name) VALUES ('$mentor_name')";
        $sql_execute = mysqli_query($con, $insert_query);

        if($sql_execute) {
            echo "<script>alert('mentor registered successfully')</script>";
            // Redirect to program or any other page
            echo "<script>window.open('vprogram.php','_self')</script>"; 
        } else {
            echo "<script>alert('Error registering mentor')</script>";
        }
    }
}
?>

