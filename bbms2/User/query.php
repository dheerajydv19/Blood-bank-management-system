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
</head>

<body>

    <div id="body">
        <!-- Main Content -->
        <div class="main-content">
            <center>
                <div id="form">
                    <form action="" method="post">
                        <table>
                            <caption><h2>Contact Us</h2></caption>
                            <tr>
                                <td width="200px" height="50px">Name</td>
                                <td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name"></td>
                            </tr>
                            <tr>
                                <td width="200px" height="50px">Mobile no.</td>
                                <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile No"></td>
                            </tr>
                            <tr>
                                <td width="200px" height="50px">E-mail</td>
                                <td width="200px" height="50px"><input type="text" name="Email" placeholder="Enter E-mail"></td>
                            </tr>
                            <tr>
                                <td width="200px" height="50px">Suggestions and queries</td>
                                <td width="200px" height="50px"><input type="text" name="query" placeholder="Enter Suggestions and queries"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="Submit" name="sub" value="Save"></td>
                            </tr>
                        </table>
                    </form>

                    <?php
if (isset($_POST['sub'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $mno = $_POST['mno'];
    $email = $_POST['Email'];
    $message = $_POST['query']; // Change 'query' to 'message'

    // Insert data into contact_us
    $q = $db->prepare("INSERT INTO contact_us (name, `mno`, Email, `message`) VALUES (:name, :mno, :email, :message)"); // Change 'query' to 'message'
    $q->bindValue(':name', $name);
    $q->bindValue(':mno', $mno);
    $q->bindValue(':email', $email);
    $q->bindValue(':message', $message); // Change 'query' to 'message'

    $q->execute();
}
?>

                </div>
            </center>

        </div>
    </div>
    <br><br><br><br>

    <!-- Footer -->
    <div class="login-footer">
        <h4>Copyright@VITBhopal</h4>
    </div>

</body>

</html>
