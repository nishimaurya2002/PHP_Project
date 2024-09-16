<?php
  include 'layout/header.php';
?>
 <main id="main" class="main">
<div class="pagetitle">
  <h1>User Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Contact</li>
    </ol>
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
                <th class="text-info">Name</th>
                <th class="text-info">Email</th>
                <th class="text-info">Message</th>
                <th class="text-info">response</th>
                <th class="text-info" data-type="date" data-format="YYYY/DD/MM">Created At</th>
                <th class="text-danger">Action</th>
              </tr>
            </thead>
            <tbody>
               <?php
                  $sql="select * from contact";
                  $data=mysqli_query($con,$sql);
                  if(mysqli_num_rows($data) > 0){
                     while($row=mysqli_fetch_assoc($data)){

                  
               ?>
              <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['message']?></td>
                <td><?=$row['response']?></td>
                <td><?=date('d-m-Y',strtotime($row['created_at']))?></td>
                <td><a class="mx-2" href="contact-edit.php?id=<?=$row['id']?>"><i class="bi bi-pencil-square" style="color:blue"></i></a><a href="contact-delete.php?id=<?=$row['id']?>"><i class="bi bi-trash" style="color:red"></i></a></td>
                <td></td>
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