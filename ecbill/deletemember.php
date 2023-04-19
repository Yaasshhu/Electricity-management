<?php
session_start();
if(!isset($_SESSION['email'])){
    header(('location:login.php'));
    exit(); 
}
include_once('dbconnect.php');
$user_id = $_GET['uid'];
$sql = "DELETE FROM employy WHERE id='$user_id'";

if (mysqli_query($conn, $sql)) {
  header('location:member.php');
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}


?>