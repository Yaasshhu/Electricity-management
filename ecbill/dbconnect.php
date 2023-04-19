<?php
$servername="localhost";
$username="root";
$password="";
$dbname="ecbill";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn){
    echo "successfuly connected to database";
}else{
    echo "database err";
}
?>