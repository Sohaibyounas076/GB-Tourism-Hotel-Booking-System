<?php session_start();?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?> | GILGIT TOURS</title>
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





<div class="container">
    <?php
    include('db_config.php');
    if (isset($_POST['submit'])) {
        $n = $_POST['name'];
        $em = $_POST['email'];
        $password = $_POST['pass'];
        $ph = $_POST['phone'];

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "data/" . $filename;
        move_uploaded_file($tempname, $folder);

        $query = "insert into user values('', '$n','$em','$password','$ph','$folder',NOW())";
        $data = mysqli_query($conn, $query);
        if ($data) {
            echo '<div class="alert alert-info" role="alert">
  Form submited has been successfully
  </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">error</div>';
        }
    }
    ?>
</div>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="row container-fluid">
        <div class="col-md-6 offset-md-3">
            <div class="row py-3 my-5 bg-light">
                <div class="col-6">
                    <div class="form-group">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" id="Name" name="name" class="form-control" placeholder="Enter Your Name"
                               aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email" id="email">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="Name" class="form-label">Password</label>
                        <input type="Password" id="pass" name="pass" class="form-control"
                               placeholder="Enter Your Password" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email" class="form-label">Phone</label>
                        <input type="text" class="form-control " name="phone" placeholder="Enter your Contact number"
                               id="email">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="formFile" class="form-label">Upload your picture:
                        </label>
                        <input class="form-control " type="file" name="uploadfile" value="" id="formFile">
                    </div>
                </div>
                <div class="col-12 my-2">
                    <button class="btn btn-primary" value="submit" name="submit">Register</button>
                </div>
                <div class="col-12 my-1">
                    <label class="form-label">For Login <a href="login.php" style="color:red; text-decoration:none;">Click
                            here</a></label>
                </div>
            </div>

        </div>
    </div>
</form>
</body>
</html>
<?php include("footer.php"); ?>
