<?php
include('header.php');
if (isset($_POST['save'])) {
    $departure_station_id = $_POST['departure_station_id'];
    $return_station_id = $_POST['return_station_id'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $departure_at = $_POST['departure_at'];
    $return_at = $_POST['return_at'];
    if (empty($distance) || empty($duration) || empty($departure_at) || empty($return_at)) {
        echo "<div class='alert alert-danger'>Please fill form correctly</div>";
    } else {
        $journeyQ = "INSERT INTO journeys (departure_station_id, return_station_id, distance, duration, departure_at, return_at) VALUES ($departure_station_id, $return_station_id, $distance, $duration, '$departure_at', '$return_at')";
        if (mysqli_query($con, $journeyQ)) {
            echo "<div class='alert alert-success'>Journey saved successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Unable to save journey</div>";
        }
    }
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Create Journey</h4>
                <div>
                    <a href="journey_list.php" class="btn btn-primary">Journeys List</a>
                </div>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="departure_station_id">Departure From:</label>
                                <?php
                                $stations = mysqli_query($con, 'SELECT * FROM stations');
                                ?>
                                <select id="departure_station_id" name="departure_station_id"
                                        class="form-control select2">
                                    <?php
                                    while ($station = mysqli_fetch_assoc($stations)) {
                                        ?>
                                        <option value="<?php echo $station['id']; ?>"><?php echo $station['name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="departure_at">Departure At:</label>
                                <input type="datetime-local" class="form-control" id="departure_at" name="departure_at" required>
                            </div>
                        </div>
                    </div><!--End of row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="return_station_id">Return To:</label>
                                <?php
                                $stations = mysqli_query($con, 'SELECT * FROM stations');
                                ?>
                                <select id="return_station_id" name="return_station_id" class="form-control select2">
                                    <?php
                                    while ($station = mysqli_fetch_assoc($stations)) {
                                        ?>
                                        <option value="<?php echo $station['id']; ?>"><?php echo $station['name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="return_at">Return At:</label>
                                <input type="datetime-local" class="form-control" id="return_at" name="return_at" required>
                            </div>
                        </div>
                    </div><!--End of row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="return_at">Distance:</label>
                                <input type="number" step="any" class="form-control" id="distance" name="distance" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="return_at">Duration:</label>
                                <input type="number" step="any" class="form-control" id="duration" name="duration" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary submit-btn journey-save-btn">Submit <span
                                class="fa fa-spin fa-spinner"></span></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /.row -->

<?php
include('footer.php');
?>

