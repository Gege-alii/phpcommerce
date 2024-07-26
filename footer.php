<?php
require_once 'connection.php';

if(isset($_SESSION['lang'])){
    $lang=$_SESSION['lang'];
}else{
    $lang="en";
}
if($lang=="en"){
    require_once 'msg_en.php';
}else{
    require_once 'msg_ar.php';
}

?>

<!DOCTYPE html>
<html lang="<?php echo $lang?>" dir="<?php echo $msg['dir']?>">



<footer class="section-p1">
        <div class="col">
            <a href="index.html"><img class="logo" src="img/logo.png" alt=""></a>
            <h4><?php echo $msg['Contact']?></h4>
            <p><?php echo $msg['Address: 526 manchster Road, street 32, manchster']?></p>
            <p><?php echo $msg['Phone: 0106244875']?></p>
            <p><?php echo $msg['Hours: 10AM - 10Pm, Sat- thus']?></p>
            <div class="follow">
                <h4><?php echo $msg['Follow US :']?></h4>
                <div class="icon">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

        </div>
        <div class="col">
            <h4><?php echo $msg['About Us']?></h4>
            <a href="#"><?php echo $msg['About Us']?></a>
            <a href="#"><?php echo $msg['Delivery information']?></a>
            <a href="#"><?php echo $msg['Privacy policy']?></a>
            <a href="#"><?php echo $msg['Terms & Condtions']?></a>
            <a href="#"><?php echo $msg['Contact Us']?></a>
        </div>
        <div class="col">
            <h4><?php echo $msg['My Account']?></h4>
            <a href="login.php"><?php echo $msg['Sign in']?></a>
            <a href="cart.php"><?php echo $msg['View Cart']?></a>
            <a href="#"><?php echo $msg['My Whishlist']?></a>
            <a href="#"><?php echo $msg['Track My order']?></a>
            <a href="#"><?php echo $msg['Help']?></a>
        </div>
        <div class="col install">
            <h4><?php echo $msg['Install App']?></h4>
            <p><?php echo $msg['From App Store Or Google Play']?></p>
            <div class="oo">
                <img src="img/pay/app.jpg " alt=" ">
                <img src="img/pay/play.jpg " alt=" ">
            </div>
            <p><?php echo $msg['Secure payment For your happy Service']?></p>
            <img src="img/pay/pay.png " alt=" ">
        </div>

        <div class="copyright">
            <p><?php echo $msg['all The right reserved for OmarTurbo, 2022']?></p>
        </div>
    </footer>


    <script src="js/all.min.js "></script>
    <script src="js/bootstrap.bundle.min.js "></script>
    <script src="js/main.js"></script>
    
</body>

</html>

</html>