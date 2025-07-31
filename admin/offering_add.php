<?php include("header.php"); ?>
<?php
if (isset($_POST['add_hotel'])) {
    $hotel_id = $_POST['hotel_id'];
    $offer_name = $_POST['offer_name'];
    $fa_class = $_POST['fa_class'];
    $offer_desc= $_POST['offer_desc'];

    $filename = $_FILES["offer_img"]["name"];
    $tempname = $_FILES["offer_img"]["tmp_name"];
    $logo = "hotels/" . $filename;
    move_uploaded_file($tempname, $logo);


    $query = "insert into hotel_offerings(offer_name, fa_class, offer_desc, hotel_id, offer_img) 
                          values('$offer_name', '$fa_class', '$offer_desc', '$hotel_id', '$logo')";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo '<div class="alert alert-info" role="alert">Form submited has been successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">error</div>';
    }
}
?>
    <div class="row mt-3">
        <div class="col">
            <h1 class="text-white">Add New Offering</h1>
        </div>
        <div class="col-auto">
            <a class="btn btn-primary mt-2" href="offerings.php">All Offerings</a>
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="row py-3  bg-light">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Hotel</label>
                            <select name="hotel_id" class="form-control">
                                <option value="" selected disabled>SELECT ANY HOTEL</option>
                                <?php $hotels = mysqli_query($conn, "SELECT * FROM hotels WHERE status = 1");
                                while ($hotel = mysqli_fetch_assoc($hotels)) {
                                    echo '<option value="' . $hotel['id'] . '">' . $hotel['hotel_name'] . '</option >';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Offering Name</label>
                                <input type="text" class="form-control" name="offer_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>FA class</label>
                            <input type="text" class="form-control" name="fa_class" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>offering Image</label>
                            <input type="file" class="form-control" name="offer_img" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>offering Description</label>
                            <textarea class="form-control" name="offer_desc" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <button class="btn btn-primary" type="submit" name="add_hotel">Add Hotel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php include("footer.php"); ?>