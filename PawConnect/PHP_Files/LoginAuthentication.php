<?php
session_start();

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $providedEmail = trim($_POST["email"]); // Trim input
    $password = $_POST["password"];
    $role = $_POST["role"]; // Retrieve role from form data

    $loginQuery = "SELECT * FROM Users WHERE Email = '$providedEmail'";
    $result = $conn->query($loginQuery);

    if (!$result) {
        die("Error: " . $conn->error);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $storedPassword = trim($row['Password']);
        $storedRole = $row['Role'];

        // Simple comparison for testing
        if ($password === $storedPassword && strtolower($role) === strtolower($storedRole)) { // Compare roles ignoring case
            // Password is correct and role matches
            $_SESSION['email'] = $providedEmail;
            $_SESSION['success_message'] = 'Login successful. Welcome!';

            // Redirect to appropriate dashboard based on role
            if (strtolower($role) === 'member') { // Compare roles ignoring case
                header("Location: MemberDashboard.php");
            } elseif (strtolower($role) === 'admin') { // Compare roles ignoring case
                header("Location: AdminDashboard.php");
            } else {
                $_SESSION['error_message'] = 'Invalid role.';
                header("Location: MemberLogin.php"); // Redirect to login page
            }
            exit();
        } else {
            if (strtolower($role) === 'admin') { // Compare roles ignoring case
                $_SESSION['error_message'] = 'Invalid email, password, or role.';
                header("Location: AdminLogin.php");
            } else {
                $_SESSION['error_message'] = 'Invalid email, password, or role.';
                header("Location: MemberLogin.php");
            }
            exit();
        }
    } else {
        if (strtolower($role) === 'admin') { // Compare roles ignoring case
            $_SESSION['error_message'] = 'Invalid email, password, or role.';
            header("Location: AdminLogin.php");
        } else {
            $_SESSION['error_message'] = 'Invalid email, password, or role.';
            header("Location: MemberLogin.php");
        }
        exit();
    }
} else {
    // $_POST is empty, cannot determine role
    $_SESSION['error_message'] = 'Invalid request.';
    header("Location: MemberLogin.php");
    exit();
}
?>
