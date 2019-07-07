<?php
 header("Access-Control-Allow-Origin: *");
    $rMsg = "";
    $sMsg = "";
    session_start();
    if(isset($_SESSION['username'])) {
       // header('Location: add_contact.html');
    }
    $imp_email = $_GET["email"];
    $num1= $_GET["num1"];
    $num2= $_GET["num2"];
    $id= $_GET["id"];
        //create connection instance
    $con = new mysqli('remotemysql.com', 'Vvh41fnf5X', '2DrpSRCdP1', 'Vvh41fnf5X', '3306');
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
            }
        //assign variables for inputs
            if ($num1 == "" && $num2 == ""){
            //password is invalid
            //$sMsg is echoed out in div further down this file (line: 93)
            echo "Please add numbers";
        }          
        else {
        //run query checker on email
        $sql = $con->query("UPDATE `users` SET `num1` = $num1, `num2` = $num2, `imp_email`= imp_email WHERE (`id` = $id);");

         $_SESSION['username'] = $email;
                //header('Location: newt_grid_add_components_to_form(grid, form, recurse)act.html');
                echo  "success";
        }
?>
