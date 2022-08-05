<?php
include('header.php');
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="station_name">Station Name:</label>
                            <input type="text" class="form-control" name="station_name" id="station_name">
                        </div>
                        <div class="form-group">
                            <label for="station_address">Address:</label>
                            <input type="text" class="form-control" id="station_address" name="station_address">
                        </div>
                        <input type="hidden" id="station_id" value="">
                        <button type="submit" class="btn btn-primary submit-btn station-update-btn">Submit <span
                                    class="fa fa-spin fa-spinner"></span></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.row -->
<?php
include('footer.php');
?>

