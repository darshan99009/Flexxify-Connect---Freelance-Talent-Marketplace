<?php
include 'db_connection.php';

$email = "test@example.com";
$plain_password = "mypassword";
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user_info (full_name, username, email, password, date_of_birth, phone_number)
        VALUES ('Test User', 'testuser', '$email', '$hashed_password', '1995-01-01', '1234567890')";
$conn->query($sql);

echo "Test user added successfully.";
$conn->close();
?>
