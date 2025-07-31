<?php include("header.php"); ?>
<?php
if (isset($_GET['id'])) {
    $hotel_id = $_GET['id'];
    $hotels = mysqli_query($conn, "SELECT * FROM hotels WHERE id =  '$hotel_id'");
    $hotel = mysqli_fetch_assoc($hotels);
}
?>

    <div class="mt-2 py-2 bg-light" >
        <img class="img-responsive logo " src="admin/<?php echo $hotel['hotel_logo']; ?>">
        <p class=" text-center "><?php echo $hotel['hotel_caption']; ?></p>
        <h3 class="text-center" ><i class="fa fa-map-marker"></i> <?php echo $hotel['hotel_address']; ?></h3>
    </div>
    <section style="height:410px;" class="my-3">
        <div class="row bg-light py-2">
            <div class="col-4">
                <div class="row">
                <div class="col-12 mb-1">
                    <img src="admin/<?php echo $hotel['hotel_banner_img']; ?>"  style="height:200px; width:370px;" >
                </div>
                 <div class="col-12">
                     <img src="admin/<?php echo $hotel['hotel_banner_img_2']; ?>" style="height:200px; width:370px;" >
                 </div>
                 </div>
                </div>
            <div class="col-8">
                 <img src="admin/<?php echo $hotel['hotel_banner_img_3']; ?>" style="height:400px; width:730px;" >
            </div>
        </div>
    </section>
   <section class="container">
        <?php $hotel_offerings = mysqli_query($conn, "SELECT * FROM hotel_offerings WHERE hotel_id =  '$hotel_id'");
        if (mysqli_num_rows($hotel_offerings) > 0) {
            while ($hotel_offering = mysqli_fetch_assoc($hotel_offerings)) { ?>
                <div class="row my-3 bg-light p-4">
                    <div class="col-md-7">
                        <h1 class="my-3">
                            <i class="<?php echo $hotel_offering['fa_class']; ?>"></i>
                            <?php echo $hotel_offering['offer_name']; ?>
                        </h1>
                        <p style="font-size: 16px;"><?php echo $hotel_offering['offer_desc']; ?></p>

                    </div>
                    <div class="col-md-5">
                        <img class="img-thumbnail" src="admin/<?php echo $hotel_offering['offer_img']; ?>" width="450">
                    </div>
                </div>
            <?php }
        } else {
            echo '<div class="row my-3 bg-light p-4"><h3 class="text-center">No offerings were added by hotel. </h3></div>';
        } ?>
    </section>

    <section class="container mb-2 bg-light" >
        <div class="py-4">
            <h1 class="py-3 text-center ">Explore our hotel</h1>
            <div class="row">
                <?php $hotel_specs = mysqli_query($conn, "SELECT * FROM hotel_specs WHERE hotel_id =  '$hotel_id'");
                if (mysqli_num_rows($hotel_offerings) > 0) {
                    while ($hotel_spec = mysqli_fetch_assoc($hotel_specs)) { ?>
                        <div class="col-md-4 my-2">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title"><?php echo $hotel_spec['spec_name']; ?></h2>
                                    <p class="card-text"><?php echo $hotel_spec['spec_desc']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else {
                    echo '<div class="col-md-6 offset-3 bg-light p-4"><h3 class="text-center">Nothing to show. </h3></div>';
                } ?>
            </div>
        </div>
    </section>


    <section class="bg container-fluid mb-3">
        <div class="container">
            <h1 class="text-center py-2">Our Hotel Rooms</h1>
            <div class="row">
                <?php $hotel_rooms = mysqli_query($conn, "SELECT * FROM hotel_rooms WHERE hotel_id =  '$hotel_id'");
                if (mysqli_num_rows($hotel_rooms) > 0) {
                    while ($hotel_room = mysqli_fetch_assoc($hotel_rooms)) { ?>
                        <div class="col-md-6 my-2">
                            <div class="room card"
                                 style="background-image:url(admin/<?php echo $hotel_room['room_img']; ?>);">
                                <div class="card-header" style="background-color: rgba(0,0,0,0.3);">
                                    <h2 class=" py-2 text-white">
                                        <?php echo $hotel_room['room_name']; ?>,
                                        <?php echo $hotel_room['room_type']; ?>
                                    </h2>
                                
                                <div class="card-body">
                                    <h3 class="text-white py-2" >
                                        Rs. <?php echo $hotel_room['rent_per_night']; ?> / Night
                                        <br>
                                        Capacity: <?php echo $hotel_room['room_capacity']; ?>
                                    </h3>
                                    <p class="text-white"><?php echo $hotel_room['room_desc']; ?></p>
                                    <a href="bookingroom.php?hotel_id=<?php echo $hotel_id; ?>&room_id=<?php echo $hotel_room['id']; ?>"
                                       class="btn btn-success">Book this room</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    <?php }
                } else {
                    echo '<div class="row my-3 bg-light p-4"><h3 class="text-center">No Rooms were added by hotel. </h3></div>';
                } ?>
            </div>
        </div>


    </section>

    <section class=" container-fluid bg-light ">
   <?php
if (isset($_GET['id'])) {
    $reviews = mysqli_query($conn, "SELECT * FROM reviews");
}
?>
      <h1 class="text-center py-3">Testimonials</h1>
      <div class="row  ">
       <div class="col-md-8 mt-4">
    <div class="row text-center">
        <?php while ($review = mysqli_fetch_assoc($reviews)) : ?>
            <div class="col-md-4 mb-3">
                <div class="d-flex justify-content-center">
                    <img class="rounded-circle" src="<?php echo $review['user_pic']; ?>" width="150" height="150" />
                </div>
                <h5 class="my-2"><?php echo $review['name']; ?></h5>
                <p style="font-size: 16px;">
                    <i class="fas fa-quote-left"></i> <?php echo $review['comments']; ?>.
                    <i class="fas fa-quote-right pe-2"></i>
                </p>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<div class="col-md-4 mt-3  ">
  <div class="card ">
    <div class="card-body ">
      <h3 class="text-center pt-3">Write Your Comments</h3>
  <form action="" method="POST" enctype="multipart/form-data" class="mb-5 p-3">
        <div class="row pt-3 ">
          <div class="col-12">
                <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Comments</label>
                            <textarea type="text" class="form-control" name="comments" required></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Upload Your Pic</label>
                            <input type="file" class="form-control" name="user" required>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <button class="btn btn-primary" type="submit" name="add_reviews">Submit</button>
                    </div>
                    <?php
if (isset($_POST['add_reviews'])) {
    $rname = $_POST['name'];
    $rcomments = $_POST['comments'];
    
        // Process the hotel logo upload 

     $pic_filename = $_FILES["user"]["name"];
    $pic_tempname = $_FILES["user"]["tmp_name"];
    $pic = "images/" . $pic_filename;
    move_uploaded_file($pic_tempname, $pic);

    $query = "INSERT INTO reviews(name, comments, user_pic) 
              VALUES('$rname', '$rcomments', '$pic')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo '<div class="alert alert-info" role="alert">Form submitted successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error</div>';
    }
}
?>
                </div>
    </form>
  </div>
  </div>
</div>          
</div>
</section>
