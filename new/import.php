<?php
include('connection.php');
$result = mysqli_query($con, 'SELECT GROUP_CONCAT(id) as station_ids FROM stations');
$station_ids_array = explode(',',mysqli_fetch_assoc($result)['station_ids']);

$row = 0;
$file = fopen("import_files/2021-05.csv", "r");
while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
    $row++;
    if ($row > 1) {
        $departure_at = $getData[0];
        $return_at = $getData[1];
        $departure_station_id = check_station($getData[2], $getData[3]);
        $return_station_id = check_station($getData[4], $getData[5]);;
        $distance = $getData[6];
        $duration = $getData[7];
        $journeyQ = "INSERT INTO journeys (departure_at, return_at, departure_station_id, return_station_id, distance, duration) VALUES ('$departure_at','$return_at',$departure_station_id, $return_station_id, $distance, $duration)";
        mysqli_query($con, $journeyQ);
    }
//    if ($row > 10) {
//        die();
//    }
}
function check_station($station_id, $station_name)
{
    if (in_array($station_id, $GLOBALS['station_ids_array'])) {
        return $station_id;
    }
    $stationQ = "INSERT INTO stations (id,name) VALUES($station_id, '$station_name')";
    mysqli_query($GLOBALS['con'], $stationQ);
    $station_id = mysqli_insert_id($GLOBALS['con']);
    array_push($GLOBALS['station_ids_array'], $station_id);
    return $station_id;
}

?>