<?php
// Start session - This must be at the very top before any HTML output
session_start();

// Check if user is already logged in, redirect to dashboard
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KSTU Student Portal - Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="login-page">

    <!-- Top Header Bar -->
    <header class="top-header">
        <div class="university-name">
            KSTU Student Portal
        </div>
        <div class="header-right">
            <span class="student-name">Academic Year 2024-2025</span>
        </div>
    </header>

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-box">
            <h2>Student Login</h2>
            
            <!-- Login Form -->
            <form action="login.php" method="POST">
                
                <?php
                // Check if form is submitted
                if (isset($_POST['submit'])) {
                    
                    // Get form data
                    $email = trim($_POST['email']);
                    $password = $_POST['password'];
                    
                    // Variable to track errors
                    $errors = array();

                    // Validate email
                    if (empty($email)) {
                        $errors[] = "Email is required!";
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors[] = "Please enter a valid email address!";
                    }

                    // Validate password
                    if (empty($password)) {
                        $errors[] = "Password is required!";
                    } elseif (strlen($password) < 6) {
                        $errors[] = "Password must be at least 6 characters!";
                    }

                    // Display error messages if there are any
                    if (count($errors) > 0) {
                        echo '<div class="alert alert-error">';
                        foreach ($errors as $error) {
                            echo "<p>Warning: $error</p>";
                        }
                        echo '</div>';
                    } else {
                        // Save user info to session
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $_SESSION['loggedin'] = true;
                        
                        // Generate sample student data for demo
                        $_SESSION['name'] = "Student";
                        $_SESSION['student_id'] = "STU" . rand(100000, 999999);
                        $_SESSION['programme'] = "Computer Science";
                        $_SESSION['level'] = "Level 300";
                        $_SESSION['phone'] = "+233 XX XXX XXXX";

                        // Redirect to dashboard directly
                        header("Location: dashboard.php");
                        exit();
                    }
                }
                ?>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="submit" class="btn-submit">Login</button>
                
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy; <?php echo date("Y"); ?> <span>Kumasi Technical University</span> | Student Portal System</p>
    </footer>

</body>
</html>

