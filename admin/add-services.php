<?php
   include 'layout/header.php';
$nameerr= $priceerr=$imageerr=$descriperr='';
if($_SERVER['REQUEST_METHOD']=='POST'){
 if(empty($_POST['name'])){
  $nameerr="*Product field add is required";
 }
   elseif(empty($_FILES['image']['name'])){
    $imageerr="*Image field add is required";
}
elseif(empty($_POST['description'])){
    $descriperr="*Description field add is required";
}
 else{
    $name=$_POST['name'];
    $descrip=$_POST['description'];
    $imgname=$_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    // move_uploaded_file($temp_name,'services/'.$imgname);
    $image=[];
    foreach($_FILES['image']['tmp_name'] as $key=>$value){
        move_uploaded_file($value,'services/'.$_FILES['image']['name'][$key]);
        array_push($image,$_FILES['image']['name'][$key]);
    }
    $imagejson = json_encode($image);
    $query="insert into services(name,image,description) values('$name','$imagejson','$descrip')";
    if(mysqli_query($con , $query)){
        echo "<script>
                  alert('services data added successfully');
                   window.location.href='services.php';
             </script>";
    }
    
 }
}?>
<main id="main" class="main">
<div class="pagetitle">
  <h1>Edite Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="services.php">Services</a></li>
      <li class="breadcrumb-item active">Add Services</li>
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
                            <h5 class="card-title text-center pb-0 fs-4">Add Services</h5>
                            <p class="text-center small">Change Services Data</p>
                        </div>
                        <p></p>
                        <form class="row g-3" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="name" class="form-label text-warning fw-bold">Service Name</label>
                                <input type="text" name="name" class="form-control text-info" id="name">
                                <small class="text-danger"><?=$nameerr?></small>
                                <label for="image" class="form-label text-warning fw-bold">Service Image</label>
                                <input type="file" name="image[]" multiple class="form-control text-info" id="image">
                                <small class="text-danger"><?=$imageerr?></small>
                                <label for="description" class="form-label text-warning fw-bold">service Description</label>
                                <textarea type="text" name="description" class="form-control text-info" id="description"></textarea>
                                <small class="text-danger"><?=$descriperr?></small>
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
        include 'layout/footer.php';
    ?>