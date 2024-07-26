<?php
require_once '../connection.php';

if(!isset($_SESSION['user_id'])){
    header("location:login.php");}

if(isset($_POST['submit']) &&  isset($_GET['id'])){

    $id=$_GET['id'];


        $query="select * from product where id=$id";
        $res=mysqli_query($conn,$query);
        if(mysqli_num_rows($res)>0){

           $old_image= mysqli_fetch_assoc($res)['image'];
            $title=trim(htmlspecialchars($_POST['title']));
            $sizee=trim(htmlspecialchars($_POST['sizee']));
    $describtion=trim(htmlspecialchars($_POST['describtion']));

$error=[];
if(empty($title)){
    $error[]= "Title Is Required";
}elseif(is_numeric($title)){
    $error[]="The Title must be Text";
}

if(empty($sizee)){
    $error[]= "Size Is Required";
}elseif(!is_numeric($sizee)){
    $error[]="The Size must be Numeric";
}

if(empty($describtion)){
    $error[]= "Description Is Required";
}elseif(is_numeric($body)){
    $error[]="The description must be Text";
}

if(isset($_FILES['image'])&&$_FILES['image']['name']){
    $image=$_FILES['image'];
    $image_name=$image['name'];
    $tmp_name=$image['tmp_name'];
    $image_error=$image['error'];
    $size=$image['size']/(1024*1024);
    $extension=strtolower(pathinfo($image_name,PATHINFO_EXTENSION));

if($image_error!=0){
    $error[]=" Image Is Required";
}elseif($size>1){
    $error[]="The Image Has Big Size";
}elseif(!in_array($extension,["jpg","png","jpeg"])){
    $error[]="The Extension Of The Image Must Be Jpg Or Png Or Jpeg";
}

    $new_name=uniqid().".".$extension;

}else{
    $new_name=$old_image;
}

if(empty($error)){

    $query="update product set `title`='$title',`describtion`='$describtion',`image`='$new_name',`sizee`='$sizee' where id=$id";
    $res=mysqli_query($conn,$query);
if($res){
    if(isset($_FILES['image'])&&$_FILES['image']['name']){
        move_uploaded_file($tmp_name,"../img/products/$new_name");
    }
    $_SESSION['success']="Product Updated Successfully";
    header("location:../viewProduct.php?id=$id"); 
}else{
    $_SESSION['error']="Error Happened While Updating";
    header("location:../editProds.php?id=$id");
}
}
else{
    $_SESSION['error']=$error;
            header("location:../editProds.php?id=$id"); 
}

        }else{
            $_SESSION['error']=["There Is No Product"];
            header("location:../index.php");
        }
}else{
    header("location:../index.php");
}
?>