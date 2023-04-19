<?php
session_start();
if(!isset($_SESSION['email'])){
    header(('location:login.php'));
    exit(); 
}
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
$err=0;
$nameerr=$passerr= $generr=$areaerr='';
include_once('dbconnect.php');
if(isset($_POST['add'])){
    if(empty($_POST['ename'])){
        $nameerr="name is required";
        $err++;
    }
    if(empty($_POST['eemail'])){
        $generr="email is required";
        $err++;
    }
    if(empty($_POST['earea'])){
        $areaerr="area is required";
        $err++;
    }
    if(empty($_POST['eposition'])){
        $passerr="position is required";
        $err++;
    }
    if($err==0){
        $valname=$_POST['ename'];
        $valemail=$_POST['eemail'];
        $valarea =$_POST['earea'];
        $valpos =$_POST['eposition'];
        $sqlt = "INSERT INTO employy(ename,eemail,area,position) VALUES ('$valname','$valemail','$valarea','$valpos')";
        if(!mysqli_query($conn,$sqlt)){
            echo "failed";
        } 
    }
}
?>
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
        <a href="customber.php" class="text-decoration-none col-lg-5 border border-dark me-3 pb-5 pt-5 mt-3">
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
<div class="container mt-5">
    <div class="container" align="center">
        <form class="" method="post">
            <div class="mb-3 col-sm-4 ">
                <label for="exampleInputEmail1" class="form-label">Employee Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="ename">
                <span class="text-danger"><?php echo $nameerr;?></span>
            </div>
            <div class="mb-3 col-sm-4">
                <label for="exampleInputPassword1" class="form-label">Employee Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="eemail">
                <span class="text-danger"><?php echo $passerr;?></span>
            </div>
            <div class="mb-3 col-sm-4">
                <label class="form-label">Position</label>
                <select class="form-select" name="earea">
                    <option value="">Select Postion</option>
                    <?php $role = "SELECT role FROM role";
                    $ck = mysqli_query($conn,$role);
                    while($rl = mysqli_fetch_assoc($ck)){ 
                    ?>
                    <option value="<?php echo $rl['role'];?>"><?php echo $rl['role'];?></option>
                    <?php }?>
                </select>
                <span class="text-danger"><?php echo $generr;?></span>
            </div>
            <div class="mb-3 col-sm-4">
                <label class="form-label">Area</label>
                <select class="form-select" name="eposition">
                    <option value=""></option>
                    <option value="manager">Manager</option>
                    <option value="cutomerhand">Customer handler</option>
                    <option value="billcharge">bill Incharge</option>
                    <option value="amountcharge">Amount Incharge</option>
                </select>
                <span class="text-danger"><?php echo $areaerr;?></span>
            </div>
            <div class="mb-3 col-sm-4 ">
                <button type="submit" class="btn btn-primary " name="add" value="add">Add</button>
            </div>
        </form>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>