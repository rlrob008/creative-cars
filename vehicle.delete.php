<?php
session_start();
include 'includes/classes/dbh.inc.php';
include 'includes/classes/vehicle.inc.php';
$vehicles = new Vehicle;
$id = $_POST['vid2'];
$vehicles->deleteVehicle($id);
header("location:dashboard.php");