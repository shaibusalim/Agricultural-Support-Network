<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Farmer Details</title>
</head>
<body>
    <h2>Farmer Details</h2>
    <form action="save_farmer_details.php" method="post">
        <!-- Add farmer-specific details -->
        <label for="farm_name">Farm Name:</label><br>
        <input type="text" id="farm_name" name="farm_name" required><br>
        
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required><br>
        
        <label for="crops_grown">Crops Grown:</label><br>
        <input type="text" id="crops_grown" name="crops_grown" required><br>
        
        <!-- Add more farmer details here -->
        
        <input type="submit" value="Save">
    </form>
</body>
</html>
