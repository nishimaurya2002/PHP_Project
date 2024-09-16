<?php
    ob_start();
    include 'include/header.php';
    include 'include/sidebar.php';
    if(!isset($_SESSION['role']) || $_SESSION['role']!=0){
        header('Location:login.php');
    }
  
    ?>

    <div class="col-lg-9 col-md-6 col-sm-12">
            <div class="row">
                    <!-- <div class="col-lg-1"></div> -->
                        <div class="col-lg-12 myaddress-outer">
                            <a href="add-my-address.php" class="btn address-btn">Add booking</a>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">#id</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Palace</th>
                                        <th scope="col">Event</th>
                                        <th scope="col">Palace_no</th>
                                        <th scope="col">Vegetarian</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created_at</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                             $userid=$_SESSION['id'];
                                             $sql="select * from booking where user_id=$userid";
                                            $data=mysqli_query($con,$sql);
                                            if(mysqli_num_rows($data) > 0){
                                            while($row=mysqli_fetch_assoc($data)){

                                        ?>
                                        <tr>
                                        <td scope="row"><?=$row['id']?></td>
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
                                            <?= $row['status']!='cancelled'? '<a href="change-status.php?id='
                                            .$row['id']. '" class="pe-2"><i class="fa fa-times-circle text-danger fs-5"></i></a>':'' ?>
                                            <a href="booking-delete.php?id=<?= $row['id']?>"><i class="fa fa-trash"></i></a>
                                        </td>
                                        </tr>
                                        
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                        </div>
                    <!-- <div class="col-lg-1"></div> -->
                </div>
            </div>
    <?php
    include 'include/footer.php';
    ?>