<?php

include('../db_config.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $query = "SELECT * FROM admin WHERE Email='$email' && Password='$password' ";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    if ($total == 1) {

        header('location:hotels.php');
    } else {
        echo "<script>alert('incorrect username or password')</script>";
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin_login</title>

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
</head>


<body class="body">
    <section class="container">
        <img class="img-responsive logo" src="../images/front.jpg">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" style="color:white;" href="../Home.php">Home</a>
                    </li>
                    
                   
                </ul>
              
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                	<li class="nav-item">
                        <a class="nav-link btn btn-outline-secondary ml-2 bg-ligh" href="../login.php">Logout</a>
                    </li>
                    
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="https://www.facebook.com/">
                        <img src="../images/facebook.png"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="https://twitter.com/">
                        <img src="../images/twitter.png"></a>
                </li>
                   
                </ul>
            </div>
        </nav>
    </section>
    

<form action="" method="POST" enctype="multipart/form-data">
        <div class="row container-fluid">
            <div class="col-6 offset-3">
                <div class="row mt-3 py-5" style="background-color:#eeeeee;">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="email" class="form-label"><h4> Email</h4></label>
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Enter your email" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="pass" class="form-label"><h4>Password</h4></label>
                            <input type="password" class="form-control" placeholder="Enter Your Password" id="pass"
                                   name="pass">
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <button class="btn btn-primary" value="submit" name="submit">Login</button>

                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
</html>
<div class="mt-5 container">
<?php include("footer.php"); ?>
</div>