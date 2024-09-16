<?php
ob_start();
include 'include/header.php';
include 'include/sidebar.php';
if(!isset($_SESSION['role']) || $_SESSION['role']!=0){
    header('Location:login.php');
}

$houseerr=$villageerr=$blockeerr=$districterr=$cityerr=$stateerr=$Countryerr=$pincodeerr='';
if($_SERVER['REQUEST_METHOD']=='POST'){
 if(empty($_POST['house'])){
    $houseerr="*House no field add is required";
}
 elseif(empty($_POST['village'])){
    $villageerr="*Village field add is required";
}
elseif(empty($_POST['block'])){
    $blockeerr="*block field add is required";
}
elseif(empty($_POST['district'])){
    $districterr="*District field add is required";
}
elseif(empty($_POST['city'])){
    $cityerr="*City field add is required";
}
elseif(empty($_POST['state'])){
    $stateerr="*State field add is required";
}
elseif(empty($_POST['country'])){
    $Countryerr="*District field add is required";
}
elseif(empty($_POST['pin'])){
    $pincodeerr="*Pincodefield add is required";
}
 else{
    $house=$_POST['house'];
    $village=$_POST['village'];
    $block=$_POST['block'];
    $district=$_POST['district'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $pincode=$_POST['pin'];
    $userid = $_SESSION['id'];
    $query="insert into address(user_id,house_no,vellage,block,district,city,state,country,pincode) values($userid,'$house','$village','$block','$district','$city','$state','$country','$pincode')";
    if(mysqli_query($con , $query)){
        echo "<script>
                  alert('address data added successfully');
                   window.location.href='my-address.php';
             </script>";
    }
    
 }
}
?>
         <div class="col-lg-9 col-md-6 col-sm-12">
         <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 updateprofile-outer">
                        <form class="update-form" method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                            <fieldset>
                                <legend>My Address</legend>
                                <div class="outer">
                                    <div class="right">
                                        <label for="house">House No.</label>
                                        <input type="text" id="house" name="house" class="form-control">
                                        <small class="text-danger"><?=$houseerr?></small>
                                    </div>
                                    <div class="right">
                                        <label for="village">Village/colory</label>
                                        <input type="text" id="village" name="village" class="form-control">
                                        <small class="text-danger"><?=$villageerr?></small>
                                    </div>
                                </div>
                                <div class="outer">
                                    <div class="right">
                                        <label for="block">Block/Sertor</label>
                                        <input type="text" id="block" name="block" class="form-control">
                                        <small class="text-danger"><?=$blockeerr?></small>
                                    </div>
                                    <div class="right">
                                        <label for="district">District</label>
                                        <input type="text" id="district" name="district" class="form-control">
                                        <small class="text-danger"><?=$districterr?></small>
                                    </div>
                                </div>
                                <div class="outer">
                                    <div class="right">
                                        <label for="city">City</label>
                                        <input type="text" id="city" name="city" class="form-control">
                                        <small class="text-danger"><?=$cityerr?></small>
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
                                        <label for="country">Country</label>
                                        <input type="text" id="country" name="country" class="form-control">
                                        <small class="text-danger"><?=$Countryerr?></small>
                                    </div>
                                    <div class="right">
                                        <label for="pin">Pincode</label>
                                        <input type="text" id="pin" name="pin" class="form-control">
                                        <small class="text-danger"><?=$pincodeerr?></small>
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

