<?php
include('header.php');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div>
                    <h4>Stations List</h4>
                </div>
                <div>
                    <a href="station_create.php" class="btn btn-primary">Create Station</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-3">
                        <label for="station_address">Departure From:</label>
                        <select id="departure_station" class="form-control"></select>
                    </div>
                    <div class="col-md-3">
                        <label for="station_address">Return To:</label>
                        <select id="return_station" class="form-control"></select>
                    </div>
                    <div class="col-md-1">
                        <br/>
                        <button class="btn btn-primary btn-info search-journeys">Search</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="journeys-list-table">
                            <thead>
                            <tr>
                                <th>Departure</th>
                                <th>Departure Station</th>
                                <th>Return</th>
                                <th>Return Station</th>
                                <th>Distance</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="journeys-list"></tbody>
                        </table>
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

