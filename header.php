<?php session_start();
include('db_config.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?> | GB-Tourism</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <!--HOtel css-->
    <link rel="stylesheet" type="text/css" href="css/hotel1.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>

<body class="body">
<section class="container ">
    <img class="img-responsive logo" src="images/front.jpg">
    <p class="wel my-1"> Welcome to GB-Tourism site. Book now your favourite Hotel </p>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="Home.php">Home</a>
                </li>
               <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hotels
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php $hotels = mysqli_query($conn, "SELECT * FROM hotels WHERE status = 1");
                    while ($hotel = mysqli_fetch_assoc($hotels)) { ?>
                        <a class="dropdown-item" href="hotels.php?id=<?php echo $hotel['id'];?>"><?php echo $hotel['hotel_name'];?></a>
                    <?php } ?>
                    </div>
                </li>
                 <li class="nav-item ">
                        <a class="nav-link " href="about.php">About Us</a>
                    </li>
                <li class="nav-item">
                        <a class="nav-link" href="Contact.php">Contact Us</a>
                    </li>
            </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item mr-2">
                    <a class="nav-link" href="admin/admin_login.php">Admin</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link btn btn-outline-secondary" href="login.php">Logout</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="https://www.facebook.com/">
                        <img src="images/facebook.png"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="https://twitter.com/">
                        <img src="images/twitter.png"></a>
                </li>
            </ul>
        </div>
    </nav>

</section>
<section style="min-height: 320px;" class="container">