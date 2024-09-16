<?php
include('../config/dbconnect.php');
if(isset($_GET['id'])){
 $id=$_GET['id'];
 $sql="Delete from gallery where id=$id";
 if(mysqli_query($con,$sql)){
    echo "<script>
             alert('gallery Data deleted successfully');
           window.location.href='gallery.php';
        </script>";
 }
}else{
    header('location:gallery.php');
}