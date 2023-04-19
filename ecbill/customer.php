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
<body>
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
        <a href="" class="text-decoration-none col-lg-5 border border-dark me-3 pb-5 pt-5 mt-3">
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
<div class="text-center mt-5"><a href="signup.php"  class="btn btn-success">Add Customers</a></div>
<div class="container mt-3">
   <div class="row justify-content-center">
    <div class="col-lg-8">
        <table class="table" >
    <thead>
        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>City</th>
            <th>Areas</th>
        
        </tr>
    </thead>
    <tbody>
        <?php
        $sql ="SELECT id,name,lname,email,city,area,billstatus FROM cutomer";
        $data = mysqli_query($conn,$sql);
        while($res = mysqli_fetch_assoc($data)){
        ?>
        <tr>
            <td><?php echo $res['name'];?></td>
            <td><?php echo $res['lname'];?></td>
            <td><?php echo $res['email'];?></td>
            <td><?php echo $res['city'];?></td>
            <td><?php echo $res['area'];?></td>
            <td><button class="btn btn-warning"><a href="editcustomer.php?uid=<?php echo $res['id'];?>" class="text-decoration-none text-white">Edit</a></button><button class="btn btn-danger ms-2"><a href="deletecustomer.php?uid=<?php echo $res['id'];?>" class="text-decoration-none text-white">Delete</a></button></td>
        </tr>
        <?php }?>
     
    </tbody>
   </table>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>