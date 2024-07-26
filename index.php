<?php

use function PHPSTORM_META\map;

 include 'header.php' ?>
<?php include 'navbar.php' ?>

<?php
require_once 'connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
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

<?php require_once 'handle/error.php' ?>
            <?php require_once 'handle/success.php' ?>
            <html lang="<?php echo $lang?>" dir="<?php echo $msg['dir']?>">
<section id="hero">

        <h4><?php echo $msg['Trade-in-offer']?></h4>
        <h2><?php echo $msg['Super value deals']?></h2>
        <h1><?php echo $msg['On all products']?></h1>
        <p><?php echo $msg['Save more with coupons & up to 70% off!']?></p>
        <button><?php echo $msg ['Shop Now!']?></button>

    </section>

    <!-- End Hero -->

    <!-- start Feature-->
    <section id="feature" class="section-p1">
        <div class="fe-1">
            <img src="img/features/f1.png" alt="">
            <h6><?php echo $msg['Free Shipping']?></h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f2.png" alt="">
            <h6><?php echo $msg['Online Order']?></h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f3.png" alt="">
            <h6><?php echo $msg['Save Money']?></h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f4.png" alt="">
            <h6><?php echo $msg['Promitions']?></h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f5.png" alt="">
            <h6><?php echo $msg['Happy Sell']?></h6>
        </div>
        <div class="fe-1">
            <img src="img/features/f6.png" alt="">
            <h6><?php echo $msg['F7/24 Support']?></h6>
        </div>
    </section>
    <!-- End Feature-->

    <!-- Start New Arrival or productCard Features -->

   




    <?php
          require_once 'connection.php';


$limit=8;
$offset=0;


          $query="select * from product order by user_id limit $limit offset $offset";
          $res=mysqli_query($conn,$query);
          if(mysqli_num_rows($res)>0){
            $prods=mysqli_fetch_all($res,MYSQLI_ASSOC);
          }
          else{
            echo "No Products";
          }
?>
    <section id="product1" class="section-p1">
        <h2><?php echo $msg['Featured Products']?></h2>
        <p><?php echo $msg['Summer Collection New Modren Desgin']?></p>
        <div class="pro-container">
        <?php foreach($prods as $prod){ ?>  
            <div class="pro">
                <img src="img/products/<?php echo $prod['image'] ?>" alt="p1">
                <div class="des">
                    <span><?php echo $prod['title']?></span>
                    <h5><?php echo $prod['describtion'] ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <a href="viewProduct.php?id=<?php echo $prod['id'] ?>" class="btn btn-info bg-success text-white "><?php echo $msg['view']?></a>
                    </div>
                    <h4><?php echo $prod['sizee'] ?></h4>
                   
                    <form action="handle/handlecart.php" method="post">
    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($prod['id']); ?>">
    <button type="submit" class="cart"><i class="fas fa-shopping-cart"></i></button>
</form>
                      
                </div>
            </div>
            <?php  }?>
  
        </div>
    </section>
    <!-- End New Arrival -->
    <!-- Start bannar -->
    <section id="bannar" class="section-m1">
        <h4><?php echo $msg['Repair Service']?></h4>
        <h2><?php echo $msg['Up to 70% Off - All t-Shirts & Accessories']?></h2>
        <button class="normal"><?php echo $msg['Explore More']?></button>
    </section>
    <!-- End bannar -->
    <?php
          require_once 'connection.php';


$limit=8;
$offset=8;


          $query="select * from product order by user_id limit $limit offset $offset";
          $res=mysqli_query($conn,$query);
          if(mysqli_num_rows($res)>0){
            $prods=mysqli_fetch_all($res,MYSQLI_ASSOC);
          }
          else{
            echo "No Products";
          }
?>
    <section id="product1" class="section-p1">
        <h2><?php echo $msg['New Arrival']?></h2>
        <p><?php echo $msg['Summer Collection New Modren Desgin']?></p>
        <div class="pro-container">
        <?php foreach($prods as $prod){ ?>  
            <div class="pro">
                <img src="img/products/<?php echo $prod['image'] ?>" alt="p1">
                <div class="des">
                    <span><?php echo $prod['title']?></span>
                    <h5><?php echo $prod['describtion'] ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <a href="viewProduct.php?id=<?php echo $prod['id'] ?>" class="btn btn-info bg-success text-white "><?php echo $msg['view']?></a>
                    </div>
                    <h4><?php echo $prod['sizee'] ?></h4>
                 

                    <form action="handle/handlecart.php" method="post">
    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($prod['id']); ?>">
    <button type="submit" class="cart"><i class="fas fa-shopping-cart"></i></button>
</form>
                </div>
            </div>
                <?php }?>
            </div>
    </section>
    <section id="sm-bannar" class="section-p1">
        <div class="bannar-box">
            <h4><?php echo $msg['Crazy Deals']?></h4>
            <h2><?php echo $msg['buy 1 get 1 Free']?></h2>
            <span><?php echo $msg['The best classic dress is on sale from cara']?></span>
            <button class="white"><?php echo $msg['Learn More']?></button>
        </div>
        <div class="bannar-box bannar-box2">
            <h4><?php echo $msg['Spring/Summer']?></h4>
            <h2><?php echo $msg['buy 1 get 1 Free']?></h2>
            <span><?php echo $msg['The best classic dress is on sale from cara']?></span>
            <button class="white"><?php echo $msg['Learn More']?></button>
        </div>

    </section>

    <section id="bannar3" class="section-p1">
        <div class="bannar-box">
            <h2><?php echo $msg['SEASONAL SALE']?></h2>
            <h3><?php echo $msg['Winter Collection - 50% off']?></h3>
        </div>
        <div class="bannar-box bannar-box2">
            <h2><?php echo $msg['SEASONAL SALE']?></h2>
            <h3><?php echo $msg['Winter Collection - 50% off']?></h3>
        </div>
        <div class="bannar-box bannar-box3">
            <h2><?php echo $msg['SEASONAL SALE']?></h2>
            <h3><?php echo $msg['Winter Collection - 50% off']?></h3>
        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4><?php echo $msg['Sign Up For Newletters']?></h4>
            <p><?php echo $msg['Get E-mail Updates about our latest shop and']?> <span class="text-warning"> <?php echo $msg ['Special Offers.']?></span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Enter Your E-mail...">
           <a href="signup.php"> <button class="normal"><?php echo $msg ['Sign Up']?></button></a>
        </div>
    </section>


            </html>


<?php include 'footer.php' ?>