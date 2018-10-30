<?php
include_once '../includes/classes/dbh.inc.php';
include_once '../includes/classes/vehicle.inc.php';


if (isset($_POST['submit'])) {
    $vehichleModelId = $_POST['vehicleModel'];
    $vehicleMake = $_POST['vehicleMake'];
    $vehicleColor = $_POST['vehicleColor'];
    $vehicleId = $_POST['vehicleId'];
    //$objectDb = new Dbh;
    $objectVehicle = new Vehicle;
    $vehicleSave = $objectVehicle->updateVehicle($vehicleId,$vehichleModelId, $vehicleMake, $vehicleColor);
}