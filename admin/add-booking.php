<?php
   include 'layout/header.php';
   $countryerr=$cityerr=$palaceerr=$eventerr=$palace_noerr=$vegetarerr=$phoneerr=$dateerr=$emailerr='';
   if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty($_POST['country'])){
       $countryerr="*country field add is required";
   }
    elseif(empty($_POST['city'])){
       $cityerr="*City field add is required";
   } 
   elseif(empty($_POST['palace'])){
       $palaceerr="*palace field add is required";
   }
   elseif(empty($_POST['event'])){
       $eventerr="*Event field add is required";
   }
   elseif(empty($_POST['palace_no'])){
       $palace_noerr="*Payment field add is required";
   }
   elseif(empty($_POST['vegetarian'])){
       $vegetarerr="*Vegetarian field add is required";
   }
   elseif(empty($_POST['phone'])){
       $phoneerr="*Phone field add is required";
   }
   elseif(empty($_POST['date'])){
       $dateerr="*Date field add is required";
   }
   elseif(empty($_POST['email'])){
       $emailerr="*Email field add is required";
   }
    else{
       $country=$_POST['country'];
       $city=$_POST['city'];
       $palace=$_POST['palace'];
       $event=$_POST['event'];
       $palace_no=$_POST['palace_no']? $_POST['palace_no']:'';
       $vegetarian=$_POST['vegetarian'];
       $phone=$_POST['phone'];
       $date=$_POST['date'];
       $email=$_POST['email'];
       $query="insert into booking(user_id,country,city,palace,event,palace_no,food_type,phone,date,email,status) values($uid,'$country','$city','$palace','$event','$palace_no','$vegetarian','$phone','$date','$email','pending')";
       if(mysqli_query($con , $query)){
           echo "<script>
                     alert('booking data added successfully');
                      window.location.href='booking.php';
                </script>";
       }
       
    }
   }?>
<main id="main" class="main">
<div class="pagetitle">
  <h1>Edite Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="booking.php">Booking</a></li>
      <li class="breadcrumb-item active">Add Booking</li>
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
                            <h5 class="card-title text-center pb-0 fs-4">Add Booking</h5>
                            <p class="text-center small">Change Bookimg Data</p>
                        </div>
                        <p></p>
                        <form class="row g-3" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="Name" class="form-label text-warning fw-bold">Country</label>
                               <select name="country" class="form-control text-info">
                                   <option value="">--select Country type--</option>
                                   <option value="USA">USA</option>
                                   <option value="Uk">UK</option>
                                   <option value="India">India</option>
                               </select>
                               <small class="text-danger"><?= $countryerr?></small>
                            </div>
                            <div class="col-12">
                               <label for="Name" class="form-label text-warning fw-bold">city</label>
                               <select name="city" class="form-control text-info">
                                   <option value="">--select City type--</option>
                                   <option value="USA">USA</option>
                                   <option value="Uk">UK</option>
                                   <option value="India">India</option>
                               </select>
                               <small class="text-danger"><?=$cityerr?></small>

                               <label for="Name" class="form-label text-warning fw-bold">Palace</label>
                               <select name="palace" class="form-control text-info">
                                   <option value="">--select Palace type--</option>
                                   <option value="USA">USA</option>
                                   <option value="Uk">UK</option>
                                   <option value="India">India</option>
                               </select>
                               <small class="text-danger"><?=$palaceerr?></small>

                               <label for="Name" class="form-label text-warning fw-bold">Event</label>
                               <select name="event" class="form-control text-info">
                                   <option value="">--select Event type--</option>
                                       <option selected>Small Event</option>
                                        <option value="Event">Event Type</option>
                                        <option value="Big Event">Big Event</option>
                                        <option value="Small Event">Small Event</option>
                               </select>
                               <small class="text-danger"><?=$eventerr?></small>

                                <label for="palace" class="form-label text-warning fw-bold">No. Of Palace</label>
                                <select name="palace_no" class="form-control text-info">
                                        <option selected>No. Of Palace</option>
                                        <option value="100-200">100-200</option>
                                        <option value="300-400">300-400</option>
                                        <option value="00-600">500-600</option>
                                        <option value="700-800">700-800</option>
                                        <option value="900-1000">900-1000</option>
                                        <option value="1000+">1000+</option>
                               </select>
                               <small class="text-danger"><?=$palace_noerr?></small>

                               <label for="palace" class="form-label text-warning fw-bold">Vegetarian</label>
                                <select name="vegetarian" class="form-control text-info">
                                        <option selected>Vegetarian</option>
                                        <option value="Vegetarian">Vegetarian</option>
                                        <option value="Non Vegetarian">Non Vegetarian</option>
                               </select>
                               <small class="text-danger"><?=$vegetarerr?></small>
                               
                               <label for="phone" class="form-label text-warning fw-bold">Phone</label>
                                <input type="text" name="phone" class="form-control text-info" id="phone">
                                <small class="text-danger"><?=$phoneerr?></small>

                                <label for="date" class="form-label text-warning fw-bold">Date</label>
                                <input type="date" name="date" class="form-control text-info" id="date">
                                <small class="text-danger"><?=$dateerr?></small>

                                <label for="email" class="form-label text-warning fw-bold">Email</label>
                                <input type="email" name="email" class="form-control text-info" id="email">
                                <small class="text-danger"><?=$emailerr?></small>
                            </div>
                                <button class="btn btn-success w-100" type="submit" value="Edit User" name="edit">Add Booking</button>
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
        include 'layout/footer.php';
    ?>