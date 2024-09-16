<?php
   include 'layout/header.php';
?>
 <main id="main" class="main">

<div class="pagetitle">
  <h1>booking Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active">Booking</li>
    </ol>
    <div class="add-data text-end">
    <button class="bg-success border border-warning"><a href="add-booking.php" class="text-white">Add Data</a></button>
    </div>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12 " style="overflow-X:scroll;">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data tables</h5>
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th class="text-info">Id</th>
                <th class="text-info">Country</th>
                <th class="text-info">city</th>
                <th  class="text-info">Palace</th>
                <th  class="text-info">Event</th>
                <th  class="text-info">Palace_no</th>
                <th  class="text-info">Vegetarian</th>
                <th  class="text-info">Phone</th>
                <th  class="text-info">Date</th>
                <th  class="text-info">Email</th>
                <th  class="text-info">Status</th>
                <th  class="text-success"data-type="date" data-format="YYYY/DD/MM">Created At</th>
                <th  class="text-danger">Action</th>
              </tr>
            </thead>
            <tbody>
               <?php
                  $sql="select * from booking";
                  $data=mysqli_query($con,$sql);
                  if(mysqli_num_rows($data) > 0){
                     while($row=mysqli_fetch_assoc($data)){

                  
               ?>
              <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['country']?></td>
                <td><?=$row['city']?></td>
                <td><?=$row['palace']?></td>
                <td><?=$row['event']?></td>
                <td><?=$row['palace_no']?></td>
                <td><?=$row['food_type']?></td>
                <td><?=$row['phone']?></td>
                <td><?=$row['date']?></td>
                <td><?=$row['email']?></td>
                <td><span class="<?= $row['status']=='pending'? 'bg-warning' : 'bg-danger'?> p-1 rounded text-white"><?= ucfirst($row['status'])?></span></td>
                <td><?=date('d-m-Y',strtotime($row['created_at']))?></td>
                
                

                    <td>
                        <?= $row['status']!='cancelled'? '<a href="booking-cancel.php?id='
                        .$row['id']. '" class="pe-2"><i class="bi bi-x-circle-fill text-danger fs-5"></i></a>':'' ?>
                        <?php
                            if($row['status']!='accepted' && $row['status']!='cancelled'){
                        ?>
                            <a href="booking-accept.php?id=<?= $row['id']?>"><i class="bi bi-check-circle-fill text-success fs-5"></i></a>
                        <?php }?>
                        <a href="booking-delete.php?id=<?= $row['id']?>"><i class="bi bi-trash"></i></a></td>
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