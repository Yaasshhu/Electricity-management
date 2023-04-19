<?php
session_start();
if(!isset($_SESSION['email'])){
    header(('location:login.php'));
    exit(); 
}
include_once('dbconnect.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
</head>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin.php">Hello Administer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex">
           <a href="logout.php"><button class="btn btn-sm me-3 btn-danger">Log Out</button></a>
           <h5 class="text-white">Electricity Management</h5>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="row text-center justify-content-center">
        <a href="" class="text-decoration-none col-lg-5 border border-dark me-3 pb-5 pt-5 mt-3">
            <div>
                <h4 class="text-dark">Role</h4>
            </div>
        </a>
        <a href="member.php" class="text-decoration-none col-lg-5 border border-dark me-3 pb-5 pt-5 mt-3">
            <div>
                <h4 class="text-dark">Member</h4>
            </div>
        </a>
        <a href="customer.php" class="text-decoration-none col-lg-5 border border-dark me-3 pb-5 pt-5 mt-3">
            <div>
                <h4 class="text-dark">Customers</h4>
            </div>
        </a>
        <a href="billingdata.php" class="text-decoration-none col-lg-5 border border-dark me-3 pb-5 pt-5 mt-3">
            <div>
                <h4 class="text-dark">Billing Data</h4>
            </div>
        </a>
    </div>
</div>
<div class="text-center mt-5"><a href="addrole.php"  class="btn btn-success">Insert Role</a></div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 bg-secondary me-4 p-4">
        <?php 
        $str = "SELECT ename,position FROM employy WHERE position = 'manager'";
        $st = mysqli_query($conn,$str);?>
             <h3 class="text-light">Manager</h3>
             <ul>
     <?php  while($res =mysqli_fetch_assoc($st)){
        ?>
                <li class="text-white"><?php echo $res['ename'];?></li>
            <?php }?>
            </ul>
        </div>
        <div class="col-lg-5 bg-secondary me-4 p-4">
        <?php 
        $str2 = "SELECT ename,position FROM employy WHERE position = 'cutomerhand'";
        $st2 = mysqli_query($conn,$str2);?>
             <h3 class="text-light">Customer handler</h3>
             <ul>
     <?php  while($res =mysqli_fetch_assoc($st2)){
        ?>
                <li class="text-white"><?php echo $res['ename'];?></li>
            <?php }?>
            </ul>
        </div>
        <div class="col-lg-5 bg-secondary me-4 mt-3 p-4">
        <?php 
        $str3 = "SELECT ename,position FROM employy WHERE position = 'billcharge'";
        $st3 = mysqli_query($conn,$str3);?>
             <h3 class="text-light">Bill Incharge</h3>
             <ul>
     <?php  while($res =mysqli_fetch_assoc($st3)){
        ?>
                <li class="text-white"><?php echo $res['ename'];?></li>
            <?php }?>
            </ul>
        </div>
        <div class="col-lg-5 bg-secondary me-4 mt-3 p-4">
        <?php 
        $str4 = "SELECT ename,position FROM employy WHERE position = 'amountcharge'";
        $st4 = mysqli_query($conn,$str4);?>
             <h3 class="text-light">Amount Incharge</h3>
             <ul>
     <?php  while($res =mysqli_fetch_assoc($st4)){
        ?>
                <li class="text-white"><?php echo $res['ename'];?></li>
            <?php }?>
            </ul>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>