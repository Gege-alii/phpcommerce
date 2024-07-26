
<?php
include "header.php";
include "navbar.php";
?>



    <?php require_once 'handle/error.php'?>

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




              <div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3"><?php echo $msg['Register']?></h3>
                <form class="form" action="handle/handleregister.php" method="post">
                  <div class="form-group">
                    <label><?php echo $msg['Username']?></label>
                    <input type="text" class="form-control p_input" name="name" id=""value="">
                  </div>
                  <div class="form-group">
                    <label><?php echo $msg['Email']?></label>
                    <input type="email" class="form-control p_input" name="email" id=""value="">
                  </div>
                  <div class="form-group">
                    <label><?php echo $msg['Password']?></label>
                    <input type="text" class="form-control p_input" name="password" id="" >
                  </div>
                  <div class="form-group">
                    <label><?php echo $msg['Phone']?></label>
                    <input type="text" class="form-control p_input" name="phone" id="" >
                  </div>
                  <div class="form-group">
                    <label><?php echo $msg['Address']?></label>
                    <input type="text" class="form-control p_input" name="address" >
                  </div>
              
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                     
                  <div class="text-center">
                    <button type="submit"  class="btn btn-primary btn-block enter-btn" name="submit"><?php echo $msg['Signup']?></button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook col me-2">
                      <i class="mdi mdi-facebook"></i><?php echo $msg['Facebook']?> </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i><?php echo $msg['Google plus']?> </button>
                  </div>
                  <p class="sign-up text-center"><?php echo $msg['Already have an Account?']?><a href="login.php"> <?php echo $msg['Login']?></a></p>
                  <p class="terms"><?php echo $msg['By creating an account you are accepting our']?><a href="#"> <?php echo $msg['Terms & Condtions']?></a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
</html>
    <?php include "footer.php" ?>