<?php include("header.php"); ?>
    <div class="row mt-3">
        <div class="col">
            <h1 class="text-white">Report</h1>
        </div>
        <div class="col-auto">
            <form action="" method="get" class="form-inline">
                <input type="date" name="start">
                <input type="date" name="end">
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>

    </div>
<?php if (isset($_GET['start']) && isset($_GET['end'])) {
    $start = $_GET['start'];
    $end = $_GET['end'];
    $query = "SELECT * FROM roombooking WHERE Checkin BETWEEN '" . $start . "' AND  '" . $end. "'
ORDER by id DESC";
} else {
    $query = "SELECT * FROM roombooking ";
} ?>
    <div class="table-responsive">
        <table class="table bg-light">
            <thead>
            <tr>
                <th>Name</th>
                <th>CNIC</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Rooms</th>
                <th>Frequency</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Adults</th>
                <th>Children</th>
                <th>Message</th>
                <th>Hotel Id</th>
                <th>Room Id</th>
            </tr>
            </thead>
            <tbody>
            <?php $reports = mysqli_query($conn, $query);
            while ($report = mysqli_fetch_assoc($reports)) { ?>
                <tr>
                    <td><?php echo $report['Name']; ?></td>
                    <td><?php echo $report['CNIC']; ?></td>
                    <td><?php echo $report['Contact No']; ?></td>
                    <td><?php echo $report['Address']; ?></td>
                    <td><?php echo $report['Rooms']; ?></td>
                    <td><?php echo $report['Room frequency']; ?></td>
                    <td><?php echo $report['Checkin']; ?></td>
                    <td><?php echo $report['Check out']; ?></td>
                    <td><?php echo $report['Adults']; ?></td>
                    <td><?php echo $report['Childrens']; ?></td>
                    <td><?php echo $report['Massage']; ?></td>
                    <td><?php echo $report['hotel_id']; ?></td>
                    <td><?php echo $report['room_id']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

<?php include("footer.php"); ?>