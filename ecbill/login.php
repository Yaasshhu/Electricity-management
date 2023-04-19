<?php
session_start();
if(isset($_SESSION['email'])){
  header(('location:admin.php'));
  exit(); 
}
elseif(isset($_SESSION['id'])){
  header(('location:home.php'));
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

include_once('dbconnect.php');
if(isset($_POST['register'])){
  header('location:signup.php');
}
$miserr="";
if(isset($_POST['submit'])){
  $sql = "SELECT * FROM admin";
  $d = mysqli_query($conn,$sql);
  $result = mysqli_fetch_assoc($d);
  $valemail=$_POST['email'];
  $valpass=$_POST['pass'];
  if($valemail==$result['email'] && $valpass==$result['password']){
    $_SESSION['email']=$result['email'];
    header('location:admin.php');
  }else{
    $sql = "SELECT * FROM cutomer WHERE email='$valemail' AND password ='$valpass'";
    $res= mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
        $data = mysqli_fetch_assoc($res);
        $_SESSION['id']=$data['id'];
        header('location:home.php');
    }else{
        $miserr="Your username and password not matched";
    }
  }
}
?>
<body>
  <h2 class="mb-5 text-center">Admin Login</h2>
  <div class="container" align="center">
    <form class="" method="post">
      <div class="mb-3 col-sm-4 ">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
      </div>
      <div class="mb-3 col-sm-4">
        <label for="exampleInputPassword1" class="form-label" >Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
      </div>
      <span class="text-danger"><?php echo $miserr;?></span>
      <div class="mb-3 col-sm-4 ">
        <button type="submit" class="btn btn-primary " name="submit" value="submit">Submit</button>
        <button type="submit" class="btn btn-dark " name="register" value="register">Signup</button>
      </div>
    </form>
  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>