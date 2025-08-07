<?php
// Start the session
session_start();

// Include database connection
include 'db_connection.php';

// Initialize an error message variable
$error_message = "";

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to find user by email
    $sql = "SELECT id, email, password, full_name FROM user_info WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Login successful
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['full_name'] = $row['full_name']; // Store full name in session
            header("Location: index.php"); // Redirect to home page
            exit;
        } else {
            $error_message = "Invalid email or password.";
        }
    } else {
        $error_message = "User not found.";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Flexxify</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo"><img src="logo.png" alt="Flexxify Logo"></a>
    </header>

    <section class="form-container">
        <h2>Login to Flexxify</h2><br>
        <?php if (!empty($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Enter your email" required><br>
            <input type="password" name="password" placeholder="Enter your password" minlength="5" maxlength="8" required></br>
            <center><button type="submit">Login</button><br></center>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </section>

    <footer>
        <p>Follow us on:</p>
        <div class="social-links">
        <a href="https://www.instagram.com/">Instagram</a>
            <a href="https://www.telegram.com/">Telegram</a>
            <a href="https://www.facebook.com/">Facebook</a>
            <a href="https://www.whatsapp.com/">WhatsApp</a>
            <a href="https://www.github.com/">GitHub</a>
            <a href="mailto:contact@flexxify.com">Gmail</a>
        </div>
    </footer>
</body>
</html>
