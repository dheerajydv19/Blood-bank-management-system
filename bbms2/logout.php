<?php
// Include your database connection file (connection.php)
include('connection.php');

// Start a session
session_start();

// Logout logic
if (isset($_POST['logout'])) {
    // Clear all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Blood Bank</title>
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            background-color: #f5f5f5;
            background-image: url('images/logout2.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
        }

        .logout-container {
            max-width: 400px;
            margin: 100px auto;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logout-container h1 {
            color: #772b2b;
        }

        .logout-container p {
            margin-top: 10px;
            color: #555;
        }

        .buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .logout-button,
        .cancel-button {
            padding: 10px 20px;
            margin: 0 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout-button {
            background-color: #772b2b;
        }

        .logout-button:hover {
            background-color: darkred;
        }

        .cancel-button {
            background-color: #aaa;
        }

        .cancel-button:hover {
            background-color: #777;
        }
    </style>
</head>

<body>
    <div class="logout-container">
        <h1>Logout</h1>
        <p>Are you sure you want to logout?</p>
        <form method="post" action="">
            <div class="buttons">
                <button type="submit" name="logout" class="logout-button">Logout</button>
                <a href="login.php" class="cancel-button">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>
