<?php
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
<style>    /* Styling for Google Translate dropdown */
    #google_translate_element {
        margin-left: 20px;
        margin-right: 20px;
    }

    #google_translate_element select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 14px;
        color: #333;
    }

    #google_translate_element a {
        color: #333;
    }
</style>
</head>

<body>
	<!-- header -->
	<section class="w3layouts-header py-2">
		<div class="container">
			  <!-- header -->
        <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
                    <h1>
                        <a class="navbar-brand" href="index.html">
                          NGO   
                        </a>
                    </h1>
                    <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto text-center">
                            <li class="nav-item active  mr-3">
                                <a class="nav-link" href="index.php">Home
                                    
                                </a>
                            </li>

                            <li class="nav-item dropdown mr-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Login
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="alogin.php">Admin</a>
									 <a class="dropdown-item" href="st_home.php">Student</a>
                                </div>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" href="#contact">contact</a>
                            </li>
							<div id="google_translate_element"></div>
                        </ul>
                    </div>
                </nav>
        </header>
        <!-- //header -->
		</div>
	</section>
	<!-- //header -->
	<!-- banner -->
	<section class="banner-silder">
		<div id="JiSlider" class="jislider">
			<ul>
				<li>
					<div class="banner-top banner-top1">
						<div class="container">
							<div class="banner-info info2">
								<h3>NGO</h3>
								<p>Get ready next generation</p>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="banner-top banner-top2">
						<div class="container">
							<div class="banner-info bg3 info2">
								<h3>Built for Students</h3>
								<p>Any student is always welcomed to use this platform</p>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="banner-top banner-top3">
						<div class="container">
							<div class="banner-info bg3">
								<h3>Built by the students</h3>
								<p>Built and maintained by the students</p>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
		</section>
		<!-- //banner -->
		<!-- banner bottom -->
		<section class="banner-btm">
			<div class="container">
				<div class="row banner-bottom-main bg-white">
					<a name="contact"></a>
						<div class="col-md-4 banner-grid2">
							<div class="banner-subg1">
								<h3 class="mt-3"><span class="fas fa-clock pr-3" aria-hidden="true"></span> OPENING HOURS</h3>
								<p class="mt-3 pl-5">Monday - Friday 09.00 - 18.00</p>
								<p class="pl-5">Saturday 09.00 - 14.00</p>
							</div>
						</div>
						<div class="col-md-4 banner-grid2">
							<div class="banner-subg1">
								<h3 class="mt-3"><span class="fas fa-phone pr-3" aria-hidden="true"></span> CALL US ANYTIME</h3>
								<p class="mt-3 pl-5">6281528147</p>
								<p class="pl-5">8147521862</p>
							</div>
						</div>
						<div class="col-md-4 banner-grid2">
							<div class="banner-subg1">
								<h3 class="mt-3"><span class="fas fa-envelope pr-3" aria-hidden="true"></span> EMAIL US</h3>
								<p class="mt-3 pl-5">Email :<a href="mailto:ngogold@gmail.com"> ngogold@gmail.com</a></p>
								<p class="pl-5">Email :<a href="mailto:ngo@gmail.com"> ngo@gmail.com</a></p>
							</div>
						</div>
				</div>
			</div>
		</section>
		<!-- //banner bottom -->
	<!-- courses -->
	
	
<!-- stats -->
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
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Attainment</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="agileits-w3layouts-info">
						<img src="images/bg1.jpg" class="img-fluid" alt="" />
						<p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. </p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal -->
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js-->
	<!--banner-slider-->
	<script src="js/JiSlider.js"></script>
	<script> 
		$(window).load(function () {
			$('#JiSlider').JiSlider({
				color: '#fff',
				start: 1,
				reverse: false
			}).addClass('ff')
		})
	</script>
	<!-- //banner-slider -->
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->

	<!-- FlexSlider-JavaScript -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		
				$(window).load(function(){
				$('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
						$('body').removeClass('loading');
					}
			});
		});
	</script>
<!-- //FlexSlider-JavaScript -->
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	 <script src="js/bootstrap.js"></script>
	 <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>