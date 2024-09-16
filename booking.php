<?php
ob_start();
include 'include/header.php';
if(!isset($_SESSION['role'])){
    header('Location:login.php');
}
$uid = $_SESSION['id'];
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
        $to=$email;
        $subject="Booking Mail";
        $msg="Your Booking request sended and replying soon..";
        $header='from: ranimaurya591@gmail.com'."\r\n".
                  'Cc: ranimaurya591@gmail.com'."\r\n".
                  'content-type:text/html;charset=UTF-8'."\r\n".
                  'x-Mailer:PHP/'.phpversion();
                  if(mail($to,$subject,$msg,$header)){
                    echo "<script>
                    alert('booking data added successfully');
                     window.location.href='booking.php';
                   </script>";
                  }else{
                    print_r('Mailer error:'.error_clear_last());
                  }
    
    }
    
 }
}
?>
    <!-- Hero Start -->
    <section class="all-hero-section">
        <div class="container text-center wow bounceInDown " data-wow-delay="0.1s">
            <h1 class="display-1 mb-4">Booking</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item "><a href="#">Home</a></li>
                <li class="breadcrumb-item "><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark fs-6" aria-current="page">Booking</li>
            </ol>
        </div>
    </section>
    <!-- Hero End -->
    <!-- book us section start-->
    <section class="book-section">
        <div class="container">
            <div class="row g-0 wow bounceInUp" data-wow-delay="0.1s">
                <div class="col-1">
                    <img src="images/background-site.jpg" alt=""
                        class="img-fluid w-100 h-100 object-fit-cover rounded-start">
                </div>
                <div class="col-10">
                    <div class="book-content border-bottom border-top py-5 px-4">
                        <div class="text-center">
                            <small
                                class="d-inline-block small-btn fs-6 fw-bold text-dark text-uppercase  rounded-pill px-4 py-1 mb-3 ">Book
                                Us
                            </small>
                            <h2 class="text-dark display-5 mb-5">Where you want Our Services</h2>
                        </div>
                        <div class="row">
                        <form class="booking-form" method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                            <div class="col-lg-4 col-md-6 my-3 booking-outer">
                                <div class="booking-inner">
                                    <select class="book-select form-select p-2 form-control"  name ="country"id="">
                                        <option selected>Select Country</option>
                                        <option value="USA">USA</option>
                                        <option value="UK">UK</option>
                                        <option value="India">India</option>
                                    </select>
                                    <small class="text-danger"><?=$countryerr?></small>
                                </div>
                                <div class="booking-inner">
                                    <select class="book-select form-select p-2 form-control" name="city" id="">
                                        <option selected>Select City</option>
                                        <option value="Deoend On Country">Depend On Country</option>
                                        <option value="Uk">UK</option>
                                        <option value="India">India</option>
                                    </select>
                                    <small class="text-danger"><?=$cityerr?></small>
                                </div>
                                <div class="booking-inner">
                                    <select class="book-select form-select p-2 form-control" name="palace" id="">
                                        <option selected>Select Palace</option>
                                        <option value="Depend">Depend On Country</option>
                                        <option value="Uk">UK</option>
                                        <option value="India">India</option>
                                    </select>
                                    <small class="text-danger"><?=$palaceerr?></small>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 my-3  booking-outer">
                                <div class="booking-inner">
                                    <select class="book-select form-select p-2 form-control" name="event" id="">
                                        <option selected>Small Event</option>
                                        <option value="Event">Event Type</option>
                                        <option value="Big Event">Big Event</option>
                                        <option value="Small Event">Small Event</option>
                                    </select>
                                    <small class="text-danger"><?=$eventerr?></small>
                                </div>
                                <div class="booking-inner">
                                    <select class="book-select form-select p-2 form-control"name="palace_no" id="">
                                        <option selected>No. Of Palace</option>
                                        <option value="100-200">100-200</option>
                                        <option value="300-400">300-400</option>
                                        <option value="00-600">500-600</option>
                                        <option value="700-800">700-800</option>
                                        <option value="900-1000">900-1000</option>
                                        <option value="1000+">1000+</option>
                                    </select>
                                    <small class="text-danger"><?=$palace_noerr?></small>
                                </div>
                                <div class="booking-inner">
                                    <select class="book-select form-select p-2 form-control" name="vegetarian" id="">
                                        <option selected>Vegetarian</option>
                                        <option value="Vegetarian">Vegetarian</option>
                                        <option value="Non Vegetarian">Non Vegetarian</option>
                                    </select>
                                    <small class="text-danger"><?=$vegetarerr?></small>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 my-3  booking-outer">
                                <div class="booking-inner">
                                    <input class="book-input form-control p-2 bg-white" type="text" name="phone"
                                    placeholder="Your Contact No.">
                                    <small class="text-danger"><?=$phoneerr?></small>
                                </div>
                                <div class="booking-inner">
                                    <input class="book-input form-control p-2 bg-white" type="date" name="date"
                                    placeholder="select date">
                                    <small class="text-danger"><?=$dateerr?></small>
                                </div>
                                <div class="booking-inner">
                                    <input class="book-input form-control p-2 bg-white" type="text" name="email"
                                    placeholder="Enter Your Email">
                                    <small class="text-danger"><?=$emailerr?></small>
                            </div>
                            </div>
                            <div class="col-lg-12 text-center my-4">
                                <input type="submit" class=" book-btn rounded-pill" value="Submit" >
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <img src="images/background-site.jpg" alt=""
                        class="img-fluid w-100 h-100 object-fit-cover rounded-end">
                </div>
            </div>
        </div>
    </section>
    <!-- book us section end-->
    <?php
      include 'include/footer.php';
     ?>