  <!-- ======= Sidebar ======= --->
   <?php
     $sid = $_SESSION['id'];
     $sql="select* from user where id=$sid";
     $data=mysqli_query($con,$sql);
     $result='';
     if(mysqli_num_rows($data) > 0){
        $result=mysqli_fetch_assoc($data);
     }
   ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 sidebar-outer">
                <div class="myprofile-box">
                     <div class="profile-img">
                        <img src="profileimg/<?=$result['profile_image']?>" alt="">
                     </div>
                     <div class="profile-name">
                        <h2><?=$result['name']?></h2>
                     </div>
                </div>
                <div class="navigation">
                        <ul>
                            <li class="navigation-list">
                                <a href="account.php">
                                    <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <span class="title">My profile</span>
                                </a>
                            </li>
                            <li class="navigation-list">
                            <a href="changepass.php">
                                <span class="icon"><i class="fa fa-laptop" aria-hidden="true"></i></span>
                                <span class="title">Change Password</span>
                            </a>
                            </li>
                            <li class="navigation-list">
                            <a href="my-address.php">
                                <span class="icon"><i class="fa fa-map-marker"aria-hidden="true"></i></span>
                                <span class="title">My Address</span>
                            </a>
                            </li>
                            <li class="navigation-list">
                            <a href="booking-list.php">
                                <span class="icon"><i class="fa fa-book"aria-hidden="true"></i></span>
                                <span class="title">My Booking</span>
                            </a>
                            </li>
                            <li class="navigation-list">
                                <a href="logout.php">
                                    <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                                    <span class="title">Logout</span>
                                </a>
                            </li>
                        </ul>
	            </div>
            </div>