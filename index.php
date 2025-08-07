<?php
// Start the session
session_start();

// Check if the user is logged in
$logged_in = isset($_SESSION['full_name']);
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

    <header>
        <a href="index.php" class="logo">
            <img src="logo.png" alt="Flexxify Logo">
        </a>
        <nav>
            <ul>
                <?php if ($logged_in): ?>
                    <li><a href="find-jobs.php">Find Jobs</a></li>
                    <li><a href="post-job.php">Add a Job</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="find-jobs.php">Find Jobs</a></li>
                    <li><a href="post-job.php">Add a Job</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <hr width="100%" size="10px" color="#ff0505">

    <section class="cta">
    <?php if ($logged_in): ?>
    <h2>Hello <?php echo htmlspecialchars($_SESSION['full_name']); ?>, Welcome to</h2>
<?php else: ?>
    <h2>Welcome to</h2>
<?php endif; ?>
        <h2 class="new">Flexxify</h2>
        <p>Your go-to platform for freelance opportunities - Where work meets flexibility.</p>
        <button onclick="location.href='find-jobs.php'">Find Freelance Jobs</button>
        <button onclick="location.href='post-job.php'">Post a Job</button>
    </section>
    <!-- Search Bar -->
    <div class="search-container">
        <input type="text" placeholder="Search Jobs, Freelancers..." class="search-bar">
        <button class="search-btn">Search</button>
    </div>
    <hr width="device-width" size="10px" color="#ff0505">
    <center>
        <p>Some of the most liked Designs made by our Designers at Flexxify</p>
    </center>
    <hr width="100%" size="10px" color="#ff0505">
    <div class="carousel-container">
        <div class="carousel">
            <img src="p1.png" alt="project 1">
            <img src="p2.png" alt="project 2">
            <img src="p3.jpg" alt="project 3">
            <img src="p4.jpg" alt="project 4">
            <img src="p1.png" alt="project 1">
            <img src="p2.png" alt="project 2">
            <img src="p3.jpg" alt="project 3">
            <img src="p4.jpg" alt="project 4">
            <img src="p1.png" alt="project 1">
            <img src="p2.png" alt="project 2">
            <img src="p3.jpg" alt="project 3">
            <img src="p4.jpg" alt="project 4">
        </div>
    </div>
    </div>
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