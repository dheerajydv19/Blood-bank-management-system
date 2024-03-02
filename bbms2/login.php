<!-- login.php -->

<?php
// Include the database connection file
include('connection.php');

// Start a session for user authentication
session_start();

// Function to handle database query with prepared statements
function authenticateUser($db, $un, $ps) {
    try {
        $query = $db->prepare("SELECT * FROM admin WHERE uname=:un AND pass=:ps");
        $query->bindParam(':un', $un);
        $query->bindParam(':ps', $ps);
        $query->execute();

        // Fetch the results as objects
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    } catch (PDOException $e) {
        // Log or display the error
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// Check if the form is submitted
if (isset($_POST['sub'])) {
    $un = $_POST['username'];
    $ps = $_POST['password'];

    // Authenticate the user
    $authenticated = authenticateUser($db, $un, $ps);

    // If login is successful, set session and redirect to admin home
    if ($authenticated) {
        $_SESSION['un'] = $un;
        header("location: admin-home.php");
        exit();
    } else {
        // Display an error message for wrong username or password
        $error_message = "Wrong Username or Password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blood Bank - Login</title>
    <link rel="stylesheet" href="css/Login_Page.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <h1>VIT Bhopal Blood Bank</h1>
        <!-- Add any additional header content or navigation links here -->
    </header>

    <div class="login-page">
        <div class="login">
            <div class="login__content">
                <!-- Visual elements for the login page -->
                <div class="login__img">
                    <img src="images/1.jpg" alt="">
                </div>

                <!-- Login form -->
                <div class="login__forms">
                    <form action="login.php" class="login__registre" id="login-in" method="post">
                        <h1 class="login__title">Login</h1>

                        <!-- Input fields for username and password -->
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="username" placeholder="Username" class="login__input">
                        </div>

                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" name="password" placeholder="Password" class="login__input">
                        </div>

                        <!-- Login button -->
                        <input type="submit" name="sub" value="Login" class="login__button">
                    </form>

                    <!-- Display error message if any -->
                    <?php if (isset($error_message)) { ?>
                        <p style='color: white;'><?php echo $error_message; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="login-footer">
            <h4>Copyright@VITBhopal</h4>
        </div>
    </div>
</body>
</html>
