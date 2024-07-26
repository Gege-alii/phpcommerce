<?php 
              require_once 'connection.php';
              if(!isset($_SESSION['user_id'])){
              header("location:login.php");}
          

              ?>

<?php include 'header.php' ?>
<?php include 'navbar.php' ?>



            <?php require_once 'handle/error.php' ?>
            <?php require_once 'handle/success.php' ?>
      
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
      if(isset($_GET['id'])){
        $id=$_GET['id'];
      }else{
        header("location:index.php");
      }

        $query="select * from product where id=$id";
        $res=mysqli_query($conn,$query);
        if(mysqli_num_rows($res)==1){
          $prod=mysqli_fetch_assoc($res);
        }
        else{
          echo "No Products";

        }
    
    ?>


<?php 
if(!empty($prod)):
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body border border-success rounded  border-2">
                    <h2 class="card-title text-center"><?php echo $msg['Edit Product']?></h2>
                    <form action="handle/handleedit.php?id=<?php echo $prod['id']?>" method="post" enctype="multipart/form-data">
                        <div class="form-group my-2">
                            <label for="title"><?php echo $msg['Title:']?></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $prod['title']?>" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="description"><?php echo $msg['Description:']?></label>
                            <textarea class="form-control" id="description" name="describtion" rows="3" required><?php echo $prod['describtion']?></textarea>
                        </div>
                        <div class="form-group my-2">
                            <label for="size"><?php echo $msg['Size:']?></label>
                            <input type="text" class="form-control" id="size" name="sizee" value="<?php echo $prod['sizee']?>" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="image"><?php echo $msg['Upload Image:']?></label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <img src="img/products/<?php echo $prod['image'] ?>" alt="" width="100px" srcset="">
                        <button type="submit" class="btn btn-primary btn-block bg-success" name="submit"><?php echo $msg['Submit']?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php else: echo "No Products";
endif;
?>
</html>

<?php require_once 'footer.php' ?>