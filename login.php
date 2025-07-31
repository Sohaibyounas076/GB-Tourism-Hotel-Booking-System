
<?php session_start();?>
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
<?php include("log-reg-header.php"); ?>

<?php

include('db_config.php'); 
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password= $_POST['pass'];
    $query = "SELECT * FROM user WHERE Email='$email' && password='$password' ";
    $data = mysqli_query($conn,$query);
    $total= mysqli_num_rows($data);
    if($total==1)
    {
        
      header('location:Home.php');
    }
    else
    {
        echo "<script>alert('incorrect username or password')</script>";
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row container-fluid">
        <div class="col-md-6 offset-md-3">
            <div class="row py-3 my-5 bg-light">
                <div class="col-12">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" id="email" required="">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Your Password" id="pass" name="pass" required="">
                    </div>
                </div>
                <div class="col-12 my-2">
                    <button class="btn btn-primary"  value="submit" name="submit">Login</button>



                </div>


                <div class="col-12 my-1">

                    <label class="form-label">Registration<a href="register.php" style="color:red; text-decoration:none;"> Click here</a></label>
                </div>
            </div>
        </div>
    </div>
</form>

<a href="register.php">login</a>
<?php include("footer.php"); ?>
