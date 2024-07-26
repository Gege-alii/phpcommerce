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

    <!-- Start Links -->
    <link rel="stylesheet" href="css/splide.min.css">
    <link rel="stylesheet" href="css/splide-core.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--Start Home Style -->
    <link rel="stylesheet" href="css/index_style.css">
    <!-- End Home Style -->

    <!-- Start Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@1,400&display=swap" rel="stylesheet">
    <!-- End Google Fonts -->

    <!-- End Links -->

    <title><?php echo $msg['Haga Helwa']?></title>

</head>



<body>
</body>
</html>