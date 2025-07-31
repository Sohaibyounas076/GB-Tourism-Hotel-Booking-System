<?php include("header.php"); ?>
    <div class="row mt-3">
        <div class="col-3">
            <h1 class="text-white">Rooms</h1>
        </div>
        <div class="col">
            <form action="" method="get" class="form-inline">
                <select name="hotel_id" class="form-control">
                    <option value="" selected disabled>SELECT ANY HOTEL</option>
                    <?php $hotels = mysqli_query($conn, "SELECT * FROM hotels WHERE status = 1");
                    while ($hotel = mysqli_fetch_assoc($hotels)) {
                        echo '<option value="' . $hotel['id'] . '">' . $hotel['hotel_name'] . '</option >';
                    } ?>
                </select>

                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>
        <div class="col-auto">
            <a class="btn btn-primary mt-2" href="room_add.php">Add New room</a>
        </div>
    </div>
    <?php if (isset($_GET['hotel_id'])) {
    $hotel_id = $_GET['hotel_id'] ?>
        <table class="table bg-light">
            <thead>
            <tr>
                <th>Name</th>
                <th>Rent/Night</th>
                <th>Image</th>
                <th>Description</th>
                <th>Type</th>
                <th>Capacity</th>
            </tr>
            </thead>
            <tbody>
            <?php $hotels = mysqli_query($conn, "SELECT * FROM hotel_rooms WHERE hotel_id = '$hotel_id'");
            while ($hotel = mysqli_fetch_assoc($hotels)) { ?>
                <tr>
                    <td><?php echo $hotel['room_name']; ?></td>
                    <td><?php echo $hotel['rent_per_night']; ?></td>
                    <td><img src="<?php echo $hotel['room_img']; ?>" alt="logo" width="100"></td>
                    <td><?php echo $hotel['room_desc']; ?></td>
                    <td><?php echo $hotel['room_type']; ?></td>
                    <td><?php echo $hotel['room_capacity']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
<?php include("footer.php"); ?>