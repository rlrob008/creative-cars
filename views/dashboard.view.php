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
                <a href="#" class="navbar-brand">Creative Cars</a>
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
                        <h1 class="h1">Creative Cars</h1>
                        <form action="vehicle.add.php">
                            <input type="submit" class="btn btn-success btn-md" value="Add a car">
                        </form>
                </div>
            </div>

            <div class="row mt-5 justify-content-center">
                <div class="col-md-6">
                    <table class="table table-striped table-hover table-sm">
                            <caption>List of cars</caption>
                        <thead>
                            <tr>
                                <th scope="col-3">Model</th>
                                <th scope="col-3">Make</th>
                                <th scope="col-3">Color</th>
                                <th scope="col-3">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'includes/classes/dbh.inc.php';
                                include 'includes/classes/vehicle.inc.php';
                                $vehicles = new Vehicle;
                                echo $vehicles->getVehicleList();
                            ?>
                        </tbody>
                        <p id="form-message"></p>
                    </table>
                </div>
            </div>
        </div>

        <?php include 'includes/generic.js.inc.html'; ?>
        <script>
            <?php include 'includes/js/vehicle.init.inc.js'; ?>
        </script>
    </body>
</html>