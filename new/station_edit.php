<?php
include('header.php');
if (empty($_GET['id'])) {
    echo "<script>window.location.href='station_create.php';</script>";
}
$id = $_GET['id'];
$station = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM stations WHERE id=$id"));

//save
if (isset($_POST['save'])) {
    $id =  $_POST['station_id'];
    $station_name = $_POST['station_name'];
    $station_address = $_POST['station_address'];
    if (empty($station_name)) {
        echo "<div class='alert alert-danger'>Please fill form correctly</div>";
    } else {
        $stationQ = "UPDATE stations SET name='$station_name', address='$station_address' WHERE id=$id";
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
                <div>
                    <h4>Edit Station</h4>
                </div>
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
                                <input type="text" class="form-control" name="station_name" id="station_name"
                                       value="<?php echo $station['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="station_address">Address:</label>
                                <input type="text" class="form-control" id="station_address" name="station_address"
                                       value="<?php echo $station['address']; ?>">
                            </div>
                            <input type="hidden" name="station_id" id="station_id"
                                   value="<?php echo $station['id']; ?>">
                            <button type="submit" name="save" class="btn btn-primary submit-btn station-update-btn">
                                Submit
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

