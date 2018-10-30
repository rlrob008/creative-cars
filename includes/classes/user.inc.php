<?php
class User extends Dbh{
    
    //Properties and Methods here
    public $userId = 0;
    public $userActualName = "";
    public $username = "";
    public $password = "";
    
    public function __construct() {
        
    }
    
    public function getUser($username, $password) {
        $this->username = $username;
        $this->password = $password;
        
        $errorUsername = false;
        $errorPassword = false;
        $errorNone = false;

        $stmt = $this->connect()->prepare("SELECT user_id, user_username, user_password, user_forenames, user_surname FROM user WHERE user_username=?");
        $stmt->execute([$username]);
        
        session_start();
        echo "<script>$('#inputUsername').removeClass('form-input-error');</script>";
        echo "<script>$('#inputPassword').removeClass('form-input-error');</script>";
        if($stmt->rowCount()){
            while($row = $stmt->fetch()){
                if($username==$row['user_username']&&md5($password)!=$row['user_password']){    
                    $errorPassword = true;
                    echo "<script>$('#inputPassword').addClass('form-input-error');</script>";
                    echo "<p class='form-error'>Incorrect password supplied.</p>";
                } else {
                    $_SESSION["logged"]=1;
                    $_SESSION["uid"]=$row['user_id'];
                    $_SESSION["uname"]=$row['user_forenames'];
                    $_SESSION["usurname"]=$row['user_surname'];
                    $errorNone = true;
                    echo "<script>top.location.href='dashboard.php'</script>";
                }
            }
        } else {
            $errorUsername = true;
            echo "<script>$('#inputUsername').addClass('form-input-error');</script>";
            echo "<span class='form-error'>User account does not exist.</span>";
        }
    }

    public function getLoggedUser($uid) {
        $this->userId = $uid;
        
        $dbObject = new Dbh;
        $stmtGetLoggedUser = $dbObject->connect()->prepare('SELECT user_forenames, user_surname FROM user WHERE user_id = ?');
        $stmtGetLoggedUser->execute([$this->userId]);
        
        $rowGetLoggedUser = $stmtGetLoggedUser->fetch();
        $this->userActualName = $rowGetLoggedUser['user_forenames']." ".$rowGetLoggedUser['user_surname'];
        
        echo $this->userActualName;
    }
    
    public function __destruct() {
        
    }
    
}
