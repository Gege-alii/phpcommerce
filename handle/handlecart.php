<?php
session_start();
require_once '../connection.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}


if (isset($_POST['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = intval($_POST['product_id']);


    $product_query = "SELECT id FROM product WHERE id = ?";
    $product_stmt = $conn->prepare($product_query);
    $product_stmt->bind_param("i", $product_id);
    $product_stmt->execute();
    $product_result = $product_stmt->get_result();

    if ($product_result->num_rows > 0) {
 
        $cart_query = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
        $cart_stmt = $conn->prepare($cart_query);
        $cart_stmt->bind_param("ii", $user_id, $product_id);
        $cart_stmt->execute();
        $cart_result = $cart_stmt->get_result();

        if ($cart_result->num_rows > 0) {
       
            $cart_item = $cart_result->fetch_assoc();
            $quantity = $cart_item['quantity'] + 1;
            $update_query = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param("iii", $quantity, $user_id, $product_id);
            $update_stmt->execute();
        } else {
         
            $insert_query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, 1)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("ii", $user_id, $product_id);
            $insert_stmt->execute();
        }

        header("Location: ../cart.php");
        exit();
    } else {
      
        echo "Invalid product ID. The product ID " . htmlspecialchars($product_id) . " was not found in the database.";
    }
} else {
 
    echo "No product ID provided.";
}
?>
