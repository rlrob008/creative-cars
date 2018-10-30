<?php
session_start();
include 'includes/classes/dbh.inc.php';
include 'includes/classes/vehicle.inc.php';
$vehicles = new Vehicle;
$vehicles->deleteVehicle($_POST['vid2']);
header("location:dashboard.php");