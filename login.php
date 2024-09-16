<?php
ob_start();
  include 'include/header.php';
if(isset($_SESSION['id'])){
    if($_SESSION['role']==1){
        header('location:admin/index.php');
    }else{
        header('location:account.php');
    }
}
$usererr=$passerr=$final='';
  if($_SERVER['REQUEST_METHOD']=='POST'){
   if(empty($_POST['username'])){
        $usererr="Please Enter Your Username";
   }elseif(!filter_var($_POST['username'],FILTER_VALIDATE_EMAIL)){
         $usererr="Invalid Username";
   }elseif(empty($_POST['pwd'])){
    $passerr="Please Enter Your Password";
   }else{
       $user=$_POST['username'];
       $pass=$_POST['pwd'];
       $sql="select * from user where email='$user' && password='$pass' ";
       $result=mysqli_query($con,$sql);
       if(mysqli_num_rows($result)>0){
        // print_r($result);
        $data=mysqli_fetch_assoc($result);
        $_SESSION['id']=$data['id'];
        $_SESSION['email']=$data['email'];
        $_SESSION['name']=$data['name'];
        $_SESSION['role']=$data['role'];
        if($data['role']==0){
            header('location:account.php');
        }else{
            header('location:admin/index.php');
       }
       }else{
        $final="username or password incorrect";
       }
   }
  }
?>
<!-- login form start -->
<section class="login-section">
<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-5 col-md-12 login login-image">
            <img src="images/blog-3.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-lg-5 col-md-12 login login-form ">
            <h2 class="login-text pt-5">Login Form</h2>
            <small class="text-danger"><?=$final?></small>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" class="form">
                <input type="text" placeholder="username" name="username">
                <small class="text-danger"><?=$usererr?></small>
                <input type="password" placeholder="password" name="pwd">
                <small class="text-danger"><?=$passerr?></small>
                <input type="submit" value="Login">
                <span class="login-par"> <a href="signup.php" class="ps-3">Have a create account</a></span>
            </form>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
</section>
<!-- login form end --> 
    <?php
      include 'include/footer.php';
     ?>