<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tractor Owner Details</title>
</head>
<body>
    <h2>Tractor Owner Details</h2>
    <form action="save_tractor_owner_details.php" method="post">
        <!-- Add tractor owner-specific details -->
        <label for="brand">Brand:</label><br>
        <input type="text" id="brand" name="brand" required><br>
        
        <label for="model">Model:</label><br>
        <input type="text" id="model" name="model" required><br>
        
        <!-- Add more tractor owner details here -->
        
        <input type="submit" value="Save">
    </form>
</body>
</html>
