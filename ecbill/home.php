<?php
session_start();
if(!isset($_SESSION['id'])){
    header(('location:login.php'));
    exit(); 
}
include_once('dbconnect.php')
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
<?php
$data=$_SESSION['id'];
if(isset($_POST['pay'])){
    $sqly= "UPDATE cutomer SET amount ='0',billstatus='success' WHERE id ='$data'";   
    mysqli_query($conn,$sqly);
 
} 
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand">Hello </a>
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
    <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>Area</th>
                    <th>Amount</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $swl="SELECT name,lname,email,area,amount,billstatus FROM cutomer WHERE id ='$data'";
                $app = mysqli_query($conn,$swl);
                while($res = mysqli_fetch_assoc($app)){
                ?>
                <tr>
                    <td><?php echo $res['name'];?></td>
                    <td><?php echo $res['lname'];?></td>
                    <td><?php echo $res['email'];?></td>
                    <td><?php echo $res['area'];?></td>
                    <td><?php echo $res['amount'];?></td>
                    <td><?php echo $res['billstatus'];?></td>
                    <?php if($res['amount']=='0'){?>
                     <td></td>
                     <?php }else{?>
                    <form method="post">
                    <td><a class="text-decoration-none "><button type="submit" class="btn btn-warning" name="pay" value="pay">Pay</button></a></td>
                    <?php
                    }?>
                    </form>
                </tr>
             <?php }?>
            </tbody> 
        </table>      
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>
</html>