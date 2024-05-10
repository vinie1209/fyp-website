<?php
// Include the database connection
include 'db_connection.php';

// SQL query to select approved organizations
$sql = "SELECT * FROM Organisations WHERE Status = 'Approved'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Organisation Hub</title>
    <link rel="stylesheet" href="/PawConnect/CSS/NavigationBar.css">
    <link rel="stylesheet" href="/PawConnect/CSS/OrganisationHub.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
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

<div class="content">
        <h1>Organisation Hub</h1>
        <!-- Filter form -->
        <form action="" method="get" class="filter">
            <label for="type">Filter by Type:</label>
            <select name="type" id="type">
                <option value="">All</option>
                <option value="Registered">Registered</option>
                <option value="Unregistered">Unregistered</option>
            </select>

            <label for="verification">Filter by Verification:</label>
            <select name="verification" id="verification">
                <option value="">All</option>
                <option value="Verified">Verified</option>
                <option value="Unverified">Unverified</option>
            </select>

            <input type="submit" value="Apply Filters">
        </form>

        <!-- Display organizations -->
        <div class="org-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Check if filters are applied
                    if ((!isset($_GET['type']) || $_GET['type'] == $row['Type']) && 
                        (!isset($_GET['verification']) || $_GET['verification'] == $row['Verification'])) {
            ?>
            <div class="org-card">
                <div class="org-image">
                    <img src="<?php echo $row['Image'] ? $row['Image'] : '/PawConnect/Image/Blank Company Image.png'; ?>" alt="Organization Image">
                </div>
                <div class="org-details">
                    <h2><?php echo $row['Name']; ?></h2>
                    <p>Type: <?php echo $row['Type']; ?></p>
                    <p>Verification: <?php echo $row['Verification']; ?></p>
                </div>
                <div class="org-buttons">
                    <button>View More</button>
                    <button style="background-color: #FF914D;">Donate</button>
                </div>
            </div>
            <?php
                    }
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</body>
</html>