<?php include("header.php"); ?>
    <div class="row mt-3">
        <div class="col">
            <h1 class="text-white">Specifications</h1>
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
            <a class="btn btn-primary mt-2" href="specs_add.php">Add New Specification</a>
        </div>
    </div>
    <?php if (isset($_GET['hotel_id'])) {
    $hotel_id = $_GET['hotel_id'] ?>
        <table class="table bg-light">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php $hotels = mysqli_query($conn, "SELECT * FROM hotel_specs WHERE hotel_id = '$hotel_id'");
            while ($hotel = mysqli_fetch_assoc($hotels)) { ?>
                <tr>
                    <td><?php echo $hotel['spec_name']; ?></td>
                    <td><?php echo $hotel['spec_desc']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
<?php include("footer.php"); ?>