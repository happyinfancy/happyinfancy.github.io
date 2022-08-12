<?php
include('header.php');
?>
<script type="text/javascript" language="javascript" src="datatables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="datatables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="datatables/resources/syntax/shCore.js"></script>
<script type="text/javascript" language="javascript" src="datatables/resources/demo.js"></script>
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function () {
        $('#journeys_list_table').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "datatables/scripts/server_processing.php"
        });
    });

</script>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div>
                    <h4>Journeys List</h4>
                </div>
                <div>
                    <a href="journey_create.php" class="btn btn-primary">Create Journey</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="journeys_list_table" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Departure At</th>
                                <th>Return At</th>
                                <th>Departure From</th>
                                <th>Return From</th>
                                <th>Distance</th>
                                <th>Duration</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Departure At</th>
                                <th>Return At</th>
                                <th>Departure From</th>
                                <th>Return From</th>
                                <th>Distance</th>
                                <th>Duration</th>
                            </tr>
                            </tfoot>
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

