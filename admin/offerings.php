<?php include("header.php"); ?>
    <div class="row mt-3">
        <div class="col">
            <h1 class="text-white">Offerings</h1>
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
            <a class="btn btn-primary mt-2" href="offering_add.php">Add New offering</a>
        </div>
    </div>
    <?php if (isset($_GET['hotel_id'])) {
    $hotel_id = $_GET['hotel_id'] ?>
        <table class="table bg-light">
            <thead>
            <tr>
                <th>Name</th>
                <th>FontAwesome</th>
                <th>Image</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php $hotels = mysqli_query($conn, "SELECT * FROM hotel_offerings WHERE hotel_id = '$hotel_id'");
            while ($hotel = mysqli_fetch_assoc($hotels)) { ?>
                <tr>
                    <td><?php echo $hotel['offer_name']; ?></td>
                    <td><?php echo $hotel['fa_class']; ?></td>
                    <td><img src="<?php echo $hotel['offer_img']; ?>" alt="logo" width="100"></td>
                    <td><?php echo $hotel['offer_desc']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
<?php include("footer.php"); ?>