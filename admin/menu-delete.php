<?php
 include 'layout/header.php';
if(isset($_GET['id'])){
 $id=$_GET['id'];
 $sql="Delete from menu where id=$id";
 if(mysqli_query($con,$sql)){
    echo "<script>
             alert('Your Data deleted successfully');
           window.location.href='index.php';
        </script>";
 }
}else{
    header('location:menu.php');
}

