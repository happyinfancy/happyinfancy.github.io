<?php
include('header.php');
if (isset($_POST['save'])) {
    $station_name = $_POST['station_name'];
    $station_address = $_POST['station_address'];
    if (empty($station_name)) {
        echo "<div class='alert alert-danger'>Please fill form correctly</div>";
    } else {
        $stationQ = "INSERT INTO stations (name,address) VALUES ('$station_name', '$station_address')";
        if (mysqli_query($con, $stationQ)) {
            echo "<div class='alert alert-success'>Station saved successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Unable to save station</div>";
        }
    }
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Create Station</h4>
                <div>
                    <a href="station_list.php" class="btn btn-primary">Stations List</a>
                </div>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="station_name">Station Name:</label>
                                <input type="text" class="form-control" name="station_name" id="station_name" required>
                            </div>
                            <div class="form-group">
                                <label for="station_address">Address:</label>
                                <input type="text" class="form-control" id="station_address" name="station_address">
                            </div>
                            <button type="submit" name="save" class="btn btn-primary submit-btn station-save-btn">Submit
                                <span
                                        class="fa fa-spin fa-spinner"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- /.row -->
<?php
include('footer.php');
?>

