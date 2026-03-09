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
    <title>Personal Information - KSTU Student Portal</title>
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
        <h2 class="page-title">Personal Information</h2>
        
        <p style="margin-bottom: 20px;">Please fill in your personal details to complete your registration.</p>
        
        <!-- Personal Information Form -->
        <div class="profile-card">
            <div class="profile-header">
                <h2>Student Details</h2>
            </div>
            
            <div class="profile-body">
                <form action="personal_info.php" method="POST">
                    
                    <?php
                    // Check if form is submitted
                    if (isset($_POST['submit'])) {
                        
                        // Get form data
                        $name = trim($_POST['name']);
                        $student_id = trim($_POST['student_id']);
                        $programme = trim($_POST['programme']);
                        $level = trim($_POST['level']);
                        $phone = trim($_POST['phone']);
                        
                        // Variable to track errors
                        $errors = array();

                        // Validate full name
                        if (empty($name)) {
                            $errors[] = "Full Name is required!";
                        }

                        // Validate student ID
                        if (empty($student_id)) {
                            $errors[] = "Student ID is required!";
                        }

                        // Validate programme
                        if (empty($programme)) {
                            $errors[] = "Programme is required!";
                        }

                        // Validate level
                        if (empty($level)) {
                            $errors[] = "Level is required!";
                        }

                        // Validate phone
                        if (empty($phone)) {
                            $errors[] = "Phone Number is required!";
                        }

                        // Display error messages if there are any
                        if (count($errors) > 0) {
                            echo '<div class="alert alert-error">';
                            foreach ($errors as $error) {
                                echo "<p>Warning: $error</p>";
                            }
                            echo '</div>';
                        } else {
                            // Save all data into session
                            $_SESSION['name'] = $name;
                            $_SESSION['student_id'] = $student_id;
                            $_SESSION['programme'] = $programme;
                            $_SESSION['level'] = $level;
                            $_SESSION['phone'] = $phone;
                            $_SESSION['personal_info_complete'] = true;

                            // Redirect to dashboard
                            header("Location: dashboard.php");
                            exit();
                        }
                    }
                    ?>

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your full name" value="<?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="student_id">Student ID</label>
                        <input type="text" name="student_id" id="student_id" placeholder="Enter your student ID" value="<?php echo isset($_SESSION['student_id']) ? htmlspecialchars($_SESSION['student_id']) : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="programme">Programme</label>
                        <select name="programme" id="programme" required>
                            <option value="">Select your programme</option>
                            <option value="Computer Science" <?php echo isset($_SESSION['programme']) && $_SESSION['programme'] == 'Computer Science' ? 'selected' : ''; ?>>Computer Science</option>
                            <option value="Information Technology" <?php echo isset($_SESSION['programme']) && $_SESSION['programme'] == 'Information Technology' ? 'selected' : ''; ?>>Information Technology</option>
                            <option value="Business Administration" <?php echo isset($_SESSION['programme']) && $_SESSION['programme'] == 'Business Administration' ? 'selected' : ''; ?>>Business Administration</option>
                            <option value="Accounting" <?php echo isset($_SESSION['programme']) && $_SESSION['programme'] == 'Accounting' ? 'selected' : ''; ?>>Accounting</option>
                            <option value="Engineering" <?php echo isset($_SESSION['programme']) && $_SESSION['programme'] == 'Engineering' ? 'selected' : ''; ?>>Engineering</option>
                            <option value="Marketing" <?php echo isset($_SESSION['programme']) && $_SESSION['programme'] == 'Marketing' ? 'selected' : ''; ?>>Marketing</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" required>
                            <option value="">Select your level</option>
                            <option value="Level 100" <?php echo isset($_SESSION['level']) && $_SESSION['level'] == 'Level 100' ? 'selected' : ''; ?>>Level 100</option>
                            <option value="Level 200" <?php echo isset($_SESSION['level']) && $_SESSION['level'] == 'Level 200' ? 'selected' : ''; ?>>Level 200</option>
                            <option value="Level 300" <?php echo isset($_SESSION['level']) && $_SESSION['level'] == 'Level 300' ? 'selected' : ''; ?>>Level 300</option>
                            <option value="Level 400" <?php echo isset($_SESSION['level']) && $_SESSION['level'] == 'Level 400' ? 'selected' : ''; ?>>Level 400</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" placeholder="Enter your phone number" value="<?php echo isset($_SESSION['phone']) ? htmlspecialchars($_SESSION['phone']) : ''; ?>" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="submit" class="btn-submit">Save and Continue</button>
                    
                </form>
            </div>
        </div>
        
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy; <?php echo date("Y"); ?> <span>Kumasi Technical University</span> | Student Portal System</p>
    </footer>

</body>
</html>

