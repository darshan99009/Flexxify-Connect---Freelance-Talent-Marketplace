<?php
// Include the database connection
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $issue = $_POST['text'];

    // Prepare and execute the query to insert data
    $sql = "INSERT INTO complaints (username, email, issue) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $issue);

    if ($stmt->execute()) {
        // Redirect to a thank-you page or display a success message
        echo "<script>alert('Your complaint has been submitted successfully!'); window.location.href='thank.html';</script>";
    } else {
        // Handle error
        echo "<script>alert('Error submitting your complaint. Please try again.'); window.location.href='complaint.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint-Flexxify</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">
            <img src="logo.png" alt="Flexxify Logo">
        </a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="find-jobs.php">Find Jobs</a></li>
                <li><a href="post-job.php">Add a Job</a></li>
            </ul>
        </nav>
    </header>
    <div>
        <p>Ohh! Sorry to hear that.</p>
        <p> Please let us know the issue using the form below</p>
        <section class="form-container">
    <h2>Raise Complaint</h2>
    <form action="complaint.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="issue">Please Enter your issue:</label>
        <input type="text" placeholder="Enter your Complaint" name="text" required>
        <center><button type="submit">Submit</button></center>
    </form>
</section>

    </div>
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