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
    <link rel="stylesheet" href="css/Login_Page.css">
    
    <!-- Link the separate CSS files -->
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/body.css">
   
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/logout-button.css">
    <!-- Add Font Awesome CDN (you can get it from https://fontawesome.com/start) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
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
           
            <div class="main-container">
                <div id="form" class="table-container">
                    <table border="1">
                        <tr>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>Blood Group</th>
                        </tr>

                        <?php
                        $q = $db->query("SELECT * FROM out_stoke_b");
                        if ($q) {
                            while ($r1 = $q->fetch(PDO::FETCH_OBJ)) {
                                ?>
                                <tr>
                                    <td><?php echo $r1->name; ?></td>
                                    <td><?php echo $r1->mno; ?></td>
                                    <td><?php echo $r1->bname; ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "Error executing the query: " . $db->errorInfo()[2];
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="login-footer">
        <h4>Copyright@VITBhopal</h4>
    </div>
</body>

</html>
