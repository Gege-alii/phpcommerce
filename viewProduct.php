
<?php include 'header.php' ?>
<?php include 'navbar.php' ?>


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

          
    
     
    
<?php 
          require_once 'connection.php';
          if(isset($_GET['id'])){
            $id=$_GET['id'];
          }else{
            header("location:index.php");
          }

            $query="select * from product where id=$id";
            $res=mysqli_query($conn,$query);
            if(mysqli_num_rows($res)>0){
              $prod=mysqli_fetch_assoc($res);
            }
            else{
              echo "No Products";

            }
              ?>

    
      <div class="container mt-5">
        <div class="row">
        
       
              <div class="col-md-6">
            
                <img src="img/products/<?php echo $prod['image'] ?>" class="w-75 ">
              </div>
            
            <div class="col-md-6 text-center justify-content-center mt-5">
             
                <h4><?php echo $prod['title'] ?></h4>
                <p><?php echo $prod['describtion'] ?></p>
                <h4><?php echo $prod['sizee'] ?></h4>
                <?php 
                 if(isset($_SESSION['user_id'])){
                ?>
               <div class="pt-5">
                    <a href="editProds.php?id=<?php echo $prod['id'] ?>" class="btn btn-success"> <?php echo $msg['Edit Product']?></a>
                
                    <a href="deleteProds.php?id=<?php echo $prod['id'] ?>" class="btn btn-danger"> <?php echo $msg['Delete Product']?></a>
               </div>
               <?php } ?>
            </div>
              
         

        </div>
      </div>


</html>








<?php include 'footer.php' ?>