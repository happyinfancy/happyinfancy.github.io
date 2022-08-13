<?php
include('connection.php');
$stations =  mysqli_query($con,"SELECT DISTINCT(departure_station_id), departure_station_name FROM `journeys` WHERE 1");
while($row = mysqli_fetch_assoc($stations)){
	$id = $row['departure_station_id'];
	$name = $row['departure_station_name'];
	$stationQ ="INSERT INTO stations (id, name) VALUES ($id, '$name')";
	mysqli_query($con, $stationQ);
}
?>
