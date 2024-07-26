<?php
  require_once '../connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $newPassword = $_POST["newpassword"];
    $confirmPassword = $_POST["confirmpassword"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } else {
        $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($checkEmailQuery);

        if ($result->num_rows > 0) {
            if (empty($newPassword)) {
                echo "Password is required";
            } elseif (strlen($newPassword) < 8) {
                echo "Password must be at least 8 characters long";
            } elseif (!preg_match("/[A-Za-z0-9]+/", $newPassword)) {
                echo "Password must contain letters and numbers";
            } else {
                if ($newPassword != $confirmPassword) {
                    echo "New password and confirm password do not match";
                } else {
                   
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $updatePasswordQuery = "UPDATE users SET password='$hashedPassword' WHERE email='$email'";
                    if ($conn->query($updatePasswordQuery) === TRUE) {
                        echo "Password updated successfully";
                        header("location:../login.php");
                    } else {
                        echo "Error updating password: " . $conn->error;
                    }
                }
            }
        } else {
            echo "Email not found in the database";
        }
    }
}

$conn->close();
?>


