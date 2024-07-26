

<?php
session_start();
require_once 'connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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


 include 'header.php';
 include 'navbar.php' ;

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "
    SELECT product.title, product.image, product.sizee, cart.quantity
    FROM cart
    JOIN product ON cart.product_id = product.id
    WHERE cart.user_id = ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h2><?php echo $msg['Your Cart']?></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Your Cart</th>
                    <th>Size</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><img src="img/products/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" width="50"></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['sizee']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <a href="index.php" class="btn btn-info bg-success text-white mx-5 "><?php echo $msg['continue Shopping']?></a>
    <?php include 'footer.php'; ?>
</body>
</html>
