<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "database";


 $conn = mysqli_connect($host, $username, $password, $dbname);


if($conn){
    echo 'connection success';
}else{
    echo 'error';
}
    







