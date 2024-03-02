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
     <!-- Link the separate CSS files -->
   
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/form.css">
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
       <header>
       <div class="login_heading-container">
            <img src="images/1048159.png" alt="Header Image" class="header-image">
            <h1>VIT Bhopal Blood Bank</h1>
            <p>Donor Registration</p> 
        </div>
       </header>

    <div id="body">
        <br>

        <?php
        // Check if the session variable 'un' is not set
        if (!isset($_SESSION['un'])) {
            // Redirect to index.php if the session variable is not set
            header('location:index.php');
            exit(); // Ensure no further code is executed after the redirection
        }

        // Assign the session variable 'un' to the $un variable
        $un = $_SESSION['un'];
        ?>
        
       
        
        <h1>Donor Registration</h1><br><br><br>

        <center>
            <div id="form">
                <form action="" method="post">
                    <table>
                     <caption><h2>Donor Registration Information</h2></caption>
                        <tr>
                            <td width="200px" height="50px"> Enter Name</td>
                            <td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name"></td>
                            <td width="200px" height="50px">Enter Father's Name</td>
                            <td width="200px" height="50px"><input type="text" name="Fname" placeholder="Enter Father's Name"></td>
                        </tr>
                        <tr>
                            <td width="200px" height="50px"> Enter Address</td>
                            <td width="200px" height="50px"><textarea name="address"></textarea></td>
                            <td width="200px" height="50px">Enter Father's Name</td>
                            <td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City"></td>
                        </tr>
                        <tr>
                            <td width="200px" height="50px"> Enter Age </td>
                            <td width="200px" height="50px"><input type="text" name="Age" placeholder="Enter Age"></td>
                            <td width="200px" height="50px"> select Blood Group</td>
                            <td width="200px" height="50px">
                                <select name="bgroup">
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>                              
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="200px" height="50px"> Enter E-mail</td>
                            <td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-mail"></td>
                            <td width="200px" height="50px">Enter Mobile no.</td>
                            <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile No"></td>
                        </tr>
                        <td><input type="Submit" name="sub" value="save"></td>
                    </table>
                </form>
                <?php
                if (isset($_POST['sub'])) 
                {
                    $name=$_POST['name'];
                    $fname=$_POST['Fname'];
                    $address=$_POST['address'];
                    $city= $_POST['city'];
                    $age=$_POST['Age'];
                    $bgroup=$_POST['bgroup'];
                    $mno=$_POST['mno'];
                    $email=$_POST['email'];
                    
                    $q = $db->prepare("INSERT INTO donor_registration(name,Fname,address,city,Age,bgroup,mno,email) VALUES(:name,:Fname,:address,:city,:Age,:bgroup,:mno,:email)");
                    $q->bindValue(':name', $name);
                    $q->bindValue(':Fname', $fname);
                    $q->bindValue(':address', $address);
                    $q->bindValue(':city', $city);
                    $q->bindValue(':Age', $age);
                    $q->bindValue(':bgroup', $bgroup);
                    $q->bindValue(':mno', $mno);
                    $q->bindValue(':email', $email);

                    if($q->execute())
                    {
                        echo"<script> alert('Doner registration Succes')</script>";
                    }
                    else
                    {
                        echo"<script> alert('Doner registration Failed')</script>";
                    }
                }
            
                ?>
            </div>
        </center>
    </div>
    <br><br><br>
    <div class="login-footer">
        <h4>Copyright@VITBhopal</h4>
    </div>
</body>
</html>

