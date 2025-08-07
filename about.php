<?php
// Start the session
session_start();

// Include database connection
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    // Query to update the rating for the user based on the email
    $sql = "UPDATE user_info SET rating = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $rating, $email);

    if ($stmt->execute()) {
        // Feedback submitted successfully
        echo "<script>alert('Thank you for your feedback!'); window.location.href='thank.html';</script>";
    } else {
        // Error handling
        echo "<script>alert('Error submitting feedback. Please try again.'); window.location.href='index.php';</script>";
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
    <title>Flexxify - Freelancing Platform</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header with Logo and Navigation -->
    <header>
        <a href="index.php" class="logo">
            <img src="logo.png" alt="Flexxify Logo">
        </a>
        <nav>
            <ul>
                <li><a href="about.php">About Us</a></li>
                <li><a href="find-jobs.php">Find Jobs</a></li>
                <li><a href="post-job.php">Add a Job</a></li>
                <li><a href="complaint.php">Raise a Complaint</a></li>
            </ul>
        </nav>
    </header>
   

    <!-- Search Bar -->
    <div class="search-container">
        <input type="text" placeholder="Search for help......" class="search-bar">
        <button class="search-btn">Search</button>
    </div>

    <hr width="device-width" size="5px" color="black"><br>
    <p>At Flexxify, we're dedicated to transforming the way you find and post freelance jobs. Our platform bridges the gap between talented professionals and clients seeking quality services, all at affordable prices. Whether you're an ambitious freelancer looking for your next gig or a business in need of skilled expertise, Flexify provides a seamless and intuitive experience to connect you with the right opportunities. We believe in empowering our community with a user-friendly interface that makes job searching and posting effortless. Join us on a journey to redefine freelancing—where potential meets opportunity and success is within everyone's reach. 🌟

         🚀</p><br>
         <hr width="device-width" size="5px" color="black">

    <!-- Main Section -->
    <div class="feedback-form-container">
        <h1>Feedback Form</h1>
        <form action="thank.html" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>
            
            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="">Select Rating</option>
                <option value="5">Excellent</option>
                <option value="4">Good</option>
                <option value="3">Average</option>
                <option value="2">Poor</option>
                <option value="1">Very Poor</option>
            </select>
            
            <label for="comments">Comments:</label>
            <textarea id="comments" name="comments" rows="4" placeholder="Your Feedback"></textarea>
            <center><button type="submit">Submit</button></center>
            
        </form>
    </div>
    

    <!-- Footer -->
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
