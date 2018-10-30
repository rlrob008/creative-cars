<?php 

include 'includes/classes/dbh.inc.php';
include 'includes/classes/user.inc.php';

if (isset($_POST['submit'])){
    echo "Username: ".$_POST['submit'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $rowCount = false;
    if(!empty($username)&&!empty($password)){
        $object = new User;
        $object->getUser($username, $password);
    } else {
        echo "Missing details.";
    }
}