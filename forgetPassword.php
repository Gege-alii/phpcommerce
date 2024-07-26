<?php
include "header.php";
include "navbar.php";
?>



<?php include 'handle/success.php'?>
    <?php include 'handle/error.php'?>
            
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


<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
    
            
              <div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3"><?php echo $msg['Login']?></h3>
                <form class="form" action="handle/forgetpass.php" method="post">

                  <div class="form-group">
                    <label><?php echo $msg['email *']?></label>
                    <input type="email" class="form-control p_input" name="email" id=""value=""  >
                  </div>
                  <div class="form-group">
                    <label> <?php echo $msg['New Password *']?></label>
                    <input type="text" class="form-control p_input" name="newpassword" id="">
                  </div>
                  <div class="form-group">
                    <label><?php echo $msg['Confirm Password *']?></label>
                    <input type="text" class="form-control p_input" name="confirmpassword" id="">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> <?php echo $msg['Remember me']?> </label>
                    </div>
                    <a href="forgetPassword.php" class="forgot-pass"><?php echo $msg['Forgot password']?></a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn" name="submit"><?php echo $msg['Confirm']?></button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> <?php echo $msg['Facebook']?> </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> <?php echo $msg['Google plus']?> </button>
                  </div>
                  <p class="sign-up"><?php echo $msg['Donot have an Account?']?><a href="signup.php"> <?php echo $msg['Signup']?></a></p>
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


