<?php
session_start();
$role = 'member'; // Set role to 'member'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/PawConnect/CSS/LoginStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<div class="error"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>' 
            . htmlspecialchars($_SESSION['error_message']) .
            '</div>';
        unset($_SESSION['error_message']);
    }
    ?>

    <div class="container">
        <div class="logo">
            <img src="/PawConnect/Image/PawConnect Logo.png" width="125px" alt="logo">
        </div>
        <h1>PawConnect</h1>
        <form action="LoginAuthentication.php" method="post">
            <h2>Login</h2>
            <input type="hidden" name="role" value="<?php echo $role; ?>"> <!-- Add hidden input for role -->
            
            <input type="text" id="email" name="email" placeholder="Enter Email" required>
            
            <input type="password" id="password" name="password" placeholder="Enter Password" required>

            <button type="submit" name="submit">Login</button>
        </form>
        <p>Have an account? <a href="RegisterAccount.php">Register an account</a></p>
        <p>Forget password? <a href="ForgetPassword.php">Change password</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script>
    window.onload = function() {
        setTimeout(function() {
            var errorAlert = document.querySelector(".error");
            if (errorAlert) {
                // Start the fade out
                errorAlert.style.opacity = '0';

                // Wait for the transition to finish before hiding
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 500); // This duration should match the CSS transition time
            }
        }, 1500); // Time before starting the fade out
    };
</script>
</body>
</html>