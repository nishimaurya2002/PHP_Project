<?php
ob_start();
include 'include/header.php';
include 'include/sidebar.php';
if(!isset($_SESSION['role']) || $_SESSION['role']!=0){
    header('Location:login.php');
  }
$id=$result['id'];
$olderr=$newerr=$confirmerr='';
  if($_SERVER['REQUEST_METHOD']=='POST'){
      if(empty($_POST['oldpass'])){
        $olderr="Please Enter Your Old Password";
      }elseif(empty($_POST['newpass'])){
        $newerr="Please Enter Your New Password";
      }elseif(empty($_POST['confirmpass'])){
          $confirmerr="Please Enter Your confirm password";
      }elseif($_POST['confirmpass']!=$_POST['newpass']){
        $confirmerr="Please Enter Your Confirm Password Sane as New Password";
      }elseif($_POST['oldpass']!=$result['password']){
         $olderr="Please Enter Your Correct Old Password";
      }elseif($_POST['oldpass']==$_POST['newpass']){
         $olderr="Your new password matching old password use difference password";
      }else{
        $newpass=$_POST['newpass'];
        $sql="update user set password='$newpass' where id=$id";
        if(mysqli_query($con,$sql)){
          echo "<script>
               alert('Change Password successfully');
               window.location.href='account.php';
               </script>";
        }
      }
  }
?>
    
         <div class="col-lg-9 col-md-8 col-sm-6 ">
         <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 changepass-outer">
                        <form class="changepass-form" method="post" action="<?=$_SERVER['PHP_SELF']?>">
                            <fieldset>
                                <legend>Change Password</legend>
                                <div class="outer">
                                    <div class="right">
                                        <label for="old">Old Password</label><br>
                                        <input type="password" id="old" name="oldpass" class="form-control" >
                                        <small class="text-danger"><?=$olderr?></small>
                                    </div>
                                </div>
                                <div class="outer">
                                        <div class="right">
                                            <label for="pass">New Password</label>
                                            <input type="password" id="pass" name="newpass" class="form-control" >
                                            <small class="text-danger"><?=$newerr?></small>
                                        </div>
                                </div>
                                <div class="outer">
                                    <div class="right">
                                        <label for="confirmpass">Confirm Password</label>
                                        <input type="password" id="confirmpass" name="confirmpass" class="form-control">
                                        <small class="text-danger"><?=$confirmerr?></small>
                                    </div>
                                </div>
                                <div class="outer">
                                    <input type="submit" >
                                </div>
                            </fieldset>
                        </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
<?php
   include 'include/footer.php';
?>
