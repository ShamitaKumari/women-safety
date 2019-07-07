<?php 
$email = $_GET["email"];
    $password= $_GET["password"];
//if(isset($_POST['login'])) {
        //create connection instance
    $con = new mysqli('remotemysql.com', 'Vvh41fnf5X', '2DrpSRCdP1', 'Vvh41fnf5X', '3306');
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
            }else{
                echo "connected";
            }
//echo "connected";
        //assign variables for inputs
            echo $email ;
        //$email = $con->real_escape_string($_POST['email']);
        //$password = $con->real_escape_string($_POST['password']);
echo $password;
        //run query checker on email
        $sql = $con->query("SELECT id, password FROM users WHERE LOWER(email)=LOWER('$email');");

        //if user found for email address
        if($sql->num_rows > 0){
            $data = $sql->fetch_array();
            echo $data['password'];
        }
echo "hi world";
?>