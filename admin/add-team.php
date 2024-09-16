<?php
   include 'layout/header.php';
$imageerr=$nameerr=$positionerr='';
if($_SERVER['REQUEST_METHOD']=='POST'){
if(empty($_FILES['image']['name'])){
    $imageerr="*Image field add is required";
}
elseif(empty($_POST['name'])){
    $nameerr="*Name field add is required";
}
elseif(empty($_POST['position'])){
      $positionerr="*Position field add is required";
}

else{
    $name=$_POST['name'];
    $position=$_POST['position'];
    $imgname=$_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    move_uploaded_file($temp_name,'teams/'.$imgname);
    $query="insert into teams(image,name,position) values('$imgname','$name','$position')";
    if(mysqli_query($con , $query)){
        echo "<script>
                  alert('Teams data added successfully');
                   window.location.href='team.php';
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
      <li class="breadcrumb-item active"><a href="team.php">Team</a></li>
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
                            <h5 class="card-title text-center pb-0 fs-4">Add Team</h5>
                            <p class="text-center small">Change Team Data</p>
                        </div>
                        <p></p>
                        <form class="row g-3" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="file" class="form-label text-warning fw-bold">Team Image</label>
                                <input type="file" name="image" class="form-control text-info" id="image">
                                <small class="text-danger"><?=$imageerr?></small>
                                <label for="name" class="form-label text-warning fw-bold">Team Name</label>
                                <input type="text" name="name" class="form-control text-info" id="name">
                                <small class="text-danger"><?=$nameerr?></small>
                                <label for="position" class="form-label text-warning fw-bold"> Team Position</label>
                                <input type="text" name="position" class="form-control text-info" id="position">
                                <small class="text-danger"><?=$positionerr?></small>
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
        include 'layout/footer.php';
    ?>