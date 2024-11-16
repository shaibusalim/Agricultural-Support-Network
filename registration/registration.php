<?php
// Handle basic user registration
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve basic registration details
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Insert user details into the database
    // Example: Insert into users table (username, password, role)
    // ...

    // Redirect to the specific role's additional details form
    if ($role === 'farmer') {
        header("Location: farmer_details.php");
        exit();
    } elseif ($role === 'investor') {
        header("Location: investor_details.php");
        exit();
    }
    // Add other role checks and redirections for different roles
}
?>

  
  
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form action="register_user.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <label for="role">Role:</label><br>
        <select id="role" name="role">
            <option value="farmer">Farmer</option>
            <option value="investor">Investor</option>
            <!-- Add other roles here -->
        </select><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>

