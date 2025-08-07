<?php
// Start the session
session_start();

// Include database connection file
include 'db_connection.php';

// Initialize variables
$error_message = "";
$success_message = "";

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user inputs
    $full_name = trim($_POST['full_name']);
    $username = trim($_POST['username']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['c_password']);
    $phone_number = trim($_POST['phone']);

    // Basic validation
    if (empty($full_name) || empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($phone_number)) {
        $error_message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } elseif (!preg_match('/.*[\W_]+.*/', $password)) {
        $error_message = "Password must include at least one special character.";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone_number)) {
        $error_message = "Invalid phone number. Please enter a 10-digit number.";
    } else {
        // Check if the email already exists in the database
        $sql = "SELECT id FROM user_info WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $error_message = "An account with this email already exists.";
            } else {
                // Insert the new user into the database
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO user_info (full_name, username, email, password, phone_number) VALUES (?, ?, ?, ?, ?)";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("sssss", $full_name, $username, $email, $hashed_password, $phone_number);

                    if ($stmt->execute()) {
                        $success_message = "Account created successfully. You can now log in.";
                        
                    } else {
                        $error_message = "Error creating account. Please try again.";
                    }
                } else {
                    $error_message = "Error preparing the query.";
                }
            }
            $stmt->close();
        } else {
            $error_message = "Error preparing the query.";
        }
    }

    // Close the database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Flexxify</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <a href="index.php" class="logo">
        <img src="logo.png" alt="Flexxify Logo">
    </a>
    <nav>
        <ul>
            <li><a href="about.html">About Us</a></li>
            <li><a href="find-jobs.php">Find Jobs</a></li>
            <li><a href="post-jobs.php">Add a Job</a></li>
        </ul>
    </nav>
</header>

<section class="form-container">
    <h2>Sign Up</h2>

    <!-- Display error or success message -->
    <?php if (!empty($error_message)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php elseif (!empty($success_message)): ?>
        <p style="color: green;"><?php echo htmlspecialchars($success_message); ?></p>
    <?php endif; ?>

    <!-- Sign-Up Form -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" required>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" minlength="6" maxlength="8" pattern=".*[\W_]+.*"
               title="Please include at least one symbol" required>

        <label for="c_password">Confirm Password</label>
        <input type="password" id="c_password" name="c_password" minlength="6" maxlength="8"
               pattern=".*[\W_]+.*" title="Please include at least one symbol" required>

        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}"
               title="Enter a valid 10-digit phone number" required>

        <center><button type="submit">Sign Up</button></center>

        <a href="login.php" title="Sign In">
            <h4>Already have an account? Sign In</h4>
        </a>
    </form>
</section>

<footer>
    <p>Follow us on:</p><br>
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
