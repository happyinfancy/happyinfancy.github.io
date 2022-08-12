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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="stations-list"></tbody>
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

