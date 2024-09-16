<?php
include('../config/dbconnect.php');
if(isset($_GET['id'])){
 $id=$_GET['id'];
 $sql="Delete from teams where id=$id";
 if(mysqli_query($con,$sql)){
    echo "<script>
             alert('Teams Data deleted successfully');
           window.location.href='team.php';
        </script>";
 }
}else{
    header('location:team.php');
}