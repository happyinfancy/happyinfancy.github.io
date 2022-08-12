<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Happy Infancy</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="lobibox/dist/css/lobibox.min.css">
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="lobibox/dist/js/lobibox.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- limonte-sweetalert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
          integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css"
          integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"
            integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--Datatables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <style>
        .fa-spinner {
            display: none;
        }

        .panel-heading {
            display: flex;
            justify-content: space-between;
        }

        .swal2-container.swal2-center > .swal2-popup {
            font-size: 15px !important;
        }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container card-body">
        <!-- Logo and responsive toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <span class="glyphicon glyphicon-fire"></span>
                Happy Infancy (Journey)
            </a>
        </div>
    </div>
    <!-- /.container -->
</nav>
<style>
    .node-link{
        margin-right: 5px;
    }
    .node-link-row{
        margin-bottom: 20px;
    }
</style>
<!-- Content -->
<div class="container" style="margin-top: 40px;">
    <div class="row node-link-row">
        <div class="col-6" style="display: flex;justify-content: center">
            <div class="col-2 node-link">
                <a href="station_create.php" class="btn btn-info"> <span class="fa fa-plus-square"></span> Create Station</a>
            </div>
            <div class="col-2 node-link">
                <a href="station_list.php" class="btn btn-info"> <span class="fa fa-list-alt"></span> Stations List</a>
            </div>
            <div class="col-2 node-link">
                <a href="journey_create.php" class="btn btn-success"> <span class="fa fa-plus-square"></span> Create Journey</a>
            </div>
            <div class="col-2 node-link">
                <a href="journey_list.php" class="btn btn-success"> <span class="fa fa-list-alt"></span> Journeys List</a>
            </div>
        </div><!--End of col-6-->
    </div>