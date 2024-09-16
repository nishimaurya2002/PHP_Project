<?php
  include 'include/header.php';
?>
<!-- sigin form start -->
 <section class="login-section">
 <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12 login login-image">
                   <img src="images/blog-2.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-5 col-md-12 login login-form">
                    <h2 class="login-text">Sign up Form</h2>
                    <small class="text-success"><?=isset($_GET['success']) ? $_GET['success'] :''?></small>
                    <small class="text-success"><?=isset($_GET['error']) ? $_GET['error'] :''?></small>

                    <form action="postsignup.php" method="post" enctype="multipart/form-data" class="form">
                        <input type="text" placeholder="Name" name="name">
                        <small class="text-danger"><?=isset($_GET['nameerr']) ? $_GET['nameerr'] :''?></small>
                        <input type="text" placeholder="Email" name="email">
                        <small class="text-danger"><?=isset($_GET['emailerr']) ? $_GET['emailerr'] :''?></small>

                        <input type="number" placeholder="Phone" name="phone">
                        <small class="text-danger"><?=isset($_GET['phoneerr']) ? $_GET['phoneerr'] :''?></small>

                        <input type="password" placeholder="Password" name="password">
                        <small class="text-danger"><?=isset($_GET['passerr']) ? $_GET['passerr'] :''?></small>
                        <input type="password" placeholder="confirm password" name="c_password">
                        <small class="text-danger"><?=isset($_GET['cpasserr']) ? $_GET['cpasserr'] :''?></small>
                        <input type="submit" value="Sign up" name="signup">
                        <span class="sigin-text ps-3">Already Have an account?<a href="login.php ">  login</a></span>
                    </form>
                </div>
                <div class="col-lg-1"></div>
        </div>
        </div>
 </section>
    
<!-- sigin form end -->
    <?php
      include 'include/footer.php';
     ?>