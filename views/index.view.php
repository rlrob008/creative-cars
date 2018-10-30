<!DOCTYPE html>
<?php
include_once 'includes/classes/dbh.inc.php';
?>
<html class="no-js" lang="en">
    <head>
        <title>Creative Cars</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php
            include 'includes/generic.styles.inc.html';
            include 'includes/login.styles.inc.html';
        ?>

    </head>

    <body class="d-flex flex-column text-center">
        <div class="container-fluid">
			<div class="row">
				<div class="col-12 text-left">
					Creative Cars
				</div>
			</div>
		</div>

		<div class="main-page d-flex flex-colum flex-fill content">
            <div class="bg flex-fill">
            <form id="form-signin" class="form-signin text-center" action="login.php" method="POST">
    				<div class="formgroup mt-5 mb-5">
    					<h1 class="h3 font-weight-light">Sign In</h1>
    				</div>
    				<div class="formgroup mt-3 mb-5">
        				<label for="inputUsername" class="sr-only">Username</label>
        				<input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
    				</div>
    				<div class="formgroup mt-5 mb-4">
        				<label for="inputPassword" class="sr-only">Password</label>
        				<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    				</div>
    				<div class="formgroup mt-4 mb-5">
    					<button id="form-submit" class="" type="submit" name="submit">Login</button>
    				</div>
    				<p id="form-message"></p>    				
    			</form>
            </div>
        </div>

        <?php include 'includes/generic.js.inc.html'; ?>
        <script>
		<?php include 'includes/js/login.init.inc.js'; ?>
		</script>
    </body>
</html>