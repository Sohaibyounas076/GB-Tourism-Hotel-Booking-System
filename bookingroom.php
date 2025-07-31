<?php include("header.php"); ?>
<?php if (isset($_GET['hotel_id'])) {
    $hotel_id = $_GET['hotel_id'];
    $room_id = $_GET['room_id'];
} else {
    header('location:Home.php');
} ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hotel Booking</title>
    <style>
        .cssroom {
            background-image: url(images/home_bg.jpg);

            background-repeat: no-repeat;
            background-size: cover;
            z-index: -1;
            opacity: 0.90;
        "
        }
    </style>

</head>
<body>


<?php
include('db_config.php');

if (isset($_POST['submit'])) {
    $n = $_POST['name'];
    $cn = $_POST['cnic'];
    $con = $_POST['contact'];
    $add = $_POST['address'];
    $ro = $_POST['rooms'];
    $bo = $_POST['booking'];
    $cin = $_POST['in'];
    $cout = $_POST['out'];
    $ad = $_POST['adults'];
    $ch = $_POST['childs'];
    $hotel_id = $_POST['hotel_id'];
    $room_id = $_POST['room_id'];
    $comm = $_POST['comm'];


    $query = "insert into roombooking values('','$n,','$cn','$con','$add','$ro,','$bo','$cin','$cout','$ad',
  '$ch','$room_id','$hotel_id','$comm')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo '<div class="alert alert-info container" role="alert">
  Form submited has been successfully
  </div>';
    } else {
        echo '<div class="alert alert-danger container" role="alert">
  error
  </div>';

    }

}


?>




<section class="container-fluid cssroom mb-4">
    <div class="container">
        <form action="" method="POST" class="p-5">
            <div class="row " style="background-color:#eeeeee; ">
                <div class="col-md-6 py-4 ">

                    <label for="name" class="form-label"><h4>Name:</h4></label>
                    <input type="text" class="form-control w-50" id="name" placeholder="Enter Your Name" name="name"
                           aria-describedby="emailHelp">
                </div>
                <div class="col-md-6 py-4">
                    <label for="cnic" class="form-label"><h4>CNIC:</h4></label>
                    <input type="text" class="form-control w-50" id="cnic" placeholder="Enter Your CNIC" name="cnic"
                           aria-describedby="emailHelp">
                </div>
                <div class="col-md-6 py-4">

                    <label for="contcat" class="form-label"><h4>Contact No:</h4></label>
                    <input type="text" class="form-control w-50" id="contcat" placeholder="Enter Your Mobile No"
                           name="contact" aria-describedby="emailHelp">
                </div>
                <div class="col-md-6 py-4">

                    <label for="address" class="form-label"><h4>Address:</h4></label>
                    <input type="text" class="form-control w-50" id="address" placeholder="Enter Your Address"
                           name="address" aria-describedby="emailHelp">
                </div>
                <div class="col-md-6 py-4">

                    <label for="rooms" class="form-label"><h4>Rooms:</h4></label>
                    <select id="rooms" class="form-control w-50" name="rooms">
                        <option selected>Select Rooms</option>
                        <option>Singel Bed</option>
                        <option>Double Bed</option>
                        <option>Twins Rooms</option>
                        <option>Three Family bed</option>
                    </select>
                </div>
                <div class="col-md-6 py-4">

                    <label for="booking" class="form-label"><h4>Room frequency:</h4></label>
                    <select type="number" class="form-control w-50" id="booking" placeholder="Enter Your number"
                            name="booking" aria-describedby="emailHelp">
                        <option selected>Select Room frequency</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>

                <div class="col-md-6 py-4">

                    <label for="in" class="form-label"><h4>Check in:</h4></label>
                    <input type="date" class="form-control w-50" id="in" value="check in" name="in"
                           aria-describedby="emailHelp">
                </div>
                <div class="col-md-6 py-4">

                    <label for="out" class="form-label"><h4>Check out:</h4></label>
                    <input type="date" class="form-control w-50" id="out" value="check out" name="out"
                           aria-describedby="emailHelp">
                </div>
                <div class="col-md-6 py-4">

                    <label for="adults" class="form-label"><h4>Adults</h4></label>
                    <select type="number" class="form-control w-50" id="adults" name="adults"
                            aria-describedby="emailHelp">
                        <option selected>Select Numbers of Adults</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <div class="col-md-6 py-4">

                    <label for="childs" class="form-label"><h4>Childrens:</h4></label>
                    <select type="number" class="form-control w-50" id="childs" name="childs"
                            aria-describedby="emailHelp">
                        <option selected>Select Numbers of Childs</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <div class="col-12 my-3">
                    <div class="form-group">
                        <label for="comment"><h4>Comment:</h4></label>
                        <textarea class="form-control" name="comm" id="comment" placeholder="Write something.."
                                  style="height:150px"></textarea>
                    </div>
                </div>
                <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">
                <div class="col-12 my-3 text-center">
                    <button class="btn btn-success" value="submit" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>


</section >


<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>


</body>
</html>