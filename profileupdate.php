<?php
   ob_start();
   include 'include/header.php';
   $sid = $_SESSION['id'];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    if($_FILES['profile']['name']){
        $profilename=$_FILES['profile']['name'];
        $ptmpname=$_FILES['profile']['tmp_name'];
        move_uploaded_file($ptmpname,'profileimg/'.$profilename);
    }else{
        $profilename=$_POST['oldprofile'];
    }
   $sql="update user set name='$name',email='$email',phone='$phone',dob='$dob',gender='$gender',state='$state',city='$city',profile_image='$profilename' where id=$sid";
   if(mysqli_query($con,$sql)){
     echo "<script>
          alert(' profile updated successfully');
          window.location.href='account.php';
          </script>";
   }
}
?>