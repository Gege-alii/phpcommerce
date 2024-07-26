<?php
session_start();
require_once 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("location:../login.php");
} else {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT p.title, p.image, p.describtion, p.sizee, c.quantity FROM cart c
              JOIN product p ON c.product_id = p.id
              WHERE c.user_id = $user_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Title: " . $row['title'] . "<br>";
            echo "Description: " . $row['describtion'] . "<br>";
            echo "Size: " . $row['sizee'] . "<br>";
            echo "Quantity: " . $row['quantity'] . "<br><br>";
        }
    } else {
        echo "Your cart is empty.";
    }
}
?>
