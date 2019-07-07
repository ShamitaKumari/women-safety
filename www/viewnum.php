<?php
 header("Access-Control-Allow-Origin: *");
    $rMsg = "";
    $sMsg = "";
    session_start();
    if(!isset($_SESSION['username'])) {
       // header('Location: add_contact.html');
    }
   // $email = $_GET["email"];
    //$password= $_GET["password"];
        //create connection instance
    $con = new mysqli('remotemysql.com', 'Vvh41fnf5X', '2DrpSRCdP1', 'Vvh41fnf5X', '3306');
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
            }
        //assign variables for inputs

        //run query checker on email
        $sql = $con->query("SELECT num1, num2, imp_email FROM users WHERE id='11';");

        //if user found for email address
        if($sql->num_rows > 0){
            $data = $sql->fetch_array();    
            //TASK 2: REPLACE IF STATEMENT CONDITION
                $_SESSION['username'] = $email;
                //header('Location: add_contact.html');
                $Result =  array(
                    'status' =>"success" , 
                    'msg' => 'found user',
                    'user_data'=> $data, //user data array       
                    );
                echo json_encode($Result);
            }else {
            //return email not found message
            //$sMsg = "Email not registered!";
                $Result =  array(
                    'status' =>"error" , 
                    'msg' => 'no user found',           
                    );
                echo json_encode($Result );
        }

        } 
?>
