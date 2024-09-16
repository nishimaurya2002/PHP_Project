<?php
   include 'layout/header.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['edit'])){
        $id=$_POST['uid'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $role=$_POST['role'];
        $sql="Update user SET name='$name',email='$email',phone='$phone',role=$role where id=$id";
        if(mysqli_query($con , $sql)){
            echo "<script>
                      alert('Data update successfully');
                       window.location.href='users.php';
                 </script>";
        }

    }
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from user where id=$id";
    $data=mysqli_query($con,$sql);
    if(mysqli_num_rows($data) > 0 ){
        $single=mysqli_fetch_assoc($data);

    }
?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Edite Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="users.php">Users</a></li>
      <li class="breadcrumb-item active">Users Edit</li>
    </ol>
  </nav>
</div>
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center w-50">
                <div class="card mb-3 ">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Edite Users</h5>
                            <p class="text-center small">Change User Data</p>
                        </div>
                        <p></p>
                        <form class="row g-3" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multiple/form-data">

                                <input type="hidden" class="form-control" name="uid" value="<?=$single['id']?>">

                            <div class="col-12">
                                <label for="Name" class="form-label text-warning fw-bold">Your Name</label>
                                <input type="text" name="name" class="form-control text-info" id="Name" value="<?=$single['name']?>">
                           
                            </div>

                            <div class="col-12">
                                <label for="Email" class="form-label text-warning fw-bold">Username/ Email</label>
                                <input type="email" name="email" class="form-control text-info" id="Email" value="<?=$single['email']?>">
                            </div>

                            <div class="col-12">
                                <label for="phone" class="form-label text-warning fw-bold">Your Phone Number</label>
                                <input type="text" name="phone" class="form-control text-info" id="phone" value="<?=$single['phone']?>">
                            </div>

                            <div class="col-12">
                                <label for="role" class="form-label text-warning fw-bold">Role</label>
                                <input type="number" name="role" class="form-control text-info" id="role" value="<?=$single['role']?>">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success w-100" type="submit" value="Edit User" name="edit">Edit User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
 </main>

    <?php

     }else{
        header('location:index.php');
     }
 
    ?>
    <?php
        include 'layout/footer.php';
    ?>
    