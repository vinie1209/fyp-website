<!DOCTYPE html>
<html lang="en">
<head>
    <title>PawConnect</title>
    <link rel="stylesheet" href="/PawConnect/CSS/nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <script src="/PawConnect/JS/NavigationBar.jss"></script>
        <?php
                if (isset($_SESSION['success_message'])) {
                    echo '<div class="success"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>' 
                        . htmlspecialchars($_SESSION['success_message']) .
                        '</div>';
                    unset($_SESSION['success_message']);
                }
        ?>
    <div class="navcontainer">
        <div class="navbar">
            <div class="logo">
                <img src="/PawConnect/Image/PawConnect Logo.png" width="50px" alt="logo">
                <a href="/PawConnect/PHP_Files/MemberDashBoard.php">PawConnect</a>
            </div>
            <nav>
                <ul class="sidebar">
                    <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></li>
                    <li><a href="/PawConnect/PHP_Files/MemberDashBoard.php">Home</a></li>
                    <li><a href="/PawConnect/PHP_Files/AnimalHub.php">Animal Hub</a></li>
                    <li><a href="/PawConnect/PHP_Files/OrganisationHub.php">Organisation Hub</a></li>
                    <li><a href="/PawConnect/PHP_Files/AboutUs.php">About Us</a></li>
                    <li><a href="/PawConnect/PHP_Files/MemberProfile.php">Profile</a></li>
                    <li><a href="/PawConnect/PHP_Files/MemberLogin.php"><img src="/PawConnect/Image/LogOut.png" width="20px" height="20px" alt="Logout"></a></li>
                </ul>
                <ul>
                    <li></li>
                    <li></li>
                    <li class="hideOnMobile"><a href="/PawConnect/PHP_Files/MemberDashBoard.php">Home</a></li>
                    <li class="hideOnMobile"><a href="/PawConnect/PHP_Files/AnimalHub.php">Animal Hub</a></li>
                    <li class="hideOnMobile"><a href="/PawConnect/PHP_Files/OrganisationHub.php">Organisation Hub</a></li>
                    <li class="hideOnMobile"><a href="/PawConnect/PHP_Files/AboutUs.php">About Us</a></li>
                    <li class="hideOnMobile"><a href="/PawConnect/PHP_Files/MemberProfile.php">Profile</a></li>
                    <li class="hideOnMobile"><a href="/PawConnect/PHP_Files/MemberLogin.php"><img src="/PawConnect/Image/LogOut.png" width="20px" height="20px" alt="Logout"></a></li>
                    <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></li>
                </ul>
            </nav>
                
        </div>
    </div>

    <script>
        function showSidebar(){
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'flex'
        }
        function hideSidebar(){
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'none'
        }
    </script>
</body>
</html>