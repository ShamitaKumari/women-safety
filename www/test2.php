<?php

$con = new mysqli('remotemysql.com', 'Vvh41fnf5X', '2DrpSRCdP1', 'Vvh41fnf5X', '3306');
$sql = $con->query("SELECT id, name FROM users WHERE LOWER(email)=LOWER('bose@gmail.com');");
        if($sql->num_rows > 0){
            $data = $sql->fetch_array();    
  }
if( $sql == 0)
{
	$Result =  array(
		'status' =>"error" , 
		'msg' => 'no user found',			
	);
	echo json_encode($Result );
	die();
}

$Result =  array(
	'status' =>"success" , 
	'msg' => 'found user',
	'user_data'=> $data, //user data array		 
);
echo json_encode($Result);
 
?>