<?php
 header("Access-Control-Allow-Origin: *");
    $rMsg = "";
    $sMsg = "";
    session_start();
    if(isset($_SESSION['username'])) {
       // header('Location: add_contact.html');
    }
    $email = $_GET["email"];
    $password= $_GET["password"];
    $cpassword= $_GET["cpassword"];
    $name= $_GET["name"];
        //create connection instance
    $con = new mysqli('remotemysql.com', 'Vvh41fnf5X', '2DrpSRCdP1', 'Vvh41fnf5X', '3306');
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
            }
        //assign variables for inputs
            if ($password != $cpassword){
            //password is invalid
            //$sMsg is echoed out in div further down this file (line: 93)
            echo "password mismatch";
        }          
        else {
            $password = password_hash($password, PASSWORD_BCRYPT);
        //run query checker on email
        $sql = $con->query("insert into users (name, email, password) value('$name','$email','$password');");

         $_SESSION['username'] = $email;
                //header('Location: add_contact.html');
                echo  "success";
        }
?>
