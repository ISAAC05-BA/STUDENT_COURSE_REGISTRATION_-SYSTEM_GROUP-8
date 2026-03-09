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
    <title>Dashboard - KSTU Student Portal</title>
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
        <h2 class="page-title">Student Dashboard</h2>
        
        <!-- Welcome Message -->
        <div class="alert alert-success">
            <p>Welcome back, <strong><?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'Student'; ?></strong>! 
            Your dashboard is ready.</p>
        </div>
        
        <!-- Student Information Card -->
        <div class="profile-card">
            <div class="profile-header">
                <h2>My Information</h2>
            </div>
            
            <div class="profile-body">
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
                    <span class="profile-label">Email:</span>
                    <span class="profile-value"><?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'Not provided'; ?></span>
                </div>
                
                <div class="profile-row">
                    <span class="profile-label">Phone:</span>
                    <span class="profile-value"><?php echo isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : 'Not provided'; ?></span>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="dashboard-card" style="margin-top: 20px;">
            <h3>Quick Actions</h3>
            <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: 15px;">
                <a href="personal_info.php" class="btn-submit" style="width: auto; padding: 12px 25px;">Edit Information</a>
                <a href="course.php" class="btn-submit" style="width: auto; padding: 12px 25px;">Register Courses</a>
                <a href="upload_passport.php" class="btn-submit" style="width: auto; padding: 12px 25px;">Upload Passport</a>
                <a href="view_profile.php" class="btn-submit" style="width: auto; padding: 12px 25px;">View Profile</a>
            </div>
        </div>
        
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy; <?php echo date("Y"); ?> <span>Kumasi Technical University</span> | Student Portal System</p>
    </footer>

</body>
</html>

