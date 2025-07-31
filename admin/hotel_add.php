<?php include("header.php"); ?>
<?php
if (isset($_POST['add_hotel'])) {
    $hotel_name = $_POST['hotel_name'];
    $hotel_caption = $_POST['hotel_caption'];
    $hotel_address = $_POST['hotel_address'];

    // Process the hotel logo upload (similar to your original code)
    $logo_filename = $_FILES["hotel_logo"]["name"];
    $logo_tempname = $_FILES["hotel_logo"]["tmp_name"];
    $logo = "hotels/" . $logo_filename;
    move_uploaded_file($logo_tempname, $logo);

    // Process multiple hotel banner images
    $banner_images = array();
    foreach ($_FILES["hotel_banner_img"]["tmp_name"] as $key => $tmp_name) {
        $banner_filename = $_FILES["hotel_banner_img"]["name"][$key];
        $banner_tempname = $_FILES["hotel_banner_img"]["tmp_name"][$key];
        $banner = "hotels/" . $banner_filename;
        move_uploaded_file($banner_tempname, $banner);
        $banner_images[] = $banner; // Store each banner image path in an array
    }

    // Process multiple hotel banner images (2nd column)
    $banner_images_2 = array();
    foreach ($_FILES["hotel_banner_img_2"]["tmp_name"] as $key => $tmp_name) {
        $banner_filename = $_FILES["hotel_banner_img_2"]["name"][$key];
        $banner_tempname = $_FILES["hotel_banner_img_2"]["tmp_name"][$key];
        $banner = "hotels/" . $banner_filename;
        move_uploaded_file($banner_tempname, $banner);
        $banner_images_2[] = $banner; // Store each banner image path in an array
    }

    // Process multiple hotel banner images (3rd column)
    $banner_images_3 = array();
    foreach ($_FILES["hotel_banner_img_3"]["tmp_name"] as $key => $tmp_name) {
        $banner_filename = $_FILES["hotel_banner_img_3"]["name"][$key];
        $banner_tempname = $_FILES["hotel_banner_img_3"]["tmp_name"][$key];
        $banner = "hotels/" . $banner_filename;
        move_uploaded_file($banner_tempname, $banner);
        $banner_images_3[] = $banner; // Store each banner image path in an array
    }

    // Insert hotel data into the "hotels" table
    $query = "INSERT INTO hotels(hotel_name, hotel_caption, hotel_logo, hotel_banner_img, hotel_banner_img_2, hotel_banner_img_3, hotel_address) 
              VALUES('$hotel_name', '$hotel_caption', '$logo', '".implode(",", $banner_images)."', '".implode(",", $banner_images_2)."', '".implode(",", $banner_images_3)."', '$hotel_address')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo '<div class="alert alert-info" role="alert">Form submitted successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error</div>';
    }
}

// Close the database connection
mysqli_close($conn);



?>

    <div class="row mt-3">
        <div class="col">
            <h1 class="text-white text-center">Add New Hotel</h1>
        </div>
        <div class="col-auto">
            <a class="btn btn-primary mt-2" href="hotels.php">All Hotels</a>
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data" class="mb-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="row py-3  bg-light">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Hotel Name</label>
                                <input type="text" class="form-control" name="hotel_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Hotel Caption</label>
                            <input type="text" class="form-control" name="hotel_caption" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Hotel Address</label>
                            <input type="text" class="form-control" name="hotel_address" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Hotel Logo</label>
                            <input type="file" class="form-control" name="hotel_logo" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="hotel_banner_img[]" multiple required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="hotel_banner_img_2[]" multiple required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="hotel_banner_img_3[]" multiple required>
                        </div>
                    </div>

                    <div class="col-12 my-2">
                        <button class="btn btn-primary" type="submit" name="add_hotel">Add Hotel</button>
                    </div>
                </div>
            </div>
        </div>
    </form >
<?php include("footer.php"); ?>