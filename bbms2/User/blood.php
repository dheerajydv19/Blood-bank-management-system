<?php
// Include your database connection file (connection.php)
include('connection.php');

// Start a session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="CSS/style.css">
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

    <div id="body">
        <!-- Main Content -->
        <div class="main-content">
            
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
