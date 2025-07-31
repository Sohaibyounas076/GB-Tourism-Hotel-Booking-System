<?php include("header.php"); ?>
<?php
if (isset($_POST['add_room'])) {
    $hotel_id = $_POST['hotel_id'];
    $room_name = $_POST['room_name'];
    $rent_per_night= $_POST['rent_per_night'];
    $room_desc= $_POST['room_desc'];
    $room_type= $_POST['room_type'];
    $room_capacity= $_POST['room_capacity'];

    $filename = $_FILES["room_img"]["name"];
    $tempname = $_FILES["room_img"]["tmp_name"];
    $room_pic = "rooms/" . $filename;
    move_uploaded_file($tempname, $room_pic);


    $query = "insert into hotel_rooms(room_name, rent_per_night, room_img, room_desc, room_type, room_capacity, hotel_id) 
                          values('$room_name', '$rent_per_night', '$room_pic', '$room_desc', '$room_type', '$room_capacity', '$hotel_id')";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo '<div class="alert alert-info" role="alert">Form submitted successfully</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">error</div>';
    }
}
?>
    <div class="row mt-3">
        <div class="col">
            <h1 class="text-white">Add New room</h1>
        </div>
        <div class="col-auto">
            <a class="btn btn-primary mt-2" href="rooms.php">All rooms</a>
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row py-3  bg-light">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Hotel</label>
                            <select name="hotel_id" class="form-control" required>
                                <option value="" selected disabled>SELECT ANY HOTEL</option>
                                <?php $hotels = mysqli_query($conn, "SELECT * FROM hotels WHERE status = 1");
                                while ($hotel = mysqli_fetch_assoc($hotels)) {
                                    echo '<option value="' . $hotel['id'] . '">' . $hotel['hotel_name'] . '</option >';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Room Name</label>
                                <input type="text" class="form-control" name="room_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Rent per night</label>
                            <input type="text" class="form-control" name="rent_per_night" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Room Capacity</label>
                            <input type="text" class="form-control" name="room_capacity" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type_id">Room type</label>
                            <select name="room_type" class="form-control" required>
                                <option value="" selected disabled>SELECT TYPE</option>
                                <?php $types = mysqli_query($conn, "SELECT * FROM hotel_room_types ");
                                while ($type = mysqli_fetch_assoc($types)) {
                                    echo '<option value="' . $type['type_name'] . '">' . $type['type_name'] . '</option >';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>room Image</label>
                            <input type="file" class="form-control" name="room_img" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Room Description</label>
                            <textarea class="form-control" name="room_desc" required></textarea>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <button class="btn btn-primary" type="submit" name="add_room">Add Room</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php include("footer.php"); ?>