<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'journeys';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
   /* array('db' => '`journeys`.`departure_at`', 'dt' => 0, 'field' => 'departure_at', 'formatter' => function ($d, $row) {
        return date('d/m/Y H:i', strtotime($d));
    }),
    array('db' => '`journeys`.`return_at`', 'dt' => 1, 'field' => 'return_at', 'formatter' => function ($d, $row) {
        return date('d/m/Y H:i', strtotime($d));
    }),*/
    array('db' => '`journeys`.`departure_at`', 'dt' => 0, 'field' => 'departure_at'),
    array('db' => '`journeys`.`return_at`', 'dt' => 1, 'field' => 'return_at'),
    array('db' => '`departure_stations`.`name`', 'dt' => 2, 'field' => 'name'),
    array('db' => '`departure_stations`.`name`', 'dt' => 2, 'field' => 'name'),
    array('db' => '`return_stations`.`name` as return_station_name', 'dt' => 3, 'field' => 'return_station_name'),
    array('db' => '`journeys`.`distance`', 'dt' => 4, 'field' => 'distance'),
    array('db' => '`journeys`.`duration`', 'dt' => 5, 'field' => 'duration')
);

// SQL server connection information
require('config.php');
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db' => 'happyinfancy',
    'host' => 'localhost:4307'
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

// require( 'ssp.class.php' );
require('ssp.customized.class.php');

$joinQuery = "FROM `journeys` AS `journeys` LEFT JOIN `stations` AS `departure_stations` ON (`departure_stations`.`id` = `journeys`.`departure_station_id`)  LEFT JOIN `stations` AS `return_stations` ON (`return_stations`.`id` = `journeys`.`return_station_id`)";
$extraWhere = ''; //"`journeys`.`salary` >= 90000";
$groupBy = '';//"`journeys`.`office`";
$having = '';//"`journeys`.`salary` >= 140000";

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
);
