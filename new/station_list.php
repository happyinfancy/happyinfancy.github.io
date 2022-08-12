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
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="stations-list-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Total Departures</th>
                                <th>Total Returns</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="stations-list">
                            <?php
                            $stationsQ = "SELECT stations.*, (SELECT COUNT(id) FROM journeys WHERE departure_station_id=stations.id) as total_departures,(SELECT COUNT(id) FROM journeys WHERE return_station_id=stations.id) as total_returns
                                        FROM `stations` 
                                        WHERE 1";
                            $stations = mysqli_query($con, $stationsQ);
                            while ($station = mysqli_fetch_assoc($stations)) {
                                ?>
                                <tr>
                                    <td><?php echo $station['name']; ?></td>
                                    <td><?php echo $station['address']; ?></td>
                                    <td><?php echo $station['total_departures']; ?></td>
                                    <td><?php echo $station['total_returns']; ?></td>
                                    <td>
                                        <a href="station_edit.php?id=<?php echo $station['id']; ?>"
                                           class="btn btn-info"> <i class="fa fa-pencil"></i> Edit</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
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

