<?php
 header("Access-Control-Allow-Origin: *");
    $rMsg = "";
    $sMsg = "";
    session_start();
    if(!isset($_SESSION['username'])) {
       //header('Location: add_contact.html');
       echo "not success";
    }else{
    	//header('Location: index.html');
    	echo "success";
    }
?>