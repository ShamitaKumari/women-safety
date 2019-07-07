<?php 
$username = "Vvh41fnf5X"; 
$password = "2DrpSRCdP1"; 
$database = "Vvh41fnf5X"; 
$mysqli = new mysqli("remotemysql.com", $username, $password, $database); 
 if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Connected successfully";
$sql = $mysqli->query("SELECT id, password FROM users WHERE id='11';");
    if($sql->num_rows > 0){
            $data = $sql->fetch_array();
echo $data['password'];
}
    $date= date('Y-m-d');
echo $date;
echo date("Y-m-d", strtotime("-7 days", strtotime($date)));
?>