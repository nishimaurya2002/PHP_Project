<?php
   include 'layout/header.php';
$typeerr=$producterr= $priceerr=$imageerr=$descriperr='';
if($_SERVER['REQUEST_METHOD']=='POST'){
 if(empty($_POST['type'])){
  $typeerr="*Type field is required";
 }
 elseif(empty($_POST['product'])){
  $producterr="*Product field add is required";
 }
 elseif(empty($_POST['price'])){
    $priceerr="*Price field add is required";
}
   elseif(empty($_FILES['image']['name'])){
    $imageerr="*Image field add is required";
}
elseif(empty($_POST['description'])){
    $descriperr="*Description field add is required";
}
 else{
    $type=$_POST['type'];
    $product=$_POST['product'];
    $price=$_POST['price'];
    $descrip=$_POST['description'];
    $imgname=$_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    move_uploaded_file($temp_name,'menus/'.$imgname);
    $query="insert into menu(type,product,price,image,description) values('$type','$product','$price','$imgname','$descrip')";
    if(mysqli_query($con , $query)){
        echo "<script>
                  alert('Gallery data added successfully');
                   window.location.href='menu.php';
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
                            <h5 class="card-title text-center pb-0 fs-4">Add Menus</h5>
                            <p class="text-center small">Change Menu Data</p>
                        </div>
                        <p></p>
                        <form class="row g-3" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="Name" class="form-label text-warning fw-bold">Product Type</label>
                               <select name="type" class="form-control text-info">
                                   <option value="">--select Product type--</option>
                                   <option value="starter">Starter</option>
                                   <option value="main">Main Course</option>
                                   <option value="drinks">Drinks</option>
                                   <option value="offers">Offers</option>
                                   <option value="special">Special</option>
                               </select>
                               <small class="text-danger"><?=$typeerr?></small>
                            </div>
                            <div class="col-12">
                                <label for="product" class="form-label text-warning fw-bold">Product Name</label>
                                <input type="text" name="product" class="form-control text-info" id="product">
                                <small class="text-danger"><?=$producterr?></small>
                                <label for="price" class="form-label text-warning fw-bold">Product Price</label>
                                <input type="text" name="price" class="form-control text-info" id="price">
                                <small class="text-danger"><?=$priceerr?></small>
                                <label for="file" class="form-label text-warning fw-bold">Product Image</label>
                                <input type="file" name="image" class="form-control text-info" id="image">
                                <small class="text-danger"><?=$imageerr?></small>
                                <label for="description" class="form-label text-warning fw-bold">Product Description</label>
                                <textarea type="text" name="description" class="form-control text-info" id="description"></textarea>
                                <small class="text-danger"><?=$descriperr?></small>
                            </div>
                                <button class="btn btn-success w-100" type="submit" value="Edit User" name="edit">Add Menus</button>
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