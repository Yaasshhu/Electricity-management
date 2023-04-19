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
<div class="container mt-3">
   <div class="row justify-content-center">
    <div class="col-lg-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>Area</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Taken By</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $swl="SELECT c.id,c.name,c.lname,c.email,c.area,c.amount,c.billstatus,e.ename FROM cutomer as c LEFT JOIN employy as e ON c.area = e.area";
                $app = mysqli_query($conn,$swl);
                while($res = mysqli_fetch_assoc($app)){
                ?>
                <tr>
                    <td><?php echo $res['name'];?></td>
                    <td><?php echo $res['lname'];?></td>
                    <td><?php echo $res['email'];?></td>
                    <td><?php echo $res['area'];?></td>
                    <td><?php echo date('d');?></td>
                    <td><?php echo $res['amount'];?></td>
                    <td><?php echo $res['billstatus'];?></td>
                    <td><?php echo $res['ename'];?></td>
                    <?php if($res['billstatus']!='success'){?>
                    <td>
            <form method="post" class="d-flex">
               <button type="submit" class="btn btn-dark" name="submit" value="submit"><a href ="addbill.php?uid=<?php echo $res['id'];?>" class="text-decoration-none text-white"> Pending/SET</a></button>
            </form>
        </td>
        <?php }else{?>
                <td><button type="submit" class="btn btn-success" name="submit" value="submit"><a href ="addbill.php?uid=<?php echo $res['id'];?>" class="text-decoration-none text-white">Completed/SET</a></button></td>
                <?php } ?>
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