<?php
include('header.php');
?>
<style>

    .circle-tile {
        margin-bottom: 15px;
        text-align: center;
    }

    .circle-tile-heading {
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 100%;
        color: #FFFFFF;
        height: 80px;
        margin: 0 auto -40px;
        position: relative;
        transition: all 0.3s ease-in-out 0s;
        width: 80px;
    }

    .circle-tile-heading .fa {
        line-height: 80px;
    }

    .circle-tile-content {
        padding-top: 50px;
    }

    .circle-tile-number {
        font-size: 26px;
        font-weight: 700;
        line-height: 1;
        padding: 5px 0 15px;
    }

    .circle-tile-description {
        text-transform: uppercase;
    }

    .circle-tile-footer {
        background-color: rgba(0, 0, 0, 0.1);
        color: rgba(255, 255, 255, 0.5);
        display: block;
        padding: 5px;
        transition: all 0.3s ease-in-out 0s;
    }

    .circle-tile-footer:hover {
        background-color: rgba(0, 0, 0, 0.2);
        color: rgba(255, 255, 255, 0.5);
        text-decoration: none;
    }

    .circle-tile-heading.dark-blue:hover {
        background-color: #2E4154;
    }

    .circle-tile-heading.green:hover {
        background-color: #138F77;
    }

    .circle-tile-heading.orange:hover {
        background-color: #DA8C10;
    }

    .circle-tile-heading.blue:hover {
        background-color: #2473A6;
    }

    .circle-tile-heading.red:hover {
        background-color: #CF4435;
    }

    .circle-tile-heading.purple:hover {
        background-color: #7F3D9B;
    }

    .tile-img {
        text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
    }

    .dark-blue {
        background-color: #34495E;
    }

    .green {
        background-color: #16A085;
    }

    .blue {
        background-color: #2980B9;
    }

    .orange {
        background-color: #F39C12;
    }

    .red {
        background-color: #E74C3C;
    }

    .purple {
        background-color: #8E44AD;
    }

    .dark-gray {
        background-color: #7F8C8D;
    }

    .gray {
        background-color: #95A5A6;
    }

    .light-gray {
        background-color: #BDC3C7;
    }

    .yellow {
        background-color: #F1C40F;
    }

    .text-dark-blue {
        color: #34495E;
    }

    .text-green {
        color: #16A085;
    }

    .text-blue {
        color: #2980B9;
    }

    .text-orange {
        color: #F39C12;
    }

    .text-red {
        color: #E74C3C;
    }

    .text-purple {
        color: #8E44AD;
    }

    .text-faded {
        color: rgba(255, 255, 255, 0.7);
    }


</style>
<link rel="stylesheet" type="text/css"
      href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div>
                    <h4>Dashbaord</h4>
                </div>

            </div>
            <div class="panel-body">
                <div class=" bootstrap snippet">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="circle-tile ">
                                        <a href="#">
                                            <div class="circle-tile-heading dark-blue"><i
                                                        class="fa fa-location-arrow fa-fw fa-3x"></i></div>
                                        </a>
                                        <div class="circle-tile-content dark-blue">
                                            <div class="circle-tile-description text-faded"> Stations</div>
                                            <div class="circle-tile-number text-faded ">
                                                <?php
                                                echo mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(id) stations_count FROM stations"))['stations_count'];
                                                ?>
                                            </div>
                                            <a class="circle-tile-footer" href="station_list.php">More Info<i
                                                        class="fa fa-chevron-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="circle-tile ">
                                        <a href="#">
                                            <div class="circle-tile-heading green"><i
                                                        class="fa fa-thumb-tack fa-fw fa-3x"></i>
                                            </div>
                                        </a>
                                        <div class="circle-tile-content green">
                                            <div class="circle-tile-description text-faded"> Journeys</div>
                                            <div class="circle-tile-number text-faded ">
                                                <?php echo mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(id) journeys_count FROM journeys"))['journeys_count']; ?>
                                            </div>
                                            <a class="circle-tile-footer" href="journey_list.php">More Info<i
                                                        class="fa fa-chevron-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <b>Top 10 Departure stations</b>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Departure Station</th>
                                    <th>Journeys</th>
                                </tr>
                                <?php
                                $departureQ = "SELECT stations.name, COUNT(journeys.id) AS totals
                                            FROM `journeys` 
                                            LEFT JOIN stations ON stations.id=journeys.departure_station_id
                                            WHERE 1
                                            GROUP BY departure_station_id
                                            ORDER BY totals DESC
                                            LIMIT 10";
                                $departureRes = mysqli_query($con, $departureQ);
                                while ($departureRow = mysqli_fetch_assoc($departureRes)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $departureRow['name']; ?></td>
                                        <td><?php echo $departureRow['totals']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>

                        <div class="col-lg-4">
                            <b>Top 10 Return stations</b>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Departure Station</th>
                                    <th>Journeys</th>
                                </tr>
                                <?php
                                $returnQ = "SELECT stations.name, COUNT(journeys.id) AS totals
                                            FROM `journeys` 
                                            LEFT JOIN stations ON stations.id=journeys.return_station_id
                                            WHERE 1
                                            GROUP BY return_station_id
                                            ORDER BY totals DESC
                                            LIMIT 10";
                                $returnRes = mysqli_query($con, $returnQ);
                                while ($returnRow = mysqli_fetch_assoc($returnRes)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $returnRow['name']; ?></td>
                                        <td><?php echo $returnRow['totals']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>

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

