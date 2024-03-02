<?php
// Include your database connection file (connection.php)
include('connection.php');

// Start a session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank - Donor Registration Information</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/logout-button.css">
   
    <!-- Add Font Awesome CDN (you can get it from https://fontawesome.com/start) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
       /* Container Styles */
        .container-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 900px;
            margin: 0 auto;
            overflow-y: auto; /* Add overflow-y property for vertical scrolling */
        }

        .blood-container {
            width: 30%;
            height: 200px;
            margin: 20px;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            overflow: hidden; /* Add overflow property to ensure content visibility within the container */
        }
        .blood-container:hover {
            transform: scale(1.05);
        }
        .blood-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
        }
        .blood-quantity {
            font-weight: bold;
            font-size: 30px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- Side Navigation -->
    <div class="sidenav">
        <!-- Admin Panel -->
        <div class="admin-panel">
            <!-- Name Card -->
            <div class="name-card">
                <img src="images/admin.png" alt="Admin Icon">
                <div>
                    <h2>Vishwajeet Fate</h2>
                    <p>ID : 123</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <a href="admin-home.php">Home</a>
            <a href="doner-red.php">Donor Registration</a>
            <a href="doner-list.php">Donor List</a>
            <a href="stoke-blood-list.php">Stock Blood List</a>
            <a href="out-stoke-blood-list.php">Out Stock Blood List</a>
            <a href="exchange-blood-list.php">Exchange Blood Registration</a>
            <a href="exchange-blood-list1.php">Exchange Blood List</a>
            <button class="logout-button" onclick="location.href='logout.php'">
                <i class="fas fa-sign-out-alt logout-icon"></i> Logout
            </button>
        </div>
    </div>

    <div id="body">
        <!-- Main Content -->
        <div class="main-content">
            <!-- Header Section -->
            <header>
                <!-- Image in Header -->
                <img src="images/1048159.png" alt="Header Image" class="header-image">
                <h1>VIT Bhopal Blood Bank</h1>
                <p>Stock Blood List</p>
            </header>
            
            <br><br><br><br>
            <div class="container-wrapper">
                <!-- Create 8 containers dynamically -->
                <?php
                $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                $colors = ['#ff9999', '#66b3ff', '#99ff99', '#ffcc99', '#c2c2f0', '#ffb3e6', '#c2f0c2', '#ff6666'];

                foreach ($bloodGroups as $index => $group) {
                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='$group'");
                    $row = $q->rowCount();
                    $imagePath = "images/Blood Types/{$group}.png";
                    $color = $colors[$index % count($colors)]; // Use modulo to handle cases where there are more groups than colors
                ?>

                    <div class="blood-container" style="background-color: <?php echo $color; ?>;">
                        <img src="<?php echo $imagePath; ?>" alt="Blood Image" class="blood-image">
                        <div class="blood-quantity"><?php echo $row; ?></div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <br><br><br><br>

    <!-- Footer -->
    <div class="login-footer">
        <h4>Copyright@VITBhopal</h4>
    </div>
    
</body>

</html>
