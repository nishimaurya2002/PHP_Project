<?php
include('../config/dbconnect.php');
if(isset($_GET['id'])){
 $id=$_GET['id'];
 $sql="Delete from contact where id=$id";
 if(mysqli_query($con,$sql)){
    echo "<script>
             alert('Your Data deleted successfully');
           window.location.href='pages-contact.php';
        </script>";
 }
}else{
    header('location:pages-contact.php');
}
?>