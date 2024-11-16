<?php
session_start(); // Ensure session is started

include "connection.php";

if (isset($_POST['submit'])) {
    // Fetch from HTML form
    $UserName = $_POST["username"];
    $Password = $_POST['Password'];
    $userType = $_POST['userType']; // Retrieve the selected user type

    // Selection from respective database table based on user type
    switch ($userType) {
        case 'Farmer':
            $table = 'farmers'; // Your farmer table name
            break;
        case 'Investor':
            $table = 'investors'; // Your investor table name
            break;
        case 'TractorOwner':
            $table = 'tractor_owners'; // Your tractor owner table name
            break;
        case 'Mover':
            $table = 'movers'; // Your mover table name
            break;
        default:
            // Handle default case or error handling if needed
            break;
    }

    // Selection from database using prepared statement
    $query = "SELECT `username`, `Password`, `user_type` FROM `$table` WHERE `UserName`=? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $UserName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Confirmation check
        if (password_verify($Password, $row['Password'])) {
            $_SESSION['login'] = true;
            $_SESSION['name'] = $row['username'];
            $_SESSION['Pass'] = $row['Password'];
            $_SESSION['username'] = $row['username'];

            if ($userType === 'TractorOwner') {
                // Fetch the tractor owner's ID and store it in the session
                $queryOwnerID = "SELECT owner_id FROM tractor_owners WHERE username = ?";
                $stmtOwnerID = $conn->prepare($queryOwnerID);
                $stmtOwnerID->bind_param("s", $UserName);
                $stmtOwnerID->execute();
                $resultOwnerID = $stmtOwnerID->get_result();
    
                if ($resultOwnerID->num_rows > 0) {
                    $rowOwnerID = $resultOwnerID->fetch_assoc();
                    $_SESSION['owner_id'] = $rowOwnerID['owner_id']; // Store owner's ID in the session
                } else {
                    // Handle case where owner ID retrieval fails
                    echo "Error in retreiving owner id";
                }
            }elseif($userType === 'Farmer') {
                // Fetch the farmer's ID and store it in the session
                $queryFarmerID = "SELECT farmer_id FROM farmers WHERE username = ?";
                $stmtFarmerID = $conn->prepare($queryFarmerID);
                $stmtFarmerID->bind_param("s", $UserName);
                $stmtFarmerID->execute();
                $resultFarmerID = $stmtFarmerID->get_result();
    
                if ($resultFarmerID->num_rows > 0) {
                    $rowFarmerID = $resultFarmerID->fetch_assoc();
                    $_SESSION['farmer_id'] = $rowFarmerID['farmer_id']; // Store farmer's ID in the session
                } else {
                    // Handle case where farmer ID retrieval fails
                    echo "Error in retreiving owner id";
                }
            }elseif($userType === 'Mover') {
                // Fetch the Movers's ID and store it in the session
                $queryMoverID = "SELECT mover_id FROM movers WHERE username = ?";
                $stmtMoverID = $conn->prepare($queryMoverID);
                $stmtMoverID->bind_param("s", $UserName);
                $stmtMoverID->execute();
                $resultMoverID = $stmtMoverID->get_result();
    
                if ($resultMoverID->num_rows > 0) {
                    $rowMoverID = $resultMoverID->fetch_assoc();
                    $_SESSION['mover_id'] = $rowMoverID['mover_id']; // Store mover's ID in the session
                } else {
                    // Handle case where farmer ID retrieval fails
                    echo "Error in retreiving owner id";
                }
            }
            
            // Redirect based on user type
            switch ($row['user_type']) {
                case 'Farmer':
                    header("location: farmers/farmers-dash.php");
                    break;
                case 'Investor':
                    header("location: investor-dash.php");
                    break;
                case 'TractorOwner':
                    header("location: tractorOwner/tractor-owner-dash.php");
                    break;
                case 'Mover':
                    header("location: movers/mover-owner-dash.php");
                    break;
                default:
                    // Default redirection if no match is found
                    header("location: default-page.php");
                    break;
            }
            exit(); // Ensure script stops after redirect header

        } else {
            echo "<script>alert('Wrong password');</script>";
        }
    } else {
        echo "<script>alert('User not registered');</script>";
    }
}
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginStyle.css">
    <title>Login</title>

    <style>
       
    </style>
</head>
<body>

    <div class="container">
        <div class="image-side">
            
        </div>
        <div class="content-side">
           <div class="login-heading">
            <img src="./nimages/asn.png" alt="Agricultural Support Network" title="ASN" height="100" width="170">
                   
           </div>
           <p id="sub-heading-1">Login</p>
           <p id="sub-heading-2">Log to your account</p>
           <p id="sub-heading-3">Thank you for getting back to ASN,lets access our the best recommendation for you</p>
           <div class="form">
            <form action="login-form.php" method="post">
                
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username" class="username" placeholder="Email or Phone Number" >
               
          
            
                <label for="Password">Password</label><br>
                <input type="password" id="Password" name="Password" class="Password" placeholder="Password">

                <div class="user-select">
                    <label for="user">Select User Type</label><br>
                        <select name="userType" id="users">
                            <option value="Farmer">Farmer</option>
                            <option value="Investor">Investor</option>
                            <option value="TractorOwner">Tractor Owner</option>
                            <option value="Mover">Mover</option>
                        </select>


                <div class="rememberme">
                    <div class="rem">
                        <input type="checkbox" id="remember-me-check">
                        <label for="remember-me" id="rem">Remember me</label>
                    </div>
                    <p id="reser-password">Reset Password?</p>
                   </div>
        
                   
                    <button type="submit" name="submit" class="submit">Sign In</button>
            </form>
           </div>
           
           
         <p id="footer">Don't have an account yet? <a href="registration-form.php">Register here</a></p>
        </div>
    </div>

    

</body>
</html>


