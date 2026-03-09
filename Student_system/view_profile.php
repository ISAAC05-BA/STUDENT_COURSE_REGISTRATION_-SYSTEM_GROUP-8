<?php
// Start session - This must be at the very top before any HTML output
session_start();

// Protect the page - Check if user is logged in
// If not logged in, redirect to login page
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile - KSTU Student Portal</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Top Header Bar -->
    <header class="top-header">
        <div class="university-name">
            KSTU Student Portal
        </div>
        <div class="header-right">
            <span class="student-name">Welcome, <?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'Student'; ?></span>
            <a href="logout.php" class="btn-logout">Logout</a>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="main-content">
        <h2 class="page-title">View Profile</h2>
        
        <!-- Profile Card -->
        <div class="profile-card">
            <div class="profile-header">
                <h2>Student Profile</h2>
            </div>
            
            <div class="profile-body">
                <!-- Personal Information -->
                <h3 style="color: var(--kstu-navy); margin-bottom: 15px;">Personal Information</h3>
                
                <div class="profile-row">
                    <span class="profile-label">Full Name:</span>
                    <span class="profile-value"><?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'Not provided'; ?></span>
                </div>
                
                <div class="profile-row">
                    <span class="profile-label">Student ID:</span>
                    <span class="profile-value"><?php echo isset($_SESSION['student_id']) ? htmlspecialchars($_SESSION['student_id']) : 'Not provided'; ?></span>
                </div>
                
                <div class="profile-row">
                    <span class="profile-label">Programme:</span>
                    <span class="profile-value"><?php echo isset($_SESSION['programme']) ? htmlspecialchars($_SESSION['programme']) : 'Not provided'; ?></span>
                </div>
                
                <div class="profile-row">
                    <span class="profile-label">Level:</span>
                    <span class="profile-value"><?php echo isset($_SESSION['level']) ? htmlspecialchars($_SESSION['level']) : 'Not provided'; ?></span>
                </div>
                
                <div class="profile-row">
                    <span class="profile-label">Email Address:</span>
                    <span class="profile-value"><?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'Not provided'; ?></span>
                </div>
                
                <div class="profile-row">
                    <span class="profile-label">Phone Number:</span>
                    <span class="profile-value"><?php echo isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : 'Not provided'; ?></span>
                </div>
                
                <!-- Quick Links -->
                <div style="text-align: center; margin-top: 30px;">
                    <a href="dashboard.php" class="btn-submit" style="width: auto; padding: 12px 30px; display: inline-block;">Back to Dashboard</a>
                </div>
            </div>
        </div>
        
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy; <?php echo date("Y"); ?> <span>Kumasi Technical University</span> | Student Portal System</p>
    </footer>

</body>
</html>

