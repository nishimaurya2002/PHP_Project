<?php
    ob_start();
    include 'include/header.php';
    include 'include/sidebar.php';
    if(!isset($_SESSION['role']) || $_SESSION['role']!=0){
        header('Location:login.php');
    }

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="Delete from address where id=$id";
        if(mysqli_query($con,$sql)){
           echo "<script>
                    alert('Your Data deleted successfully');
                  window.location.href='add-my-address.php';
               </script>";
        }
       }else{
           header('location:account.php');
       }
    ?>
