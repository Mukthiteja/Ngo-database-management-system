<?php
session_start();

include('connection.php');

// Initialize message variable
$message = "";

// Check if PRN is submitted
if(isset($_POST['PRN'])){
    $PRN = $_POST['PRN'];

    // Check in the student table
    $student_query = "SELECT * FROM student WHERE PRN = '$PRN'";
    $student_result = mysqli_query($con, $student_query);

    // Check in the sponsor_by table
    $sponsor_query = "SELECT * FROM sponsor_by WHERE PRN = '$PRN'";
    $sponsor_result = mysqli_query($con, $sponsor_query);

    // Check in the rej_application table
    $rej_query = "SELECT * FROM rej_application WHERE PRN = '$PRN'";
    $rej_result = mysqli_query($con, $rej_query);

    // Check the conditions and update the message variable
    if(mysqli_num_rows($student_result) > 0 && mysqli_num_rows($sponsor_result) > 0){
        $message = "Scholarship sanctioned.";
    } elseif(mysqli_num_rows($student_result) > 0){
        $message = "Scholarship application pending.";
    } elseif(mysqli_num_rows($rej_result) > 0 && mysqli_num_rows($student_result) == 0){
        $message = "Not found in student table.";
    } else {
        $message = "Application not found.";
    }
}else
$message = "All the best.";
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>NGO: Home</title>
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
        <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .center-box {
            text-align: center;
        }

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
                        <a class="navbar-brand" href="st_home.php">
                            NGO
                        </a>
                    </h1>
                    <div id="google_translate_element"></div>
                </nav>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </header>
            <!-- //header -->
            <h3>Hello Student</h3>
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
    </div>
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    
</body>
</html>


