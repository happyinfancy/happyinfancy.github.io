<?php
include('header.php');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Create Journey</h4>
                <div>
                    <a href="station_list.php" class="btn btn-primary">Journeys List</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="station_name">Departure From:</label>
                            <select id="departure_station" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="departure_at">Departure At:</label>
                            <input type="datetime-local" class="form-control" id="departure_at">
                        </div>
                    </div>
                </div><!--End of row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="station_address">Return To:</label>
                            <select id="return_station" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="return_at">Return At:</label>
                            <input type="datetime-local" class="form-control" id="return_at">
                        </div>
                    </div>
                </div><!--End of row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="return_at">Distance:</label>
                            <input type="number" step="any" class="form-control" id="distance">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="return_at">Duration:</label>
                            <input type="number" step="any" class="form-control" id="duration">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary submit-btn journey-save-btn">Submit <span
                            class="fa fa-spin fa-spinner"></span></button>
            </div>
        </div>
    </div>
</div>

<!-- /.row -->
<?php
include('footer.php');
?>

