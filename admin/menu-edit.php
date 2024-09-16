<?php
   include 'layout/header.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
    // if(isset($_POST['edit'])){
        $id=$_POST['uid'];
        $type=$_POST['type'];
        $product=$_POST['product'];
        $price=$_POST['price'];
        // if(isset($_FILES['newimage']['name'])){
        //     move_uploaded_file($_FILES['newimage']['tmp_name'],'menus/'.$_FILES['newimage']['name']);
        // }
        // $img=isset($_FILES['newimage']['name']) &&  !empty($_FILES['newimage']['name'])? $_FILES['newimage']['name'] : $_POST['image'];
        if($_FILES['newimage']['name']){
            $tmp_name=$_FILES['newimage']['tmp_name'];
            $orgname=$_FILES['newimage']['name'];
            move_uploaded_file($tmp_name,'menus/'.$orgname);

        }else{
              $orgname=$_POST['oldimage'];
        }
        $descrip=$_POST['description'];
        $sql="Update menu SET type='$type',product='$product',price='$price',image='$orgname' ,description='$descrip' where id=$id";
        if(mysqli_query($con , $sql)){
            echo "<script>
                      alert('Data update successfully');
                       window.location.href='menu.php';
                 </script>";
        }

    // }
}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from menu where id=$id";
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
                        <form class="row g-3" action="<?= $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="uid" value="<?=$single['id']?>">
                            <div class="col-12">
                                <label for="Name" class="form-label text-warning fw-bold">Type</label>
                               <select name="type" class="form-control text-info" value="<?=$single['type']?>">
                                   <option value="">--select Product type--</option>
                                   <option <?= $single['type']=='starter'? 'selected':'';?> value="starter">Starter</option>
                                   <option <?= $single['type']=='main_course'? 'selected':'';?> value="main">Main_Course</option>
                                   <option <?= $single['type']=='drinks'? 'selected':'';?> value="drinks">Drinks</option>
                                   <option <?= $single['type']=='offers'? 'selected':'';?> value="offers">Offers</option>
                                   <option <?= $single['type']=='special'? 'selected':'';?> value="special">Special</option>
                               </select>
                            </div>
                            <div class="col-12">
                                <label for="product" class="form-label text-warning fw-bold">Product Name</label>
                                <input type="text" name="product" class="form-control text-info" id="product" value="<?=$single['product']?>">

                                <label for="price" class="form-label text-warning fw-bold">Product Price</label>
                                <input type="text" name="price" class="form-control text-info" id="price" value="<?=$single['price']?>">

                                <label for="file" class="form-label text-warning fw-bold">Product Image</label>
                                <input type="file" name="newimage" class="form-control text-info" id="image">
                                <input type="hidden" name="oldimage" class="form-control text-info" id="image" value="<?=$single['image']?>">
                                <img src="menus/<?=$single['image']?>" alt="" width="50px" height="50px"><br>

                                <label for="description" class="form-label text-warning fw-bold">Description</label>
                                <textarea type="text" name="description" class="form-control text-info" id="description"><?=$single['description']?></textarea>

                            </div>
                                <button class="btn btn-success w-100" type="submit" value="Edit menu">Add Menu</button>
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
        header('location:menu.php');
     }
 
    ?>
    <?php
        include 'layout/footer.php';
    ?>
    