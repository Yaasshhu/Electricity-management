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
<?php
if(isset($_GET['uid'])){
    $ut = $_GET['uid'];
    $st = "SELECT * FROM cutomer WHERE id ='$ut'";
    $u = mysqli_query($conn,$st);
    $row = mysqli_fetch_assoc($u);
    if(isset($_POST['add'])){
        $valamount = $_POST['amount'];
        $valstatus = $_POST['status'];
        $pp = "UPDATE cutomer SET amount ='$valamount', billstatus ='$valstatus' where id='$ut'";
        mysqli_query($conn,$pp);
        header('location:billingdata.php');
    }
}
?>
<div class="container mt-5">
    <div class="row text-center justify-content-center">
        <a href="role.php" class="text-decoration-none col-lg-5 border border-dark me-3 pb-5 pt-5 mt-3">
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
        <a href="" class="text-decoration-none col-lg-5 border border-dark me-3 pb-5 pt-5 mt-3">
            <div>
                <h4 class="text-dark">Billing Data</h4>
            </div>
        </a>
    </div>
</div>
<div class="text-center mt-5"><a href="addmember.php"  class="btn btn-success">Add Member</a></div>
<div class="container mt-3">
   <div class="row justify-content-center">
    <div class="col-lg-5 text-center">
        <h4>Name - <?php echo $row['name'];?> </h4>
        <h4>Email - <?php echo $row['email'];?> </h4>    
        <h4>Area - <?php echo $row['area'];?> </h4>    
        <h4>Date - <?php echo date('d');?> </h4>    
        <form method="post">
            <input type="number"  class="form-control " name="amount" value="amount" placeholder="amount" />
            <select class="form-select mt-3" name="status">
                <option value="pending">Pending</option>
                <option value="success">Success</option>
            </select>
            <button type="submit" class="btn btn-dark mt-3" name="add" value="add">Add Amount </button>
        <form>  
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>