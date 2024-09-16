<?php
   include 'layout/header.php';
$typeerr=$imageerr='';
if($_SERVER['REQUEST_METHOD']=='POST'){
 if(empty($_POST['type'])){
  $typeerr="*Type field is required";
 }
 elseif(empty($_FILES['image'])){
  $imageerr="*Image field add is required";
 }
 else{
    $type=$_POST['type'];
    $imgname=$_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    move_uploaded_file($temp_name,'gallery/'.$imgname);
    $query="insert into gallery(type,image) values('$type','$imgname')";
    if(mysqli_query($con , $query)){
        echo "<script>
                  alert('Gallery data added successfully');
                   window.location.href='gallery.php';
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
      <li class="breadcrumb-item active"><a href="gallery.php">Gallery</a></li>
      <li class="breadcrumb-item active">Add Gallery</li>
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
                            <h5 class="card-title text-center pb-0 fs-4">Add Gallery</h5>
                            <p class="text-center small">Change Image Data</p>
                        </div>
                        <p></p>
                        <form class="row g-3" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="Name" class="form-label text-warning fw-bold">Type</label>
                               <select name="type" class="form-control text-info">
                                   <option value="">--select Image type--</option>
                                   <option value="wedding">wedding</option>
                                   <option value="corporate">Corporate</option>
                                   <option value="cocktail">Cocktail</option>
                                   <option value="buffet">Buffet</option>
                               </select>
                               <small class="text-danger"><?=$typeerr?></small>
                            </div>
                            <div class="col-12">
                                <label for="File" class="form-label text-warning fw-bold">Images</label>
                                <input type="file" name="image" class="form-control text-info" id="phone">
                                <small class="text-danger"><?=$imageerr?></small>
                            </div>

                                <button class="btn btn-success w-100" type="submit" value="Edit User" name="edit">Add Gallery</button>
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
    