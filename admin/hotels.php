<?php include("header.php"); ?>
<div class="row mt-3">
    <div class="col">
        <h1 class="text-white">Hotel</h1>
    </div>
    <div class="col-auto">
        <a class="btn btn-primary mt-2" href="hotel_add.php">Add New Hotel</a>
    </div>
</div>
    <table class="table bg-light">
        <thead>
        <tr>
            <th>Name</th>
            <th>Caption</th>
            <th>Logo</th>
            <th>Banner</th>
            <th>Address</th>
        </tr>
        </thead>
        <tbody>
        <?php $hotels = mysqli_query($conn, "SELECT * FROM hotels WHERE status = 1");
        while ($hotel = mysqli_fetch_assoc($hotels)) { ?>
            <tr>
                <td><?php echo $hotel['hotel_name'];?></td>
                <td><?php echo $hotel['hotel_caption'];?></td>
                <td><img src="<?php echo $hotel['hotel_logo']; ?>" alt="logo" width="100"></td>
                <td><img src="<?php echo $hotel['hotel_banner_img']; ?>" alt="logo" width="100"></td>
                <td><?php echo $hotel['hotel_address'];?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php include("footer.php"); ?>