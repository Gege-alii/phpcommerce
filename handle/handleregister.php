<?php 
  require_once '../connection.php';


  if(isset($_POST['submit'])){
    

    $name=trim(htmlspecialchars($_POST['name']));
    $email=trim(htmlspecialchars($_POST['email']));
    $password=trim(htmlspecialchars($_POST['password']));
    $phone=trim(htmlspecialchars($_POST['phone']));
    $address=trim(htmlspecialchars($_POST['address']));

    $error=[];
    if(empty($address)){
      $error[]= "Address Is Required";
  }
if(empty($name)){
    $error[]= "Name Is Required";
}elseif(is_numeric($name)){
    $error[]="The Name must be Text";
}

if (empty($email)) {
    $error[]= "Email Is Required";
  } 
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error[]=  "Invalid email format";
} else {
    // Check if email exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
      $error[]= "Email already exists in the database";
    }
}

    if (empty($phone)) {
        $error[]= "Phone Is Required";
      } elseif(!preg_match("/^\d{10}$/", $phone)){
        $error[]="Phone Number Is Invalid";
      }

      if (empty($password)) {
        $error[]= "Password Is Required";
      } elseif(!preg_match('/[A-Z]/', $password)){
        $error[]="Password Is Invalid";
      }elseif(!preg_match('/[!@#$%^&*]/', $password))
      {
        $error[]="Password Is Invalid";
      }elseif(strlen($password)<8)
      {
        $error[]="Password must be 8 charachter";
      }
  
$passHased=password_hash($password,PASSWORD_DEFAULT);
if(empty($error)){
$query="insert into users (`name` ,`email` ,`password`,`phone`,`addres`) values ('$name','$email','$passHased','$phone','$address')";

$res=mysqli_query($conn,$query);
if($res){
    
  $_SESSION['success']="You Registered Successfully";
    header("location:../login.php");
}else{
    $_SESSION['error']=["Error happened During register"];
    header("location:../signup.php");
  }

}else{
    $_SESSION['error']=$error;
    header("location:../signup.php");

}

    }else{
    header("location:../signup.php");
  }





  ?>