<?php
   include 'layout/header.php';
   if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['edit'])){
        $id=$_POST['uid'];
        if($_FILES['newimage']['name']){
            $tmp_name=$_FILES['newimage']['tmp_name'];
            $orgname=$_FILES['newimage']['name'];
            move_uploaded_file($tmp_name,'teams/'.$orgname);

        }else{
              $orgname=$_POST['oldimage'];
        }
        $name=$_POST['name'];
        $position=$_POST['position'];
        $sql="Update teams SET image='$orgname',name='$name',position='$position' where id=$id";
        if(mysqli_query($con , $sql)){
            echo "<script>
                      alert('Data update successfully');
                       window.location.href='team.php';
                 </script>";
        }

    }
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from teams where id=$id";
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
      <li class="breadcrumb-item active"><a href="menu.php">Teams</a></li>
      <li class="breadcrumb-item active">Add Team</li>
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
                            <h5 class="card-title text-center pb-0 fs-4">Add Menu</h5>
                            <p class="text-center small">Change Image Data</p>
                        </div>
                        <form class="row g-3" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="uid" value="<?=$single['id']?>">
                            <div class="col-12">
                                <label for="file" class="form-label text-warning fw-bold">Team Image</label>
                                <input type="file" name="newimage" class="form-control text-info" id="image">
                                <input type="hidden" name="oldimage" class="form-control text-info" id="image" value="<?=$single['image']?>">
                                <img src="teams/<?=$single['image']?>" alt="" width="50px" height="50px"><br>

                                <label for="name" class="form-label text-warning fw-bold">Team Name</label>
                                <input type="text" name="name" class="form-control text-info" id="name" value="<?=$single['name']?>">

                                <label for="position" class="form-label text-warning fw-bold"> Team Position</label>
                                <input type="text" name="position" class="form-control text-info" id="position" value="<?=$single['position']?>">

                            </div>
                                <button class="btn btn-success w-100" type="submit" value="Edit User" name="edit">Add Team</button>
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
        header('location:team.php');
     }
 
    ?>
    <?php
        include 'layout/footer.php';
    ?>
    