<?php 
          require_once 'connection.php';

          if(!isset($_SESSION['user_id'])){
            header("location:login.php");}else{

          if(isset($_GET['id'])){
            $id=$_GET['id'];
          }else{
            header("location:index.php");
          }

            $query="select * from product where id=$id";
            $res=mysqli_query($conn,$query);
            if(mysqli_num_rows($res)>0){
              $old_image=mysqli_fetch_assoc($res)['image'];
            
              if(!empty($old_image)){
                unlink("img/products/$old_image");
              }

              $query="delete from product where id=$id";
             $res= mysqli_query($conn,$query);

             if($res){
                $_SESSION['success']="The Product Deleted Successfully";
                header("location:index.php");  
             }else{
                $_SESSION['error']="Error Happened While Deleting ";
                header("location:index.php");
             }

            }else{
                $_SESSION['error']=["No Product Found"];
                header("location:index.php");
            }
          }
              ?>