<?php
   include 'layout/header.php';
?>
 <main id="main" class="main">

<div class="pagetitle">
  <h1>Menu Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Menu</li>
    </ol>
    <div class="add-data text-end">
    <button class="bg-success border border-warning"><a href="add-menu.php" class="text-white">Add Data</a></button>
    </div>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data tables</h5>
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th class="text-info">Id</th>
                <th class="text-info">Product Type</th>
                <th class="text-info">Product Name</th>
                <th  class="text-info">Product Price</th>
                <th  class="text-info">Product Image</th>
                <th  class="text-info">Product Description</th>
                <th  class="text-success"data-type="date" data-format="YYYY/DD/MM">Created At</th>
                <th  class="text-danger">Action</th>
              </tr>
            </thead>
            <tbody>
               <?php
                  $sql="select * from menu";
                  $data=mysqli_query($con,$sql);
                  if(mysqli_num_rows($data) > 0){
                     while($row=mysqli_fetch_assoc($data)){

                  
               ?>
              <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['type']?></td>
                <td><?=$row['product']?></td>
                <td><?=$row['price']?></td>
                <td><img src="menus/<?=$row['image']?>" height="50" width="50"/></td>
                <td><?=$row['description']?></td>
                <td><?=date('d-m-Y',strtotime($row['created_at']))?></td>
                <td><a class="mx-2" href="menu-edit.php?id=<?=$row['id']?>"><i class="bi bi-pencil-square" style="color:blue"></i></a><a href="menu-delete.php?id=<?=$row['id']?>"><i class="bi bi-trash" style="color:red"></i></a></td>
               </tr>
               <?php
                    }
                  }
               ?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
<?php
   include 'layout/footer.php';
?>