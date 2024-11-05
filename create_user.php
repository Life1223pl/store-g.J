<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Zabezpieczenie hasła
    $user_group = $_POST['user_group'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $date = date("Y-m-d H:i:s");

    if (!empty($user_id) && !empty($password) && !empty($email)) {
        $query = "INSERT INTO users (user_id, user_name, password, date, user_group, mobile, email) VALUES ('$user_id', '$user_name','$password', '$date', '$user_group', '$mobile', '$email')";
        if (mysqli_query($con, $query)) {
            echo "User created successfully!";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Please fill all required fields!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
<h2>Create a New User</h2>
Wróć do strony user view: <a href="read_users.php">Kliknij</a>
<form method="POST">
    User ID: <input type="text" name="user_id" required><br><br>
    User Name: <input type="text" name="user_name" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    User Group: <input type="text" name="user_group" required><br><br>
    Mobile: <input type="text" name="mobile"><br><br>
    Email: <input type="email" name="email" required><br><br>
    <input type="submit" value="Create User">
</form>
</body>
</html>
