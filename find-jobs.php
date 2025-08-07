<?php
// Include database connection
include 'db_connection.php';

// Fetch jobs from the database
$sql = "SELECT * FROM jobs ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Jobs - Flexxify</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo">
            <img src="logo.png" alt="Flexxify Logo">
        </a>
        <nav>
            <ul>
                <li><a href="about.php">About Us</a></li>
                <li><a href="find-jobs.php">Find Jobs</a></li>
                <li><a href="post-job.php">Add a Job</a></li>
            </ul>
        </nav>
    </header>

    <!-- Search Bar -->
    <div class="search-container">
        <form method="GET" action="find-jobs.php">
            <input 
                type="text" 
                name="search" 
                placeholder="Search jobs by title, skill, etc." 
                class="search-bar" 
                value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
            >
            <button type="submit" class="search-btn">Search</button>
        </form>
    </div>

    <!-- Job Filters Form -->
    <section class="filter-container">
        <h2>Find a Job</h2>
        <form method="GET" action="find-jobs.php">
            <input type="text" name="experience" placeholder="Enter your experience (e.g. 3 years)">
            <input type="text" name="skills" placeholder="Enter skills (e.g. JavaScript, React)">
            <input type="text" name="certificates" placeholder="Enter certificates (e.g. Google, Microsoft)">
        </form>
    </section>

    <!-- Job Listings -->
    <section class="job-listings">
        <h3>Posted Jobs</h3>
        <?php
        // Search functionality
        if ($result->num_rows > 0) {
            $search_query = isset($_GET['search']) ? $_GET['search'] : '';
            while ($job = $result->fetch_assoc()) {
                if (
                    !$search_query || 
                    stripos($job['job_title'], $search_query) !== false || 
                    stripos($job['skills_required'], $search_query) !== false
                ) {
                    echo "<div class='job'>";
                    echo "<h4>" . htmlspecialchars($job['job_title']) . "</h4>";
                    echo "<p><strong>Company:</strong> " . htmlspecialchars($job['company_name']) . "</p>";
                    echo "<p><strong>Budget:</strong> INR " . htmlspecialchars($job['budget']) . "</p>";
                    echo "<p><strong>Required Skills:</strong> " . htmlspecialchars($job['skills_required']) . "</p>";
                    echo "<button>Apply</button>";
                    echo "</div>";
                }
            }
        } else {
            echo "<p>No jobs found.</p>";
        }
        ?>
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
