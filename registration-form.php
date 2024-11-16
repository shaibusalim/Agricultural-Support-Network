<?php
include "connection.php";

if (isset($_POST['submit'])) {
    // Fetch from HTML form
    $UserName = $_POST['username'];
    $Email = $_POST['Email'];
    $MobileNo = $_POST['phone'];
    $Npassword = $_POST['Npassword'];
    $Cpassword = $_POST['Cpassword'];
    $userType = $_POST['userType']; // Retrieve the selected user type

    // Validation and other checks
    if (!preg_match("/^[0-9]{10}$/", $MobileNo)) {
        echo "<script>alert('MobileNo is invalid');</script>";
    } else {
        $duplicate_check = $conn->query("SELECT * FROM `farmers` WHERE `username` = '$UserName'");
        if ($duplicate_check->num_rows > 0) {
            // Duplication check
            echo "<script>alert('UserName has already been taken');</script>";
        } else {
            if ($Npassword == $Cpassword) {
                // Hash the password
                $hashedPassword = password_hash($Npassword, PASSWORD_DEFAULT);

                // Insert into respective database tables based on user type
                switch ($userType) {
                    case 'Farmer':
                        $insertQuery = "INSERT INTO `farmers`(`username`, `password`, `user_type`, `email`, `phone`) VALUES (?, ?, ?, ?, ?)";
                        break;
                    case 'TractorOwner':
                        $insertQuery = "INSERT INTO `tractor_owners`(`username`, `password`, `user_type`, `email`, `phone`) VALUES (?, ?, ?, ?, ?)";
                        break;
                    // Add cases for other user types here
                case 'Mover':
                    $insertQuery = "INSERT INTO `movers`(`username`, `password`, `user_type`, `email`, `contact`) VALUES (?, ?, ?, ?, ?)";
                    break;
                    default:
                        // Handle other cases or show an error message
                        break;
                }

                // Prepare and execute the query
                $stmt = $conn->prepare($insertQuery);
                $stmt->bind_param("sssss", $UserName, $hashedPassword, $userType, $Email, $MobileNo);

                if ($stmt->execute()) {
                    echo "<script>alert('Registration Successful')</script>";
                    // Redirect only if no output has been sent
                    header("location: login-form.php");
                    exit(); // Ensure script stops after redirect header
                } else {
                    echo "<script>alert('Failed to register')</script>";
                }
            } else {
                echo "<script>alert('Passwords don\'t match')</script>";
            }
        }
    }
}
?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <title>Registration</title>
    <script type="text/javascript" defer src="reg.js"></script>
</head>


<body>

        <div class="container">
            <div class="left-side">
               <p>welcome to our<br>website</p>
            </div>
            
            <div class="content-side">
                <div class="login-heading">
                    <img src="./nimages/asn.png" alt="Agricultural Support Network" title="ASN" height="120" width="170">
                  
                </div>

                   <div class="sub-heading">
                    <p>Create Your Free Account</p>
                   </div>
                   <div id="error"></div>
                   <div class="form">
                    <form action="registration-form.php" method="post" id="form" >
                        
                        <label for="fname">Username</label><br>
                        <input type="text" id="UserName" name="username" class="fname" placeholder="Sample852#" required><br>

                        <label for="email">Email</label><br>
                        <input type="email" id="Email"name="Email" class="email" placeholder="Example@email.com" required><br>

                        <label for="phoneno">MobileNo</label><br>
                        <input type="tel" id="MobileNo" name="phone" class="phoneno" placeholder="07########" required><br>

                        <label for="password">New Password</label><br>
                        <input type="password" id="Npassword" name="Npassword" class="password" placeholder="Enter Password" required><br>

                        <label for="cpassword">Confirm Password</label><br>
                        <input type="password" id="Cpassword" name="Cpassword" class="cpassword" placeholder="Confirm Password" required><br>

                        <div class="user-select">
                    <label for="user">Select User Type</label><br>
                        <select name="userType" id="users">
                            <option value="Farmer">Farmer</option>
                            <option value="Investor">Investor</option>
                            <option value="TractorOwner">Tractor Owner</option>
                            <option value="Mover">Mover</option>
                        </select>
                </div>
                        
                        <input type="submit" id="submit" name="submit" value="Create your account">
                    
                        
                    </form>
                   </div>

                   <div class="sign-in-option">
                  <p>Already have an account? <a href="login-form.php">Sign in</a></p>
                   </div>
            </div>
        </div>
    
</body>
</html>