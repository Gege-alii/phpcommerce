
<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<?php 
              require_once 'connection.php';
              if(!isset($_SESSION['user_id'])){
              header("location:login.php");}
          

              ?>


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

 
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content mt-5 ">
              <h4 class="fs-1 text-success"><?php echo $msg['New Product']?></h4>
            </div>
          </div>
        </div>
      </div>
  

    
    <?php require_once 'handle/error.php'?>
 


<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body border border-success rounded  border-2">
                    <h2 class="card-title text-center"><?php echo $msg['Add your Own Product']?></h2>
                    <form action="handle/handleadd.php" method="post" enctype="multipart/form-data">
                        <div class="form-group my-2">
                            <label for="title"><?php echo $msg['Title:']?></label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="description"><?php echo $msg['Description:']?></label>
                            <textarea class="form-control" id="description" name="describtion" rows="3" required></textarea>
                        </div>
                        <div class="form-group my-2">
                            <label for="size"><?php echo $msg['Size:']?></label>
                            <input type="text" class="form-control" id="size" name="sizee" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="image"><?php echo $msg['Upload Image:']?></label>
                            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block bg-success" name="submit"><?php echo $msg['Submit']?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


              </body>
</html>

    <?php require_once 'footer.php' ?>
