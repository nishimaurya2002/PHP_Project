<?php
   include 'layout/header.php';
   if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['edit'])){
        $id=$_POST['uid'];
        $name=$_POST['name'];
        // $imgname=$_FILES['newimage'];
        // print_r($imgname);
        // die();
        if(!empty($_FILES['newimage']['name'][0])){
            $image=[];
            foreach($_FILES['newimage']['tmp_name'] as $key=>$value){
                move_uploaded_file($value,'services/'.$_FILES['newimage']['name'][$key]);
                array_push($image,$_FILES['newimage']['name'][$key]);
            }
            $orgname = json_encode($image);

        }else{
              $orgname=json_encode($_POST['oldimage']);
        }
        $descrip=$_POST['description'];
        $sql="Update services SET name='$name',image='$orgname',description='$descrip' where id=$id";
        if(mysqli_query($con,$sql)){
            echo "<script>
                      alert('Data update successfully');
                       window.location.href='services.php';
                 </script>";
        }

    }
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from services where id=$id";
    $data=mysqli_query($con , $sql);
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
      <li class="breadcrumb-item active"><a href="menu.php">Menu</a></li>
      <li class="breadcrumb-item active">Add Menu</li>
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
                        <p></p>
                        <form class="row g-3" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="uid" value="<?=$single['id']?>">
                            <div class="col-12">
                                <label for="name" class="form-label text-warning fw-bold">Service Name</label>
                                <input type="text" name="name" class="form-control text-info" id="name" value="<?=$single['name']?>">

                                <label for="image" class="form-label text-warning fw-bold">Service Image</label>
                                <input type="file" name="newimage[]" multiple class="form-control text-info" id="image">
                                <input type="hidden" name="oldimage[]" class="form-control text-info" id="image" value="<?=$single['image']?>">
                                <?php 
                                // print_r();
                                // die();
                                
                                foreach(json_decode($single['image']) as $image){?>
                                    <img src="services/<?=$image?>" alt="" width="50px" height="50px">
                                <?php }?>
                                
                                </br>
                                <label for="description" class="form-label text-warning fw-bold">service Description</label>
                                <textarea type="text" name="description" class="form-control text-info" id="description"><?=$single['description']?></textarea>

                            </div>
                                <button class="btn btn-success w-100" type="submit" value="Edit service" name="edit">Add services</button>
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
        header('location:services.php');
     }
 
    ?>
    <?php
        include 'layout/footer.php';
    ?>
    