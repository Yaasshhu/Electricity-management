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
include_once('dbconnect.php');
if(isset($_GET['uid'])){
    $et = $_GET['uid'];
    $s = "SELECT * FROM cutomer WHERE id ='$et'";
    // echo mysqli_error($rr);
    $res = mysqli_query($conn,$s);
    $dat = mysqli_fetch_assoc($res);

}   
$nameerr=$emailerr= $lnameerr= $passerr=$cityerr=$areaerr=$phoneerr='';
$err=0;
if(isset($_POST['submit'])){
    if(empty($_POST['fname'])){
        $nameerr="name is required";
        $err++;
    }
    if(empty($_POST['email'])){
        $emailerr="email is required";
        $err++;
    }
    if(empty($_POST['lname'])){
        $lnameerr="last name is required";
        $err++;
    }
    if(empty($_POST['city'])){
        $cityerr="city is required";
        $err++;
    }
    if(empty($_POST['area'])){
        $areaerr="area is required";
        $err++;
    }
    if(empty($_POST['phone'])){
        $phoneerr="phone is required";
        $err++;
    }
    if($err==0){
        $valname=$_POST['fname'];
        $valemail=$_POST['email'];
        $vallname=$_POST['lname'];
        $valcity=$_POST['city'];
        $valarea =$_POST['area'];
        $valphone =$_POST['phone'];
        $sqlt = "UPDATE cutomer SET name='$valname',lname='$vallname',email='$valemail',area='$valarea',city='$valcity',phone='$valphone' WHERE id ='$et'";
        if(mysqli_query($conn,$sqlt)){
            echo "failed";
        } 
        header('location:customer.php');
    }
}

?>
<body>
    <h2 class="mb-5 text-center">Add customer</h2>
    <div class="container" align="center">
        <form class="" method="post">
            <div class="mb-3 col-sm-4 ">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="fname" value="<?php echo $dat['name'];?>">
                <span class="text-danger"><?php echo $nameerr;?></span>
            </div>
            <div class="mb-3 col-sm-4">
                <label for="exampleInputPassword1" class="form-label">lname</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="lname" value="<?php echo $dat['lname'];?>">
                <span class="text-danger"><?php echo $lnameerr;?></span>
            </div>
            <div class="mb-3 col-sm-4">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="email" value="<?php echo $dat['email'];?>">
                <span class="text-danger"><?php echo $emailerr;?></span>
            </div>
            <div class="mb-3 col-sm-4">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo $dat['phone'];?>">
                <span class="text-danger"><?php echo $phoneerr;?></span>
            </div>
            <div class="mb-3 col-sm-4">
                <label class="form-label">City</label>
                <select class="form-select" name="city">
                    <option value="">city</option>
                    <option value="Dewas">Dewas</option>
                    <option value="Indore">Indore</option>
                    <option value="Ujjain">Ujjain</option>
                    <option value="ratlam">ratlam</option>
                </select>
                <span class="text-danger"><?php echo $cityerr;?></span>
            </div>
            <div class="mb-3 col-sm-4">
                <label class="form-label">Area</label>
                <select class="form-select" name="area">
                    <option value="">area</option>
                    <?php $role = "SELECT area FROM area";
                    $ck = mysqli_query($conn,$role);
                    while($rl = mysqli_fetch_assoc($ck)){ 
                    ?>
                    <option value="<?php echo $rl['area'];?>" <?php if($dat['area'] == $rl['area']){echo 'selected';} ?>><?php echo $rl['area'];?></option>
                    <?php }?>
                </select>
                <span class="text-danger"><?php echo $areaerr;?></span>
            </div>
            <div class="mb-3 col-sm-4 ">
                <button type="submit" class="btn btn-primary " name="submit" value="submit">add</button>
            </div>
        </form>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>