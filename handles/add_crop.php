<?php
// Establish a database connection (use your database credentials)
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $discounted_price = $_POST['discounted_price'];
    $climatic_requirements = $_POST['climatic_requirements'];

    // Insert product details into the 'products' table
    $sql = "INSERT INTO products (name, description, price, discounted_price, climatic_requirements)
            VALUES (?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssdds", $name, $description, $price, $discounted_price, $climatic_requirements);

    // Execute the prepared statement
    if ($stmt->execute()) {
        $product_id = $conn->insert_id; // Get the ID of the inserted product

        // Handle multiple image uploads
        $uploadDir = __DIR__ . "/images/";

        if (!empty($_FILES['images']['name'][0])) {
            $totalFiles = count($_FILES['images']['name']);

            for ($i = 0; $i < $totalFiles; $i++) {
                $tmpFilePath = $_FILES['images']['tmp_name'][$i];
                $newFilePath = $uploadDir . $_FILES['images']['name'][$i];

                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    // Insert image path into the 'product_images' table
                    $imagePath = "product_images/" . $_FILES['images']['name'][$i];
                    $imageSql = "INSERT INTO product_images (product_id, image_url)
                                 VALUES (?, ?)";
                    $imageStmt = $conn->prepare($imageSql);
                    $imageStmt->bind_param("is", $product_id, $imagePath);
                    $imageStmt->execute();
                } else {
                    // Handle the failed upload
                }
            }
        }

        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close prepared statements and database connection
    $stmt->close();
    $conn->close();
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crops</title>
</head>
<body>
<form action="add_crop.php" method="POST" enctype="multipart/form-data">
    <label for="name">Product Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" rows="4" required></textarea><br>
    
    <label for="price">Price:</label><br>
    <input type="text" id="price" name="price" required><br>
    
    <label for="discounted_price">Discounted Price (if any):</label><br>
    <input type="text" id="discounted_price" name="discounted_price"><br>
    
    <label for="climatic_requirements">Climatic Requirements:</label><br>
    <textarea id="climatic_requirements" name="climatic_requirements" rows="4"></textarea><br>
    
    <label for="images[]">Product Images:</label><br>
    <input type="file" id="images" name="images[]" multiple><br>
    
    <input type="submit" value="Add Product">
</form>


<?php
// Establish a database connection (use your database credentials)
include "../connection.php";

// Fetch products from the database
$sql = "SELECT * FROM products"; // Adjust this query as needed to fetch the required data
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        $productName = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $discountedPrice = $row['discounted_price'];
        $climaticRequirements = $row['climatic_requirements'];
        $productId = $row['id']; // Assuming there's a column named 'id' for product ID
        $imagePath = "Images/" . strtolower($productName) . ".jpg";

        // HTML output for each product
        ?>
        <div class="boxes" data-name="<?php echo $productName; ?>">
            <div class="img">
                <img src="./Images/<?php echo $imagePath; ?>.jpg" alt="<?php echo $productName; ?>">
            </div>
            <div class="product-name">
                <p><?php echo $productName; ?></p>
            </div>
            <div class="product-footer">
                <button id="buy<?php echo $productId; ?>">Buy</button>
                <button id="sell<?php echo $productId; ?>">Sell</button>
            </div>
        </div>
        <div class="card-right">
            <h1 id="heading"><?php echo $productName; ?></h1>
            <!-- Other HTML elements based on product details -->
            <h2 id="right-page-price">Rs. <?php echo $price; ?> <span><strike>Rs. <?php echo $discountedPrice; ?></strike></span></h2>
            <div class="right-page-description">
                <p><?php echo $description; ?></p>
            </div>
            <div class="climatic-requirements">
                <h3>Climatic requirements/ Areas suitable for cultivation</h3>
                <p><?php echo $climaticRequirements; ?></p>
            </div>
            <!-- Additional elements for quantity and purchase form -->
            <!-- You might want to include form elements or buttons for purchasing -->
        </div>
        <?php
    }
} else {
    echo "0 results";
}
$conn->close();
?>


</body>
</html>