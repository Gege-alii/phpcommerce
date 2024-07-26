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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $msg['blog']?></title>
</head>
<body>
    
</body>
</html>
<section id="header">
<a href="index.html">
    <img src="img/logo.png" alt="homeLogo">
</a>

<div>
    <ul id="navbar">
        <li class="link">
            <a class="active " href="index.html"></a>
        </li>
        <li class="link">
            <a href="shop.php"></a>
        </li>
        <li class="link">
            <a href="index.php"><?php echo $msg['blog']?></a>
        </li>
        <li class="link">
            <a href="about.php"><?php echo $msg['About']?></a>
        </li>
        <li class="link">
            <a href="addProduct.php"><?php echo $msg['AddNewProduct']?></a>
        </li>
        <li class="link">
            <a href="contact.php"><?php echo $msg['Contact']?></a>
        </li>
        <li class="link">
            <a href="signup.php"><?php echo $msg['Signup']?></a>
        </li>

        <?php 
              require_once 'connection.php';
              if(isset($_SESSION['lang']) && $_SESSION['lang']=="ar"){

              ?>
        <li class="link">
            <a href="lang.php?lang=en"><?php echo $msg['English']?></a>
        </li>
        <?php 
               } else{
              ?>
        <li class="link">
            <a href="lang.php?lang=ar"><?php echo $msg['Arabic']?></a>
        </li>
        <?php }?>
     

        <li class="link">
            <a id="lg-cart" href="cart.php">
                <i class="fas fa-shopping-cart"></i> 
            </a>
        </li>
        <a href="#" id="close"><i class="fas fa-times"></i> </a>
        <?php 
              require_once 'connection.php';
              if(isset($_SESSION['user_id'])){

              ?>
                 <li class="link">
            <a href="handle/handlelogout.php"><?php echo $msg['Logout']?></a>
        </li>
    
        <?php 
               } else{
              ?>
     <li class="link">
            <a href="login.php"><?php echo $msg['Login']?></a>
        </li>
       
        <?php }?>
    </ul>

</div>

<div id="mobile">
    <a href="cart.html">
        <i class="fas fa-shopping-cart"></i>
    </a>
    <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
</div>
</section>