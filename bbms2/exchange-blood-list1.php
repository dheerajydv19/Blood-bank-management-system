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
    <title>Blood Bank - Exchange Blood Information</title>

    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/logout-button.css">
</head>

<body>
    <div id="body">
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

        <!-- Header Section -->
        <header>
            <!-- Image in Header -->
            <img src="images/1048159.png" alt="Header Image" class="header-image">
            <h1>VIT Bhopal Blood Bank</h1>
            <p>Exchange Blood Information</p>
        </header>

        <center>
            <div id="form">
                <table border="1">
                    <tr>
                        <td><center><b>Name</b></center></td>
                        <td><center><b>Father's Name</b></center></td>
                        <td><center><b>Address</b></center></td>
                        <td><center><b>City</b></center></td>
                        <td><center><b>Age</b></center></td>
                        <td><center><b>Blood Group</b></center></td>
                        <td><center><b>Exchange Blood Group</b></center></td>
                        <td><center><b>Mobile No</b></center></td>
                        <td><center><b>E-Mail</b></center></td>
                    </tr>

                    <?php
                    $q = $db->query("SELECT * FROM exchange_b");
                    while ($r1 = $q->fetch(PDO::FETCH_OBJ)) {
                    ?>

                        <tr>
                            <td><center><?php echo $r1->name; ?></center></td>
                            <td><center><?php echo $r1->fname; ?></center></td>
                            <td><center><?php echo $r1->address; ?></center></td>
                            <td><center><?php echo $r1->city; ?></center></td>
                            <td><center><?php echo $r1->age; ?></center></td>
                            <td><center><?php echo $r1->bgroup; ?></center></td>
                            <td><center><?php echo $r1->exbgroup; ?></center></td>
                            <td><center><?php echo $r1->mno; ?></center></td>
                            <td><center><?php echo $r1->email; ?></center></td>
                        </tr>

                    <?php
                    }
                    ?>
                </table>
            </div>
        </center>
    </div>
    <div class="login-footer">
        <h4>Copyright@VITBhopal</h4>
    </div>
</body>

</html>
