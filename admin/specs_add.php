<?php include("header.php"); ?>
<?php
if (isset($_POST['add_hotel'])) {
    $hotel_id = $_POST['hotel_id'];
    $spec_name = $_POST['spec_name'];
    $spec_desc= $_POST['spec_desc'];

    $query = "insert into hotel_specs(spec_name, spec_desc, hotel_id) 
                          values('$spec_name', '$spec_desc', '$hotel_id')";
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
            <h1 class="text-white">Add New Specification</h1>
        </div>
        <div class="col-auto">
            <a class="btn btn-primary mt-2" href="specs.php">All Specifications</a>
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
                                <label>Spec Name</label>
                                <input type="text" class="form-control" name="spec_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>offering Description</label>
                            <textarea class="form-control" name="spec_desc" required></textarea>
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