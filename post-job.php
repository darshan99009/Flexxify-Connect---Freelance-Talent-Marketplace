<?php
// Include database connection
include 'db_connection.php';

// Initialize message variables
$success_message = "";
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company_name = $_POST['company_name'];
    $job_title = $_POST['job_title'];
    $job_description = $_POST['job_description'];
    $budget = $_POST['budget'];
    $skills_required = $_POST['skills_required'];

    // Insert job data into the database
    $sql = "INSERT INTO jobs (name, email, company_name, job_title, job_description, budget, skills_required)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssis", $name, $email, $company_name, $job_title, $job_description, $budget, $skills_required);

    if ($stmt->execute()) {
        $success_message = "Job posted successfully!";
    } else {
        $error_message = "Error posting job. Please try again.";
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
    <title>Post a Job - Flexxify</title>
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
                <li><a href="post-job.php">Add a Job</a></li>
            </ul>
        </nav>
    </header>

    <section class="form-container">
        <h2>Post a Job</h2>
        <?php if (!empty($success_message)): ?>
            <p style="color: green;"><?php echo $success_message; ?></p>
        <?php elseif (!empty($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="email" name="email" placeholder="Enter your email address" required>
            <input type="text" name="company_name" placeholder="Enter company name" required>
            <input type="text" name="job_title" placeholder="Enter job title" required>
            <textarea name="job_description" placeholder="Enter job description" required></textarea>
            <input type="number" name="budget" placeholder="Enter budget (INR)" required>
            <input type="text" name="skills_required" placeholder="Enter minimum skills required" required>
            <button type="submit">Post Job</button>
        </form>
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
