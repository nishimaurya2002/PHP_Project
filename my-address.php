    <?php
    ob_start();
    include 'include/header.php';
    include 'include/sidebar.php';
    if(!isset($_SESSION['role']) || $_SESSION['role']!=0){
        header('Location:login.php');
    }
    $userid=$_SESSION['id'];
    $sql="select * from address where user_id=$userid";
    ?>

    <div class="col-lg-9 col-md-6 col-sm-12">
            <div class="row">
                    <!-- <div class="col-lg-1"></div> -->
                        <div class="col-lg-12 myaddress-outer">
                            <a href="add-my-address.php" class="btn address-btn">Add New Address</a>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">#id</th>
                                        <th scope="col">House No.</th>
                                        <th scope="col">Village/colory</th>
                                        <th scope="col">Block/Sertor</th>
                                        <th scope="col">District</th>
                                        <th scope="col">City</th>
                                        <th scope="col">State</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Pincode</th>
                                        <th scope="col">Created_at</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           
                                            $data=mysqli_query($con,$sql);
                                            if(mysqli_num_rows($data) > 0){
                                            while($row=mysqli_fetch_assoc($data)){

                                        ?>
                                        <tr>
                                        <td scope="row"><?=$row['id']?></td>
                                        <td><?=$row['house_no']?></td>
                                        <td><?=$row['vellage']?></td>
                                        <td><?=$row['block']?></td>
                                        <td><?=$row['district']?></td>
                                        <td><?=$row['city']?></td>
                                        <td><?=$row['state']?></td>
                                        <td><?=$row['country']?></td>
                                        <td><?=$row['pincode']?></td>
                                        <td><?=date('d-m-Y',strtotime($row['created_at']))?></td>
                                        <td><a href="myaddress-delete.php?id=<?=$row['id']?>"><i class="fa fa-trash" style="color:red"></i></a>
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