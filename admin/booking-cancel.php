<?php
include('../config/dbconnect.php');
if(isset($_GET['id'])){
 $id=$_GET['id'];
 $sql="update booking set status='cancelled' where id=$id";
 if(mysqli_query($con,$sql)){
  $to="ranimaurya591@gmail.com";
  $subject="Booking Mail cancelled";
  $msg="Your Booking request sended and replying soon..";
  $header='from: ranimaurya591@gmail.com'."\r\n".
            'Cc: ranimaurya591@gmail.com'."\r\n".
            'content-type:text/html;charset=UTF-8'."\r\n".
            'x-Mailer:PHP/'.phpversion();
            if(mail($to,$subject,$msg,$header)){
              echo "<script>
             alert('Your Data cancelled successfully');
           window.location.href='booking.php';
        </script>";
            }else{
              print_r('Mailer error:'.error_clear_last());
            }
//     echo "<script>
//              alert('Your Data cancelled successfully');
//            window.location.href='booking.php';
//         </script>";
//  }
// }else{
//     header('location:booking.php');
}
}
?>