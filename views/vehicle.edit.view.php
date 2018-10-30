<?php
    session_start();
    if(!isset($_SESSION['uid']))
        header("location:index.php");
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Creative Cars</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php
            include 'includes/generic.styles.inc.html';
        ?>
    </head>

    <body>

<div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a href="#" class="navbar-brand">Creative Cars - Edit Vehicle</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auot">
                        <li class="nav-link">
                            <a href="dashboard.php" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-link">
                        <a class="nav-link" href="logout.php"><span class="fas fa-sign-out-alt"></span> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="row">
                <div class="col-12 text-center">
                        <h1 class="h1">Creative Cars - Edit Vehicle</h1>
                </div>
            </div>

            <div class="row mt-5 justify-content-center">
                <div class="col-md-6">
                <form id="formMotorVehicle" class="form" action="includes/vehicle.edit.inc.php" method="POST">
                    <div class="row m-2">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Model</span>
                            </div>
                            <input type="hidden" id="vehicle-id" class="form-control" value="" required readonly>
                            <input type="hidden" id="vehicle-model-id" class="form-control" value="" required readonly>
                            <select id="vehicle-model" class="form-control">
                                <?php 
                                    include 'includes/classes/dbh.inc.php';
                                    include 'includes/classes/vehicle.inc.php';
                                    $vehicles = new Vehicle;
                                    $vid = $_POST['vid'];

                                    $vehicles->getCurrentVehicle($vid);

                                    echo $vehicles->getModelList();
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Make</span>
                            </div>
                            <input type="text" id="vehicle-make" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold">Colour</span>
                            </div>
                            <input type="text" class="form-control" id="vehicle-colour">
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="input-group input-group-sm mb-1">
                            <input type="submit" id="form-vehicle-submit" name="submit" class="btn btn-primary" value="Save Vehicle">
                        </div>
                    </div>
                </form>
                <form action="dashboard.php">
                    <div class="row m-2">
                        <div class="input-group input-group-sm mb-1">
                            <input type="submit" id="form-close" class="btn btn-secondary form-close" value="Cancel/Close">
                        </div>
                    </div>
                </form>
                </div>
                <div id="form-message"></div>
            </div>
        </div>


        <?php include 'includes/generic.js.inc.html'; ?>
        <script>
            <?php include 'includes/js/vehicle.init.inc.js'; ?>
        </script>
    </body>
</html>