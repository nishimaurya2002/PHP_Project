    <?php
    ob_start();
    include 'include/header.php';
    include 'include/sidebar.php';
    if(!isset($_SESSION['role']) || $_SESSION['role']!=0){
        header('Location:login.php');
    }
    // $sid = $_SESSION['id'];
   // $sql="select* from user where id=$sid";
    // $data=mysqli_query($con,$sql);
    // $result='';
    // if(mysqli_num_rows($data) > 0){
    //    $result=mysqli_fetch_assoc($data);
    // } 
    ?>
        
            <div class="col-lg-9 col-md-6 col-sm-12">
            <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 updateprofile-outer">
                            <form class="update-form" method="post" action="profileupdate.php" enctype="multipart/form-data">
                                <div class="profile-image">
                                    <img src="profileimg/<?=$result['profile_image']?>" alt="">
                                </div>
                                <fieldset>
                                    <legend>Profile</legend>
                                    <div class="outer">
                                        <div class="right">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" value="<?=$result['name']?>" class="form-control">
                                        </div>
                                        <div class="right">
                                            <label for="email">Email id</label>
                                            <input type="email" id="email" name="email" value="<?=$result['email']?>" class="form-control">
                                    </div>
                                    </div>
                                    <div class="outer">
                                        <div class="right">
                                            <label for="no">Phone Number</label>
                                            <input type="number" id="no" name="phone" value="<?=$result['phone']?>" class="form-control">
                                        </div>
                                    <div class="right">
                                        <label for="dob">Date Of Birth</label>
                                        <input type="date" id="dob" name="dob" value="<?=$result['dob']?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="outer">
                                        <div class="right">
                                            <label class="w-100" for="gen">Gender</label>
                                            <input type="radio" id="gen" name="gender" value="male" <?=$result['gender']=='male' ? 'checked':''?>>Male
                                            <input type="radio" id="gen" name="gender" value="female" <?=$result['gender']=='female' ? 'checked':''?>>Female
                                            <input type="radio" id="gen" name="gender" value="other" <?=$result['gender']=='other' ? 'checked':''?>>Other
                                        </div>
                                        <div class="right">
                                        <label for="state">State</label>
                                        <select class="form-control" name="state">
                                                <option value="">---select---</option>
                                                <?php
                                                $state=['uttar pradesh','uttarakhand','bihar'];
                                                foreach($state as $st){
                                                ?>
                                                <option <?=$result['state']==$st?'selected':''?> value="<?=$st?>"><?=ucfirst($st);?></option>
                                                <?php
                                                }
                                                ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="outer">
                                        <div class="right">
                                            <label for="city">City</label>
                                            <input type="text" id="city" name="city" value="<?=$result['city']?>" class="form-control">
                                        </div>
                                        <div class="right">
                                            <label for="file">Photo</label>
                                            <input type="file" id="file"  name="profile" class="form-control">
                                            <input type="hidden" id="file"  name="oldprofile" value="<?=$result['profile_image']?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="outer">
                                        <input type="submit" value="save">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
    <?php
    include 'include/footer.php';
    ?>

